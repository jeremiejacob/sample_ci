<?php
	
	class Home extends CI_Controller{

		public function __construct(){

			parent::__construct();

		}
		public function index(){


			$this->output->enable_profiler(TRUE);
			$session_id = $this->session->userdata('username');

			$this->load->model("home_blog_model");
			$data['title'] = ucfirst(lang('home'));
    		$data['results'] = $this->home_blog_model->retrieveall_data_fromfield();
			$this->template->load('default','home_view', $data);
		}


    	public function load_blog($id){

    		$this->load->model("home_blog_model");
    		$resultdata = $this->home_blog_model->get_content($id);
    		$this->load->view('blog_content', array('author' => $resultdata['author'], 'title' => $resultdata['title'], 'date_posted' => $resultdata['date_posted'], 'content' => $resultdata['content']));
    	}

    	public function validate() { 
		    $my_action = $this->input->post('submit');
		    if ($my_action == 'Create Blog') {
		        
		        $this->create_blog();
		    }
		}

		public function create_blog(){
			$this->load->view('create_blog');
		}

		public function post_blog(){

			
			$this->form_validation->set_rules('author_name', 'Author', 'required');
			$this->form_validation->set_rules('title_entry', 'Entry Title', 'required');
			$this->form_validation->set_rules('content', 'Content', 'required|callback_insert_blog');

			if($this->form_validation->run() == false){
				$this->load->view('create_blog');
			}else{
				
				redirect('home/index');
			}
		}

		public function insert_blog(){

			$author = $this->input->post('author_name');
			$title = $this->input->post('title_entry');
			$content = $this->input->post('content');

			$this->load->model('home_blog_model');

			if($this->home_blog_model->insert_blog($author, $title, $content)){
				return true;
				
			}else{
				return false;
			}
		}
	}
?>