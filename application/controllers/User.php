<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {


	public function __construct(){
			parent::__construct();
			$this->load->model('Master');
            $this->load->model('user/User_model');
            $this->load->helper('qa_helper');
            $this->load->helper('captcha_helper');
            $this->load->library('email');
            $this->load->library('form_validation');
			if(! $this->session->userdata('user_id')){
			
			redirect(base_url().'login/');
	
	        }
		}


	public function index()
	{
		//$data['question']      =  $this->User_model->get_question_list_by_user();
		$data['question']      =  $this->User_model->get_question_list();
		//echo $this->db->last_query();
		//die();
        $data['category']      =  $this->Master->f_get_particulars('md_category',NULL,NULL,0);
        $data['grade']         =  $this->Master->f_get_particulars('md_grade',NULL,NULL,0);

        $data['recent_post']   =  $this->User_model->get_recent_post();

		$this->load->view('frontend/common/header');
		$this->load->view('frontend/question_listingAfterLogin',$data);
		$this->load->view('frontend/common/footer');
	}

///  ***************   Code Start For Length Validation    ************** ////////////

	function _check_length($input, $min, $max)
    {
		    $length = strlen($input);

		    if ($length <= $max && $length >= $min)
		    {
		        return TRUE;
		    }
		    elseif ($length < $min)
		    {
		        $this->form_validation->set_message('_check_length', 'Minimum number of characters is ' . $min);
		        return FALSE;        
		    }
		    elseif ($length > $max)
		    {
		        $this->form_validation->set_message('_check_length', 'Maximum number of characters is ' . $max);
		        return FALSE;        
		    }
    }


			  public function create_url_slug($string){
			   $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
			   return $slug;
			}

   ///  ***************   Code End For Length Validation    ************** ////////////

	///  ***************   Code Start For Post Question By user  on 11/02/2021    ************** ////////////

	public function post_question(){


		$captcha_insert = $this->input->post('captcha');
        $contain_sess_captcha = $this->session->userdata('valuecaptchaCode');
        if ($captcha_insert === $contain_sess_captcha) {

	            $this->form_validation->set_rules('cat_id', 'Category', 'required');
		    	$this->form_validation->set_rules('grade_id','Grade', 'required');
		    	$this->form_validation->set_rules('title', 'Title','required|min_length[4]|max_length[255]');
		    	// $this->form_validation->set_rules('title', 'Title','xss_clean|callback__check_length['.$this->input->post('title').',6,10]');
		    	
		    	$this->form_validation->set_rules('question','Question', 'required');

		    	  if ($this->form_validation->run() == TRUE)
                {

                $slug  = strtolower($this->input->post('title'));

			    $data  = array(

				"cat_id"      => $this->input->post('cat_id'),
				"grade_id"    => $this->input->post('grade_id'),
				"title"       => $this->input->post('title'),
				"slug"        => $this->create_url_slug($slug),
				"question"    => $this->input->post('question'),
				"user_id"     => $this->session->userdata('user_id'),
				"ask_dt"      => date('Y-m-d'),
				"created_by"  => $this->session->userdata('first_name'),
				"created_dt"  => date('Y-m-d'),

			     );

		 
		        $fromemail     = "askquestion@pqafu.com";
                $toemail       = $this->session->userdata('user_email');
                $subject       = "Asked Question";

               
                $dat['email'] =  "We have received your question and pending for approval by the Admin.";
                $mesg = $this->load->view('frontend/emailtemplate/askqumail.php',$dat,true);
                  
              

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
               // $mail = $this->email->send();
		   
		         //Send mail 
		         if($this->email->send()) 
		         	  $this->session->set_flashdata('msg', 'Mail Send Sucessfully Please check Email');
		        // $this->session->set_flashdata("email_sent","Email sent successfully."); 
		         else 
		         $this->session->set_flashdata('msg', 'Error in sending Email.');
		         //$this->session->set_flashdata("email_sent","Error in sending Email.");


			$this->Master->f_insert('td_question', $data);
			                //For notification storing message
		    //$this->session->set_flashdata('msg', 'Successfully added!');

			redirect(base_url().'post_question');

		    }else{

		    	  $vals = array(
			        'img_path'      => './captcha/image/',
			        'img_url'       =>  base_url().'captcha/image/',
			        'img_width'     => '150',
			        'img_height'    => '40',
			        'expiration'    => '7200',
			        'word_length'   => '5',
			        'font_size'     => 20,
			        'font_path' => FCPATH. 'captcha/verdana/verdana.ttf',
			        );

			        $captcha = create_captcha($vals);
			        $this->session->unset_userdata('valuecaptchaCode');
			        $this->session->set_userdata('valuecaptchaCode', $captcha['word']);
			        $data['captchaImg'] = $captcha['image'];

					$data['category']    =  $this->Master->f_get_particulars('md_category',NULL,NULL,0);
			        $data['grade']       =  $this->Master->f_get_particulars('md_grade',NULL,NULL,0);

			        $this->load->view('frontend/common/header');
					$this->load->view('frontend/post_question',$data);
					$this->load->view('frontend/common/footer');
		    }

		}else{

				$this->session->set_flashdata('msg', 'Invalid captcha');

				redirect(base_url().'post_question');
			}


	}

	///  ***************   Code Start For Post Question By user      ************** ////////////



	public function like_comment(){

				$data  = array(

				"q_id"        => $this->input->post('q_id'),
				"u_id"        => $this->input->post('user_id'),
				"action"      => 'L'
			    );

				//$this->Master->f_insert('td_question_like_dislike', $data);

				$status = 0;

				$result = $this->User_model->f_like_dislike('td_question_like_dislike', $data, $status);
                echo json_encode($result);
			
		
	}

	public function dislike_comment(){

				$data  = array(

				"q_id"        => $this->input->post('q_id'),
				"u_id"        => $this->input->post('user_id'),
				"action"      => 'D'
				
			    );
                $status = 1;
				//$this->Master->f_insert('td_question_like_dislike', $data);

				$result = $this->User_model->f_like_dislike('td_question_like_dislike', $data, $status);
                echo json_encode($result);
		
	}


	/// Code End for My Question   ///

	public function answer_like_comment(){

				$data  = array(

				"ans_id"        => $this->input->post('q_id'),
				"u_id"        => $this->input->post('user_id'),
				"action"      => 'L'
			    );

			    $status = 0;


			    $result = $this->User_model->f_ans_like_dislike('td_answer_like_dislike', $data, $status);
                echo json_encode($result);

		
	}
	public function answer_dislike_comment(){

				$data  = array(

				"ans_id"        => $this->input->post('q_id'),
				"u_id"        => $this->input->post('user_id'),
				"action"      => 'D'
			    );

			    $status = 1;

				$result = $this->User_model->f_ans_like_dislike('td_answer_like_dislike', $data, $status);
                echo json_encode($result);

		
	}

	/// Code Start for My Question   ///

	public function myquestion(){

		$data['question']      =  $this->User_model->get_question_list_by_user();
        $this->load->view('frontend/common/header');
		$this->load->view('frontend/portfolio__MyQuestion',$data);
		$this->load->view('frontend/common/footer');

	}

	

	/// Code Start for Paymenthistory   ///
	public function paymenthistory(){

		$data['pay']      =  $this->User_model->get_payment_list_by_user();

        $this->load->view('frontend/common/header');
		$this->load->view('frontend/portfolio__paymentHistory',$data);
		$this->load->view('frontend/common/footer');

	}

	/// Code End for Paymenthistory   ///

	/// Code Start for mysubscription   ///
	public function mysubscription(){

		$data['question']      =  $this->User_model->get_question_list_by_user();
        $this->load->view('frontend/common/header');
		$this->load->view('frontend/portfolio__mySubscription',$data);
		$this->load->view('frontend/common/footer');

	}

	/// Code End for mysubscription   ///

	/// Code Start for mysubscription   ///
	public function myfavourite(){

		$data['question']      =  $this->User_model->get_question_list_by_user_favourite();
        $this->load->view('frontend/common/header');
		$this->load->view('frontend/portfolio__myFevorites',$data);
		$this->load->view('frontend/common/footer');

	}

	/// Code End for mysubscription   ///


	///  Code Start For myfavourite Activation  /// 

	public function favourite(){




		 $result   =  $this->db->get_where('td_favourite', array('qts_id =' => $this->input->post('q_id'),'fav_by_user =' => $this->input->post('user_id')))->num_rows();

        if($result > 0){

        	$where  = array(

        		"qts_id"        => $this->input->post('q_id'),
				"fav_by_user"   => $this->input->post('user_id'),

        	);


        	$this->Master->f_delete('td_favourite',$where);

        	
        	$data['action'] = 'R';

        	echo json_encode($data);
        }else{


			    $data  = array(

				"qts_id"        => $this->input->post('q_id'),
				"fav_by_user"   => $this->input->post('user_id'),
				"created_by"    => $this->session->userdata('first_name'),
				"created_at"    => date('Y-m-d H:i:s')

 			    );

				$this->Master->f_insert('td_favourite', $data);

				
        	    $data['action'] = 'A';

        	    echo json_encode($data);
        }

		
	}

	///  Code End For myfavourite Activation  /// 


	/// Code Start for portfolio_updateProfile   ///
	public function portfolio_updateProfile(){


			if($_SERVER['REQUEST_METHOD'] == "POST") {
              

			  if(!empty($_FILES["profile_pic"]["name"])&& $_FILES['profile_pic']['size'] < 3000000)
                { 
                    // * config* //
                    $profile_image = str_replace(array(':','/','-','*',' '),'_',time().$_FILES["profile_pic"]["name"]);
                   
                    $config['upload_path']  = 'uploads/profile/';
                    $config['allowed_types'] = 'png|jpg|jpeg';
                    // $config['remove_spaces'] = TRUE;
                    $config['overwrite'] = TRUE;
                    $config['file_name'] = $profile_image;
                    $this->load->library('upload', $config);
                    // $this->upload->initialize($config); 
                   
                    if(! $this->upload->do_upload("profile_pic"))
                    {

                        $error = array('error' => 'Error in photo upload '.$this->upload->display_errors());

                        $this->session->set_flashdata('error',$error['error']);

                       
                    }
                    else
                    {
                        $this->upload->data();
                        $this->session->unset_userdata('user_pic');
                        $profile_image  =   $profile_image;
                    }
                }else{

                    $profile_image = $this->input->post('pic');
                }

                $data  = array(

				"profile_picture"    => $profile_image,
				"first_name"         => $this->input->post('first_name'),
				"last_name"          => $this->input->post('last_name'),
                "modified_by"        => date('Y-m-d'),
                "modified_dt"        => $this->session->userdata('first_name')
			
			    );

			    $where    = array(

			    	"user_id" => $this->session->userdata('user_id')

			    );


			 $this->Master->f_edit('md_users', $data,$where);
			 $this->session->set_userdata("user_pic",$profile_image);
			                //For notification storing message
		    $this->session->set_flashdata('msg', 'Successfully added!');

			redirect(base_url().'user/portfolio_updateProfile');
           

		}else{

			$where = array(

				"user_id" => $this->session->userdata('user_id')
			);
		$data['user']    =  $this->Master->f_get_particulars('md_users',NULL,$where,1);
        $this->load->view('frontend/common/header');
		$this->load->view('frontend/portfolio_updateProfile',$data);
		$this->load->view('frontend/common/footer');

	    }

	}

	/// Code End for portfolio_updateProfile   ///


  ///  ***************   Code Start For PLace Order By user  on 25/02/2021    ************** ////////////

	function ddoo_upload($filename){

	    $config['upload_path'] = 'uploads/order';
	    $config['allowed_types'] = 'gif|jpg|png';
	    $config['max_size'] = '100';
	    $config['max_width']  = '1024';
	    $config['max_height']  = '768';

	    $this->load->library('upload', $config);
	    if ( ! $this->upload->do_upload($filename)) {
	        $error = array('error' => $this->upload->display_errors());
	    return false;
	    // $this->load->view('upload_form', $error);
	    } else {
	    $data = array('upload_data' => $this->upload->data());
	    return true;
	    //$this->load->view('upload_success', $data);
	    }
    }

	public function order(){


		if($_SERVER['REQUEST_METHOD'] == "POST") {

              

			  if(!empty($_FILES["order_image"]["name"])&& $_FILES['order_image']['size'] < 10240)
                { 
                    // * config* //
                    $order_image = str_replace(array(':','/','-','*',' '),'_',time().$_FILES["order_image"]["name"]);
                   
                    $config1['upload_path']  = 'uploads/order';
                    $config1['allowed_types'] = 'png|jpg|jpeg|pdf|txt|doc|docx';
                    // $config['remove_spaces'] = TRUE;
                    $config1['overwrite'] = TRUE;
                    $config1['file_name'] = $order_image;
                    $this->load->library('upload', $config1);
                    // $this->upload->initialize($config); 
                    
                    if(! $this->upload->do_upload("order_image"))
                    {

                        $error = array('error' => 'Error in photo upload '.$this->upload->display_errors());

                        $this->session->set_flashdata('error',$error['error']);

                    }
                    else
                    {
                        $this->upload->data();
                        $order_image  =   $order_image;
                    }
                }else{

                    $order_image = '';
                }

                 if(!empty($_FILES["order_image1"]["name"])&& $_FILES['order_image1']['size'] < 10240)
                { 
                    // * config* //
                    $order_image1 = str_replace(array(':','/','-','*',' '),'_','1'.time().$_FILES["order_image1"]["name"]);
                   
                    $config2['upload_path']  = 'uploads/order';
                    $config2['allowed_types'] = 'png|jpg|jpeg|pdf|txt|doc|docx';
                    // $config['remove_spaces'] = TRUE;
                    $config2['overwrite'] = TRUE;
                    $config2['file_name'] = $order_image1;
                    $this->upload->initialize($config2);
                    $this->load->library('upload', $config2);
                    // $this->upload->initialize($config); 
                    
                    if(! $this->upload->do_upload("order_image1"))
                    {

                        $error = array('error' => 'Error in photo upload '.$this->upload->display_errors());

                        $this->session->set_flashdata('error',$error['error']);

                    }
                    else
                    {
                        $this->upload->data();
                        $order_image1  =   $order_image1;
                    }
                }else{

                    $order_image1 = '';
                }

                $data  = array(

                "order_date"        => date('Y-m-d'),
				"user_id"           => $this->session->userdata('user_id'),
				"order_image"       => $order_image,
				"order_image1"      => $order_image1,
				"phone"             => $this->input->post('phone'),
				"timezone"          => $this->input->post('timezone'),
				"topic"             => $this->input->post('topic'),
				"grade"             => $this->input->post('grade'),
				"assigntype"        => $this->input->post('assigntype'),
				"order_description" => $this->input->post('order_description'),
				"order_dead_line"   => $this->input->post('order_dead_line'),
				"max_words"         => $this->input->post('wordsCount'),
				"submitted_by"      => $this->session->userdata('first_name'),
				"submit_dt"         => date('Y-m-d H:i:s'),

			    );


			$id = $this->Master->f_insert('td_orders', $data);

				if($id){


				$fromemail     = "askquestion@pqafu.com";
                $toemail       = 'support@pqafu.com';
                $subject       = "Order Placed";

                // Data For Email Template  // 
            

                // Data For Email Template  // 
               
                $dat['email'] =  "An order has been placed.For details please log on to Admin Panel.";
                $mesg = $this->load->view('frontend/emailtemplate/askqumail.php',$dat,true);
                   //$this->load->view('frontend/emailtemplate/askqumail.php',true);
              

                $config=array(
                'charset'=>'utf-8',
                'wordwrap'=> TRUE,
                'mailtype' => 'html'
                );

                $this->email->initialize($config);
               
                $this->email->from($fromemail, "Pqafu");
                 $this->email->to($toemail);
                $this->email->subject($subject);
                $this->email->message($mesg);
               // $mail = $this->email->send();
		   
		         //Send mail 
		         if($this->email->send()) 
		         	  $this->session->set_flashdata('msg', 'Mail Send Sucessfully Please check Email');
		        // $this->session->set_flashdata("email_sent","Email sent successfully."); 
		         else 
		         $this->session->set_flashdata('msg', 'Error in sending Email.');
		         //$this->session->set_flashdata("email_sent","Error in sending Email.");


			   //  $from_email = "askquestion@pqafu.com"; 
      //           //$to_email   = $this->session->userdata('user_email');
      //           $to_email   = "support@pqafu.com";
		   
		    //      $this->email->from($from_email, 'Pqafu'); 
		    //      $this->email->to($to_email);
		    //      $this->email->subject('Asked Question'); 
		    //      $this->email->message('<body style="background-color: #ffffff; font-size: 16px;">
				  //  <center>
				  //  <table align = "center" border = "0" cellpadding = "0" cellspacing = "0" style = "height:100%; width:600px;">
				  //  <tr>
				  //  <td align = "center" bgcolor = "#ffffff" style = "padding:30px">
				  //  <p style = "text-align:left">Hello, <br> An order has been placed.For details please log on to Admin Panel.</p>
			
				  // <p style = "text-align:left">Thanks & Regards, <br>PQAFU</p></td></tr>
				  // </tbody>
				  //  </table>
				  // </center>
				  //  </body>'); 
		    //       $this->email->set_mailtype("html");
		   
		    //      //Send mail 
		    //      if($this->email->send()) 
		    //      	  $this->session->set_flashdata('msg', 'Mail Send Sucessfully Please check Email');
		    //     // $this->session->set_flashdata("email_sent","Email sent successfully."); 
		    //      else 
		    //      $this->session->set_flashdata('msg', 'Error in sending Email.');
		    //      //$this->session->set_flashdata("email_sent","Error in sending Email.");


			}
			                //For notification storing message
		    $this->session->set_flashdata('msg', 'Successfully added!');

			redirect(base_url().'user/myorder');
           

		}else{

			$data['orderrate'] = $this->Master->f_get_particulars('md_order_rate',NULL,NULL,1);

			$this->load->view('frontend/common/header');
		    $this->load->view('frontend/portfolio_placeOrder',$data);
		    $this->load->view('frontend/common/footer');

		}

	}

	///  ***************   Code Start For Post Question By user      ************** ////////////

	/// Code Start for My Order   ///
    public function myorder(){

	    	// $select = array("q.*","u.first_name");

	    	$where  = array(

	    		   "user_id"   => $this->session->userdata('user_id')
	            
	    	);

    	    $data['orders']       = $this->Master->f_get_particulars('td_orders',NULL,$where,0);


        $this->load->view('frontend/common/header');
		$this->load->view('frontend/portfolio__myOrder',$data);
		$this->load->view('frontend/common/footer');

	   }

	public function vieworder(){


		if($_SERVER['REQUEST_METHOD'] == "POST") {

              

			  if(!empty($_FILES["order_image"]["name"])&& $_FILES['order_image']['size'] < 3000000)
                { 
                    // * config* //
                    $order_image = str_replace(array(':','/','-','*',' '),'_',time().$_FILES["order_image"]["name"]);
                   
                    $config['upload_path']  = 'uploads/order';
                    $config['allowed_types'] = 'png|jpg|jpeg';
                    // $config['remove_spaces'] = TRUE;
                    $config['overwrite'] = TRUE;
                    $config['file_name'] = $order_image;
                  $this->load->library('upload', $config);
                    // $this->upload->initialize($config); 
                    
                    if(! $this->upload->do_upload("order_image"))
                    {

                        $error = array('error' => 'Error in photo upload '.$this->upload->display_errors());

                        $this->session->set_flashdata('error',$error['error']);

                       
                       // redirect('Application/apln');

                    }
                    else
                    {
                        $this->upload->data();
                        $order_image  =   $order_image;
                    }
                }else{

                    $order_image = '';
                }

                $data  = array(

                "order_date"        => date('Y-m-d'),
				"user_id"           => $this->session->userdata('user_id'),
				"order_image"       => $order_image,
				"order_description" => $this->input->post('order_description'),
				"order_dead_line"   => $this->input->post('order_dead_line'),
				"max_words"         => $this->input->post('max_words'),
				"submitted_by"      => $this->session->userdata('first_name'),
				"submit_dt"         => date('Y-m-d'),

			    );


			 $this->Master->f_insert('td_orders', $data);


		


			                //For notification storing message
		    $this->session->set_flashdata('msg', 'Successfully added!');

			redirect(base_url().'user/myorder');
           

		}else{


		    $where  = array(

	    		   "id"   => $this->uri->segment(3)
	            
	    	);

    	    $data['orders']       = $this->Master->f_get_particulars('td_orders',NULL,$where,1);

    	
			$this->load->view('frontend/common/header');
		    $this->load->view('frontend/portfolio_editplaceOrder',$data);
		    $this->load->view('frontend/common/footer');

		}

	}

	/// Code Start for mysubscription   ///
	public function subscribe(){

		$data['rates']      =  $this->Master->f_get_particulars('md_rates',NULL,NULL,0);
        $this->load->view('frontend/common/header');
		$this->load->view('frontend/subscribe',$data);
		$this->load->view('frontend/common/footer');

	}

	/// Code End for mysubscription   ///

	public function payment_success(){


		$this->load->view('frontend/common/header');
		$this->load->view('frontend/payment_success');
		$this->load->view('frontend/common/footer');


	}


}
