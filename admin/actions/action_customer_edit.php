<?php // include necessary libraries
	include($_SERVER['DOCUMENT_ROOT'] . "/site/includes/init.php");

	$customer_id=$_POST["customer_id"];
	$customer_first_name=$_POST["customer_first_name"];
	$customer_last_name=$_POST["customer_last_name"];
	$customer_email=$_POST["customer_email"];
	$customer_tel=$_POST["customer_tel"];
	$customer_address=$_POST["customer_address"];
	$customer_city=$_POST["customer_city"];
	$customer_postal=$_POST["customer_postal"];
	$customer_country=$_POST["customer_country"];
	$customer_confirmed_email=$_POST["customer_confirmed_email"];
	$customer_active=$_POST["customer_active"];
		// add the new record to the database
	include($class_folder . "/class_customer.php");
	
		$customer = new Customer();
		$customer->set_id($customer_id);
		$customer->set_first_name($customer_first_name);
		$customer->set_last_name($customer_last_name);
		$customer->set_email($customer_email);
		$customer->set_tel($customer_tel);
		$customer->set_address($customer_address);
		$customer->set_city($customer_city);
		$customer->set_postal($customer_postal);
		$customer->set_country($customer_country);
		$customer->set_confirmed_email($customer_confirmed_email);
		$customer->set_active($customer_active);

	include($class_folder . "/class_user.php");
  	$last_updated_user = new User;
  	$last_updated_user->get_by_id($session->get_user_id());
	$customer->set_last_updated_user($last_updated_user->get_first_name().' '.$last_updated_user->get_last_name());

if ($_GET['action'] == "delete"){
	$dm = new DataManager();
	$id = mysqli_real_escape_string($dm->connection, $_GET['id']);
	
if($customer->delete_by_id($id) == true) {
		$session->setAlertMessage("The Customer has been removed successfully.");
		$session->setAlertColor("green");
		header("location:".$_SERVER['HTTP_REFERER']);
		exit;
	}
	else {
		$session->setAlertMessage("There was a problem removing the Customer. Please try again.");
		$session->setAlertColor("yellow");	
		header("location:".$_SERVER['HTTP_REFERER']);
		exit;
	}

} else{

	if($customer->save() == true) {
		//Check if new record
		if($customer_id > 0){
			$session->setAlertMessage("The Customer has been updated successfully.");
			$session->setAlertColor("green");
			header("location:". $base_href."/" . "customer_list.php?page=".$session->getPage());
			exit;		
		}else{
			$session->setAlertMessage("The Customer has been added successfully.");
			$session->setAlertColor("green");
			header("location:". $base_href."/" . "customer_edit.php?id=".$customer->get_id());
			exit;
		}
	}
	else {
		$session->setAlertMessage("There was a problem adding/updating the Customer. Please make sure all fields are correct.");
		$session->setAlertColor("yellow");
		header("location:".$_SERVER['HTTP_REFERER']);
		exit;
	}	
}