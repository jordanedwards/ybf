<?php
require("../includes/init.php"); 
require(CLASS_FOLDER . "class_orders.php");

$action = escaped_var_from_post("action");
$component = escaped_var_from_post("component");
$order_id = escaped_var_from_post("order_id");

if ($order_id >0):
	$order = new Orders();
	$order->get_by_id($order_id);
	
	switch ($action):
		case "done":
			$order->set_component_done($component,"1");
			$order->save();
			// Add activity note here
			require(CLASS_FOLDER . "class_orderactivity.php");
			$ordersactivity = new Orderactivity();	
			$ordersactivity->set_content(ucfirst($component). " done");
			$ordersactivity->set_orderId($order_id);
			$ordersactivity->set_active("Y");
			
			include(CLASS_FOLDER . "class_user.php");
			$last_updated_user = new User;
			$last_updated_user->get_by_id($session->get_user_id());
			$ordersactivity->set_last_updated_user($last_updated_user->get_first_name().' '.$last_updated_user->get_last_name());
			$ordersactivity->save();
		break;
	endswitch;

endif;
?>