<?php
require("../includes/init.php"); 
require(CLASS_FOLDER . "class_customer.php");

if (isset($_GET['first_name'])):

	$first_name = escaped_var_from_post("first_name");
	$last_name = escaped_var_from_post("last_name");

	$newCustomer = new Customer();
	
	$newCustomer->set_first_name($first_name);
	$newCustomer->set_last_name($last_name);
	
	include(CLASS_FOLDER . "class_user.php");
  	$last_updated_user = new User;
  	$last_updated_user->get_by_id($session->get_user_id());
	$newCustomer->set_last_updated_user($last_updated_user->get_first_name().' '.$last_updated_user->get_last_name());

	if($newCustomer->save() == true) {
		echo $newCustomer->get_id();
	}
	else {
		exit;
	}	
endif;
?>