<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class frontend extends CI_Controller {

	public function index(){

		$d['upcoming_fixtures'] = "";// = get_upcoming_fixtures();
		
		$this->load->view('v_landing_page', $d);
		$this->load->view('v_landing_page_modals', $d);
	}
}
