<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {

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
	public function index(){

	    $sql = "select * from td_subscription where subs_status = 'A' and subs_type = '1' ";
	    $query = $this->db->query($sql);
	    if($query->num_rows() > 0){
	    $data = $query->result();
		    foreach ($data as $dt){
		    date_default_timezone_set($dt->time_zone);
		    $check = 'select * from td_subscription where UNIX_TIMESTAMP(to_dt) < ' . strtotime(date('Y-m-d H:m:s')).' and time_zone = "'.$dt->time_zone.'" and subs_type = 1 ';
		   
		    $check_query = $this->db->query($check);
		    $check_query->num_rows();
		 
		    if($check_query->num_rows() > 0){
		    $rows = $check_query->result();
			    foreach($rows as $row){
			    $update = "update td_subscription set subs_status = 'E' where user_id = '$row->user_id' and sl_no = '$row->sl_no' ";

			    $this->db->query($update);
			      }
	        }
	      } 
	    }
	
    }

    public function test_mail(){

		

		$this->email->from('info@pqafu.com', 'Pqafu');
		$this->email->to('lokesh@synergicsoftek.com');
		

		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.');

		$this->email->send();

	}

}
