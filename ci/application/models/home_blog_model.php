<?php 

	class Home_blog_model extends CI_Model{

		public function retrieveall_data_fromfield(){

			$query = $this->db->query("SELECT title FROM blogs");
			return $query->result();
		}
	}
?>