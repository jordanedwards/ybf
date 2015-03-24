<?php
$access = false;
$num_rows = 0;

if (!$page_id > 0){
	echo "<h1>No page id set. Please contact an administrator</h1>";
	exit();
}
	// Pull current user:
	require_once(CLASS_FOLDER . "/class_user.php"); 
	$currentUser = new User;
	$currentUser->get_by_id($session->get_user_id());
	
	// Check that user is allowed access to this resource:
	$dm = new DataManager();			
	$query = "SELECT * FROM aclPageRecords WHERE aclPageRecords_page_id = '" .$page_id . "'";
	$result = $dm->queryRecords($query);
	if ($result){ $num_rows = mysql_num_rows($result);}
	
	if ($num_rows == 0){
	?>
	<h1>There are no Access Control records for this page</h1>
	<?php if ($currentUser->get_role() ==1){?>
		<p>As an administrator, you may add access:</p>
		<form action="<?php echo ACTIONS_FOLDER ?>/action_add_acl.php" method="post">
		<table border="1px solid; #000">
		<thead>
			<tr>
				<th></th><th>Admins</th><th>Instructors</th><th>Assistants</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>View</td><td><input type="checkbox" name="admin[view]" value="1"/></td><td><input type="checkbox" name="instructor[view]" value="1"/></td><td><input type="checkbox" name="assistant[view]" value="1"/></td>
			</tr>
			<tr>
				<td>Edit</td><td><input type="checkbox" name="admin[edit]" value="1"/></td><td><input type="checkbox" name="instructor[edit]" value="1" /></td><td><input type="checkbox" name="assistant[edit]" value="1" /></td>
			</tr>	
			<tr>
				<td>Delete</td><td><input type="checkbox" name="admin[delete]" value="1" /></td><td><input type="checkbox" name="instructor[delete]" value="1" /></td><td><input type="checkbox" name="assistant[delete]" value="1" /></td>
			</tr>
		</tbody>
		</table>
		<input type="hidden" name="page_id" value="<?php echo $page_id ?>" />
		<br />
		<button type="submit">Submit</button>
		</form>	
		<?php
		} else {
			// User is not an admin.
			echo "<p>Please contact an administrator for assistance</p>";
		}
	exit();
	
	} else {
	// Records exist, just need to check that user has access:
	
			$line = NULL;
			while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
				if ($line['aclPageRecords_page_view'] == 1 && $line['aclPageRecords_user_role'] == $currentUser->get_role()) 
				{
					$access = true;
				}
			}
	
				// No record for this user role, for this page, for this access type. Deny access
				if (!$access){
					$session->setAlertMessage("You do not have access to that resource.");
					$session->setAlertColor("red");	
					if (isset($_SERVER['HTTP_REFERER'])){
					//	header("location:".$_SERVER['HTTP_REFERER']);
						echo "You do not have access to this resource." . $access;
					} else {
						echo "You do not have access to this resource." . $access;
					}
					exit;
				} 
			}
?>