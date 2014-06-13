<?php 

	class Home_blog_model extends CI_Model{

		public function retrieveall_data_fromfield(){

			$query = $this->db->query("SELECT id, title FROM blogs");
			return $query->result();
		}

		public function get_content($id){
			
		
			$data = array();
			$query = $this->db->query("SELECT id, author, title, date_posted, content FROM blogs");
			if ($query->num_rows() > 0)
				{
				   $row = $query->row($id-1); 
				   $data = array(
				   		'author' => $row->author,
				   		'title' => $row->title,
				   		'date_posted' => $row->date_posted,
				   		'content' => $row->content
				   );
				}
			return $data;			
		}

		public function insert_blog($author, $title, $content){
 
			$format = 'DATE_ISO8601';
			$time = time();
			$data = array(
               'author' => $author,
               'title' => $title,
               'date_posted' => standard_date($format, $time),
               'content' => $content
            );
			
			$this->db->insert('blogs', $data);
			return true;
		}

		
	}
?>