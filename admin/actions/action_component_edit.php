<?php // include necessary libraries
	include("/admin/includes/init.php");

	$component_id=$_POST["component_id"];
	$component_supplier_id=$_POST["component_supplier_id"];
	$component_item_number=$_POST["component_item_number"];
	$component_barcode=$_POST["component_barcode"];
	$component_url=$_POST["component_url"];
	$component_price=$_POST["component_price"];
	$component_cost=$_POST["component_cost"];
	$component_inventory=$_POST["component_inventory"];
	$component_type=$_POST["component_type"];
	$component_colour=$_POST["component_colour"];
	$component_style=$_POST["component_style"];
	$component_width=$_POST["component_width"];
	$component_description=$_POST["component_description"];
	$is_active=$_POST["is_active"];
		// add the new record to the database
	include(CLASS_FOLDER . "class_component.php");
	
		$component = new Component();
		$component->set_id($component_id);
		$component->set_supplier_id($component_supplier_id);
		$component->set_item_number($component_item_number);
		$component->set_barcode($component_barcode);
		$component->set_url($component_url);
		$component->set_price($component_price);
		$component->set_cost($component_cost);
		$component->set_inventory($component_inventory);
		$component->set_type($component_type);
		$component->set_colour($component_colour);
		$component->set_style($component_style);
		$component->set_width($component_width);
		$component->set_description($component_description);
		$component->set_active($component_active);

	include(CLASS_FOLDER . "class_user.php");
  	$last_updated_user = new User;
  	$last_updated_user->get_by_id($session->get_user_id());
	$component->set_last_updated_user($last_updated_user->get_first_name().' '.$last_updated_user->get_last_name());

if ($_GET['action'] == "delete"){
	$dm = new DataManager();
	$id = mysqli_real_escape_string($dm->connection, $_GET['id']);
	
if($component->delete_by_id($id) == true) {
		$session->setAlertMessage("The Component has been removed successfully.");
		$session->setAlertColor("green");
		header("location:".$_SERVER['HTTP_REFERER']);
		exit;
	}
	else {
		$session->setAlertMessage("There was a problem removing the Component. Please try again.");
		$session->setAlertColor("yellow");	
		header("location:".$_SERVER['HTTP_REFERER']);
		exit;
	}

} else{

	if($component->save() == true) {
		//Check if new record
		if($component_id > 0){
			$session->setAlertMessage("The Component has been updated successfully.");
			$session->setAlertColor("green");
			header("location:". BASE_URL."/" . "component_list.php?page=".$session->getPage());
			exit;		
		}else{
			$session->setAlertMessage("The Component has been added successfully.");
			$session->setAlertColor("green");
			header("location:". BASE_URL."/" . "component_edit.php?id=".$component->get_id());
			exit;
		}
	}
	else {
		$session->setAlertMessage("There was a problem adding/updating the Component. Please make sure all fields are correct.");
		$session->setAlertColor("yellow");
		header("location:".$_SERVER['HTTP_REFERER']);
		exit;
	}	
}