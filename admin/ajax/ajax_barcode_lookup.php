<?php
// Populate the component form based on the fields assigned to this component type in the componenttypefields table
require("../includes/init.php"); 
require_once(CLASS_FOLDER . "class_component.php");
$component = new Component();
$response = 0;
$type = "";

if (isset($_GET['ordercomponent_id'])){
	$orderComponent_id = $_GET['ordercomponent_id'];
}

if (isset($_GET['type'])){
	$type = $_GET['type'];
}

if (isset($_GET['barcode'])){
	$barcode = $_GET['barcode'];
	$component->get_by_barcode($barcode);
}

if (isset($_GET['component_id'])){
	$component_id = $_GET['component_id'];
	$component->get_by_id($component_id);
}

switch ($type):
	case "json":
		// Need extra information (new price, response code, component id)
		require_once(CLASS_FOLDER . "class_ordercomponent.php");
		$orderComponent = new Ordercomponent;
		$orderComponent->get_by_id($orderComponent_id);
		$functions = new Functions();
		
		$price = $functions->calculate_price(0, $orderComponent->get_united_inches(),$component->get_id());
		
		if($component->get_id() > 0){
			$response = 1;
		}
		// Return json:		
		echo '{"response":"' . $response . '","selection_id":"'. $component->get_id() .'","new_price":"' .$price.'","componentType":"' .$orderComponent->get_componentType() . '"}';		
	break;
	default:
		// Just return the component id that was searched for:
		echo $component->get_id();
endswitch;
?>