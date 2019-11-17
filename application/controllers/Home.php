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
		try{
			$success       				= 0;
			$reservation_origin 		= trim($this->input->post('reservation_origin'));
			$reservation_destination 	= trim($this->input->post('reservation_destination'));
			$reservation_date 			= trim($this->input->post('reservation_date'));
			$reservation_time 			= trim($this->input->post('reservation_time'));
			$reservation_bus 			= trim($this->input->post('reservation_bus'));
			
			if(EMPTY($reservation_origin))
				throw new Exception("Reservation Origin is required.");

			if(EMPTY($reservation_destination))
				throw new Exception("Reservation Destination is required.");

			if(EMPTY($reservation_date))
				throw new Exception("Reservation Date is required.");

			if(EMPTY($reservation_time))
				throw new Exception("Reservation Time is required.");

			if(EMPTY($reservation_bus))
				throw new Exception("Reservation Bus is required.");

			$reservation_params = array(
				'reservation_origin'		=> $reservation_origin,
				'reservation_destination'	=> $reservation_destination,
				'reservation_date'			=> $reservation_date,
				'reservation_time'			=> $reservation_time,
				'reservation_bus'			=> $reservation_bus
			);

			$this->home_model->reserve_now($reservation_params);
			
			$success  = 1;
		}catch (Exception $e){
			$msg = $e->getMessage();      
		}

		if($success == 1){
			$response = [
				'msg'       => 'Bus was reserved successfully!',
				'flag'      => $success
			];
		}else{
			$response = [
				'msg'       => $msg,
				'flag'      => $success
			];
		}

		echo json_encode($response);
	}
}
