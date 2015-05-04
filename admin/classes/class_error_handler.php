<?php
//***********************************************************************************************
//  Class: ErrorHandler
//	Description: The ErrorHandler class handles all unexpected errors
//***********************************************************************************************
class ErrorHandler {

	//*******************************
	// class variables
	//*******************************
	
	//*******************************
	// constructor
	//*******************************
	function __construct() {
		/*******************************************************************************************************
		********************************************************************************************************/ 
	}


	//****************************************************************************************
	// Sends an email to the Admins and forwards the user to a generic error page
	//****************************************************************************************	
	public function notifyAdminException(Exception $e){
		try{

			// Send the administrator their new password
			//include_once($_SERVER['DOCUMENT_ROOT'] . '/classes/class_phpmailer.php');
			//require_once($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/init.php');
			
		/*	$body = '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><body><p>An unexpection error occured.</p>';
			$body .= "<p>File: ". $e->getFile()."</p>"; 
			$body .= "<p>Line: ". $e->getLine()."</p>";
			$body .= "<p>Reason: ". $e->getMessage()."</p>";
			
			$body .= "<p><br /><br />The Netook Team</p></body></html>";
			
			$mail = new PHPMailer();
			$mail->From = "support@mrrental.ca";
			$mail->AddAddress($admin_email,"");
			$mail->Subject = "Netook - System Error Occurred [DEV]";
			$mail->Body = $body;
			
			$result = 1;
						
			if(!$mail->Send()) {
				$result = 0;
			}
			$mail = null;
*/
		//	addToLog($e->getMessage());
	//	mail("jordan@orchardcity.ca","test",$e->getMessage());
			$_SESSION['alert_msg'] = "An unexpected system error has occurred. The site administrators have been notified. We apologize for any inconvenience.";	
			$_SESSION['alert_color'] = "red";
			echo $_SESSION['alert_msg'] . "(" . $e->getMessage() . ")"; 
		//	header("location:/error.php");
			exit;	
		}
		catch(Exception $e) {
	//	mail("jordan@orchardcity.ca","test",$e->getMessage());		
			$_SESSION['alert_msg'] = "An unexpected system error has occurred. The site administrators have been notified. We apologize for any inconvenience.";	
			$_SESSION['alert_color'] = "red";
			echo $_SESSION['alert_msg'] . "(" . $e->getMessage() . ")"; 			
			//header("location:/error.php");		
			exit;
		}
	}
}

?>