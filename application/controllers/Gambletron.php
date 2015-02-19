<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class gambletron extends CI_Controller {

	public function index(){

		$d['upcoming_fixtures'] = "";// = get_upcoming_fixtures();
		
		$this->load->view('v_header');
		$this->load->view('v_frontend', $d);
		$this->load->view('v_footer');
	}
}
