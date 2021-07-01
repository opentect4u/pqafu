<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


	public function __construct(){
			parent::__construct();
			$this->load->model('admin/Login_model');
			$this->load->model('Master');
		}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('admin/login.php');
	}

	// *********** Code Start For Admin Login        ********************   ///

	public function login()
	{

         	if($this->input->post("uemail"))
				{
			    	$email    = $this->input->post("uemail");
					$password = $this->input->post("upassword");

                    $result    = $this->Login_model->f_select_password($email);
					if($result){

							$match	 	= password_verify($password,$result->password);
				
							if($match)
								{

									$user_status   = $this->Login_model->f_get_user_status($email);

									if($user_status == 'A'){

										$admin_details = $this->Login_model->f_get_user_inf($email);
								     	$firstname = $admin_details->first_name;
								   	    $admin_id  = $admin_details->user_id;
								   	    $user_type = $admin_details->user_type;


								   	    if($user_type == 'A' ){

								   	    	$this->session->set_userdata("admin_id",$admin_id);
										    $this->session->set_userdata("admin_name",$firstname);
										    $this->session->set_userdata("email",$email);

										    $data_array = array(

							                "user_id"        =>  $this->session->userdata('admin_id'),
							                "userIp"         =>  $this->input->ip_address(),
							                "loginTime"      =>  date('Y-m-d H:i:s')

							                );

							                $this->Master->f_insert('user_activity', $data_array);
										
										    redirect(base_url()."admin/login/dashboard");	

								   	    }else{

								   	    	$this->session->set_userdata("cw_id",$admin_id);
										    $this->session->set_userdata("cw_name",$firstname);
										    $this->session->set_userdata("cw_email",$email);

										    $data_array = array(

							                "user_id"        =>  $this->session->userdata('cw_id'),
							                "userIp"         =>  $this->input->ip_address(),
							                "loginTime"      =>  date('Y-m-d H:i:s')

							                );

							                $this->Master->f_insert('user_activity', $data_array);
										
										    redirect(base_url()."admin/cw");	
								   	    }
								        							           

										

									}else{

										$this->session->set_flashdata('login_error', 'You Blocked');
									    redirect(base_url()."admin/");
									}

																	
								}
							else
								{

									$this->session->set_flashdata('login_error', 'Invalid Password');
									redirect(base_url()."admin/");
								}
					    }else{

                           $this->session->set_flashdata('login_error', 'Invalid User ID');
				           redirect(base_url()."admin/");
						    }		
				}
				else
				{
					$this->load->view(base_url()."admin/");
				}
			
	}

	// *********** Code End For Admin Login   ******************** //


	// *********** Code Start For Admin Logout   ******************** //
	public function logout()
	{
			$this->session->sess_destroy();
			redirect(base_url()."admin/");
	}
	// *********** Code End For Admin Logout   ********************   //


	//*********** Code Start For DASHBOARD    ********************   //
	public function dashboard()
	{
		
		if($this->session->userdata('admin_id')){
			
			$this->load->view('admin/dashboard');
	
	    }else{

	    	redirect("admin/");
	 	
	    }
	}

	//*********** Code End For DASHBOARD   ********************   //

}
