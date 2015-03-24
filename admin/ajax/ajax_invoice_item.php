<?php
require("../includes/init.php"); 
require(CLASS_FOLDER . "class_ordersSpecialItem.php");

if (isset($_GET['order_id'])):
	$order_id = $_GET['order_id'];
	$type = $_GET['addInvoiceItemType'];
	$text = $_GET['text'];	
	$quantity = $_GET['addInvoiceItemQuantity'];

	$ordersSpecialItem_id=escaped_var_from_post("ordersSpecialItem_id");
	$action = escaped_var_from_post("action");
	$is_active=escaped_var_from_post("is_active");

	$ordersSpecialItem = new OrdersSpecialItem();
	if ($ordersSpecialItem_id > 0 ){
		$ordersSpecialItem->get_by_id($ordersSpecialItem_id);
	}
	$ordersSpecialItem->set_item_id($type);
	$ordersSpecialItem->set_order_id($order_id);
	$ordersSpecialItem->set_quantity($quantity);
	$ordersSpecialItem->set_active("Y");
	
	include(CLASS_FOLDER . "class_user.php");
  	$last_updated_user = new User;
  	$last_updated_user->get_by_id($session->get_user_id());
	$ordersSpecialItem->set_last_updated_user($last_updated_user->get_first_name().' '.$last_updated_user->get_last_name());

if ($action == "delete"){	
	if($ordersSpecialItem->delete_by_id($ordersSpecialItem_id) == true) {}
	else {
		$session->setAlertMessage("There was a problem removing the OrdersSpecialItem. Please try again.");
		$session->setAlertColor("yellow");	
		header("location:".$_SERVER['HTTP_REFERER']);
		exit;
	}
} else{
	// Adding item:
	if($ordersSpecialItem->save() == true) {
		// Success;
		echo '<tr><td colspan="2">' . $quantity .'<span class="small_text" style="margin-left: 2px;">x</span></td><td colspan="2">' . $text .'</td><td align="center" style="width:50px"><a href="#" data-itemId="' . $ordersSpecialItem->get_id() .'" class="remove-item"><i class="fa fa-times-circle fa-lg"></i></a></td></tr>';
	}
	else {
		exit;
	}	
}
endif;
?>