<?php 
	class Login_model extends CI_Model{

		public function login($username, $pass){

			$this->db->select('username','pass');
			$this->db->from('members');
			$this->db->where('username', $username);
			$this->db->where('pass', $pass);

			$query = $this->db->get();

			if($query->num_rows() == 1){
				return true;
			}else{
				return false;  
			}
		}

		public function verify_new_member($username){

			print_r($username);
			$this->db->select('username');
			$this->db->from('members');
			$this->db->where('username', $username);
			$query = $this->db->get();

			if($query->num_rows() == 0){
				return true;
			}else{
				return false;  
			}
		}

		public function insert_new_record($fname, $lname, $username, $pass){

			$data = array(
               'firstname' => $fname,
               'lastname' => $lname,
               'username' => $username,
               'pass' => $pass
            );
			
			$this->db->insert('members', $data);
			return true;
		}

	}
?>