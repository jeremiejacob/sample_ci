<?php
	class Logout extends CI_Controller{

		public function index(){

			$this->load->library('session');
		}
		public function logout(){
	        
	        $data = array('username' => '', 'logged_in' => FALSE );
	        $this->session->unset_userdata($data);
	        $this->session->sess_destroy();
	        redirect('login', 'refresh');
    	}
	}
?>