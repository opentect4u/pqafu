<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qa extends CI_Controller {


	public function __construct(){

			parent::__construct();
			$this->load->model('Master');
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

	/// **** Start Code For Question List   *********** //
	public function index()
	{
		
	//	$data['question']   =   $this->Master->f_get_question_list();

		$this->load->view('admin/common/header.php');
		$this->load->view('admin/common/menu.php');
		$this->load->view('admin/question/qu_cat.php');
		//$this->load->view('admin/question/quelist.php',$data);
		$this->load->view('admin/common/footer.php');
	}
	/// **** End Code For Question List   *********** //

	/// **** Start Code For Question List   *********** //
	public function question()
	{
		
	//	$data['question']   =   $this->Master->f_get_question_list();

		$this->load->view('admin/common/header.php');
		$this->load->view('admin/common/menu.php');
		$this->load->view('admin/question/qu_cat.php');
		//$this->load->view('admin/question/quelist.php',$data);
		$this->load->view('admin/common/footer.php');
	}
	/// **** End Code For Question List   *********** //


	/// **** Start Code For Question List   *********** //
	public function filter_question_list(){

		$qu_status          =  $this->input->post('qu_status');
		$data['question']   =   $this->Master->f_get_question_list($qu_status);

		$this->load->view('admin/common/header.php');
		$this->load->view('admin/common/menu.php');
		$this->load->view('admin/question/quelist.php',$data);
		$this->load->view('admin/common/footer.php');
	}
	/// **** End Code For Question List   *********** //


	/// **** Start Code For Question List   *********** //
	public function qlist()
	{
		
		$this->load->view('admin/common/header.php');
		$this->load->view('admin/common/menu.php');
		$this->load->view('admin/question/qu_cat.php');
		$this->load->view('admin/common/footer.php');
	}
	/// **** End Code For Question List   *********** //


 //    /// **** Start Code For Edit Category   *********** //
	// public function editqu(){

	// 	    if($_SERVER['REQUEST_METHOD'] == "POST") {


		    	
	// 	    	$this->form_validation->set_rules('qts_type', 'Question Type', 'required');
	// 	    	$this->form_validation->set_rules('qts_status', 'question Status', 'required');
		    

	// 	        if($this->form_validation->run() == TRUE)
 //                {

	// 	 	        $data_array = array(

	// 			                "qts_type"        =>  $this->input->post('qts_type'),
	// 			                "qts_status"      =>  $this->input->post('qts_status'),
	// 			                "remarks"         =>  $this->input->post('remarks'),
	// 			                "modified_by"     =>  $this->session->userdata('admin_name'),
	// 			                "modified_dt"     =>  date('Y-m-d H:i:s'),
	// 			                "approved_by"     =>  $this->session->userdata('admin_name'),
	// 			                "approved_dt"     =>  date('Y-m-d H:i:s')

	// 			                );

	// 	 	        $where  = array(

	// 	 	   	             'id' => $this->input->post('id')

	// 	 	                 );

				 
	// 			 	   	$this->Master->f_edit('td_question',$data_array,$where);

				 	 
	// 	                //For notification storing message
	// 	                $this->session->set_flashdata('msg', 'Successfully Updated!');

	// 	               $select  =   array(

	//                     "t.*","c.cat_name","g.grade_name","u.first_name"

	//                      );

	// 		            $where    =   array(

	// 		            "t.cat_id = c.id"   => NULL,

	// 		            "t.grade_id = g.id" => NULL,

	// 		            "t.user_id = u.user_id" => NULL,

	// 		            "t.id"              => $this->input->post('id')

	// 		            ); 

	// 	    	     $data['que'] = $this->Master->f_get_particulars('td_question t,md_category c,md_grade g,md_users u',$select,$where,1);


	//                 $this->load->view('admin/common/header.php');
	// 		        $this->load->view('admin/common/menu.php');
	//                 $this->load->view('admin/question/edit_qu.php',$data);
	//                 $this->load->view('admin/common/footer.php');

	// 			   }else{

	// 					$select  =   array(

	//                     "t.*","c.cat_name","g.grade_name","u.first_name"

	//                      );

	// 		            $where    =   array(

	// 		            "t.cat_id = c.id"   => NULL,

	// 		            "t.grade_id = g.id" => NULL,

	// 		            "t.user_id = u.user_id" => NULL,

	// 		            "t.id"              => $this->input->post('id')

	// 		            ); 

	// 	    	$data['que'] = $this->Master->f_get_particulars('td_question t,md_category c,md_grade g,md_users u',$select,$where,1);


 //                $this->load->view('admin/common/header.php');
	// 	        $this->load->view('admin/common/menu.php');
 //                $this->load->view('admin/question/edit_qu.php',$data);
 //                $this->load->view('admin/common/footer.php');

	// 			}

	// 	    }else{

	// 	    	$select  =   array(

 //                 "t.*","c.cat_name","g.grade_name","u.first_name"

 //                 );

	// 		    $where    =   array(

	// 		            "t.cat_id = c.id"   => NULL,

	// 		            "t.grade_id = g.id" => NULL,

	// 		            "t.user_id = u.user_id" => NULL,

	// 		            "t.id"              => $this->input->get('id')

	// 		                ); 

	// 	    	$data['que'] = $this->Master->f_get_particulars('td_question t,md_category c,md_grade g,md_users u',$select,$where,1);


 //                $this->load->view('admin/common/header.php');
	// 	        $this->load->view('admin/common/menu.php');
 //                $this->load->view('admin/question/edit_qu.php',$data);
 //                $this->load->view('admin/common/footer.php');

	// 	    }

	// }
	// /// **** End Code For Edit Category  *********** //

    /// **** Start Code For Delete Qestion   *********** ///

    public function del_qu(){


			$where = array(

	            'id' => $this->input->get('id')

	        );

            $row = $this->db->get_where('td_answer', array('qu_id' => $this->input->get('id')))->num_rows();
       

	        if($row > 0){

	        	 //For notification storing message
	            $this->session->set_flashdata('msg', 'Can not Deleted Answer is Given !');

	            redirect("admin/qa");

	        }else{

	        	 $this->Master->f_delete('td_question', $where);
	        	 //For notification storing message
	            $this->session->set_flashdata('msg', 'Successfully deleted!');

	           redirect("admin/qa");

	        }



    }

    /// **** End Code For Delete Qestion   *********** ///

	/// **** Start Code For Change Status   *********** //
	public function change_status()
	{

		 	$data_array = array(
				                "qts_status"    =>  $this->input->post('status'),
				                "approved_by"   =>  $this->session->userdata('admin_name'),
				                "approved_dt"   =>  date('Y-m-d H:i:s')
				                );

		 	$where = array('id' => $this->input->post('id'));


		$this->Master->f_edit('td_question',$data_array,$where);

		echo $this->db->last_query();

	}
	/// **** End Code For Change Status  *********** //


	/// **** Start Code For Change Subscription   *********** //
	public function change_subscription()
	{

		 	$data_array = array(
				                "qts_type"    =>  $this->input->post('status'),
				                "approved_by"   =>  $this->session->userdata('admin_name'),
				                "approved_dt"   =>  date('Y-m-d H:i:s')
				                );

		 	$where = array('id' => $this->input->post('id'));


		$this->Master->f_edit('td_question',$data_array,$where);


		echo $this->db->last_query();

	}
	/// **** End Code For Change Subscription   *********** //


	/// **** Start Code For List Answer Category   *********** //
	public function ans_cat(){

		$this->load->view('admin/common/header.php');
		$this->load->view('admin/common/menu.php');
		$this->load->view('admin/answer/ans_cat.php');
		$this->load->view('admin/common/footer.php');
	}
	/// **** End Code For List Answer Category  *********** //

	/// **** Start Code For List Question answer   *********** //
	public function anslist(){

		$select  =   array(

                 "a.*","q.question","q.id q_id","q.title","u.first_name"

                 );

        $where      =   array(

            "a.qu_id = q.id"   => NULL,
            'a.ans_status'     => $this->input->post('ans_status'),
            "a.user_id = u.user_id" =>NULL,
            "1 ORDER BY a.approved_dt" => NULL

        ); 

        if($this->input->post('ans_status') == 'F'){
        	$data['status']    =  'New';
        }elseif($this->input->post('ans_status') == 'A'){
        		$data['status']    =  'Approved';
        }else{
        	$data['status']    =  'Discarded';
        }
        

		$data['answser']   =   $this->Master->f_get_particulars("td_answer a,td_question q,md_users u",$select,$where, 0);


		$this->load->view('admin/common/header.php');
		$this->load->view('admin/common/menu.php');
		$this->load->view('admin/answer/anslist.php',$data);
		$this->load->view('admin/common/footer.php');
	}
	/// **** End Code For List Question answer  *********** //

	/// **** Start Code For List Question answer By User   *********** //
	public function anslist_user($id){

		$select  =   array(

                 "a.*","q.question","q.title","q.qts_type"

                 );

        $where      =   array(

            "a.qu_id = q.id"   => NULL,
            "a.user_id"        => $id
        ); 

		$data['answser']   =   $this->Master->f_get_particulars("td_answer a,td_question q",$select,$where, 0);
		$this->load->view('admin/common/header.php');
		$this->load->view('admin/common/menu.php');
		$this->load->view('admin/answer/anslist_user.php',$data);
		$this->load->view('admin/common/footer.php');
	}
	/// **** End Code For List Question answer By User   *********** //


    /// **** Start Code For Edit Answer Category   *********** //
	public function editans_status(){

		    if($_SERVER['REQUEST_METHOD'] == "POST") {

		 	        $data_array = array(

				                "ans_status"       =>  $this->input->post('ans_status'),
				                "modified_by"      =>  $this->session->userdata('admin_name'),
				                "modified_dt"      =>  date('Y-m-d H:i:s')

				                );

		 	        $where = array(

		 	   	             'id' => $this->input->post('ans_id')

		 	                 );


				 	   	$this->Master->f_edit('td_answer',$data_array,$where);

				 	   	// echo $this->db->last_query();
				 	   	// die();

		                //For notification storing message
		                $this->session->set_flashdata('msg', 'Successfully Updated!');

		                redirect('admin/qa/ans_cat');
	
		    }else{


		    	$select  =   array(

                 "t.*","c.cat_name","g.grade_name","u.first_name"

                 );

			    $where    =   array(

			                 "t.cat_id = c.id"   => NULL,

			                 "t.grade_id = g.id" => NULL,

			                 "t.user_id  = u.user_id" => NULL,

			                 "t.id"              => $this->input->get('q')

			                ); 

		    	$data['que'] = $this->Master->f_get_particulars('td_question t,md_category c,md_grade g,md_users u',$select,$where,1);

                $select2  =   array(

			                 "a.*","u.first_name"

			                 );

			    $where2    =   array(

			                 "a.user_id  = u.user_id" => NULL,

			                 "a.id"                   => $this->input->get('a')

			                ); 

		    	$data['ans'] = $this->Master->f_get_particulars('td_answer a,md_users u',$select2,$where2,1);

                $this->load->view('admin/common/header.php');
		        $this->load->view('admin/common/menu.php');
                $this->load->view('admin/answer/ans_cat_edit.php',$data);
                $this->load->view('admin/common/footer.php');

		    }

	}
	/// **** End Code For Edit Answer Status *********** //

}
