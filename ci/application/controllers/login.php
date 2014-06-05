<?php
	
	class Login extends CI_Controller{

		public function index(){

			$this->load->view('user_login_view', array('login' => true));
		}

		public function check_login(){

			$this->form_validation->set_rules('username', 'Username', 'required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required|callback_verify_user');

			if($this->form_validation->run() == false){
				$this->load->view('user_login_view', array('login' => true));
			}else{
				$username = $this->input->post('email');

				$session_data = array(
                   'username'  => $username,
                   'logged_in' => TRUE
                );
				$this->session->set_userdata($session_data);
				$this->session->set_flashdata($session_data);
				redirect('home/index');
			}
		}

		public function verify_user(){
			$name = $this->input->post('username');
			$pass = $this->input->post('password');

			$this->load->model('login_model');

			if($this->login_model->login($name, $pass)){
				return true;
			}else{
				$this->form_validation->set_message('verifyUser', 'Incorrect email or password! Please try again.');
				return false;
			}
		}

		public function check_signup_data(){

			$this->form_validation->set_rules('firstname', 'First Name', 'required|alpha');
			$this->form_validation->set_rules('lastname', 'Last Name', 'required|alpha');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_verify_new_entry');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run() == false){
				$this->load->view('user_login_view', array('login' => false));
			}else{
				//$this->form_validation->set_message('success', 'Successfully added to the database. You may now log in.');
				redirect('home/index');
			}

		}

		public function verify_new_entry(){

			$fname = $this->input->post('firstname');
			$lname = $this->input->post('lastname');
			$username = $this->input->post('email');
			$pass = $this->input->post('password');

			$this->load->model('login_model');

			if($this->login_model->verify_new_member($username)){

				//echo 'verifyingNew Member true';
				if($this->login_model->insert_new_record($fname, $lname, $username, $pass)){
					return true;
				}

			}else{
				//$this->form_validation->set_message('existed', 'One of our members has this email address already. Try a different email.');
				return false;
			}
		}
	}
?>