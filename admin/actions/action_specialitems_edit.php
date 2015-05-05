<?php // include necessary libraries
	include("/admin/includes/init.php");

	$specialItems_id=$_POST["specialItems_id"];
	$specialItems_name=$_POST["specialItems_name"];
	$specialItems_price=$_POST["specialItems_price"];
	$specialItems_use_pricegrid=$_POST["specialItems_use_pricegrid"];
	$specialItems_category=$_POST["specialItems_category"];
	$is_active=$_POST["is_active"];
		// add the new record to the database
	include(CLASS_FOLDER . "class_specialitems.php");
	
		$specialitems = new Specialitems();
		$specialitems->set_id($specialitems_id);
		$specialitems->set_name($specialitems_name);
		$specialitems->set_price($specialitems_price);
		$specialitems->set_use_pricegrid($specialitems_use_pricegrid);
		$specialitems->set_category($specialitems_category);
		$specialitems->set_active($specialitems_active);

	include(CLASS_FOLDER . "class_user.php");
  	$last_updated_user = new User;
  	$last_updated_user->get_by_id($session->get_user_id());
	$specialitems->set_last_updated_user($last_updated_user->get_first_name().' '.$last_updated_user->get_last_name());

if ($_GET['action'] == "delete"){
	$dm = new DataManager();
	$id = mysqli_real_escape_string($dm->connection, $_GET['id']);
	
if($specialitems->delete_by_id($id) == true) {
		$session->setAlertMessage("The Specialitems has been removed successfully.");
		$session->setAlertColor("green");
		header("location:".$_SERVER['HTTP_REFERER']);
		exit;
	}
	else {
		$session->setAlertMessage("There was a problem removing the Specialitems. Please try again.");
		$session->setAlertColor("yellow");	
		header("location:".$_SERVER['HTTP_REFERER']);
		exit;
	}

} else{

	if($specialitems->save() == true) {
		//Check if new record
		if($specialitems_id > 0){
			$session->setAlertMessage("The Specialitems has been updated successfully.");
			$session->setAlertColor("green");
			header("location:". BASE_URL."/" . "specialitems_list.php?page=".$session->getPage());
			exit;		
		}else{
			$session->setAlertMessage("The Specialitems has been added successfully.");
			$session->setAlertColor("green");
			header("location:". BASE_URL."/" . "specialitems_edit.php?id=".$specialitems->get_id());
			exit;
		}
	}
	else {
		$session->setAlertMessage("There was a problem adding/updating the Specialitems. Please make sure all fields are correct.");
		$session->setAlertColor("yellow");
		header("location:".$_SERVER['HTTP_REFERER']);
		exit;
	}	
}