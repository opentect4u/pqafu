<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class User_model extends CI_Model{

		public function get_search($search){

			$sql = "SELECT a.question FROM td_question a,td_answer b 
			        where a.id = b.qu_id and a.qts_status = 'A' AND a.question LIKE '%$search%' LIMIT 10";
			
			$data=$this->db->query($sql);
			return $data->result();
		}



		public function get_question_list(){


				// $sql  ="SELECT  `q`.*, 
				//                 `a`.`user_id`,`a`.`qu_id`, 
				//                 `c`.`cat_name`, 
				//                 `g`.`grade_name`,
				//                  `u`.`profile_picture`,
				//                  `u`.`first_name`, 
				//                  `u`.`last_name` 
				//                  FROM `td_question` `q`, `td_answer` `a`, `md_category` `c`, `md_grade` `g`, `md_users` `u` 
				//                  WHERE `q`.`id` = `a`.`qu_id` 
				//                  AND `q`.`cat_id` = `c`.`id` 
				//                  AND `q`.`grade_id` = `g`.`id` 
				//                  AND `q`.`user_id` = `u`.`user_id`
				//                  AND `q`.`qts_status` = 'A'
				//                  group by a.qu_id,
				//                  `c`.`cat_name`, 
				//                 `g`.`grade_name`,
				//                  `u`.`profile_picture`,
				//                  `u`.`first_name`, 
				//                  `u`.`last_name`,
				//                  `a`.`user_id` 
				//                  ORDER BY q.ask_dt DESC";

				 	$sql  ="SELECT  q.id,q.question,q.qts_type,q.ask_dt,q.title,
					                `c`.`cat_name`, 
					                `g`.`grade_name`,
					                `u`.`profile_picture`,
					                `u`.`first_name`, 
					                `u`.`last_name` 
					                 FROM `td_question` `q`, `md_category` `c`, `md_grade` `g`, `md_users` `u` 
					               
					                 WHERE `q`.`cat_id` = `c`.`id` 
					                 AND `q`.`grade_id` = `g`.`id` 
					                 AND `q`.`user_id` = `u`.`user_id`
					                 AND `q`.`qts_status` = 'A'
					                 group by `c`.`cat_name`, 
					                 q.id,
					                `g`.`grade_name`,
					                 `u`.`profile_picture`,
					                 `u`.`first_name`, 
					                 `u`.`last_name`,
					                 q.question,q.qts_type,q.ask_dt
					              
					                 ORDER BY q.ask_dt DESC";                


              $data = $this->db->query($sql);
              return $data->result();

		}

		public function get_question_list_by_user(){


				$sql  ="SELECT  `q`.*, 
				                `c`.`cat_name`, 
				                `g`.`grade_name`,
				                 `u`.`profile_picture`,
				                 `u`.`first_name`, 
				                 `u`.`last_name` 
				                 FROM `td_question` `q`, `md_category` `c`, `md_grade` `g`, `md_users` `u` 
				               
				                 WHERE `q`.`cat_id` = `c`.`id` 
				                 AND `q`.`grade_id` = `g`.`id` 
				                 AND `q`.`user_id` = `u`.`user_id`
				                 AND `q`.`qts_status` = 'A'
				                 AND `q`.`user_id` = '".$this->session->userdata('user_id')."'
				               
				                 ORDER BY q.ask_dt DESC";

              $data = $this->db->query($sql);
              return $data->result();

		}

		public function get_question_list_by_user_favourite(){

			 $sql  ="SELECT  `q`.*, 
				                `c`.`cat_name`, 
				                `g`.`grade_name`,
				                 `u`.`profile_picture`,
				                 `u`.`first_name`, 
				                 `u`.`last_name` 
				                 FROM `td_question` `q`, `md_category` `c`, `md_grade` `g`, `md_users` `u`,td_favourite f
				               
				                 WHERE `q`.`cat_id`   = `c`.`id` 
				                 AND `q`.`grade_id`   = `g`.`id` 
				                 AND `q`.`user_id`    = `u`.`user_id`
				                 AND `q`.`id`         = `f`.`qts_id`
				                 AND `q`.`qts_status` = 'A'
				                 AND  f.`fav_by_user` = '".$this->session->userdata('user_id')."'
				               
				               
				                 ORDER BY q.ask_dt DESC";


              $data = $this->db->query($sql);

              return $data->result();

		}

		public function get_payment_list_by_user(){

		
			$sql  ="SELECT s.* FROM td_subscription s WHERE s.user_id = '".$this->session->userdata('user_id')."'
				                 ORDER BY trans_dt DESC";

              $data = $this->db->query($sql);
              return $data->result();

		}


		public function get_question_list_bysearch($search){


				$sql  ="SELECT  `q`.*, 
				                `a`.`user_id`,`a`.`qu_id`, 
				                `c`.`cat_name`, 
				                `g`.`grade_name`,
				                 `u`.`profile_picture`,
				                 `u`.`first_name`, 
				                 `u`.`last_name` 
				                 FROM `td_question` `q`, `td_answer` `a`, `md_category` `c`, `md_grade` `g`, `md_users` `u` 
				                 WHERE `q`.`id` = `a`.`qu_id` 

				                 AND `q`.`cat_id` = `c`.`id` 
				                 AND `q`.`grade_id` = `g`.`id` 
				                 AND `q`.`user_id` = `u`.`user_id`
				                 AND `q`.`qts_status` = 'A' 
				                 AND  q.question LIKE '%$search%'
				                 group by a.qu_id,
				                           `c`.`cat_name`, 
				                `g`.`grade_name`,
				                 `u`.`profile_picture`,
				                 `u`.`first_name`, 
				                 `u`.`last_name`,
				                 `a`.`user_id` 
				                
				                 ORDER BY q.ask_dt DESC";


              $data = $this->db->query($sql);
              return $data->result();

		}

		// public function get_search_result_by_question($search){


		// 		$sql  ="SELECT  `q`.*, 
		// 		                `a`.`user_id`,`a`.`qu_id`, 
		// 		                `c`.`cat_name`, 
		// 		                `g`.`grade_name`,
		// 		                 `u`.`profile_picture`,
		// 		                 `u`.`first_name`, 
		// 		                 `u`.`last_name` 
		// 		                 FROM `td_question` `q`, `td_answer` `a`, `md_category` `c`, `md_grade` `g`, `md_users` `u` 
		// 		                 WHERE `q`.`id` = `a`.`qu_id` 

		// 		                 AND `q`.`cat_id` = `c`.`id` 
		// 		                 AND `q`.`grade_id` = `g`.`id` 
		// 		                 AND `q`.`user_id` = `u`.`user_id`
		// 		                 AND `q`.`qts_status` = 'A' 
		// 		                 AND q.question='$search'
		// 		                 group by a.qu_id,
		// 		                           `c`.`cat_name`, 
		// 		                `g`.`grade_name`,
		// 		                 `u`.`profile_picture`,
		// 		                 `u`.`first_name`, 
		// 		                 `u`.`last_name`,
		// 		                 `a`.`user_id` 
				                
		// 		                 ORDER BY q.ask_dt DESC";


  //             $data = $this->db->query($sql);
  //             return $data->result();

		// }

		public function get_search_result_by_question($search){


				$sql  ='SELECT  `q`.*, 
				                `a`.`user_id`,`a`.`qu_id`, 
				                `c`.`cat_name`, 
				                `g`.`grade_name`,
				                 `u`.`profile_picture`,
				                 `u`.`first_name`, 
				                 `u`.`last_name` 
				                 FROM `td_question` `q`, `td_answer` `a`, `md_category` `c`, `md_grade` `g`, `md_users` `u` 
				                 WHERE `q`.`id` = `a`.`qu_id` 

				                 AND `q`.`cat_id` = `c`.`id` 
				                 AND `q`.`grade_id` = `g`.`id` 
				                 AND `q`.`user_id` = `u`.`user_id`
				                 AND `q`.`qts_status` = "A" 
				                 AND q.question="'.$search.'"
				                 group by a.qu_id,
				                           `c`.`cat_name`, 
				                `g`.`grade_name`,
				                 `u`.`profile_picture`,
				                 `u`.`first_name`, 
				                 `u`.`last_name`,
				                 `a`.`user_id` 
				                
				                 ORDER BY q.ask_dt DESC';


              $data = $this->db->query($sql);
              return $data->result();
		}


		public function get_recent_post(){

			$sql  ="SELECT  `q`.*,`a`.`qu_id`,a.approved_dt as approved
				             FROM `td_question` `q`, `td_answer` `a`
				             WHERE `q`.`id` = `a`.`qu_id` 
				             AND `q`.`qts_status` = 'A'
				             AND  q.qts_type      = 'F'
				             group by a.qu_id,a.approved_dt
				                       
				             ORDER BY a.approved_dt DESC LIMIT 6";

		    $data = $this->db->query($sql);
            return $data->result();


		}


		public function f_like_dislike($table_name, $data_array, $status) {
				$return = array();
				$this->db->where($data_array);
				$query = $this->db->get($table_name);
				if($query->num_rows() > 0){
				$return = array('status' => $status, 'is_input' => 0, 'is_update' => 0);
				return $return;
				}else{
				$this->db->where(array(
				"q_id" => $this->input->post('q_id'),
				"u_id" => $this->input->post('user_id'),
				"action" => $status > 0 ? 'L' : 'D'
				));
				$check = $this->db->get($table_name);
				//var_dump($check->row());exit;
				if($check->num_rows() > 0){
				$id = $check->row()->id;
				$update = array('action' => $status > 0 ? 'D' : 'L');
				$this->db->where('id', $id);
				$this->db->update($table_name, $update);
				$return = array('status' => $status, 'is_input' => $id, 'is_update' => 1);
				return $return;
				}else{
				$this->db->insert($table_name, $data_array);
				$return = array('status' => $status, 'is_input' => $this->db->insert_id(), 'is_update' => 0);
				return $return;
				}
				}

		}

		public function f_ans_like_dislike($table_name, $data_array, $status) {
				$return = array();
				$this->db->where($data_array);
				$query = $this->db->get($table_name);
				if($query->num_rows() > 0){
				$return = array('status' => $status, 'is_input' => 0, 'is_update' => 0);
				return $return;
				}else{
				$this->db->where(array(
				"ans_id" => $this->input->post('q_id'),
				"u_id" => $this->input->post('user_id'),
				"action" => $status > 0 ? 'L' : 'D'
				));
				$check = $this->db->get($table_name);
				//var_dump($check->row());exit;
				if($check->num_rows() > 0){
				$id = $check->row()->id;
				$update = array('action' => $status > 0 ? 'D' : 'L');
				$this->db->where('id', $id);
				$this->db->update($table_name, $update);
				$return = array('status' => $status, 'is_input' => $id, 'is_update' => 1);
				return $return;
				}else{
				$this->db->insert($table_name, $data_array);
				$return = array('status' => $status, 'is_input' => $this->db->insert_id(), 'is_update' => 0);
				return $return;
				}
				}

		}

		public function get_subscription($user_id){


			 $query = $this->db->get_where('td_subscription', array('user_id =' => $user_id));
           if ($query->num_rows() > 0){

           	$sql ="select subs_status from td_subscription where user_id = '$user_id' and sl_no = (select MAX(sl_no) from td_subscription where user_id = '$user_id')";

           	$query = $this->db->query($sql)->row();

           	return $query->subs_status;

           }else{

           	return 'E';
           }



		}

		public function get_question_type($id){

			$sql  = "SELECT qts_type FROM `td_question` WHERE id=$id ";

			$query = $this->db->query($sql)->row();

			return 	$query->qts_type;

		}
		
		

	}	
?>
