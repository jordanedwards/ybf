<?php // include necessary libraries
	require("../includes/init.php");

	$orders_id=$_POST["orders_id"];
	$orders_customer_id=$_POST["orders_customer_id"];
	$orders_production_status=$_POST["orders_production_status"];
	$orders_condition=$_POST["orders_condition"];
	$orders_special_instructions=$_POST["orders_special_instructions"];
	$orders_received_date=$_POST["orders_received_date"];
	$orders_promised_date=$_POST["orders_promised_date"];
	$orders_art_location=$_POST["orders_art_location"];
	$orders_fitting_labour=$_POST["orders_fitting_labour"];
	$orders_mat_labour=$_POST["orders_mat_labour"];
	$orders_mount_labour=$_POST["orders_mount_labour"];
	$orders_special_labour=$_POST["orders_special_labour"];
		// add the new record to the database
	require(CLASS_FOLDER . "class_orders.php");
	
		$orders = new Orders();
		$orders->get_by_id($orders_id);
		$orders->set_customer_id($orders_customer_id);
		$orders->set_production_status($orders_production_status);
		$orders->set_condition($orders_condition);
		$orders->set_special_instructions($orders_special_instructions);
		$orders->set_received_date($orders_received_date);
		$orders->set_promised_date($orders_promised_date);
		$orders->set_art_location($orders_art_location);
		$orders->set_fitting_labour($orders_fitting_labour);
		$orders->set_mat_labour($orders_mat_labour);
		$orders->set_mount_labour($orders_mount_labour);
		$orders->set_special_labour($orders_special_labour);
		

	include(CLASS_FOLDER . "class_user.php");
  	$last_updated_user = new User;
  	$last_updated_user->get_by_id($session->get_user_id());
	$orders->set_last_updated_user($last_updated_user->get_first_name().' '.$last_updated_user->get_last_name());

if ($_GET['action'] == "delete"){
	$dm = new DataManager();
	$id = mysqli_real_escape_string($dm->connection, $_GET['id']);
	
if($orders->delete_by_id($id) == true) {
		$session->setAlertMessage("The Orders has been removed successfully.");
		$session->setAlertColor("green");
		header("location:".$_SERVER['HTTP_REFERER']);
		exit;
	}
	else {
		$session->setAlertMessage("There was a problem removing the Orders. Please try again.");
		$session->setAlertColor("yellow");	
		header("location:".$_SERVER['HTTP_REFERER']);
		exit;
	}

} else{

	if($orders->save() == true) {
		//Check if new record
		if($orders_id > 0){
			$session->setAlertMessage("The Orders has been updated successfully.");
			$session->setAlertColor("green");
//			header("location:". BASE_URL."/" . "orders_list.php?page=".$session->getPage());
			header("location:". BASE_URL."/" . "orders_edit.php?id=".$orders_id);
			exit;		
		}else{
			$session->setAlertMessage("The Orders has been added successfully.");
			$session->setAlertColor("green");
			header("location:". BASE_URL."/" . "orders_edit.php?id=".$orders_id);
			exit;
		}
	}
	else {
		$session->setAlertMessage("There was a problem adding/updating the Order. Please make sure all fields are correct.");
		$session->setAlertColor("yellow");
		header("location:".$_SERVER['HTTP_REFERER']);
		exit;
	}	
}