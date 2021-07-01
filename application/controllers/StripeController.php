<?php
defined('BASEPATH') OR exit('No direct script access allowed');
   
class StripeController extends CI_Controller {
    
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->library("session");
       $this->load->helper('url');
       $this->load->model('Master');
       $this->load->library('email');
    }
    
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function spay()
    {

        //$data['amount'] = $this->uri->segment(3);
        $data['amount'] = $this->input->get('amt');
        $data['product_id'] = $this->input->get('prod_id');
        $this->load->view('my_stripe',$data);
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function stripePost()
    {
        require_once('application/libraries/stripe-php/init.php');
    
        \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));

        $amt         = $this->input->post('amount');
        $product_id  = $this->input->post('product_id');

         /// Customer Address  //
        $name        = $this->input->post('name');
        $email       = $this->input->post('email');
        $line1       = $this->input->post('line1');
        $city        = $this->input->post('city');
        $state       = $this->input->post('state');
        $postal_code = $this->input->post('postal_code');
        $country     = $this->input->post('country');
      

        $customer = \Stripe\Customer::create(array(
            'name' => $name,
            'description' => 'Pqafu One Day pack',
            'email' => $email,
            'source' => $this->input->post('stripeToken'),
            "address" => ["city" => $city, "country" => $country, "line1" => $line1, "line2" => "", "postal_code" => $postal_code, "state" => $state]
        ));
     
      
        $charge = \Stripe\Charge::create ([
                "amount" => $amt,
                "currency" => "usd",
                "customer" => $customer->id,
                "description" => "Test payment from pqafu.com." 
        ]);
          
    if($charge){ 
                    // Check whether the charge is successful 
                    if($charge['amount_refunded'] == 0 && empty($charge['failure_code']) && $charge['paid'] == 1 && $charge['captured'] == 1){ 
                        // Transaction details  
                        $transactionID = $charge['balance_transaction']; 
                        $paidAmount = $charge['amount']; 
                        $paidAmount = ($paidAmount); 
                        $paidCurrency = $charge['currency']; 
                        $payment_status = $charge['status'];

                   

            $ip = $_SERVER['REMOTE_ADDR'];
            $json = file_get_contents('http://worldtimeapi.org/api/ip/' . $ip . '.json');
            $tzdata = json_decode($json);
            $datetime = strtotime(substr(str_replace('T', ' ', $tzdata->datetime), 0, 19));
            $timezone = $tzdata->timezone;

                     if($product_id == 1){

                        $form_timei = date('Y-m-d H:i:s', $datetime);
                        $intervel = strtotime('+24 hour', $datetime);
                        $to_timei = date('Y-m-d H:i:s', $intervel);

                        // $datei = strtotime("+24 hour", strtotime(date('Y-m-d')));
                      }   
                     // }elseif($product_id == 2){
                     //     $datei = strtotime("+6 day", strtotime(date('Y-m-d')));
                     // }
                   

                    $bata   = array(
                    
                        "user_id"     => $this->session->userdata('user_id'),
                        "trans_dt"    => date('Y-m-d'),
                        "txn_id"      => $transactionID,
                         "pay_mode"   => 'S',
                        "subs_type"   => $product_id,
                        "amount"      => $paidAmount,
                        "from_dt"     => $form_timei,
                        "to_dt"       => $to_timei,
                        "time_zone"   => $timezone,
                        "subs_status" => 'A',
                        "created_by"  => $this->session->userdata("first_name"),
                        "created_at"  => $form_timei

                    ) ;

           // $this->Master->f_insert('payments', $data);
            $this->Master->f_insert('td_subscription', $bata);



                $fromemail     = "payment@pqafu.com";
                $toemail       = $this->session->userdata('user_email');
                $subject       = "Pqafu One Day Plan";

                // Data For Email Template  // 
                $data['email'] =  'One Day Plan';
                // Data For Email Template  // 
               
                $mesg = $this->load->view('frontend/emailtemplate/paymentmail.php',$data,true);

                $config=array(
                'charset'=>'utf-8',
                'wordwrap'=> TRUE,
                'mailtype' => 'html'
                );

                $this->email->initialize($config);
                $this->email->to($toemail);
                $this->email->from($fromemail, "Pqafu");
                $this->email->subject($subject);
                $this->email->message($mesg);
                $mail = $this->email->send();
               // if($mail){

                    $this->session->set_flashdata('success', 'Payment made successfully.');
                   
                // }else{

                //   $this->session->set_flashdata('success', 'Payment made successfully.');
                // }
          
        
             
        //redirect(base_url().'StripeController/spay', 'refresh');
        redirect(base_url().'user/payment_success', 'refresh');
            }
        }
    }


    // create subscription
    public function create() {
       
        require_once('application/libraries/stripe-php/init.php');
    
        \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));
        //\Stripe\Stripe::setApiKey(STRIPE_SECRET_KEY);

        $product_id  = $this->input->post('product_id');
 
        $token     = $this->input->post('stripeToken');
        $email     = $this->input->post('stripeEmail');
        $plans      = $this->input->post('plan');
        $interval  = $this->input->post('interval');
        $price     = $this->input->post('amount');
        $currency  = $this->input->post('currency');
        $this->session->set_userdata("subscription_plan",$plans);

        /// Customer Address  //
        $name        = $this->input->post('name');
        $email       = $this->input->post('email');
        $line1       = $this->input->post('line1');
        $city        = $this->input->post('city');
        $state       = $this->input->post('state');
        $postal_code = $this->input->post('postal_code');
        $country     = $this->input->post('country');


        /// Customer Card Detail  //
        $number       = $this->input->post('number');
        $exp_month    = $this->input->post('exp_month');
        $exp_year     = $this->input->post('exp_year');
        $cvc          = $this->input->post('cvc');
       

 
        $time = time();
        $plan = \Stripe\Plan::create(array( 
            "product" => [
                "name" => $plans,
                "type" => "service"
            ],
            "nickname" => $plans,
            "interval" => $interval,
            "interval_count" => "1",
            "currency" => $currency,
            "amount" => ($price)
           
        ));

          $paymentMethods   =  \Stripe\PaymentMethod::create([
          'type' => 'card',
          'card' => [
            'number' => $number,
            'exp_month' => $exp_month,
            'exp_year' => $exp_year,
            'cvc' => $cvc,
          ],
        ]);

          $customer = \Stripe\Customer::create(array(
            'name' => $name,
            'description' => $plans,
            'email' => $email,
            'source' => $this->input->post('stripeToken'),
            "address" => ["city" => $city, "country" => $country, "line1" => $line1, "line2" => "", "postal_code" => $postal_code, "state" => $state ]
        ));



          $pm = \Stripe\PaymentMethod::retrieve($paymentMethods->id);
          $pm->attach(['customer' => $customer->id]);
             
 
        $subscription = \Stripe\Subscription::create(array(
            "customer" => $customer->id,
            "items" => array(
                array(
                    "plan" => $plan->id,
                ),
            ),
        ));
           $data  = \Stripe\Subscription::retrieve(
                     $subscription->id,
                          []
                       );
         // Check whether the charge is successful 
                    if(isset($data) && $data['status'] == 'active'){ 
                        // Transaction details  
                        $transactionID  = $data->id; 
                        $paidAmount     = $data->plan->amount;
                        $planid         = $data->plan->id;
                        $paidCurrency   = $data->plan->currency; 
                        $payment_status = $data['status'];

        


    $ip = $_SERVER['REMOTE_ADDR'];
    $json = file_get_contents('http://worldtimeapi.org/api/ip/' . $ip . '.json');
    $tzdata = json_decode($json);
    $datetime = strtotime(substr(str_replace('T', ' ', $tzdata->datetime), 0, 19));
    $timezone = $tzdata->timezone;

                    if($product_id == 2){
                        $form_timei = date('Y-m-d H:i:s', $datetime);
                        $intervel = strtotime('+7 day', $datetime);
                        $to_timei = date('Y-m-d H:i:s', $intervel);
                         //$datei = strtotime("+6 day", strtotime(date('Y-m-d')));
                     }elseif($product_id == 3){

                        $form_timei = date('Y-m-d H:i:s', $datetime);
                        $intervel = strtotime('+30 day', $datetime);
                        $to_timei = date('Y-m-d H:i:s', $intervel);

                       //  $datei = strtotime("+30 day", strtotime(date('Y-m-d')));
                     }
                    
                   

                    $bata   = array(
                    
                        "user_id"     => $this->session->userdata('user_id'),
                        "trans_dt"    => date('Y-m-d'),
                        "txn_id"      => $transactionID,
                        "plan_id"     => $planid,
                        "pay_mode"   => 'S',
                        "subs_type"   => $product_id,
                        "amount"      => $paidAmount,
                        "from_dt"     => $form_timei,
                        "to_dt"       => $to_timei,
                        "time_zone"   => $timezone,
                        "subs_status" => 'A',
                        "created_by"  => $this->session->userdata("first_name"),
                        "created_at"  => $form_timei

                    ) ;

            //$this->Master->f_insert('payments', $data);
            $this->Master->f_insert('td_subscription', $bata);


                $fromemail     = "payment@pqafu.com";
                $toemail       = $this->session->userdata('user_email');
                $subject       = "Pqafu Subscription Plan";

                // Data For Email Template  // 
                $dat['email'] =  $this->session->userdata('subscription_plan').'ly Subscription Plan';

                // Data For Email Template  // 
               
                $mesg = $this->load->view('frontend/emailtemplate/paymentmail.php',$dat,true);

                $config=array(
                'charset'=>'utf-8',
                'wordwrap'=> TRUE,
                'mailtype' => 'html'
                );

                $this->email->initialize($config);
                $this->email->to($toemail);
                $this->email->from($fromemail, "Pqafu");
                $this->email->subject($subject);
                $this->email->message($mesg);
                $mail = $this->email->send();
               // if($mail){

        $this->session->set_flashdata('success', 'Payment made successfully.');
      
        redirect(base_url().'user/payment_success', 'refresh');
        //$this->session->set_flashdata('price', $price);  
       // redirect('subscription/thankyou');
    }
   }
    // successfully pay
    public function thankyou() {
        $data['metaDescription'] = 'Stripe Manage Subscription Payment using Codeigniter';
        $data['metaKeywords'] = 'Stripe Manage Subscription Payment using Codeigniter';
        $data['title'] = "Stripe Manage Subscription Payment using Codeigniter - TechArise";
        $data['breadcrumbs'] = array('Stripe Manage Subscription Payment using Codeigniter' => '#');
        
        $data['price'] = $this->session->flashdata('price');
        $this->load->view('subscription/thankyou', $data);   
    }

    public function cancel_subscription(){

         require_once('application/libraries/stripe-php/init.php');
    
        \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));

        $sub_id       = $this->input->get('sub');
        $subscription = \Stripe\Subscription::retrieve($sub_id);
        $cancel       = $subscription->cancel();

        $data  = array(
                        'subs_status' => 'E'
                    );
        $where = array(
                        'txn_id'   => $sub_id,
                        'pay_mode' => 'S'
                    );
        if($cancel){

            $this->Master->f_edit('td_subscription', $data,$where);
            $this->session->set_flashdata('success', 'Subscription cancel successfully.');
            redirect(base_url().'user/paymenthistory', 'refresh');

        }else{

            //$this->Master->f_edit('td_subscription', $data,$where);
            $this->session->set_flashdata('error', 'Something Went Wrong.');
            redirect(base_url().'user/paymenthistory', 'refresh');

        }

      
        
    }
}