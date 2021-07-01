<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_new extends CI_Controller {


	public function __construct(){

			parent::__construct();
			$this->load->model('admin/Login_model');
			$this->load->model('Master');
			$this->load->helper('qa_helper');
			$this->load->library('form_validation');
			//date_default_timezone_set("Asia/india");

			if(! $this->session->userdata('admin_id')){
			
			redirect("admin/");
	
	        }
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

	  /// **** Start Code For Category List   *********** //
	public function index()
	{

		// $data['catgories']   =   $this->Master->f_get_particulars("md_category", NULL, NULL, 0);
		// $this->load->view('admin/common/header.php');
		// $this->load->view('admin/common/menu.php');
		// $this->load->view('admin/category/categorylist.php',$data);
		// $this->load->view('admin/common/footer.php');
	}
	/// **** End Code For Category List   *********** //

	/// **** Start Code For Category List   *********** //
	public function category()
	{

		$data['catgories']   =   $this->Master->f_get_particulars("md_category", NULL, NULL, 0);
		$this->load->view('admin/common/header.php');
		$this->load->view('admin/common/menu.php');
		$this->load->view('admin/category/categorylist.php',$data);
		$this->load->view('admin/common/footer.php');
	}
	/// **** End Code For Category List   *********** //


	/// **** Start Code For Add Category  *********** //
	public function addcategory(){

		    if($_SERVER['REQUEST_METHOD'] == "POST") {


		    	$row = $this->db->get_where('md_category', array('cat_name' => $this->input->post('cat_name')))->num_rows();


		 	   $data_array = array(

                "cat_name"        =>  $this->input->post('cat_name'),
                "created_by"      =>  $this->session->userdata('admin_name'),
                "created_dt"      =>  date('Y-m-d H:i:s')

                );

				 	if($row >0){

		            //For notification storing message
		            $this->session->set_flashdata('msg', 'Category Already Exist!');

		            redirect('admin/add_new');


				 	 }else{

				 	   	$this->Master->f_insert('md_category', $data_array);
		                //For notification storing message
		                $this->session->set_flashdata('msg', 'Successfully added!');

		                redirect('admin/add_new/category');

				 	 }

		    }else{

                $this->load->view('admin/common/header.php');
		        $this->load->view('admin/common/menu.php');
                $this->load->view('admin/category/add_cat.php');
                $this->load->view('admin/common/footer.php');

		    }

	}
    /// **** End Code For Add Category  *********** //


    /// **** Start Code For Edit Category   *********** //
	public function editcategory(){

		    if($_SERVER['REQUEST_METHOD'] == "POST") {


		    	$row = $this->db->get_where('md_category', array('cat_name' => $this->input->post('cat_name')))->num_rows();


		 	        $data_array = array(

				                "cat_name"         =>  $this->input->post('cat_name'),
				                "modified_by"      =>  $this->session->userdata('admin_name'),
				                "modified_dt"      =>  date('Y-m-d H:i:s')

				                );

		 	        $where = array(

		 	   	             'id' => $this->input->post('id')

		 	                 );

				 	if($row >0){

			            //For notification storing message
			            $this->session->set_flashdata('msg', 'Category Already Exist!');

			            redirect('admin/add_new/category');


				 	 }else{

				 	   	$this->Master->f_edit('md_category',$data_array,$where);

		                //For notification storing message
		                $this->session->set_flashdata('msg', 'Successfully Updated!');

		                redirect('admin/add_new/category');

				 	 }

		    }else{

		    	$data_array= array(

		    		'id' => $this->input->get('sl_no')

		    	);

		    	$data['cat'] = $this->Master->f_get_particulars('md_category',NULL,$data_array,1);

                $this->load->view('admin/common/header.php');
		        $this->load->view('admin/common/menu.php');
                $this->load->view('admin/category/edit_cat.php',$data);
                $this->load->view('admin/common/footer.php');

		    }

	}
	/// **** End Code For Edit Category  *********** //


	/// **** Start Code For Delete Category   *********** //
	public function delcat()
	{
		$where = array(

            'id' => $this->input->get('id')

        );
        $row = $this->db->get_where('td_question', array('cat_id' => $this->input->get('id')))->num_rows();

       

        if($row > 0){

        	 //For notification storing message
            $this->session->set_flashdata('msg', 'Can not Deleted Already Used in Question !');

            redirect("admin/add_new/category");

        }else{

        	$this->Master->f_delete('md_category', $where);
        	 //For notification storing message
            $this->session->set_flashdata('msg', 'Successfully deleted!');

            redirect("admin/add_new/category");

        }
       
	}
	/// **** End Code For Delete Category  *********** //


	/// **** Start Code For grade List   *********** //
	public function grade()
	{

		$data['grades']   =   $this->Master->f_get_particulars("md_grade", NULL, NULL, 0);
		$this->load->view('admin/common/header.php');
		$this->load->view('admin/common/menu.php');
		$this->load->view('admin/grade/gradelist.php',$data);
		$this->load->view('admin/common/footer.php');
	}
	/// **** End Code For grade List   *********** //


	/// **** Start Code For Add grade  *********** //
	public function addgrade(){

		    if($_SERVER['REQUEST_METHOD'] == "POST") {


		    	$row = $this->db->get_where('md_grade', array('grade_name' => $this->input->post('grade_name')))->num_rows();


		 	   $data_array = array(

                "grade_name"        =>  $this->input->post('grade_name'),
                "created_by"        =>  $this->session->userdata('admin_name'),
                "created_dt"        =>  date('Y-m-d H:i:s')

                );

				 	if($row >0){

		            //For notification storing message
		            $this->session->set_flashdata('msg', 'Grade Already Exist!');

		            redirect('admin/add_new/grade');


				 	 }else{

				 	   	$this->Master->f_insert('md_grade', $data_array);
		                //For notification storing message
		                $this->session->set_flashdata('msg', 'Successfully added!');

		                redirect('admin/add_new/grade');

				 	 }

		    }else{

                $this->load->view('admin/common/header.php');
		        $this->load->view('admin/common/menu.php');
                $this->load->view('admin/grade/add_grade.php');
                $this->load->view('admin/common/footer.php');

		    }

	}
    /// **** End Code For Add grade  *********** //


    /// **** Start Code For Edit grade   *********** //
	public function editgrade(){

		    if($_SERVER['REQUEST_METHOD'] == "POST") {


		    	$row = $this->db->get_where('md_grade', array('grade_name' => $this->input->post('grade_name')))->num_rows();


		 	        $data_array = array(

				                "grade_name"       =>  $this->input->post('grade_name'),
				                "modified_by"      =>  $this->session->userdata('admin_name'),
				                "modified_dt"      =>  date('Y-m-d H:i:s')

				                );

		 	        $where = array(

		 	   	             'id' => $this->input->post('id')

		 	                 );

				 	if($row >0){

			            //For notification storing message
			            $this->session->set_flashdata('msg', 'Grade Already Exist!');

			            redirect('admin/add_new/grade');


				 	 }else{

				 	   	$this->Master->f_edit('md_grade',$data_array,$where);

		                //For notification storing message
		                $this->session->set_flashdata('msg', 'Successfully Updated!');

		                redirect('admin/add_new/grade');

				 	 }

		    }else{

		    	$data_array= array(

		    		'id' => $this->input->get('id')

		    	);

		    	$data['grade'] = $this->Master->f_get_particulars('md_grade',NULL,$data_array,1);

                $this->load->view('admin/common/header.php');
		        $this->load->view('admin/common/menu.php');
                $this->load->view('admin/grade/edit_grade.php',$data);
                $this->load->view('admin/common/footer.php');

		    }

	}
	/// **** End Code For Edit grade  *********** //


	/// **** Start Code For Delete grade   *********** //
	public function delgrade()
	{
		$where = array(

            'id' => $this->input->get('id')

        );
        $row = $this->db->get_where('td_question', array('grade_id' => $this->input->get('id')))->num_rows();

       

        if($row > 0){

        	 //For notification storing message
            $this->session->set_flashdata('msg', 'Can not Deleted Already Used in Question !');

            redirect("admin/add_new/grade");

        }else{

        	$this->Master->f_delete('md_grade', $where);
        	 //For notification storing message
            $this->session->set_flashdata('msg', 'Successfully deleted!');

            redirect("admin/add_new/grade");

        }
       
	}
	/// ************** End Code For Delete grade  *********** //
	

	/// ************** Start Code For Order Rate   *********** //


	public function orderRate()
	{

		$data['orderrate']   =   $this->Master->f_get_particulars("md_order_rate", NULL, NULL, 0);
		$this->load->view('admin/common/header.php');
		$this->load->view('admin/common/menu.php');
		$this->load->view('admin/order/orderrate.php',$data);
		$this->load->view('admin/common/footer.php');
	}


	/// **** End Code For Order Rate   *********** //


	 /// **** Start Code For Edit Order Rate   *********** //
	public function editorderRate(){

		    if($_SERVER['REQUEST_METHOD'] == "POST") {


		    	$row = $this->db->get_where('md_order_rate', array('amt' => $this->input->post('amt'),'id' => $this->input->post('id')))->num_rows();


		 	        $data_array = array(

				                "amt"           =>  $this->input->post('amt'),
				                "modified_by"      =>  $this->session->userdata('admin_name'),
				                "modified_dt"      =>  date('Y-m-d H:i:s')

				                );

		 	        $where = array(

		 	   	             'id' => $this->input->post('id')

		 	                 );

				 	if($row >0){

			            //For notification storing message
			            $this->session->set_flashdata('msg', 'Subscription Already Have Same Amount!');

			            redirect('admin/add_new/orderRate');


				 	 }else{

				 	   	$this->Master->f_edit('md_order_rate',$data_array,$where);

		                //For notification storing message
		                $this->session->set_flashdata('msg', 'Successfully Updated!');

		                redirect('admin/add_new/orderRate');

				 	 }

		    }else{

		    	$data_array= array(

		    		'id' => $this->input->get('id')

		    	);

		    	$data['rates'] = $this->Master->f_get_particulars('md_order_rate',NULL,$data_array,1);

                $this->load->view('admin/common/header.php');
		        $this->load->view('admin/common/menu.php');
                $this->load->view('admin/order/edit_orderrate.php',$data);
                $this->load->view('admin/common/footer.php');

		    }

	}
	/// **** End Code For Edit Order Rate  *********** //

    /// ************** Start Code For Placed Order   *********** //


	public function orderplaced()
	{

		$data['placedorder']   =   $this->Master->f_get_particulars("td_orders", NULL, NULL, 0);
		$this->load->view('admin/common/header.php');
		$this->load->view('admin/common/menu.php');
		$this->load->view('admin/order/order_list.php',$data);
		$this->load->view('admin/common/footer.php');
	}


	/// **** End Code For Placed Order   *********** //


	 /// **** Start Code For Edit Order Rate   *********** //
	public function vieworder(){


		    	$data_array= array(

		    		'id' => $this->input->get('id')

		    	);

		    	$data['rates'] = $this->Master->f_get_particulars('td_orders',NULL,$data_array,1);

                $this->load->view('admin/common/header.php');
		        $this->load->view('admin/common/menu.php');
                $this->load->view('admin/order/edit_order.php',$data);
                $this->load->view('admin/common/footer.php');

	}
	/// **** End Code For Edit Order Rate  *********** //


	/// **** Start Code For subscription list   *********** //
	public function subscription()
	{

		$data['subsc']   =   $this->Master->f_get_particulars("md_rates", NULL, NULL, 0);
		$this->load->view('admin/common/header.php');
		$this->load->view('admin/common/menu.php');
		$this->load->view('admin/subscription/subscrlist.php',$data);
		$this->load->view('admin/common/footer.php');
	}
	/// **** End Code For grade List   *********** //


	 /// **** Start Code For Edit subscription   *********** //
	public function editsubsc(){

		    if($_SERVER['REQUEST_METHOD'] == "POST") {


		    	$row = $this->db->get_where('md_rates', array('dis_amt' => $this->input->post('dis_amt'),'id' => $this->input->post('id')))->num_rows();


		 	        $data_array = array(

				                "amount"           =>  $this->input->post('amount'),
				                "discount"         =>  $this->input->post('discount'),
				                "dis_amt"          =>  $this->input->post('dis_amt'),
				                "modified_by"      =>  $this->session->userdata('admin_name'),
				                "modified_dt"      =>  date('Y-m-d H:i:s')

				                );

		 	        $where = array(

		 	   	             'id' => $this->input->post('id')

		 	                 );

				 	if($row >0){

			            //For notification storing message
			            $this->session->set_flashdata('msg', 'Subscription Already Have Same Amount!');

			            redirect('admin/add_new/subscription');


				 	 }else{

				 	   	$this->Master->f_edit('md_rates',$data_array,$where);



		                //For notification storing message
		                $this->session->set_flashdata('msg', 'Successfully Updated!');

		                redirect('admin/add_new/subscription');

				 	 }

		    }else{

		    	$data_array= array(

		    		'id' => $this->input->get('id')

		    	);

		    	$data['rates'] = $this->Master->f_get_particulars('md_rates',NULL,$data_array,1);

                $this->load->view('admin/common/header.php');
		        $this->load->view('admin/common/menu.php');
                $this->load->view('admin/subscription/edit_subscr.php',$data);
                $this->load->view('admin/common/footer.php');

		    }

	}
	/// **** End Code For Edit subscription  *********** //



	/// **** Start Code For subscription list   *********** //
	public function content_writer()
	{
		  $where = array(

                   'user_type' => 'C'

		 	        );

		$data['cws']   =   $this->Master->f_get_particulars("md_users", NULL,$where, 0);
		$this->load->view('admin/common/header.php');
		$this->load->view('admin/common/menu.php');
		$this->load->view('admin/content_writer/cwlist.php',$data);
		$this->load->view('admin/common/footer.php');
	}
	/// **** End Code For grade List   *********** //

	/// **** Start Code For Add grade  *********** //
	public function addcw(){

		    if($_SERVER['REQUEST_METHOD'] == "POST") {


		    	$row = $this->db->get_where('md_users', array('email' => $this->input->post('email')))->num_rows();

			        $email = $this->input->post('email');
				
					$pass  = $this->input->post('password');

			    $permitted_chars ="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
				$rand_email = SHA1($email);
				$rand = substr(str_shuffle($permitted_chars), 0, 16);
				$random = $rand_email.$rand;


		 	   $data_array = array(

                "first_name"        =>  $this->input->post('first_name'),
                "last_name"         =>  $this->input->post('last_name'),
                "email"             =>  $this->input->post('email'),
                "user_type"         =>  'C',
                "password"          => password_hash($pass, PASSWORD_DEFAULT),
                "token"             => $random,
                "created_by"        =>  $this->session->userdata('admin_name'),
                "created_dt"        =>  date('Y-m-d H:i:s')

                );

				 	if($row >0){

		            //For notification storing message
		            $this->session->set_flashdata('msg', 'User Already Exist!');

		            redirect('admin/add_new/content_writer');


				 	 }else{


				 	   	$this->Master->f_insert('md_users', $data_array);

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
		                //For notification storing message
		                $this->session->set_flashdata('msg', 'Successfully added!');

		                redirect('admin/add_new/content_writer');

				 	 }

		    }else{

                $this->load->view('admin/common/header.php');
		        $this->load->view('admin/common/menu.php');
                $this->load->view('admin/content_writer/add_cw.php');
                $this->load->view('admin/common/footer.php');

		    }

	}
	/// **** End Code For Add grade  *********** //


	 /// **** Start Code For Edit subscription   *********** //
	public function editcw(){

		    if($_SERVER['REQUEST_METHOD'] == "POST") {

		    	$this->form_validation->set_rules('remarks', 'Remarks', 'required');
		    	$this->form_validation->set_rules('user_status','User Status', 'required');

		    	  if ($this->form_validation->run() == FALSE)
                {
                	
                     $data_array= array(

		    		'user_id' => $this->input->post('user_id')

		    	     );

			    	$data['cws'] = $this->Master->f_get_particulars('md_users',NULL,$data_array,1);

	                $this->load->view('admin/common/header.php');
			        $this->load->view('admin/common/menu.php');
	                $this->load->view('admin/content_writer/edit_cw.php',$data);
	                $this->load->view('admin/common/footer.php');
                	
                }else{



		 	            $data_array = array(
							                "user_status"      =>  $this->input->post('user_status'),
							                "remarks"          =>  $this->input->post('remarks'),
							                "modified_by"      =>  $this->session->userdata('admin_name'),
							                "modified_dt"      =>  date('Y-m-d H:i:s')
				                        );

		 	            $where = array(

		 	   	             'user_id' => $this->input->post('user_id')

		 	                 );


				 	   	$this->Master->f_edit('md_users',$data_array,$where);

		                //For notification storing message
		                $this->session->set_flashdata('msg', 'Successfully Updated!');

		                redirect('admin/add_new/content_writer');

                   }


		    }else{

		    	$data_array= array(

		    		'user_id' => $this->input->get('id')

		    	);

		    	$data['cws'] = $this->Master->f_get_particulars('md_users',NULL,$data_array,1);

                $this->load->view('admin/common/header.php');
		        $this->load->view('admin/common/menu.php');
                $this->load->view('admin/content_writer/edit_cw.php',$data);
                $this->load->view('admin/common/footer.php');

		    }

	}
	/// **** End Code For Edit subscription  *********** //

}
