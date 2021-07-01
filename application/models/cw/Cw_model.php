<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Cw_model extends CI_Model{

		public function get_new_qu($user_id){

			$sql = "SELECT * FROM `td_question` where id not in (select qu_id from td_answer where user_id = '$user_id') order by approved_dt desc";
			
			$data=$this->db->query($sql);
			return $data->result();
		}
		
		

	}	
?>
