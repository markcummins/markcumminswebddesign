<?php

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
			
			function clean_string($string) {

				$bad = array("content-type","bcc:","to:","cc:","href");
				return str_replace($bad,"",$string);
			}

			$email_to = "markcummins87@gmail.com";
			$subject = clean_string($_POST['subject']); 
			$message = clean_string($_POST['message']); 

			$error_message = "";

			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: <markcummins87@gmail.com>' . "\r\n";

			mail($email_to, $subject, $message, $headers); 

			echo '<div class="alert alert-success">
					<h5>Message Sent</h5>
  					Thank you for contacting us. We will be in touch with you very soon.
					</div>';
		}
	}

?>