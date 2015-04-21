<?php
// Populate the component form based on the fields assigned to this component type in the componenttypefields table
require("../includes/init.php"); 

if (isset($_GET['id'])):
	$dm = new DataManager();			
	$strSQL = "DELETE FROM matopening WHERE matOpening_id = " .$_GET['id'];
	$result = $dm->queryRecords($strSQL);
	
endif;
?>