<?php
require("../includes/init.php"); 
require(CLASS_FOLDER . "class_ordercomponent.php");

$action = escaped_var_from_post("action");
$component_id = escaped_var_from_post("component_id");
$order_id = escaped_var_from_post("order_id");

if ($component_id >0):
	$component = new Ordercomponent();
	$component->get_by_id($component_id);
	
	switch ($action):
		case "done":
			$component->set_done("1");
			$component->save();
			
			// Add activity note here
			require(CLASS_FOLDER . "class_orderactivity.php");
			$ordersactivity = new Orderactivity();	
			$ordersactivity->set_content($component->get_componentTypeName(). " done");
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