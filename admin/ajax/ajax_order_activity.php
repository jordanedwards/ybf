<?php
require("../includes/init.php"); 
require(CLASS_FOLDER . "class_orderactivity.php");

if (isset($_GET['order_id'])):
	$order_id = $_GET['order_id'];
	$content = $_GET['activity'];
	$action = escaped_var_from_post("action");

	$ordersactivity = new Orderactivity();	
	$ordersactivity->set_content($content);
	$ordersactivity->set_orderId($order_id);
	$ordersactivity->set_active("Y");
	
	include(CLASS_FOLDER . "class_user.php");
  	$last_updated_user = new User;
  	$last_updated_user->get_by_id($session->get_user_id());
	$ordersactivity->set_last_updated_user($last_updated_user->get_first_name().' '.$last_updated_user->get_last_name());

if ($action == "delete"){
	$dm = new DataManager();
	$id = mysqli_real_escape_string($dm->connection, $order_id);
	
if($ordersactivity->delete_by_id($id) == true) {
	}
	else {
		$session->setAlertMessage("There was a problem removing the ordersactivity. Please try again.");
		$session->setAlertColor("yellow");	
		header("location:".$_SERVER['HTTP_REFERER']);
		exit;
	}

} else{
	// Adding item:
	if($ordersactivity->save() == true) {
		// Success;
		echo '<tr><td>' .date("Y-m-d",time()). '</td><td>' . $content .'</td><td>' . $last_updated_user->get_first_name().' '.$last_updated_user->get_last_name() .'</td></tr>';
	}
	else {
		exit;
	}	
}
endif;
?>