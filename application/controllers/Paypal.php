<?php  
  //require __DIR__  .'/vendor/autoload.php';
     
    require_once('/home2/pqafucom/public_html/vendor/autoload.php');
  // require_once('../');

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
/** All Paypal Details class * */
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Currency;
use PayPal\Api\Payment;

use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use PayPal\Api\Authorization;
use PayPal\Api\Agreement;
use PayPal\Api\AgreementStateDescriptor;
use PayPal\Api\Plan;
use PayPal\Api\PaymentDefinition;
use PayPal\Api\ShippingAddress;
use PayPal\Api\CreditCard;
use PayPal\Api\FundingInstrument;
// use session;

//subcrption
use PayPal\Api\ChargeModel;
use PayPal\Api\MerchantPreferences;
use PayPal\Api\Patch;
use PayPal\Api\PatchRequest;
use PayPal\Common\PayPalModel;



class Paypal extends CI_Controller {
     
    public function __construct(){
        parent::__construct();
        //$this->load->library("paypal");
        $this->load->helper("url");
          $this->load->model('Master');
        
    }


    public function index(){

            // After Step 1
            $apiContext = new \PayPal\Rest\ApiContext(
                    new \PayPal\Auth\OAuthTokenCredential(
                        'AQ3eX-CsmPwai__BGMLu-KaDtUOSod138RcmebI1a5WwB7B33k5UIgnFpDmDvCdIsE00Jv1GmwdFxZ2a',     // ClientID
                        'ECHOY8rpLphevILtMEf2fuGhY3KTuhNquTzx9J-xCsgSmIkYTSXiDUZF2czaVudu24hmvjMsd5mep2hj'      // ClientSecret
                    )
            );

                    // After Step 2
                    $payer = new \PayPal\Api\Payer();
                    $payer->setPaymentMethod('paypal');

                    $amount = new \PayPal\Api\Amount();
                    $amount->setTotal('1.00');
                    $amount->setCurrency('USD');

                    $transaction = new \PayPal\Api\Transaction();
                    $transaction->setAmount($amount);

                    $redirectUrls = new \PayPal\Api\RedirectUrls();
                    $redirectUrls->setReturnUrl("https://example.com/your_redirect_url.html")
                        ->setCancelUrl("https://example.com/your_cancel_url.html");

                    $payment = new \PayPal\Api\Payment();
                    $payment->setIntent('sale')
                        ->setPayer($payer)
                        ->setTransactions(array($transaction))
                        ->setRedirectUrls($redirectUrls);


                        // After Step 3
                    try {
                        $payment->create($apiContext);
                        echo $payment;

                        echo "\n\nRedirect user to approval_url: " . $payment->getApprovalLink() . "\n";
                    }
                    catch (\PayPal\Exception\PayPalConnectionException $ex) {
                                            // This will print the detailed information on the exception.
                        //REALLY HELPFUL FOR DEBUGGING
                        echo $ex->getData();
                    }

                       

    }

