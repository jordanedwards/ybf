<?php // include necessary libraries
require($_SERVER['DOCUMENT_ROOT'] . "/admin/includes/init.php");
require(CLASS_FOLDER . "/class_orders.php");
require(CLASS_FOLDER . "class_user.php");

foreach ($_POST as $key => $val){
			echo $key . " - " . $val."<br>";
	}

foreach ($_POST as $key => $val){
	if (isset($_REQUEST[$key])){
		$$key = mysqli_real_escape_string($dm->connection, $_REQUEST[$key]);
	}else{
		$$key = "";
	}
}	

	$orders = new Orders();
	if ($orders_id > 0):
		$orders->get_by_id($orders_id);
	endif;
	$orders->set_customer_id($orders_customer_id);
	$orders->set_production_status($orders_production_status);
	$orders->set_condition($orders_condition);
	$orders->set_special_instructions($orders_special_instructions);
	$orders->set_received_date($orders_received_date);
	$orders->set_promised_date($orders_promised_date);
	$orders->set_frame($orders_frame);
	$orders->set_outer_mat($orders_outer_mat);
	$orders->set_inner_mat($orders_inner_mat);
	$orders->set_fillet($orders_fillet);
	$orders->set_liner($orders_liner);
	$orders->set_glass($orders_glass);
	$orders->set_backing($orders_backing);
	$orders->set_mount_material($orders_mount_material);
	//$orders->set_fitting_labour($orders_fitting_labour);
	//$orders->set_mat_labour($orders_mat_labour);
	$orders->set_mount_labour($orders_mount_labour);
	$orders->set_special_labour($orders_special_labour);
	$orders->set_frame_w($orders_frame_w+$orders->convertMetric($orders_frame_w_fraction));
	$orders->set_frame_h($orders_frame_h);
	$orders->set_outer_mat_t($orders_outer_mat_t);
	$orders->set_outer_mat_b($orders_outer_mat_b);
	$orders->set_outer_mat_l($orders_outer_mat_l);
	$orders->set_outer_mat_r($orders_outer_mat_r);
	$orders->set_inner_mat_w($orders_inner_mat_w);
	$orders->set_inner_mat_h($orders_inner_mat_h);
	$orders->set_fillet_w($orders_fillet_w);
	$orders->set_fillet_h($orders_fillet_h);
	$orders->set_rabbet_size($orders_rabbet_size);
	$orders->set_frame_done($orders_frame_done);
	$orders->set_outer_mat_done($orders_outer_mat_done);
	$orders->set_inner_mat_done($orders_inner_mat_done);
	$orders->set_fillet_done($orders_fillet_done);
	$orders->set_glass_done($orders_glass_done);
	$orders->set_mount_done($orders_mount_done);
	
  	$last_updated_user = new User;
  	$last_updated_user->get_by_id($session->get_user_id());
	$orders->set_last_updated_user($last_updated_user->get_first_name().' '.$last_updated_user->get_last_name());		
	
	echo $orders;
	exit();
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
			header("location:". BASE_URL."/" . "orders_list.php?page=".$session->getPage());
			exit;		
		}else{
			$session->setAlertMessage("The Orders has been added successfully.");
			$session->setAlertColor("green");
			header("location:". BASE_URL."/" . "orders_edit.php?id=".$orders->get_id());
			exit;
		}
	}
	else {
		$session->setAlertMessage("There was a problem adding/updating the Orders. Please make sure all fields are correct.");
		$session->setAlertColor("yellow");
		header("location:".$_SERVER['HTTP_REFERER']);
		exit;
	}	
}		
?>