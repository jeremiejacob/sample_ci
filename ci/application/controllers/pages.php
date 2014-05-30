<?php

class Pages extends CI_CONTROLLER{

	public function view($page = 'home'){
		console.log("view functon init");

		if ( ! file_exists(APPATH.'/views/pages'.$page.'.php')){
			show_404();
		}
		$data['title'] = ucfirst($page); //Uppercase first letter
		$this->load->view->('templates/header', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer', $data);
	}
}