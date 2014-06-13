<?php
	class Map extends CI_Controller{

		public function __construct(){
			parent::__construct();
			
		}
		public function index(){
			$this->load->library('googlemaps');

			$config['center'] = '1600 Amphitheatre Parkway in Mountain View, Santa Clara County, California';
			$config['zoom'] = 'auto';
			$this->googlemaps->initialize($config);

			$marker = array();
			$marker['position'] = '1600 Amphitheatre Parkway in Mountain View, Santa Clara County, California'; 
			$this->googlemaps->add_marker($marker);

			$data['map'] = $this->googlemaps->create_map();
			$this->load->view('map_view', $data);
		}
	}