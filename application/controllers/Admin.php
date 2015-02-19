<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index(){
		
		$this->load->view('v_header');
		$this->load->view('v_admin');
		$this->load->view('v_footer');
	}
	
	public function update_db(){

		$this->load->model('m_db_update');
		$this->m_db_update->update_all_league_fixtures();
		$this->m_db_update->update_all_league_tables();
		
		$this->session->set_flashdata('msg', 'Fixtures & League Tables Have Been Updated<hr/><br/>Have A Fantastic Day');
		redirect(base_url('admin'));
	}
}
