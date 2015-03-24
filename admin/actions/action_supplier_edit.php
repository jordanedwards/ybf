<?php // include necessary libraries
	include($_SERVER['DOCUMENT_ROOT'] . "/site/includes/init.php");

	$supplier_id=$_POST["supplier_id"];
	$supplier_name=$_POST["supplier_name"];
	$supplier_contact_name=$_POST["supplier_contact_name"];
	$supplier_phone=$_POST["supplier_phone"];
	$supplier_email=$_POST["supplier_email"];
	$supplier_account_number=$_POST["supplier_account_number"];
	$supplier_terms=$_POST["supplier_terms"];
		// add the new record to the database
	include($class_folder . "/class_supplier.php");
	
		$supplier = new Supplier();
		$supplier->set_id($supplier_id);
		$supplier->set_name($supplier_name);
		$supplier->set_contact_name($supplier_contact_name);
		$supplier->set_phone($supplier_phone);
		$supplier->set_email($supplier_email);
		$supplier->set_account_number($supplier_account_number);
		$supplier->set_terms($supplier_terms);

	include($class_folder . "/class_user.php");
  	$last_updated_user = new User;
  	$last_updated_user->get_by_id($session->get_user_id());
	$supplier->set_last_updated_user($last_updated_user->get_first_name().' '.$last_updated_user->get_last_name());

if ($_GET['action'] == "delete"){
	$dm = new DataManager();
	$id = mysqli_real_escape_string($dm->connection, $_GET['id']);
	
if($supplier->delete_by_id($id) == true) {
		$session->setAlertMessage("The Supplier has been removed successfully.");
		$session->setAlertColor("green");
		header("location:".$_SERVER['HTTP_REFERER']);
		exit;
	}
	else {
		$session->setAlertMessage("There was a problem removing the Supplier. Please try again.");
		$session->setAlertColor("yellow");	
		header("location:".$_SERVER['HTTP_REFERER']);
		exit;
	}

} else{

	if($supplier->save() == true) {
		//Check if new record
		if($supplier_id > 0){
			$session->setAlertMessage("The Supplier has been updated successfully.");
			$session->setAlertColor("green");
			header("location:". $base_href."/" . "supplier_list.php?page=".$session->getPage());
			exit;		
		}else{
			$session->setAlertMessage("The Supplier has been added successfully.");
			$session->setAlertColor("green");
			header("location:". $base_href."/" . "supplier_edit.php?id=".$supplier->get_id());
			exit;
		}
	}
	else {
		$session->setAlertMessage("There was a problem adding/updating the Supplier. Please make sure all fields are correct.");
		$session->setAlertColor("yellow");
		header("location:".$_SERVER['HTTP_REFERER']);
		exit;
	}	
}