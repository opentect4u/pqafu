<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Login_model extends CI_Model{

		public function f_select_password($email){
			$this->db->select('password,user_status');
			$this->db->where('email',$email);
			$data=$this->db->get('md_users');

			if($data->num_rows() > 0 )
			{
				return $data->row();
			}
			else
			{
				return false;
			}
		}

		public function f_insert_audit_trail($user_id){

			$time = date("Y-m-d h:i:s");
			$pcaddr = $_SERVER['REMOTE_ADDR'];

			$value = array('login_dt'=> $time,
				       'user_id' => $user_id,
			      	       'terminal_name'=>$pcaddr);
			$this->db->insert('td_audit_trail',$value);
		}

		public function f_get_user_inf($user_id){
			$this->db->select('*');
			$this->db->from('md_users');
			$this->db->where('md_users.email',$user_id);
			$data=$this->db->get();
			return $data->row();
		}

		public function f_get_user_status($user_id){
			$this->db->select('user_status');
			$this->db->from('md_users');
			$this->db->where('md_users.email',$user_id);
			$data=$this->db->get();
			return $data->row()->user_status;
		}

		public function f_update_audit_trail($user_id){
			$time = date("Y-m-d h:i:s");
			$sl_no= $this->session->userdata('sl_no')->sl_no;
			$value= array('logout'=>$time);
			$this->db->where('sl_no',$sl_no);
			$this->db->update('td_audit_trail',$value);
		}
		
		public function f_audit_trail_value($user_id){
    		$this->db->select_max('sl_no');
    		$this->db->where('user_id', $user_id);
    		$details = $this->db->get('td_audit_trail');
    		return $details->row();
		}
		
		

	}	
?>
