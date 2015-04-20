<?php // include necessary libraries
require_once($_SERVER['DOCUMENT_ROOT'] . "/admin/includes/init.php");
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


// CREATE NEW COMPONENT:


*/

/*	// Pull current user:
	require_once($class_folder . "/class_user.php"); 
	$currentUser = new User;
	$currentUser->get_by_id($session->get_user_id());

	if ($currentUser->get_role() == 1){
	$dm = new DataManager();
	//  User is an admin, so let er rip.

$admin_view = 0;
$admin_edit = 0;
$admin_delete = 0;
$instructor_view = 0;
$instructor_edit = 0;
$instructor_delete = 0;
$assistant_view = 0;
$assistant_edit = 0;
$assistant_delete = 0;

// Admin additions	
if (isset($_POST['admin'])){ 
	foreach ($_POST['admin'] as $key => $val)
	{
		if ($key == "view"){ $admin_view = $val;}
		elseif ($key == "edit"){ $admin_edit = $val;}
		elseif ($key == "delete"){ $admin_delete = $val;}
	}
if (($admin_view + $admin_edit + $admin_delete) >0 ){
		// I.e., there is a reason to put a record in:
		$query = "INSERT INTO aclPageRecords (aclPageRecords_user_role, aclPageRecords_page_id, aclPageRecords_page_view, aclPageRecords_page_edit, aclPageRecords_page_delete) VALUES
		(1,'" . mysqli_real_escape_string($dm->connection,$_POST['page_id']) . "', " . $admin_view . ", " . $admin_edit . ", " . $admin_delete . ")";
		$result = $dm->queryRecords($query);
	}
}

//Instructor additions:
if (isset($_POST['instructor'])){
	foreach ($_POST['instructor'] as $key => $val)
	{
		if ($key == "view"){ $instructor_view = $val;}
		elseif ($key == "edit"){ $instructor_edit = $val;}
		elseif ($key == "delete"){ $instructor_delete = $val;}
	}
	if (($instructor_view + $instructor_edit + $instructor_delete) >0 ){
		// I.e., there is a reason to put a record in:
		$query = "INSERT INTO aclPageRecords (aclPageRecords_user_role, aclPageRecords_page_id, aclPageRecords_page_view, aclPageRecords_page_edit, aclPageRecords_page_delete) VALUES
		(2,'" . mysqli_real_escape_string($dm->connection,$_POST['page_id']) . "', " . $instructor_view . ", " . $instructor_edit . ", " . $instructor_delete . ")";
		$result = $dm->queryRecords($query);
	}
}

//Assistant additions:
if (isset($_POST['assistant'])){
	foreach ($_POST['assistant'] as $key => $val)
	{
		if ($key == "view"){ $assistant_view = $val;}
		elseif ($key == "edit"){ $assistant_edit = $val;}
		elseif ($key == "delete"){ $assistant_delete = $val;}
	}
	if (($assistant_view + $assistant_edit + $assistant_delete) >0 ){
		// I.e., there is a reason to put a record in:
		$query = "INSERT INTO aclPageRecords (aclPageRecords_user_role, aclPageRecords_page_id, aclPageRecords_page_view, aclPageRecords_page_edit, aclPageRecords_page_delete) VALUES
		(2,'" . mysqli_real_escape_string($dm->connection,$_POST['page_id']) . "', " . $assistant_view . ", " . $assistant_edit . ", " . $assistant_delete . ")";
		$result = $dm->queryRecords($query);
	}
}


	$session->setAlertMessage("Access control list updated.");
	$session->setAlertColor("green");
	//rem out this line if you want to see the array variables:	
	header("location:" . $base_href . "/index.php");

echo "<pre>";
print_r($_POST);

echo "</pre>";
exit();
}*/
//	header("location: " . BASE_URL . "/orders_edit_new.php?id=1");

?>

<pre>
<?php 

print_r($_POST);

?>
</pre>