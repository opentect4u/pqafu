<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


	public function __construct(){

			parent::__construct();
			$this->load->model('Master');
			$this->load->model('user/User_model');
			$this->load->library('form_validation');
			$this->load->library('email');
			$this->load->helper('captcha');

			//date_default_timezone_set("Asia/india");

	}


	function signup()
	{

		$captcha_insert = $this->input->post('captcha');
        $contain_sess_captcha = $this->session->userdata('valuecaptchaCode');
        if ($captcha_insert === $contain_sess_captcha) {
		$email = $this->input->post('email');
		$uname = $this->input->post('name');
		$lname = $this->input->post('lname');
		$pass  = $this->input->post('password');

		$q = $this->db->get_where('md_users',['email'=>$email]);

		if($q->num_rows() == 0)
		{
		 
			$permitted_chars ="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
			$rand_email = SHA1($email);
			$rand = substr(str_shuffle($permitted_chars), 0, 16);
			$random = $rand_email.$rand;

			$data_array = array(

				"first_name"  => $uname,
				"last_name"   => $lname,
				"email"       => $email,
				"password"    => password_hash($pass, PASSWORD_DEFAULT),
				"user_type"   => 'U',
				"token"       => $random

			);
			$q = $this->Master->f_insert('md_users', $data_array);
			if($this->db->affected_rows()>0)
			{
			 
           // $url = base_url() . 'auth/verify_email?id='.$random;

      //       $message = '<body style="background-color: #ffffff; font-size: 16px;">
				  //  <center>
				  //  <table align = "center" border = "0" cellpadding = "0" cellspacing = "0" style = "height:100%; width:600px;">
				  //  <tr>
				  //  <td align = "center" bgcolor = "#ffffff" style = "padding:30px">
				  //  <p style = "text-align:left">Hello, <br><br> We received a request to activate your account from this email address. To initiate the activation process for your account, click the link below.</p>
				  //  <p><a target = "_blank" style = "text-decoration:none; background-color: #979393; border: black 1px solid; color: #fff; padding:10px 10px; display:block;" href = "' . $url . '">
				  //  <strong>Activate</strong></a></p>
				  // <p style = "text-align:left"><br>If you did not make this request, you can simply ignore this email.</p>
				  // <p style = "text-align:left">Sincerely, <br>PQAFU Support</p></td></tr>
				  // </tbody>
				  //  </table>
				  // </center>
				  //  </body>';

          //       $to = $email;
		        // $subject = "Activate Account";
		        // $from = "support@pqafu.com";
		        // $headers = "MIME-Version: 1.0" . "\r\n";
		        // $headers .= "Content-type:text/html;charset = iso-8859-1" . "\r\n";
		        // $headers .= "From: $from" . "\r\n";


                $fromemail     = "support@pqafu.com";
                $toemail       = $email;
                $subject       = "Activate Account";

                // Data For Email Template  // 
                $dat['email'] =  base_url() . 'auth/verify_email?id='.$random;

                // Data For Email Template  // 
               
                $mesg = $this->load->view('frontend/emailtemplate/regemail.php',$dat,true);

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

                // Send email
	            if ($mail) {
	                
	                  $this->session->set_flashdata('msg', 'Registration successful.Please check your mail for verification');
	                  redirect(base_url().'signup');
	            } else {

	                 $this->session->set_flashdata('msg', 'Something Went Wrong');
	                 redirect(base_url().'signup');

	                }

			}
		}
		else
		{
			
			$this->session->set_flashdata('msg', 'Email Already Exist !');
			redirect(base_url().'signup');
			
		}
	  }else{

				$this->session->set_flashdata('msg', 'Invalid Captcha');

				redirect(base_url().'signup');
			}

	}

	public function login(){

		$captcha_insert = $this->input->post('captcha');
            $contain_sess_captcha = $this->session->userdata('valuecaptchaCode');
   if ($captcha_insert === $contain_sess_captcha) {

         	if($this->input->post("email"))
				{
			    	$email    = $this->input->post("email");
					$password = $this->input->post("password");

                    $result   = $this->Master->f_get_particulars('md_users',NULL,array("email"    => $this->input->post("email")),1);

					if($result){

							$match	 	= password_verify($password,$result->password);
				
							if($match)
								{

								if($result->email_verify == '1'){



									if($result->user_status == 'A'){

										
								     	$firstname   = $result->first_name;
								     	$lastname    = $result->last_name;
								   	    $admin_id    = $result->user_id;
								   	    $user_type   = $result->user_type;
								   	    $profile_pic = $result->profile_picture;


								   	    if($user_type == 'U' ){

								   	    	$this->session->set_userdata("user_id",$admin_id);
										    $this->session->set_userdata("first_name",$firstname);
										    $this->session->set_userdata("last_name",$lastname);
										    $this->session->set_userdata("user_email",$email);
										    $this->session->set_userdata("user_pic",$profile_pic);

										  

										    $data_array = array(

							                "user_id"        =>  $this->session->userdata('user_id'),
							                "userIp"         =>  $this->input->ip_address(),
							                "loginTime"      =>  date('Y-m-d H:i:s')

							                );

							                $this->Master->f_insert('user_activity', $data_array);

							               $subs_status  = $this->User_model->get_subscription($this->session->userdata('user_id'));
								               if($subs_status == 'E'){

								               	redirect(base_url().'user/subscribe');
								               	
								               }else{

									               	if(! $this->session->userdata('question_id')){

									               	redirect(base_url().'user');
									                 }else{

									                 	redirect(base_url().'home/answer/'.$this->session->userdata('question_id'));
									                 }

								               }

								   	      }
								        							          
										}else{

											$this->session->set_flashdata('msg', 'You Blocked');

										    redirect(base_url().'login');
										}

									}else{

											$this->session->set_flashdata('msg', 'Verification process pending');

											redirect(base_url().'login');
									}

								}
							    else{

									$this->session->set_flashdata('msg', 'Invalid Password');
									redirect(base_url().'login');
								}
					    }else{

                           $this->session->set_flashdata('msg', 'Invalid User ID');
				           redirect(base_url().'login');
				           
						    }		
				}
				else{

					$this->session->set_flashdata('msg', 'Please Give credentials');

					redirect(base_url().'login');
				}

			}else{

				$this->session->set_flashdata('msg', 'Invalid captcha');

				redirect(base_url().'login');
			}
			
	}
    

	function forget_password()
	{
		$email = $this->input->post('email');

		$q = $this->db->get_where('users',['email'=>$email]);
		if($q->num_rows()>0)
		{
		    $k1 = $q->row();
		    $uname = $k1->first_name;
			 $permitted_chars ="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
			 $rand_email = SHA1($email);
			$rand = substr(str_shuffle($permitted_chars), 0, 16);
			$random = $rand_email.$rand;
			$q = $this->db->where('email',$email)->update('users',['token'=>$random]);
			if($this->db->affected_rows()>0)
			{
			 
                
                $this->load->library('email');
                $config = array();
                $config['protocol'] = 'sendmail';
                $config['mailpath'] = '/usr/sbin/sendmail';
                $config['charset'] = 'iso-8859-1';
                $config['wordwrap'] = TRUE;
                $config['mailtype']='html';
                $config['smtp_host'] = 'voiceitaloud.com';
                $config['smtp_user'] = 'info@voiceitaloud.com';
                $config['smtp_pass'] = 'Iy$A]S(_nR2N';
                $config['smtp_port'] = 465;
                $config["smtp_crypto"] = "ssl";
                
                $this->email->initialize($config);
                $this->email->from('info@voiceitaloud.com', 'Voice it Aloud');
                $this->email->to($email);
                $msg = '<html><head><meta charset="utf-8"></head>
<body><div style="text-align: center; max-width: 700px; margin: 0 auto;">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td style="padding: 60px 0 45px 0; text-align: center; border-bottom: #34fd27 solid 6px;">
      	<a href="https://www.voiceitaloud.com/" target="_blank">
      	<img src="'.base_url('assets/frontend_assets/images/logo.jpg').'" width="212" height="122" alt=""/>
           </a>
      </td>
    </tr>
	   <tr>
      <td style="padding: 25px 0 15px 0;">
<p style="font-family: Arial; text-align: center; color: #fc0103; font-size: 28px; margin: 0; padding: 0 0 35px 0">Forgot Your Password</p>
<p style="font-family: Arial; font-size: 18px; color: #0a1014; margin: 0; padding:0 0 33px 0; text-align: left;">Dear '.$uname.',</p>
<p style="font-family: Arial; font-size: 18px; line-height: 35px; color: #0a1014; margin: 0; padding: 0 0 35px 0; text-align: left;">You can Reset Your Password.Please click on the link  below to reset your Password.</p>
		  <p style="font-family: Arial; font-size: 18px; line-height: 35px; color: #0a1014; margin: 0; padding: 0 0 25px 0; text-align: center;">
		  <a href="'.base_url().'/reset_password/'.$random.'" style="background: #fc0103; display: inline-block; border-radius: 5px; color: #fff; text-decoration: none; padding:3px 15px;">Click Here to reset password</a>
		  </p>
		  <p style="font-family: Arial; font-size: 18px; line-height: 35px; color: #0a1014; margin: 0; padding:0; text-align: left;">
		  Thanks,<br>Voice It Aloud Forum.</p></td>
    </tr>
	  <tr>
	  <td><img src="'.base_url('assets/frontend_assets/images/footer.jpg').'" alt="" style="display: block; max-width: 100%; width: 100%;"/></td>
	  </tr>
	  <tr>
	  <td style="background: #212d36; padding: 17px 15px 35px 15px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td width="50%" align="left" valign="top">
		  <a href="https://www.voiceitaloud.com/" target="_blank" style="font-size: 18px; font-family: Arial; color: #fff; text-decoration: none; padding: 25px 0 0 0; margin: 0;">www.voiceitaloud.com</a></td>
      <td width="50%" align="right" valign="top">
		  <a href="https://www.facebook.com/voiceitalouddotcom/?modal=admin_todo_tour" target="_blank" style="margin-right: 25px;"><img src="'.base_url('assets/frontend_assets/images/fb.png').'" width="27" height="27" alt=""/></a>
		  <a href="https://www.instagram.com/voiceitaloud/" target="_blank"><img src="'.base_url('assets/frontend_assets/images/insta.png').'" width="28" height="28" alt=""/></a>
		</td>
    </tr>
  </tbody>
</table>
</td></tr>
  </tbody>
</table>
</div>
</body>
</html>';
              
                $this->email->subject('Forgot Password?');
                $this->email->message($msg);
                
                if($this->email->send())
                {
                    
    				$output = "A mail has been sent to your registered email to verify. Please check your inbox and spam  ";
    				echo json_encode($output);
    				die();
                }
                else
                {
                    $output = "An error occured !! Please try again";
                    echo json_encode($output);
			     	die();
                }
                
			}
		}
		else
		{
			$output = "Email does not exist !! Please check your credentials";
			echo json_encode($output);
		}	
	}
	
	function reset_password($token)
	{
	    $this->load->model(['Post_model','Category_model','User_model']);
        if($this->session->has_userdata('is_user_login'))
		{
		 $data_category['mycd'] = $this->Post_model->get_mycd();    
		}
		$query = $this->db->get_where('users',['token'=>$token]);
		if($query->num_rows()>0)
		{
		    $data_category['categories']=$this->Category_model->getCategories();
            $this->load->view("users/includes/header",$data_category);
    	    $this->load->view("users/reset_password");
		}
		else
		{
		    echo "Invalid Url";
		}
	}
	function reset_confirm()
	{
	    header("Access-Control-Allow-Origin: https://www.voiceitaloud.com/newweb/reset_confirm/");

	    $token = $this->input->post('token');
	    $password = $this->input->post('password');
	    $cpassword = $this->input->post('cpassword');
	    $this->load->model(['Post_model','Category_model','User_model']);
	    
	    $query = $this->db->get_where('users',['token'=>$token]);
	    
	    if($password===$cpassword)
	    {
    		if($query->num_rows()>0)
    		{
    	        $id= $query->row()->id;
    	        $q_update = $this->db->where(['id'=>$id,'token'=>$token])->update('users',['password'=>md5($password),'email_verify'=>'1','token'=>'']);
    	       //  echo json_encode($this->db->last_query());
    	       //  die();
    	        if($q_update)
    	        {
    	            $output = "Your Password has been changed !! Please login";
    	            echo json_encode($output);
    	            die();
    	        }
    		}
    		else
    		{
    		    $output = "Invalid URL";
    		    echo json_encode($output);
    	            die();
    		}
	    }
	    else
	    {
	        $output ="Password and Confirm Password did not match";
	        echo json_encode($output);
    	            die();
	    }
	    
	}

	//*************   Code start For Verifiying Email  ************/////

	function verify_email()
	{
	   $token = $this->input->get('id');
	   $q = $this->db->where('token',$token)->get("md_users");
	   if($q->num_rows()>0){
	   
	        $id        = $q->row()->user_id;
	        $email     = $q->row()->email;
            $firstname = $q->row()->first_name;

            $this->db->where('user_id',$id)->update('md_users',['email_verify'=>'1','token'=>null]);
            
            if($this->db->affected_rows()>0)
            {
                           // $this->session->set_userdata("user_id",$id);
						   // $this->session->set_userdata("user_name",$firstname);
						   // $this->session->set_userdata("user_email",$email);

						    // $data_array = array(

			       //          "user_id"        =>  $this->session->userdata('user_id'),
			       //          "userIp"         =>  $this->input->ip_address(),
			       //          "loginTime"      =>  date('Y-m-d H:i:s')

			       //          );

			       //          $this->Master->f_insert('user_activity', $data_array);
						
						    redirect(base_url().'thankyou/');    	   
    	   
            }
            else
            {
                $this->session->set_flashdata('msg',"Something error occured !! Please try again");
                
                redirect(base_url().'signup');
            }
	   }
	   else
	   {
	       echo "Not a valid link";
	   }
	}

	//*************   Code End For Verifiying Email  ************/////

	public function logout()
	{
			$this->session->sess_destroy();
			redirect(base_url().'login/');
	}  

	public function mail(){

		

		$this->email->from('info@pqafu.com', 'Pqafu');
		$this->email->to('lokesh@synergicsoftek.com');
		

		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.');

		$this->email->send();

	}

  ///***************** Start  Code For Update Password    on 03/03/2021  //// 
	public function forgot_password(){


		if($_SERVER['REQUEST_METHOD'] == "POST") {

			$toemail = $this->input->post('email');
            $query = $this->db->get_where('md_users', array('email =' => $toemail))->num_rows();

           if ($query > 0)
		    {
				$this->load->library('email');
				//$fromemail="info@pqafu.com";
				$fromemail="support@pqafu.com";
				
				$subject = "Otp For Forget Password";
				$data['email'] =  $toemail;
				// $mesg = $this->load->view('template/email',$data,true);
				// or
				$mesg = $this->load->view('frontend/change_pass/index.php',$data,true);

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
				if($mail){
					$data['message'] = "A link has been Sent To Your Registered Email Please Check.";
	             $this->load->view('frontend/common/header');
				 $this->load->view('frontend/change_pass/otp_sucess',$data);
				 $this->load->view('frontend/common/footer');
				}else{
				   $data['message'] = "Something Went Wrong";
	              $this->load->view('frontend/common/header');
				 $this->load->view('frontend/change_pass/otp_sucess',$data);
				 $this->load->view('frontend/common/footer');
				}

	       }else{

            $this->session->set_flashdata('Invalid_email', 'Invalid email Id!');
	       	$this->load->view('frontend/common/header');
		    $this->load->view('frontend/change_pass/otp_for_password');
		    $this->load->view('frontend/common/footer');


	         }

        }else{ 
		$this->load->view('frontend/common/header');
		$this->load->view('frontend/change_pass/otp_for_password');
		$this->load->view('frontend/common/footer');

	    }
	}
    ///***************** End  Code For Update Password    on 03/03/2021  //// 
	function password_update()
	{  

		$email= base64_decode($this->input->get('auth'));

		if($_SERVER['REQUEST_METHOD'] == "POST") {

			$pass  = $this->input->post('password');
			$data = array(
				
				"password"      => password_hash($pass, PASSWORD_DEFAULT),
				"modified_dt"   => date('Y-m-d H:i:s')
				
			);
			$where = array("email" => $this->input->post('email'));
			   
			$this->Master->f_edit('md_users', $data,$where); 


        $this->session->set_flashdata('password_update', 'Successfully Updated!');
        $data['email'] =  $email;
		$this->load->view('frontend/common/header');
		$this->load->view('frontend/change_pass/set_password',$data);
		$this->load->view('frontend/common/footer');

	    }else{

        $data['email'] =  $email;
        $this->load->view('frontend/common/header');
		$this->load->view('frontend/change_pass/set_password',$data);
		$this->load->view('frontend/common/footer');


	    } 
	}     
}