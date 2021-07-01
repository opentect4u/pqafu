<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
			parent::__construct();
			$this->load->model('user/User_model');
			$this->load->model('Master');
			$this->load->helper('qa_helper');
			$this->load->helper('captcha_helper');
            $this->load->library('form_validation');
		}

	public function index()
	{

        if(!$this->session->userdata('user_id')){
		
        $data['question']      =  $this->User_model->get_question_list();
        $data['recent_post']   =  $this->User_model->get_recent_post();

		$this->load->view('frontend/common/header');
		$this->load->view('frontend/home',$data);
		$this->load->view('frontend/common/footer');
        }else{
        
        redirect(base_url().'user');

        }
	}

    /// Code Start For About us /////

    public function about()
    {
        
        $data['question']      =  $this->User_model->get_question_list();
        $data['recent_post']   =  $this->User_model->get_recent_post();

        $this->load->view('frontend/common/header');
        $this->load->view('frontend/about');
        $this->load->view('frontend/common/footer');
    }

    /// Code End For About us /////


     /// Code Start For Thankyou  /////

    public function thankyou()
    {
        
      

        $this->load->view('frontend/common/header');
        $this->load->view('frontend/thankyou');
        $this->load->view('frontend/common/footer');
    }

    /// Code End For Thankyou /////



     /// Code Start For privacypolicy /////

    public function privacypolicy()
    {

        $this->load->view('frontend/common/header');
        $this->load->view('frontend/privacypolicy');
        $this->load->view('frontend/common/footer');
    }

   /// Code End For privacypolicy /////


    /// Code Start For privacypolicy /////

    public function disclaimer()
    {

        $this->load->view('frontend/common/header');
        $this->load->view('frontend/disclaimer');
        $this->load->view('frontend/common/footer');
    }

   /// Code End For privacypolicy /////

	public function search()
	{
		$search          =  $this->input->post('search');

        $result          =  $this->db->get_where('td_question', array('question =' => $search,'qts_status =' => 'A'))->num_rows();

        if($result > 0){

        	$data['question']    =  $this->User_model->get_search_result_by_question($search);

        }else{

        	$data['question']    =  $this->User_model->get_question_list_bysearch($search);

        	 
        }

      
        $data['recent_post'] =  $this->User_model->get_recent_post();
        $data['category']    =  $this->Master->f_get_particulars('md_category',NULL,NULL,0);
        $data['grade']       =  $this->Master->f_get_particulars('md_grade',NULL,NULL,0);

		$this->load->view('frontend/common/header');
		$this->load->view('frontend/search',$data);
		$this->load->view('frontend/common/footer');
	}

	public function fetch_search_data(){

	    $search = $this->input->get('query');

        $data      =  $this->User_model->get_question_list_bysearch($search);


        $html  ='';

        $html .= '<div class="post-box" id="bom">';

     	foreach($data as $ques) {  

     		
		$ab = 	$ques->qts_type == 'P' ? '<div class="premium">premium</div>' : '<div class="free">FREE</div>';
	  $html .='<div class="listBox">' . $ab .
		// if() {  
		// .'<div class="premium">premium</div>'
		// }else
		//  .'<div class="free">FREE</div>'
		// }
	    '<div class="listBoxBody">
			<div class="thumbnailBox">
			   <img src="'.base_url().'rontend/images/'.$ques->profile_picture.'" alt="...">
			</div>
			<div class="listRightDetails">
				<p><span class="listTitle">'.$ques->first_name.'</span>  Asked: <span>'.date("F j, Y",strtotime($ques->ask_dt)).'</span>    Categories: <span>'.$ques->cat_name.'</span>Grade: <span>'.$ques->grade_name.'</span></p>
				  <h3>'.$ques->question.'</h3>
			</div>
		</div>
		<br clear="all">

		 <div class="listBoxFooter">
			
			<a href="'.base_url().'home/answer/'.$ques->id.'" class="btnAns"> <i class="fa fa-comments" aria-hidden="true"></i>'. get_answer_no($ques->id).'Answer</a>
			<div class="right-btn">
			 
			     <button class="like btnAns" value="'.$ques->id.'"> <i class="fa fa-thumbs-up" aria-hidden="true" ></i>'.get_like_no($ques->id).' Likes</button>
			   <button class="dislike btnAns" value="<?=$ques->id?>"> <i class="fa fa-thumbs-down" aria-hidden="true"></i>'.get_dislike_no($ques->id).' Dislike</button>
				<a href="#" class="fevorite"> <i class="fa fa-heart" aria-hidden="true"></i>
	    </a>
			</div>
		 </div>
	   </div>';
	   
	    }
         $html .= '</div>';



        echo $html;

	}

	public function signup()
	{

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

		$this->load->view('frontend/common/header');
		$this->load->view('frontend/register',$data);
		$this->load->view('frontend/common/footer');
	}

	public function login()
	{

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
 

		$this->load->view('frontend/common/header');
		$this->load->view('frontend/login',$data);
		$this->load->view('frontend/common/footer');
	}

	public function refresh()
    { 

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
 
        $this->load->view('frontend/common/header');
		$this->load->view('frontend/login',$data);
		$this->load->view('frontend/common/footer');
    }


	public function livesearch(){


		$search = $this->input->post('search');

	    $data = $this->User_model->get_search($search);

	    echo json_encode($data);
		
	}

	public function post_question(){


		if($this->session->userdata('user_id')){

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

		}else{ 

			redirect(base_url().'login');
		}

    }

    public function answer($id){

    	
        $this->session->set_userdata('question_id',$id);

    	$select = array("q.*","u.first_name","c.cat_name","g.grade_name");

    	$where  = array(

    		   "q.user_id = u.user_id"   => NULL,

    		   "q.cat_id  = c.id"   => NULL,

    		   "q.grade_id = g.id"   => NULL,

               "q.id"    =>  $id        
    	);

    	$wheres = array(

            "a.user_id = u.user_id"   => NULL,
            "a.ans_status"            => 'A',
    		"qu_id"    => $id      

    	);

    	$select2 = array("a.*","u.first_name");

    	$data['question']     = $this->Master->f_get_particulars('td_question q,md_users u,md_category c,md_grade g',$select,$where,1);
        

    	$data['answer']       = $this->Master->f_get_particulars('td_answer a,md_users u',$select2,$wheres,0);
    	$data['recent_post']  = $this->User_model->get_recent_post();
        $qts_type             = $this->User_model->get_question_type($id);
    
    	//$qs_status = $data['question']->qts_type;
    	

    	//if($qs_status == 'F'){
          if($qts_type == 'F'){

            $this->load->view('frontend/common/header');
			$this->load->view('frontend/answerwithoutlogin',$data);
			$this->load->view('frontend/common/footer');


    	}else{

            		if($this->session->userdata('user_id')){

            		$data['subs_status']  = $this->User_model->get_subscription($this->session->userdata('user_id'));	

                    $this->load->view('frontend/common/header');
        			$this->load->view('frontend/answer',$data);
        			$this->load->view('frontend/common/footer');


            	    }else{
            	    	//$this->session->unset_userdata('question_id');
                       

        	    	     redirect(base_url().'login');
            	    }
 
    	   }  	
    	


    }


	 

	
   
}
