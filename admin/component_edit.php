<?php 
 include("includes/init.php"); 
 include(CLASS_FOLDER . "/class_component.php");
 
	if(!isset($_GET["id"])) {
		$session->setAlertMessage("Can not edit - the ID is invalid. Please try again.");
		$session->setAlertColor("yellow");
		header("location:" . $base_href . "/index.php");
		exit;
	}

	// load the component		
	$component_id = $_GET["id"];
	$component = new Component();
	
	if ($_GET["id"] ==0){
		// Change this to pass a parent value if creating a new record:
		//	$component->set_customer_id($_GET['customer_id']);
	} else {
		$component->get_by_id($component_id);
	}
				
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title><?php   echo $appConfig["app_title"];  ?> | Component Edit</title>

    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="./css/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <link href="./css/font-awesome.css" rel="stylesheet" type="text/css">        
    <link href="./css/styles.css" rel="stylesheet">

  </head>

  <body>

<?php  include(INCLUDES_FOLDER ."nav_bar.php") ?>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
        <?php  include(INCLUDES_FOLDER . "system_messaging.php");  ?>

        <h1><?php if ($_GET["id"] ==0){ ?> Add Component<?php  } else { ?> Edit Component<?php  } ?></h1>
        <p><span class="red">*</span> The red asterisk indicates all mandatory fields.</p>
        <div class="errorContainer">
          <p><strong>There are errors in your form submission. Please read below for details.</strong></p>
          <ol>
		            </ol>
		  <br>
        </div>

	<form id="form_component" action="<?php  echo ACTIONS_URL; ?>action_component_edit.php" method="post">
	<input type="hidden" name="component_id" value="<?php  echo $component->get_id();  ?>" />

         <table class="admin_table">
				<tr>
           			<td style="width:1px; white-space:nowrap;">Supplier id: </td>
				
					<td><select id="component_supplier_id" name="component_supplier_id" >
							<option value="">None</option>
							<?php  $query="SELECT * FROM xxxxxx ORDER BY `xxxxxx_id`";
								$dm = new DataManager();
								$result = $dm->queryRecords($query);
								while ($row = mysqli_fetch_array($result))
								{
									if ($component->get_supplier_id() == $row['xxxxxx_id']){
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
           			<td style="width:1px; white-space:nowrap;">Item number: </td>
            		<td><input id="component_item_number" name="component_item_number" type="text"  value="<?php  echo $component->get_item_number();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Barcode: </td>
            		<td><input id="component_barcode" name="component_barcode" type="text"  value="<?php  echo $component->get_barcode();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Url: </td>
            		<td><input id="component_url" name="component_url" type="text"  value="<?php  echo $component->get_url();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Price: </td>
            		<td><input id="component_price" name="component_price" type="number" step="any" value="<?php  echo $component->get_price();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Cost: </td>
            		<td><input id="component_cost" name="component_cost" type="number" step="any" value="<?php  echo $component->get_cost();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Inventory: </td>
            		<td><input id="component_inventory" name="component_inventory" type="number" step="any" value="<?php  echo $component->get_inventory();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Type: </td>
            		<td><input id="component_type" name="component_type" type="number" step="any" value="<?php  echo $component->get_type();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Colour: </td>
            		<td><input id="component_colour" name="component_colour" type="color"  value="<?php  echo $component->get_colour();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Style: </td>
            		<td><input id="component_style" name="component_style" type="text"  value="<?php  echo $component->get_style();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Width: </td>
            		<td><input id="component_width" name="component_width" type="text"  value="<?php  echo $component->get_width();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Description: </td>
            		<td><input id="component_description" name="component_description" type="text"  value="<?php  echo $component->get_description();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Active: </td>

					<td><select id="is_active" name="is_active" >
							<option value=""></option>
							<option value="Y" <?php  if ($component->get_active() == "Y"){ echo " selected='selected' ";}  ?>>Y</option>
							<option value="N" <?php  if ($component->get_active() == "N"){ echo " selected='selected' ";}  ?>>N</option>						
						</select>
					</td>
				</tr>
  		
		</table>
          <br />
          <input type="submit" value="Add/Update Component" />&nbsp;&nbsp;
          <input type="button" value="Cancel" onClick="window.location ='<?php echo $_SERVER["HTTP_REFERER"];?>'" />
        </form>
		<br>
		
        <?php  if($component->get_id() > 0){  ?>
          <p><em>Last updated: <?php  echo $component->get_last_updated();  ?> by <?php  echo $component->get_last_updated_user();  ?></em></p>
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
									
				}
		    };
		
	    var validationObj = $.extend (rules, Application.validationRules);
		$('#form_component').validate(validationObj);
});		
// Include any masks here:
		 //   $("#student_tel").mask("(999) 999-9999");		
  </script>		
  </body>
</html>