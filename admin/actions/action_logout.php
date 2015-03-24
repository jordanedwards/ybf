<?php
	// include necessary libraries
	include($_SERVER['DOCUMENT_ROOT'] . "/site/includes/init.php");
	
	// logout the user and forward them to the login page
	$session->logout();
	$session->setAlertMessage("You have successfully logged out of the system.");
	$session->setAlertColor("green");	
	header("location:/site/index.php");
	exit;

?>