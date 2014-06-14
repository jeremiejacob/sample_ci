<?php
	
	class Login extends CI_Controller{

		public function index(){

			$this->load->view('user_login_view');
		}

		public function validate() { 

			$this->output->enable_profiler(TRUE);
		    if (!empty($_POST['login'])) {
		        $this->check_login();
		    }
		    if (!empty($_POST['signup'])){

		    	redirect('/signup/index');
		    }
		}

		public function check_login(){
			print_r("CheckingLogin");
			$this->form_validation->set_rules('username', 'Username', 'required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required|callback_verify_user');

			if($this->form_validation->run() == false){
				$this->load->view('user_login_view');
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
			print_r("verify_user");
			$name = $this->input->post('username');
			$pass = $this->input->post('password');

			$this->load->model('login_model');

			if($this->login_model->login($name, $pass)){
				return true;
			}else{
				print_r("verifyelse");
				$this->form_validation->set_message('verify_user', 'Incorrect email or password! Please try again.');
				return false;
			}
		}
	}
?>