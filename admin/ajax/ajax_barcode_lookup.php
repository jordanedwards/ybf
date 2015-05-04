<?php
// Populate the component form based on the fields assigned to this component type in the componenttypefields table
require("../includes/init.php"); 
$item_id = 0;

if (isset($_GET['barcode'])):

	$barcode = $_GET['barcode'];
	$dm = new DataManager();			
	$strSQL = "SELECT component_id FROM component WHERE component_barcode = '" . $barcode . "'";
	$result = $dm->queryRecords($strSQL);
				
	if ($result):
		while ($line = mysqli_fetch_assoc($result)):
			$item_id = $line['component_id'];
		endwhile;
	endif;
endif;
		echo $item_id;
?>