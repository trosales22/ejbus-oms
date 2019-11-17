<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
		$this->load->helper('url', 'form');
		$this->load->library('session');
		$this->load->database();
		$this->load->model('Home_model', 'home_model');
	}
	
  	public function index() {
    	$this->data['buses'] = $this->home_model->get_buses();
    	$this->load->view('home_page', $this->data);
	}

	public function reserve_now(){
		
	}
}
