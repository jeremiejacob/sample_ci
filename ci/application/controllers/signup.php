<?php
	class Signup extends CI_Controller{

		public function index(){

			$this->load->view('signup');
		}

		public function check_signup_data(){

			$this->form_validation->set_rules('firstname', 'First Name', 'required|alpha');
			$this->form_validation->set_rules('lastname', 'Last Name', 'required|alpha');
			$this->form_validation->set_rules('username', 'Email', 'required|valid_email|callback_verify_new_entry');
			$this->form_validation->set_rules('password', 'Password', 'required');
			
			if($this->form_validation->run() == false){
				$this->load->view('signup');
			}else{
				redirect('login/index');
			}
		}

		public function verify_new_entry(){
			
			$fname = $this->input->post('firstname');
			$lname = $this->input->post('lastname');
			$username = $this->input->post('username');
			$pass = $this->input->post('password');

			$this->load->model('login_model');

			if($this->login_model->verify_new_member($username)){

				if($this->login_model->insert_new_record($fname, $lname, $username, $pass)){
					return true;
				}
			}else{
				return false;
			}
		}
	}