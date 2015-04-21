<?php
// Populate the component form based on the fields assigned to this component type in the componenttypefields table
require("../includes/init.php"); 

if (isset($_GET['barcode'])):

	$barcode = $_GET['barcode'];
	$dm = new DataManager();			
	$strSQL = "SELECT frame_id AS id FROM frame WHERE barcode = '" . $barcode . "'";
	//echo $strSQL;
	$result = $dm->queryRecords($strSQL);
				
	if ($result):
		while ($line = mysqli_fetch_assoc($result)):
			$item_id = $line['id'];
		endwhile;
		echo $item_id;
	else:
		echo "Barcode not found";
	endif;
endif;
?>