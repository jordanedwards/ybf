<?php // include necessary libraries
require_once($_SERVER['DOCUMENT_ROOT'] . "/admin/includes/init.php");
require_once(CLASS_FOLDER . "class_ordercomponent.php");
require_once(CLASS_FOLDER . "class_ordercomponent_record.php");

$functions = New Functions();
	
extract($_POST);

// An example of the POST array:
/*
Array
(
    [componentType] => 1
    [5] => 1  						***** This is the component type field id / value pair FOR THE COMPONENT TYPE
    [fields] => Array
        (
            ['2'] => Array  		***** These are the component type field id / value pair FOR EACH OF THE FIELDS
                (
                    ['whole'] => 5
                    ['fraction'] => 1/16
                )

            ['1'] => Array
                (
                    ['whole'] => 8
                    ['fraction'] => 1/4
                )

            ['3'] => Array
                (
                    ['whole'] => 2
                    ['fraction'] => 1/2
                )
        )
)
*/

// CREATE NEW COMPONENT:
$new_component = New Ordercomponent();
$new_component->set_orders_id($orderId);
$new_component->set_componentType($componentType);

$new_component->save();
// ADD Component type selection component record:
foreach ($_POST['componentSelection'] as $key => $val){
	
	$new_field_record = New Ordercomponent_record();
	
	$new_field_record->set_orderComponentId($new_component->get_id());
	$new_field_record->set_componentTypeField(key($_POST['componentSelection']));
	$new_field_record->set_value($val);
	$new_field_record->save();	

}


// ADD Fields to component:
foreach ($_POST['fields'] as $key){
$converted_value = 0;

	foreach ($key as $fieldset => $val){	

		if ($fieldset == 'whole') {
			$converted_value = $converted_value +$val;
		}
		elseif ($fieldset == 'fraction'){
			$converted_value = $converted_value + $functions->convertMetric($val);
		}
	}
	
	$new_field_record = New Ordercomponent_record();
	
	$new_field_record->set_orderComponentId($new_component->get_id());
	$new_field_record->set_componentTypeField($key['id']);
	$new_field_record->set_value($converted_value);
	$new_field_record->save();	
	//echo $key['id'] . "<br>";
					
}

//print_r(array_keys($_POST['fields']));
?>
<!--<pre>
<?php 

//print_r($_POST);
	header("location:" . BASE_URL . "/orders_edit_new.php?id=".$orderId);

?>
</pre>-->