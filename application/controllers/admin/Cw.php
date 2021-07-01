<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cw extends CI_Controller {


	public function __construct(){

			parent::__construct();
			$this->load->model('Master');
			$this->load->model('cw/Cw_model');
			$this->load->library('form_validation');
			//date_default_timezone_set("Asia/india");

			if(! $this->session->userdata('cw_id')){
			
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



		if($_SERVER['REQUEST_METHOD'] == "POST") {

				if($this->input->post('qu_status') == 'P'){

		        	$data['status']     =  'New';

		        	$data['question']   =   $this->Cw_model->get_new_qu($this->session->userdata("cw_id"));


		        }else{

		        	$select   = array('q.*','a.user_id','a.id as ans_id');

		        	$data['status']    =  'Answered';

		        	$where      =   array(

		        	"q.id = a.qu_id" => NULL,

		            "q.qts_status"   => 'A',

		            "a.user_id "      => $this->session->userdata("cw_id"),

		            "1 ORDER BY q.approved_dt desc" => NULL

		            ); 

		            $data['question']   =   $this->Master->f_get_particulars("td_question q,td_answer a",$select,$where,0);
		           //  echo $this->db->last_query();

		           // die();
		        }
				

				$this->load->view('cw/common/header.php');
				$this->load->view('cw/common/menu.php');
				$this->load->view('cw/question/quelist.php',$data);
				$this->load->view('cw/common/footer.php');

		    }else{


		 		$data['status']     =  'New';
	        	$data['question']   =   $this->Cw_model->get_new_qu($this->session->userdata("cw_id"));

                $this->load->view('cw/common/header.php');
				$this->load->view('cw/common/menu.php');
				$this->load->view('cw/question/quelist.php',$data);
				$this->load->view('cw/common/footer.php');


		     }
	}
	/// **** End Code For Question List   *********** //

	// Post Answer of New Question    ***** //
	public function post_ans(){

			 if($_SERVER['REQUEST_METHOD'] == "POST") {

              
		    	$this->form_validation->set_rules('answer', 'Answer ', 'required');
		    

			        if($this->form_validation->run() == TRUE)
	                {

				 	$data_array = array(

	                "answer"          =>  $this->input->post('answer'),
	                "user_id"         =>  $this->session->userdata('cw_id'),
	                "qu_id"           =>  $this->input->post('id'),
	                "created_dt"      =>  date('Y-m-d H:i:s'),
	                "created_by"      =>  $this->session->userdata('cw_name')

	                );

	                	$this->Master->f_insert('td_answer', $data_array);
			            //For notification storing message
			            $this->session->set_flashdata('msg', 'Answer Posted Successfully!');

			            redirect('admin/cw/qlist');

			        }else{

			        		$select  =   array(

			                 "t.*","c.cat_name","g.grade_name","u.first_name"

			                 );

						    $where    =   array(

						                 "t.cat_id = c.id"   => NULL,

						                 "t.grade_id = g.id" => NULL,

						                 "t.user_id  = u.user_id" => NULL,

						                 "t.id"              => $this->input->post('id')

						                ); 

					    	$data['que'] = $this->Master->f_get_particulars('td_question t,md_category c,md_grade g,md_users u',$select,$where,1);

			                $this->load->view('cw/common/header.php');
					        $this->load->view('cw/common/menu.php');
			                $this->load->view('cw/question/post_ans.php',$data);
			                $this->load->view('cw/common/footer.php');

			        }


			 }else{

			 	$select  =   array(

                 "t.*","c.cat_name","g.grade_name","u.first_name"

                 );

			    $where    =   array(

			                 "t.cat_id = c.id"   => NULL,

			                 "t.grade_id = g.id" => NULL,

			                 "t.user_id  = u.user_id" => NULL,

			                 "t.id"              => $this->input->get('id')

			                ); 

		    	$data['que'] = $this->Master->f_get_particulars('td_question t,md_category c,md_grade g,md_users u',$select,$where,1);


		        $this->load->view('cw/common/header.php');
		        $this->load->view('cw/common/menu.php');
                $this->load->view('cw/question/post_ans.php',$data);
                $this->load->view('cw/common/footer.php');


			}


	}

	/// **** Start Code For Delete Answer   *********** //
	public function delans(){

         $where = array(

            'id' => $this->input->get('id')

        );

        $row = $this->db->get_where('td_answer', array('id' => $this->input->get('id')) )->row();

     
        if($row->ans_status == 'A'){

        	 //For notification storing message
            $this->session->set_flashdata('msg', 'Can not Deleted Already Approved !');

            redirect("admin/cw");

        }else{

        	$this->Master->f_delete('td_answer', $where);
        	 //For notification storing message
            $this->session->set_flashdata('msg', 'Successfully deleted!');

            redirect("admin/cw");

        }




	}
	/// **** End Code For Delete Answer   *********** //


	/// **** Start Code For Question List   *********** //
	public function qlist()
	{
		
		$this->load->view('cw/common/header.php');
		$this->load->view('cw/common/menu.php');
		$this->load->view('cw/question/qu_cat.php');
		$this->load->view('cw/common/footer.php');
	}
	/// **** End Code For Question List   *********** //


    /// **** Start Code For Edit Category   *********** //
	public function editqu(){

		    if($_SERVER['REQUEST_METHOD'] == "POST") {

		    	
		    	$this->form_validation->set_rules('qts_type', 'Question Type', 'required');
		    	$this->form_validation->set_rules('qts_status', 'question Status', 'required');
		    

		        if($this->form_validation->run() == TRUE)
                {

		 	        $data_array = array(

				                "qts_type"        =>  $this->input->post('qts_type'),
				                "qts_status"      =>  $this->input->post('qts_status'),
				                "remarks"         =>  $this->input->post('remarks'),
				                "modified_by"     =>  $this->session->userdata('admin_name'),
				                "modified_dt"     =>  date('Y-m-d H:i:s'),
				                "approved_by"     =>  $this->session->userdata('admin_name'),
				                "approved_dt"     =>  date('Y-m-d H:i:s')

				                );

		 	        $where  = array(

		 	   	             'id' => $this->input->post('id')

		 	                 );

				 
				 	   	$this->Master->f_edit('td_question',$data_array,$where);

				 	 
		                //For notification storing message
		                $this->session->set_flashdata('msg', 'Successfully Updated!');

		               $select  =   array(

	                    "t.*","c.cat_name","g.grade_name","u.first_name"

	                     );

			            $where    =   array(

			            "t.cat_id = c.id"   => NULL,

			            "t.grade_id = g.id" => NULL,

			            "t.user_id = u.user_id" => NULL,

			            "t.id"              => $this->input->post('id')

			            ); 

		    	     $data['que'] = $this->Master->f_get_particulars('td_question t,md_category c,md_grade g,md_users u',$select,$where,1);


	                $this->load->view('cw/common/header.php');
			        $this->load->view('cw/common/menu.php');
	                $this->load->view('cw/question/edit_qu.php',$data);
	                $this->load->view('cw/common/footer.php');

				   }else{

						$select  =   array(

	                    "t.*","c.cat_name","g.grade_name","u.first_name"

	                     );

			            $where    =   array(

			            "t.cat_id = c.id"   => NULL,

			            "t.grade_id = g.id" => NULL,

			            "t.user_id = u.user_id" => NULL,

			            "t.id"              => $this->input->post('id')

			            ); 

		    	$data['que'] = $this->Master->f_get_particulars('td_question t,md_category c,md_grade g,md_users u',$select,$where,1);


                $this->load->view('cw/common/header.php');
		        $this->load->view('cw/common/menu.php');
                $this->load->view('cw/question/edit_qu.php',$data);
                $this->load->view('cw/common/footer.php');

				}

		    }else{

		    	$select  =   array(

                 "t.*","c.cat_name","g.grade_name","u.first_name","a.answer","a.id as ans_id"

                 );

			    $where    =   array(

			            "t.cat_id = c.id"   => NULL,

			            "t.grade_id = g.id" => NULL,

			            "t.user_id = u.user_id" => NULL,

			            "t.id      = a.qu_id" => NULL,

			            "t.id"              => $this->input->get('id')

			                ); 

		    	$data['que'] = $this->Master->f_get_particulars('td_question t,md_category c,md_grade g,md_users u,td_answer a',$select,$where,1);


                $this->load->view('cw/common/header.php');
		        $this->load->view('cw/common/menu.php');
                $this->load->view('cw/question/edit_qu.php',$data);
                $this->load->view('cw/common/footer.php');

		    }

	}
	/// **** End Code For Edit Category  *********** //




	/// **** Start Code For List Answer Category   *********** //
	public function ans_category(){

		$this->load->view('cw/common/header.php');
		$this->load->view('cw/common/menu.php');
		$this->load->view('cw/answer/ans_cat.php');
		$this->load->view('cw/common/footer.php');
	}
	/// **** End Code For List Answer Category  *********** //

	/// **** Start Code For List Question answer   *********** //
	public function anslist(){

		$select  =   array(

                 "a.*","q.question","u.first_name"

                 );

        $where      =   array(

            "a.qu_id = q.id"   => NULL,
            'a.ans_status'     => $this->input->post('ans_status'),
            "a.user_id = u.user_id" =>NULL
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
	public function anslist_user(){

		$select  =   array(

                 "a.*","q.question","q.qts_type"

                 );

        $where      =   array(

            "a.qu_id = q.id"   => NULL
        ); 

		$data['answser']   =   $this->Master->f_get_particulars("td_answer a,td_question q",$select,$where, 0);
		$this->load->view('admin/common/header.php');
		$this->load->view('admin/common/menu.php');
		$this->load->view('admin/answer/anslist_user.php',$data);
		$this->load->view('admin/common/footer.php');
	}
	/// **** End Code For List Question answer By User   *********** //

	public function editor_upload(){

					$upload_dir = array( 
		    'img'=> 'uploads/ckimage/', 
		); 
		 
		// Allowed image properties  
		$imgset = array( 
		    'maxsize' => 3000, 
		    'maxwidth' => 1024, 
		    'maxheight' => 800, 
		    'minwidth' => 10, 
		    'minheight' => 10, 
		    'type' => array('bmp', 'gif', 'jpg', 'jpeg', 'png'), 
		); 
		 
		// If 0, will OVERWRITE the existing file 
		define('RENAME_F', 1); 
		 
		/** 
		 * Set filename 
		 * If the file exists, and RENAME_F is 1, set "img_name_1" 
		 * 
		 * $p = dir-path, $fn=filename to check, $ex=extension $i=index to rename 
		 */ 
		function setFName($p, $fn, $ex, $i){ 
		    if(RENAME_F ==1 && file_exists($p .$fn .$ex)){ 
		        return setFName($p, F_NAME .'_'. ($i +1), $ex, ($i +1)); 
		    }else{ 
		        return $fn .$ex; 
		    } 
		} 
		 
		$re = ''; 
		if(isset($_FILES['upload']) && strlen($_FILES['upload']['name']) > 1) { 
		 
		    define('F_NAME', preg_replace('/\.(.+?)$/i', '', basename($_FILES['upload']['name'])));   
		 
		    // Get filename without extension 
		    $sepext = explode('.', strtolower($_FILES['upload']['name'])); 
		    $type = end($sepext);    /** gets extension **/ 
		     
		    // Upload directory 
		    $upload_dir = in_array($type, $imgset['type']) ? $upload_dir['img'] : $upload_dir['audio']; 
		    $upload_dir = trim($upload_dir, '/') .'/'; 
		 
		    // Validate file type 
		    if(in_array($type, $imgset['type'])){ 
		        // Image width and height 
		        list($width, $height) = getimagesize($_FILES['upload']['tmp_name']); 
		 
		        if(isset($width) && isset($height)) { 
		            if($width > $imgset['maxwidth'] || $height > $imgset['maxheight']){ 
		                $re .= '\\n Width x Height = '. $width .' x '. $height .' \\n The maximum Width x Height must be: '. $imgset['maxwidth']. ' x '. $imgset['maxheight']; 
		            } 
		 
		            if($width < $imgset['minwidth'] || $height < $imgset['minheight']){ 
		                $re .= '\\n Width x Height = '. $width .' x '. $height .'\\n The minimum Width x Height must be: '. $imgset['minwidth']. ' x '. $imgset['minheight']; 
		            } 
		 
		            if($_FILES['upload']['size'] > $imgset['maxsize']*1000){ 
		                $re .= '\\n Maximum file size must be: '. $imgset['maxsize']. ' KB.'; 
		            } 
		        } 
		    }else{ 
		        $re .= 'The file: '. $_FILES['upload']['name']. ' has not the allowed extension type.'; 
		    } 
		     
		    // File upload path 
		    $f_name = setFName($_SERVER['DOCUMENT_ROOT'] .'/'. $upload_dir, F_NAME, ".$type", 0); 
		    $uploadpath = $upload_dir . $f_name; 
		 
		    // If no errors, upload the image, else, output the errors 
		    if($re == ''){ 
		        if(move_uploaded_file($_FILES['upload']['tmp_name'], $uploadpath)) { 
		            $CKEditorFuncNum = $_GET['CKEditorFuncNum']; 
		           // $url = 'ckeditor/'. $upload_dir . $f_name; 
		             $url = base_url(). $upload_dir . $f_name; 
		            $msg = F_NAME .'.'. $type .' successfully uploaded: \\n- Size: '. number_format($_FILES['upload']['size']/1024, 2, '.', '') .' KB'; 
		            $re = in_array($type, $imgset['type']) ? "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>":'<script>var cke_ob = window.parent.CKEDITOR; for(var ckid in cke_ob.instances) { if(cke_ob.instances[ckid].focusManager.hasFocus) break;} cke_ob.instances[ckid].insertHtml(\' \', \'unfiltered_html\'); alert("'. $msg .'"); var dialog = cke_ob.dialog.getCurrent();dialog.hide();</script>'; 
		        }else{ 
		            $re = '<script>alert("Unable to upload the file")</script>'; 
		        } 
		    }else{ 
		        $re = '<script>alert("'. $re .'")</script>'; 
		    } 
		} 
		 
		// Render HTML output 
		@header('Content-type: text/html; charset=utf-8'); 
		echo $re;





	}



	public function editans(){


		 	        $data_array = array(

				                "answer"        =>  $this->input->post('answer'),
				                "modified_by"   =>  $this->session->userdata('cw_name'),
				                "modified_dt"   =>  date('Y-m-d H:i:s')
				                
				                );

		 	        $where  = array(

		 	   	             'id' => $this->input->post('id')

		 	                 );

				 
			$this->Master->f_edit('td_answer',$data_array,$where);

		

			 redirect("admin/cw/editqu?id=".$this->input->post('qs_id'));

	}







}
