<?php // include necessary libraries
	include("/site/includes/init.php");

	$ordersSpecialItem_id=$_POST["ordersSpecialItem_id"];
	$ordersSpecialItem_item_id=$_POST["ordersSpecialItem_item_id"];
	$ordersSpecialItem_order_id=$_POST["ordersSpecialItem_order_id"];
	$ordersSpecialItem_quantity=$_POST["ordersSpecialItem_quantity"];
	$is_active=$_POST["is_active"];
		// add the new record to the database
	include(CLASS_FOLDER . "class_ordersSpecialItem.php");
	
		$ordersSpecialItem = new OrdersSpecialItem();
		$ordersSpecialItem->set_id($ordersSpecialItem_id);
		$ordersSpecialItem->set_item_id($ordersSpecialItem_item_id);
		$ordersSpecialItem->set_order_id($ordersSpecialItem_order_id);
		$ordersSpecialItem->set_quantity($ordersSpecialItem_quantity);
		$ordersSpecialItem->set_active($ordersSpecialItem_active);

	include(CLASS_FOLDER . "class_user.php");
  	$last_updated_user = new User;
  	$last_updated_user->get_by_id($session->get_user_id());
	$ordersSpecialItem->set_last_updated_user($last_updated_user->get_first_name().' '.$last_updated_user->get_last_name());

if ($_GET['action'] == "delete"){
	$dm = new DataManager();
	$id = mysqli_real_escape_string($dm->connection, $_GET['id']);
	
if($ordersSpecialItem->delete_by_id($id) == true) {
		$session->setAlertMessage("The OrdersSpecialItem has been removed successfully.");
		$session->setAlertColor("green");
		header("location:".$_SERVER['HTTP_REFERER']);
		exit;
	}
	else {
		$session->setAlertMessage("There was a problem removing the OrdersSpecialItem. Please try again.");
		$session->setAlertColor("yellow");	
		header("location:".$_SERVER['HTTP_REFERER']);
		exit;
	}

} else{

	if($ordersSpecialItem->save() == true) {
		//Check if new record
		if($ordersSpecialItem_id > 0){
			$session->setAlertMessage("The OrdersSpecialItem has been updated successfully.");
			$session->setAlertColor("green");
			header("location:". BASE_URL."/" . "ordersSpecialItem_list.php?page=".$session->getPage());
			exit;		
		}else{
			$session->setAlertMessage("The OrdersSpecialItem has been added successfully.");
			$session->setAlertColor("green");
			header("location:". BASE_URL."/" . "ordersSpecialItem_edit.php?id=".$ordersSpecialItem->get_id());
			exit;
		}
	}
	else {
		$session->setAlertMessage("There was a problem adding/updating the OrdersSpecialItem. Please make sure all fields are correct.");
		$session->setAlertColor("yellow");
		header("location:".$_SERVER['HTTP_REFERER']);
		exit;
	}	
}