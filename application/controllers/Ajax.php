<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function index(){
		
		redirect(base_url());
	}
	
	public function send_mail(){

		if(!isset($_POST['subject']) || !isset($_POST['message'])) {

			echo '<div class="alert alert-danger">
				<h5>Oops</h5>
			  	We are sorry, but there appears to be a problem with the form you submitted??
				</div>';      
		}
		else{

			if($_POST['subject'] == "" || $_POST['message'] == "") {

				echo '<div class="alert alert-danger">
					<h5>Oops</h5>
					Please fill out all fields.
					</div>';      
			}
			else{				

				$error_message = "";
				$this->load->library('email');

				$this->email->from('mcWebDesign.com', 'Mark');
				$this->email->to('markcummins87@gmail.com');

				$this->email->subject($_POST['subject']);
				$this->email->message($_POST['message']);
				$this->email->send();

				echo '<div class="alert alert-success">
					<h5>Message Sent</h5>
  					Thank you for contacting us. We will be in touch with you very soon.
					</div>';
			}
		}
	}
}
