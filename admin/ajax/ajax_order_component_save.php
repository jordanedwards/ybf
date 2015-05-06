<?php
require("../includes/init.php"); 
require_once(CLASS_FOLDER . "class_ordercomponent.php");
require_once(CLASS_FOLDER . "class_ordercomponent_record.php");
$functions = New Functions();

$action = escaped_var_from_post("action");
$component = escaped_var_from_post("id");

// Overwrite the old Order Component Records

$dm = new DataManager();			
$strSQL = "SELECT ordercomponent_record.id AS OCR_id, fieldname, fieldtype
 FROM ordercomponent_record
			LEFT JOIN componenttypefields ON ordercomponent_record.componentTypeField = componenttypefields.id
			WHERE orderComponentId = " .$component;
$result = $dm->queryRecords($strSQL);
			
if ($result):
	while ($line = mysqli_fetch_assoc($result)):
		if (isset($_GET[$line['fieldname']])):
			$field_record = New Ordercomponent_record();
			$field_record->get_by_id($line['OCR_id']);
			// Need to convert imperial fields and combine:
			if ($line['fieldtype'] == "imp"):
				$value = $_GET[$line['fieldname']];
				$fraction = $functions->convertMetric($_GET[$line['fieldname']."_fraction"]);
				$value = $value + $fraction;
			else:
				$value = $_GET[$line['fieldname']];
			endif;
			$field_record->set_value($value);
			//echo $line['OCR_id'] . " / " . $line['fieldname'] . " / " . $_GET[$line['fieldname']] . "<br>";
			//echo $field_record;
			//exit();			
			$field_record->save();
		endif;				
	endwhile;	
endif;

//Update price
$new_component = New Ordercomponent();
$new_component->get_by_id($component);
$new_component->populate();

$price = $functions->calculate_price($new_component->get_id(),$new_component->get_united_inches());
$new_component->set_price($price);
$new_component->save();
?>