     public function second(){

        $amt          = $this->input->get('amt');
        $product_id   = $this->input->get('prod_id');

         $apiContext = new \PayPal\Rest\ApiContext(
                    new \PayPal\Auth\OAuthTokenCredential(
                        'AQ3eX-CsmPwai__BGMLu-KaDtUOSod138RcmebI1a5WwB7B33k5UIgnFpDmDvCdIsE00Jv1GmwdFxZ2a',     // ClientID
                        'ECHOY8rpLphevILtMEf2fuGhY3KTuhNquTzx9J-xCsgSmIkYTSXiDUZF2czaVudu24hmvjMsd5mep2hj'      // ClientSecret
                    )
            );
         $apiContext->setConfig(
            array(
                'mode' =>'live',
                'http.ConnectionTimeOut' => 30,
                'log.LogEnabled' => true,
                'log.FileName' => '/logs/paypal.log',
                'log.LogLevel' => 'ERROR'
            )
        );

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item_1 = new Item();

        $item_1->setName('Item 1') /** item name **/
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($amt); /** unit price **/

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($amt);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(base_url()."paypal/success") /** Specify return URL **/
            ->setCancelUrl(base_url()."paypal/cancel");

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
            /** dd($payment->create($this->_api_context));exit; **/
        try {
            $payment->create($apiContext);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            // if (\Config::get('app.debug')) {
            //   ///  \Session::put('error','Connection timeout');
            //     // return Redirect::route('membership');
            //     // return redirect()->route('showmsg');
               
       
            // }
            return $ex;
        }

        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                header("Location: $redirect_url");
                break;
            }
        }
       $this->session->set_userdata("paypal_payment_id",$payment->getId());
       $this->session->set_userdata("paypal_amt",$amt);
       $this->session->set_userdata("paypal_product_id",$product_id);
       // Session::put('paypal_payment_id', $payment->getId());

     
    }


    public function success(){

          $apiContext = new \PayPal\Rest\ApiContext(
                    new \PayPal\Auth\OAuthTokenCredential(
                        'AQ3eX-CsmPwai__BGMLu-KaDtUOSod138RcmebI1a5WwB7B33k5UIgnFpDmDvCdIsE00Jv1GmwdFxZ2a',     // ClientID
                        'ECHOY8rpLphevILtMEf2fuGhY3KTuhNquTzx9J-xCsgSmIkYTSXiDUZF2czaVudu24hmvjMsd5mep2hj'      // ClientSecret
                    )
            );
         $apiContext->setConfig(
            array(
                'mode' =>'live',
                'http.ConnectionTimeOut' => 30,
                'log.LogEnabled' => true,
                'log.FileName' => '/logs/paypal.log',
                'log.LogLevel' => 'ERROR'
            )
        );
        $payment_id = $this->session->userdata('paypal_payment_id');

        $payment = Payment::get($payment_id, $apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId($this->input->get('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $apiContext);

       
            $data  = array(

                        "status"          => $result->getState()
                    );

        if ( $data['status'] === 'approved') {

          //   Code for Worldwide TimeZone   // 

           $ip       = $_SERVER['REMOTE_ADDR'];
           $json     = file_get_contents('http://worldtimeapi.org/api/ip/' . $ip . '.json');
           $tzdata   = json_decode($json);
           $datetime = strtotime(substr(str_replace('T', ' ', $tzdata->datetime), 0, 19));
           $timezone = $tzdata->timezone;

         //   Code for Worldwide TimeZone   // 

            if($this->session->userdata('paypal_product_id') == 1){

                        $form_timei = date('Y-m-d H:i:s', $datetime);
                        $intervel = strtotime('+24 hour', $datetime);
                        $to_timei = date('Y-m-d H:i:s', $intervel);

                        // $datei = strtotime("+24 hour", strtotime(date('Y-m-d')));
                     }elseif($this->session->userdata('paypal_product_id') == 2){

                        $form_timei = date('Y-m-d H:i:s', $datetime);
                        $intervel = strtotime('+7 day', $datetime);
                        $to_timei = date('Y-m-d H:i:s', $intervel);
                        // $datei = strtotime("+6 day", strtotime(date('Y-m-d')));
                     }else{

                            $form_timei = date('Y-m-d H:i:s', $datetime);
                            $intervel = strtotime('+30 day', $datetime);
                            $to_timei = date('Y-m-d H:i:s', $intervel);

                         //$datei = strtotime("+29 day", strtotime(date('Y-m-d')));
                     }
                    
                   

                    $bata   = array(
                    
                        "user_id"     => $this->session->userdata('user_id'),
                        "trans_dt"    => date('Y-m-d'),
                        "txn_id"      => $result->getId(),
                        "pay_mode"    => 'P',
                        "subs_type"   => $this->session->userdata('paypal_product_id'),
                        "amount"      => $this->session->userdata('paypal_amt'),
                        "from_dt"     => $form_timei,
                        "to_dt"       => $to_timei,
                        "time_zone"   => $timezone,
                        "subs_status" => 'A',
                        "created_by"  => $this->session->userdata("first_name"),
                        "created_at"  => $form_timei

                    ) ;

          
         //   $this->Master->f_insert('payments', $data);
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


                    
            $this->session->set_flashdata('success', 'Payment made successfully.');
            redirect(base_url().'user/payment_success', 'refresh');



        // Payment successfully added, redirect to the payment complete page.
      //  header('location:payment-successful.html');
        exit(1);
      } else {
          // Payment failed
      }
       

    }

    public function subscription(){

        //$amt          = $this->uri->segment(3);
        $amt          = $this->input->get('amt');
        $product_id   = $this->input->get('prod_id');

        $this->session->set_userdata("paypal_amt",$amt);
        if($product_id == '2'){
            $sub = 'Week';
        }else{
            $sub = 'Month';
        }
      $this->session->set_userdata("subscription_plan",$sub);
      $apiContext = new \PayPal\Rest\ApiContext(
                    new \PayPal\Auth\OAuthTokenCredential(
                        'AQ3eX-CsmPwai__BGMLu-KaDtUOSod138RcmebI1a5WwB7B33k5UIgnFpDmDvCdIsE00Jv1GmwdFxZ2a',     // ClientID
                        'ECHOY8rpLphevILtMEf2fuGhY3KTuhNquTzx9J-xCsgSmIkYTSXiDUZF2czaVudu24hmvjMsd5mep2hj'      // ClientSecret
                    )
            );
      $apiContext->setConfig(
            array(
                'mode' =>'live',
                'http.ConnectionTimeOut' => 30,
                'log.LogEnabled' => true,
                'log.FileName' => '/logs/paypal.log',
                'log.LogLevel' => 'ERROR'
            )
        );

        $plan = new Plan();

        $plan->setName('Pqafu Plan')
            ->setDescription('Pqafu Plan')
            //->setType('fixed');
            ->setType('INFINITE');


        $paymentDefinition = new PaymentDefinition();

        $paymentDefinition->setName('Regular Payments')
            ->setType('REGULAR')
            ->setFrequency($sub)
            ->setFrequencyInterval("1")
            // ->setCycles("never")
            //->setCycles("1")
            ->setAmount(new Currency(array('value' => $amt , 'currency' => 'USD')));

        // $chargeModel = new ChargeModel();
        // $chargeModel->setType('SHIPPING')
        //     ->setAmount(new Currency(array('value' => $amt, 'currency' => 'USD')));

        // $paymentDefinition->setChargeModels(array($chargeModel));

        
        $merchantPreferences = new MerchantPreferences();
        $merchantPreferences->setReturnUrl(base_url()."paypal/ExecuteAgreement?success=true")
            ->setCancelUrl(base_url()."paypal/ExecuteAgreement?success=false")
            ->setAutoBillAmount("yes")
            ->setInitialFailAmountAction("CONTINUE")
            ->setMaxFailAttempts("0")
            ->setSetupFee(new Currency(array('value' => $amt, 'currency' => 'USD')));


        $plan->setPaymentDefinitions(array($paymentDefinition));
        $plan->setMerchantPreferences($merchantPreferences);

        // $request = clone $plan;
            
        // $output = $plan->create($apiContext);

        try {
            $output = $plan->create($apiContext);
            // print_r($output)  ;
        } catch (Exception $ex) {
            echo $ex;
            // ResultPrinter::printError("Created Plan", "Plan", null, $request, $ex);
            // exit(1);
        }

        // ResultPrinter::printResult("Created Plan", "Plan", $output->getId(), $request, $output);
  
      $planid= $output->id;
    
      $activePlan=$this->activtePlan($planid);
      $this->session->set_userdata("paypal_plan_id",$planid);
      $this->session->set_userdata("paypal_product_id",$product_id);
      //echo $activePlan;
      $activePlanid= $activePlan->id; 
      //echo "<br/>".$planid; 
      $createAgreement=$this->createAgreement($activePlanid);
      //echo $createAgreement;
      header("Location: $createAgreement");

    }


    public function planDetails($planid){
    // $planid          = $this->uri->segment(3);
    // die();

         $apiContext = new \PayPal\Rest\ApiContext(
                    new \PayPal\Auth\OAuthTokenCredential(
                        'AQ3eX-CsmPwai__BGMLu-KaDtUOSod138RcmebI1a5WwB7B33k5UIgnFpDmDvCdIsE00Jv1GmwdFxZ2a',     // ClientID
                        'ECHOY8rpLphevILtMEf2fuGhY3KTuhNquTzx9J-xCsgSmIkYTSXiDUZF2czaVudu24hmvjMsd5mep2hj'      // ClientSecret
                    )
            );
         $apiContext->setConfig(
            array(
                'mode' =>'live',
                'http.ConnectionTimeOut' => 30,
                'log.LogEnabled' => true,
                'log.FileName' => '/logs/paypal.log',
                'log.LogLevel' => 'ERROR'
            )
        );

        $plan = Plan::get($planid, $apiContext);
        // echo $plan;
        return $plan;
    }

    public function activtePlan($planid){
         $apiContext = new \PayPal\Rest\ApiContext(
                    new \PayPal\Auth\OAuthTokenCredential(
                        'AQ3eX-CsmPwai__BGMLu-KaDtUOSod138RcmebI1a5WwB7B33k5UIgnFpDmDvCdIsE00Jv1GmwdFxZ2a',     // ClientID
                        'ECHOY8rpLphevILtMEf2fuGhY3KTuhNquTzx9J-xCsgSmIkYTSXiDUZF2czaVudu24hmvjMsd5mep2hj'      // ClientSecret
                    )
            );
         $apiContext->setConfig(
            array(
                'mode' =>'live',
                'http.ConnectionTimeOut' => 30,
                'log.LogEnabled' => true,
                'log.FileName' => '/logs/paypal.log',
                'log.LogLevel' => 'ERROR'
            )
        );

        $createdPlan=$this->planDetails($planid);
        // return $createdPlan->getId();
        $patch = new Patch();

        $value = new PayPalModel('{
               "state":"ACTIVE"
             }');

        $patch->setOp('replace')
            ->setPath('/')
            ->setValue($value);
        $patchRequest = new PatchRequest();
        $patchRequest->addPatch($patch);

        // return $this->_api_context;

        $createdPlan->update($patchRequest, $apiContext);
        $plan = Plan::get($createdPlan->getId(), $apiContext);
        return $plan;
    }


    public function createAgreement($planid){
      // echo $planid          = $this->uri->segment(3);
// die();
      $apiContext = new \PayPal\Rest\ApiContext(
                    new \PayPal\Auth\OAuthTokenCredential(
                        'AQ3eX-CsmPwai__BGMLu-KaDtUOSod138RcmebI1a5WwB7B33k5UIgnFpDmDvCdIsE00Jv1GmwdFxZ2a',     // ClientID
                        'ECHOY8rpLphevILtMEf2fuGhY3KTuhNquTzx9J-xCsgSmIkYTSXiDUZF2czaVudu24hmvjMsd5mep2hj'      // ClientSecret
                    )
            );
         $apiContext->setConfig(
            array(
                'mode' =>'live',
                'http.ConnectionTimeOut' => 30,
                'log.LogEnabled' => true,
                'log.FileName' => '/logs/paypal.log',
                'log.LogLevel' => 'ERROR'
            )
        );

        $timestamp = strtotime("+5 minutes");
        $startTime = date('Y-m-d\\TH:i:s\\Z', $timestamp);
        $agreement = new Agreement();
        $agreement->setName('Base Agreement')
            ->setDescription('Basic Agreement')
            ->setStartDate($startTime);

        $plan = new Plan();
        $plan->setId($planid);
        $agreement->setPlan($plan);

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $agreement->setPayer($payer);

        // $shippingAddress = new ShippingAddress();
        // $shippingAddress->setLine1('111 First Street')
        //     ->setCity('Saratoga')
        //     ->setState('CA')
        //     ->setPostalCode('95070')
        //     ->setCountryCode('US');

        // $agreement->setShippingAddress($shippingAddress);
        
        $agreement = $agreement->create($apiContext);

        $approvalUrl = $agreement->getApprovalLink();
       
        return $approvalUrl;
        // return redirect($approvalUrl);
    }

    public function ExecuteAgreement(){
      $apiContext = new \PayPal\Rest\ApiContext(
                    new \PayPal\Auth\OAuthTokenCredential(
                        'AQ3eX-CsmPwai__BGMLu-KaDtUOSod138RcmebI1a5WwB7B33k5UIgnFpDmDvCdIsE00Jv1GmwdFxZ2a',     // ClientID
                        'ECHOY8rpLphevILtMEf2fuGhY3KTuhNquTzx9J-xCsgSmIkYTSXiDUZF2czaVudu24hmvjMsd5mep2hj'      // ClientSecret
                    )
            );
        // $success=$request->success;
         $success=$this->input->get('success');
       // echo "<br/>";
         $token=$this->input->get('token');
       // echo "<br/>";
         $planid = $this->session->userdata('paypal_plan_id');
       
        // $planid=Session::get('planid');
        // return $planid;
        if ($success=='true') {


                try {
                // Execute agreement
                 $agreement = new Agreement();
                $agreement->execute($token, $apiContext);
             //   $Payer = $agreement->getPayer();
            //echo $Payerinfo = $Payer->getPayerInfo();

         //echo   $plan  =$agreement->getPlan();
             
          } catch (PayPal\Exception\PayPalConnectionException $ex) {
            echo $ex->getCode();
            echo $ex->getData();
            die($ex);
          } catch (Exception $ex) {
            die($ex);
          }
            

        if ( $success=='true') {


             //   Code for Worldwide TimeZone   // 

           $ip = $_SERVER['REMOTE_ADDR'];
           $json = file_get_contents('http://worldtimeapi.org/api/ip/' . $ip . '.json');
           $tzdata = json_decode($json);
           $datetime = strtotime(substr(str_replace('T', ' ', $tzdata->datetime), 0, 19));
           $timezone = $tzdata->timezone;

         //   Code for Worldwide TimeZone   // 

            if($this->session->userdata('paypal_product_id') == 2){

                        $form_timei = date('Y-m-d H:i:s', $datetime);
                        $intervel = strtotime('+7 day', $datetime);
                        $to_timei = date('Y-m-d H:i:s', $intervel);
                        //$datei = strtotime("+6 day", strtotime(date('Y-m-d')));

                     }elseif($this->session->userdata('paypal_product_id') == 3){

                        $form_timei = date('Y-m-d H:i:s', $datetime);
                        $intervel = strtotime('+30 day', $datetime);
                        $to_timei = date('Y-m-d H:i:s', $intervel);

                       //  $datei = strtotime("+29 day", strtotime(date('Y-m-d')));
                     }
                    
                    $bata   = array(
                    
                        "user_id"     => $this->session->userdata('user_id'),
                        "trans_dt"    => date('Y-m-d'),
                        "txn_id"      => $agreement->getId(),
                        "plan_id"     => $planid,
                        "pay_mode"    => 'P',
                        "subs_type"   => $this->session->userdata('paypal_product_id'),
                        "amount"      => $this->session->userdata("paypal_amt"),
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



            redirect(base_url().'user/payment_success', 'refresh');

                // return $success;    
            }else{
                //return $success;  
            }
        }

   }

   public function cancel_subscription(){


     $apiContext = new \PayPal\Rest\ApiContext(
                    new \PayPal\Auth\OAuthTokenCredential(
                        'AQ3eX-CsmPwai__BGMLu-KaDtUOSod138RcmebI1a5WwB7B33k5UIgnFpDmDvCdIsE00Jv1GmwdFxZ2a',     // ClientID
                        'ECHOY8rpLphevILtMEf2fuGhY3KTuhNquTzx9J-xCsgSmIkYTSXiDUZF2czaVudu24hmvjMsd5mep2hj'      // ClientSecret
                    )
            );
   
    $agreementId = $this->input->get('sub');
    $agreement = new Agreement();
    $agreement->setId($agreementId);

    $agreementStateDescriptor = new AgreementStateDescriptor();
    $agreementStateDescriptor->setNote("Cancel the agreement");

    try {

        $agreement = Agreement::get($agreement->getId(), $apiContext);
        $details = $agreement->getAgreementDetails();
        $payer = $agreement->getPayer();
        $payerInfo = $payer->getPayerInfo();
        $plan = $agreement->getPlan();
        $payment = $plan->getPaymentDefinitions()[0];

        $cancel = $agreement->cancel($agreementStateDescriptor, $apiContext);

        $data  = array(
                        'subs_status' => 'E'
                    );
        $where = array(
                        'txn_id'   => $agreementId,
                        'pay_mode' => 'P'
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

            } catch (Exception $ex) {
                echo "Failed to get activate";
                var_dump($ex);
                exit();
            }


      



   }
   
   function cancel(){
       $this->session->set_flashdata('error', 'Something Went Wrong.');
        redirect(base_url().'user/subscribe', 'refresh');
   }
   
   

    
    
}