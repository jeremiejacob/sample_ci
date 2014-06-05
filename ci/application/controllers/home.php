<?php
	
	class Home extends CI_Controller{

		public function index(){

			$session_id = $this->session->userdata('username');

			$this->load->model("home_blog_model");

    		$resultdata['results'] = $this->home_blog_model->retrieveall_data_fromfield();

			$this->load->view('home_view', $resultdata);
			//$this->preview_all_entry();

			//$query = $this->db->query('SELECT title FROM blogs');
		    //$resultdata['results'] = $query->result_array();
			//$this->load->view('home_view', $resultdata);
		}

		public function logout(){
	        
	        $data = array('username' => '', 'logged_in' => FALSE );
	        $this->session->unset_userdata($data);
	        $this->session->sess_destroy();
	        redirect('login', 'refresh');
    	}

    	public function load_blog(){

    		
    	}
	}
?>