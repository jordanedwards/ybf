<?php
// Populate the component form based on the fields assigned to this component type in the componenttypefields table
require("../includes/init.php"); 
require_once(CLASS_FOLDER . "/class_drop_downs.php");
$dd = New DropDown();

if (isset($_GET['type'])):
echo "
<form action='actions/action_component.php?action=add' method='POST' id='newComponentForm'>
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
					$dd->set_preset($line['fieldname']);
					echo "<tr><td>" . ucfirst($line['fieldname']) . "</td><td>";
					$dd->display();
					echo "</td></tr>";		
				break;
				case "imp":
					echo '<tr><td>' . $line['fieldname'] .'</td><td><input id="' . $line['fieldname'] . '" name="' . $line['fieldname'] . '" type="number" step="1" class="measurement"/>&nbsp;';
					$dd->clear();	
					$dd->set_preset("imp");							
					$dd->set_name($line['fieldname']."_fraction");		
					$dd->display();
					echo ' in.</td></tr>';
					break;
				case "input":
					echo "<tr><td>" . $line['fieldname'] . "</td><td><input name='" . $line['fieldname'] . "'></td></tr>";		
				break;
			endswitch;
		endwhile;	
	endif;
echo "</table></form>";

endif;
?>