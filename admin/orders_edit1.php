<?php 
 include("includes/init.php"); 
 include(CLASS_FOLDER . "/class_orders.php");
 
	if(!isset($_GET["id"])) {
		$session->setAlertMessage("Can not edit - the ID is invalid. Please try again.");
		$session->setAlertColor("yellow");
		header("location:" . $base_href . "/index.php");
		exit;
	}

	// load the orders		
	$orders_id = $_GET["id"];
	$orders = new Orders();
	
	if ($_GET["id"] ==0){
		// Change this to pass a parent value if creating a new record:
		//	$orders->set_customer_id($_GET['customer_id']);
	} else {
		$orders->get_by_id($orders_id);
	}
				
 ?>
 <!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
    	<title><?php   echo $appConfig["app_title"];  ?> | Orders Edit</title>
		<?php require(INCLUDES_FOLDER."head.php")?>
	</head>

  <body>				

<?php  include(INCLUDES_FOLDER ."navbar.php") ?>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
        <?php  include(INCLUDES_FOLDER . "system_messaging.php");  ?>

        <h1>Add/Edit Orders</h1>
        <p><span class="red">*</span> The red asterisk indicates all mandatory fields.</p>
        <div class="errorContainer">
          <p><strong>There are errors in your form submission. Please read below for details.</strong></p>
          <ol>
		            </ol>
		  <br>
        </div>

	<form id="form_orders" action="<?php  echo $actions_href . "/action_"; ?>orders_edit.php" method="post">
	<input type="hidden" name="orders_id" value="<?php  echo $orders->get_id();  ?>" />

         <table class="admin_table">
				<tr>
           			<td style="width:1px; white-space:nowrap;">Customer id: </td>
				
					<td><select id="orders_customer_id" name="orders_customer_id"  class="required" >
							<option value="">None</option>
							<?php  $query="SELECT * FROM xxxxxx ORDER BY `xxxxxx_id`";
								$dm = new DataManager();
								$result = $dm->queryRecords($query);
								while ($row = mysqli_fetch_array($result))
								{
									if ($orders->get_customer_id() == $row['xxxxxx_id']){
										echo "<option value='" . $row['xxxxxxx_id'] . "' selected>" . $row['xxxxxx_name'];
									} else {
										echo "<option value='" . $row['xxxxxxx_id'] . "'>" . $row['xxxxxxx_name'];
									}
								}
								 ?>
						</select>
					<span class='red'> *</span> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Production status: </td>

					<td><select id="orders_production_status" name="orders_production_status"  class="required" >
							<option value=""></option>
							<option value="Y" <?php  if ($orders->get_production_status() == "Y"){ echo " selected='selected' ";}  ?>>Y</option>
							<option value="N" <?php  if ($orders->get_production_status() == "N"){ echo " selected='selected' ";}  ?>>N</option>						
						</select>
					<span class='red'> *</span> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Condition: </td>

					<td><select id="orders_condition" name="orders_condition" >
							<option value=""></option>
							<option value="Y" <?php  if ($orders->get_condition() == "Y"){ echo " selected='selected' ";}  ?>>Y</option>
							<option value="N" <?php  if ($orders->get_condition() == "N"){ echo " selected='selected' ";}  ?>>N</option>						
						</select>
					</td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Special instructions: </td>
            		<td><input id="orders_special_instructions" name="orders_special_instructions" type="text"  value="<?php  echo $orders->get_special_instructions();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Received date: </td>
            		<td><input id="orders_received_date" name="orders_received_date" type="date"  value="<?php  echo $orders->get_received_date();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Promised date: </td>
            		<td><input id="orders_promised_date" name="orders_promised_date" type="date"  value="<?php  echo $orders->get_promised_date();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Frame: </td>
				
					<td><select id="orders_frame" name="orders_frame" >
							<option value="">None</option>
							<?php  $query="SELECT * FROM xxxxxx ORDER BY `xxxxxx_id`";
								$dm = new DataManager();
								$result = $dm->queryRecords($query);
								while ($row = mysqli_fetch_array($result))
								{
									if ($orders->get_frame() == $row['xxxxxx_id']){
										echo "<option value='" . $row['xxxxxxx_id'] . "' selected>" . $row['xxxxxx_name'];
									} else {
										echo "<option value='" . $row['xxxxxxx_id'] . "'>" . $row['xxxxxxx_name'];
									}
								}
								 ?>
						</select>
					</td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Mat 1: </td>
				
					<td><select id="orders_mat_1" name="orders_mat_1" >
							<option value="">None</option>
							<?php  $query="SELECT * FROM xxxxxx ORDER BY `xxxxxx_id`";
								$dm = new DataManager();
								$result = $dm->queryRecords($query);
								while ($row = mysqli_fetch_array($result))
								{
									if ($orders->get_mat_1() == $row['xxxxxx_id']){
										echo "<option value='" . $row['xxxxxxx_id'] . "' selected>" . $row['xxxxxx_name'];
									} else {
										echo "<option value='" . $row['xxxxxxx_id'] . "'>" . $row['xxxxxxx_name'];
									}
								}
								 ?>
						</select>
					</td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Mat 2: </td>
				
					<td><select id="orders_mat_2" name="orders_mat_2" >
							<option value="">None</option>
							<?php  $query="SELECT * FROM xxxxxx ORDER BY `xxxxxx_id`";
								$dm = new DataManager();
								$result = $dm->queryRecords($query);
								while ($row = mysqli_fetch_array($result))
								{
									if ($orders->get_mat_2() == $row['xxxxxx_id']){
										echo "<option value='" . $row['xxxxxxx_id'] . "' selected>" . $row['xxxxxx_name'];
									} else {
										echo "<option value='" . $row['xxxxxxx_id'] . "'>" . $row['xxxxxxx_name'];
									}
								}
								 ?>
						</select>
					</td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Mat 3: </td>
				
					<td><select id="orders_mat_3" name="orders_mat_3" >
							<option value="">None</option>
							<?php  $query="SELECT * FROM xxxxxx ORDER BY `xxxxxx_id`";
								$dm = new DataManager();
								$result = $dm->queryRecords($query);
								while ($row = mysqli_fetch_array($result))
								{
									if ($orders->get_mat_3() == $row['xxxxxx_id']){
										echo "<option value='" . $row['xxxxxxx_id'] . "' selected>" . $row['xxxxxx_name'];
									} else {
										echo "<option value='" . $row['xxxxxxx_id'] . "'>" . $row['xxxxxxx_name'];
									}
								}
								 ?>
						</select>
					</td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Liner: </td>
				
					<td><select id="orders_liner" name="orders_liner" >
							<option value="">None</option>
							<?php  $query="SELECT * FROM xxxxxx ORDER BY `xxxxxx_id`";
								$dm = new DataManager();
								$result = $dm->queryRecords($query);
								while ($row = mysqli_fetch_array($result))
								{
									if ($orders->get_liner() == $row['xxxxxx_id']){
										echo "<option value='" . $row['xxxxxxx_id'] . "' selected>" . $row['xxxxxx_name'];
									} else {
										echo "<option value='" . $row['xxxxxxx_id'] . "'>" . $row['xxxxxxx_name'];
									}
								}
								 ?>
						</select>
					</td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Glass: </td>
				
					<td><select id="orders_glass" name="orders_glass" >
							<option value="">None</option>
							<?php  $query="SELECT * FROM xxxxxx ORDER BY `xxxxxx_id`";
								$dm = new DataManager();
								$result = $dm->queryRecords($query);
								while ($row = mysqli_fetch_array($result))
								{
									if ($orders->get_glass() == $row['xxxxxx_id']){
										echo "<option value='" . $row['xxxxxxx_id'] . "' selected>" . $row['xxxxxx_name'];
									} else {
										echo "<option value='" . $row['xxxxxxx_id'] . "'>" . $row['xxxxxxx_name'];
									}
								}
								 ?>
						</select>
					</td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Backing: </td>
				
					<td><select id="orders_backing" name="orders_backing" >
							<option value="">None</option>
							<?php  $query="SELECT * FROM xxxxxx ORDER BY `xxxxxx_id`";
								$dm = new DataManager();
								$result = $dm->queryRecords($query);
								while ($row = mysqli_fetch_array($result))
								{
									if ($orders->get_backing() == $row['xxxxxx_id']){
										echo "<option value='" . $row['xxxxxxx_id'] . "' selected>" . $row['xxxxxx_name'];
									} else {
										echo "<option value='" . $row['xxxxxxx_id'] . "'>" . $row['xxxxxxx_name'];
									}
								}
								 ?>
						</select>
					</td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Mount material: </td>
				
					<td><select id="orders_mount_material" name="orders_mount_material" >
							<option value="">None</option>
							<?php  $query="SELECT * FROM xxxxxx ORDER BY `xxxxxx_id`";
								$dm = new DataManager();
								$result = $dm->queryRecords($query);
								while ($row = mysqli_fetch_array($result))
								{
									if ($orders->get_mount_material() == $row['xxxxxx_id']){
										echo "<option value='" . $row['xxxxxxx_id'] . "' selected>" . $row['xxxxxx_name'];
									} else {
										echo "<option value='" . $row['xxxxxxx_id'] . "'>" . $row['xxxxxxx_name'];
									}
								}
								 ?>
						</select>
					</td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Conservation: </td>
            		<td><input id="orders_conservation" name="orders_conservation" type="text"  value="<?php  echo $orders->get_conservation();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Fitting labour: </td>
            		<td><input id="orders_fitting_labour" name="orders_fitting_labour" type="number" step="any" value="<?php  echo $orders->get_fitting_labour();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Mat labour: </td>
            		<td><input id="orders_mat_labour" name="orders_mat_labour" type="number" step="any" value="<?php  echo $orders->get_mat_labour();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Mount labour: </td>
            		<td><input id="orders_mount_labour" name="orders_mount_labour" type="number" step="any" value="<?php  echo $orders->get_mount_labour();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Special labour: </td>
            		<td><input id="orders_special_labour" name="orders_special_labour" type="number" step="any" value="<?php  echo $orders->get_special_labour();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Frame w: </td>
            		<td><input id="orders_frame_w" name="orders_frame_w" type="number" step="any" value="<?php  echo $orders->get_frame_w();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Frame h: </td>
            		<td><input id="orders_frame_h" name="orders_frame_h" type="number" step="any" value="<?php  echo $orders->get_frame_h();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Mat outer w: </td>
            		<td><input id="orders_mat_outer_w" name="orders_mat_outer_w" type="number" step="any" value="<?php  echo $orders->get_mat_outer_w();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Mat outer h: </td>
            		<td><input id="orders_mat_outer_h" name="orders_mat_outer_h" type="number" step="any" value="<?php  echo $orders->get_mat_outer_h();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Mat inner w: </td>
            		<td><input id="orders_mat_inner_w" name="orders_mat_inner_w" type="number" step="any" value="<?php  echo $orders->get_mat_inner_w();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Mat inner h: </td>
            		<td><input id="orders_mat_inner_h" name="orders_mat_inner_h" type="number" step="any" value="<?php  echo $orders->get_mat_inner_h();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Fillet w: </td>
            		<td><input id="orders_fillet_w" name="orders_fillet_w" type="number" step="any" value="<?php  echo $orders->get_fillet_w();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Fillet h: </td>
            		<td><input id="orders_fillet_h" name="orders_fillet_h" type="number" step="any" value="<?php  echo $orders->get_fillet_h();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Rabbet size: </td>
            		<td><input id="orders_rabbet_size" name="orders_rabbet_size" type="number" step="any" value="<?php  echo $orders->get_rabbet_size();  ?>" style="width:90%" /> </td>
				</tr>
  		
		</table>
          <br />
          <input type="submit" value="Add/Update Orders" />&nbsp;&nbsp;
          <input type="button" value="Cancel" onClick="window.location ='<?php echo $_SERVER["HTTP_REFERER"];?>'" />
        </form>
		<br>
		
        <?php  if($orders->get_id() > 0){  ?>
          <p><em>Last updated: <?php  $orders->get_last_updated();  ?> By: <?php  echo $orders->get_last_updated_user();  ?></em></p>
        <?php  }  ?>			
	
      </div>
    </div> 

</div><!-- /container -->

	<footer>
      <div class="container">
        <?php  include(INCLUDES_FOLDER . "footer.php");  ?>
      </div>
    </footer>
	
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/js/jquery.js"></script>
	<script type="text/javascript" src="/js/jquery.metadata.js"></script>
	<script type="text/javascript" src="/js/jquery.validate.js"></script>
	<script type="text/javascript" src="/js/jquery-ui-custom.js"></script>
	<script type="text/javascript" src="/js/jquery.mask.js"></script>
	
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<script type="text/javascript">

// Validation:
$(document).ready(function() {
	var rules = {
		    	rules: {
					orders_customer_id: {
						required: true
					},orders_production_status: {
						required: true
					},				
				}
		    };
		
	    var validationObj = $.extend (rules, Application.validationRules);
		$('#form_orders').validate(validationObj);
});		
// Include any masks here:
		 //   $("#student_tel").mask("(999) 999-9999");		
  </script>		
  </body>
</html>