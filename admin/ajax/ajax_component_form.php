<?php
// Populate the component form based on the fields assigned to this component type in the componenttypefields table
require("../includes/init.php"); 
require_once(CLASS_FOLDER . "/class_drop_downs.php");
$dd = New DropDown();

if (isset($_GET['type'])):
echo "
<form action='actions/action_component.php?action=add' method='POST' id='newComponentForm'>
<input type='hidden' name='componentType' value='" .$_GET['type'] . "'>
<input type='hidden' name='orderId' value='" .$_GET['orderId'] . "'>

<table class='admin_table'>";
	$type = $_GET['type'];
	$dm = new DataManager();			
	$strSQL = "SELECT * FROM componenttypefields WHERE component_type = " .$type . " order by `order`";
	$result = $dm->queryRecords($strSQL);
				
	if ($result):
		while ($line = mysqli_fetch_assoc($result)):
			switch ($line['fieldtype']):
				case "list":
					$dd->clear();
					$dd->set_name("componentSelection[" . $line['id']. "]");					
					$dd->set_preset($line['fieldname']);
					echo "<tr><td>" . ucfirst($line['fieldname']) . "</td><td>";
					$dd->display();
					echo "</td></tr>";		
				break;
				case "imp":
					echo '<input name="fields[' . $line['id'] . '][id]" type="hidden" value="' .$line['id'] . '"/>';				
					echo '<tr><td>' . $line['fieldname'] .'</td><td><input id="' . $line['fieldname'] . '" name="fields[' . $line['id'] . '][whole]" type="number" step="1" min="0" class="measurement"/>&nbsp;';
					$dd->clear();	
					$dd->set_preset("imp");							
					$dd->set_name("fields[" . $line['id']."][fraction]");		
					$dd->display();
					echo ' in.</td></tr>';
					break;
				case "input":
					echo "<tr><td>" . $line['fieldname'] . "</td><td><input name='fields[" . $line['id'] . "]['whole']'></td></tr>";		
				break;
			endswitch;
		endwhile;	
	endif;
echo "</table></form>";

endif;
?>