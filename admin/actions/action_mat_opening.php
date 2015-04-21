<?php // include necessary libraries
require_once($_SERVER['DOCUMENT_ROOT'] . "/admin/includes/init.php");
require_once(CLASS_FOLDER . "class_matopening.php");

$functions = New Functions();	
extract($_POST);


$top = $top_whole + $functions->convertMetric($top_fraction);
$bottom = $bottom_whole + $functions->convertMetric($bottom_fraction);
$left = $left_whole + $functions->convertMetric($left_fraction);
$right = $right_whole + $functions->convertMetric($right_fraction);


// CREATE NEW COMPONENT:
$new_opening = New Matopening();
$new_opening->set_component_id($componentId);
$new_opening->set_top($top);
$new_opening->set_left_side($left);
$new_opening->set_right_side($right);
$new_opening->set_bottom($bottom);

$new_opening->save();

	header("location:" . BASE_URL . "/orders_edit.php?id=".$orderId);
?>