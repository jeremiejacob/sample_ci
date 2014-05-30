<?php

class Pages extends CI_CONTROLLER{

	public function view($page = 'home'){

		if (! file_exists(APPATH.'/views/pages'.$page.'.php')){
			show_404();
		}
		$data['title'] = ucfirst($page); //Uppercase first letter
		$this->load->view->('header', $data);
		$this->load->view('/pages'.$page, $data);
		$this->load->view('footer', $data);
	}
}