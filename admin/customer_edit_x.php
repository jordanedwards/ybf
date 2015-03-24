<?php 
 include("includes/init.php"); 
 include(CLASS_FOLDER . "/class_customer.php");
 
	if(!isset($_GET["id"])) {
		$session->setAlertMessage("Can not edit - the ID is invalid. Please try again.");
		$session->setAlertColor("yellow");
		header("location:" . $base_href . "/index.php");
		exit;
	}

	// load the customer		
	$customer_id = $_GET["id"];
	$customer = new Customer();
	
	if ($_GET["id"] ==0){
		// Change this to pass a parent value if creating a new record:
		//	$customer->set_customer_id($_GET['customer_id']);
	} else {
		$customer->get_by_id($customer_id);
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
    <title><?php   echo $appConfig["app_title"];  ?> | Customer Edit</title>

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

        <h1>Add/Edit Customer</h1>
        <p><span class="red">*</span> The red asterisk indicates all mandatory fields.</p>
        <div class="errorContainer">
          <p><strong>There are errors in your form submission. Please read below for details.</strong></p>
          <ol>
		            </ol>
		  <br>
        </div>

	<form id="form_customer" action="<?php  echo ACTIONS_URL; ?>action_customer_edit.php" method="post">
	<input type="hidden" name="customer_id" value="<?php  echo $customer->get_id();  ?>" />

         <table class="admin_table">
				<tr>
           			<td style="width:1px; white-space:nowrap;">First name: </td>
            		<td><input id="customer_first_name" name="customer_first_name" type="text"  value="<?php  echo $customer->get_first_name();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Last name: </td>
            		<td><input id="customer_last_name" name="customer_last_name" type="text"  value="<?php  echo $customer->get_last_name();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Email: </td>
            		<td><input id="customer_email" name="customer_email" type="email"  value="<?php  echo $customer->get_email();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Password: </td>
            		<td><input id="customer_password" name="customer_password" type="password"  value="<?php  echo $customer->get_password();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Tel: </td>
					<td><input id="customer_tel" name="customer_tel" type="tel" value="<?php  echo $customer->get_tel();  ?>"  style="width:90%" /></td>
<script type="text/javascript">
$(document).ready(function() {
	$("#customer_tel").mask("(999) 999-9999"); 
});	
</script>	
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Address: </td>
            		<td><input id="customer_address" name="customer_address" type="text"  value="<?php  echo $customer->get_address();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">City: </td>
            		<td><input id="customer_city" name="customer_city" type="text"  value="<?php  echo $customer->get_city();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Postal: </td>
            		<td><input id="customer_postal" name="customer_postal" type="text"  value="<?php  echo $customer->get_postal();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Country: </td>
            		<td><input id="customer_country" name="customer_country" type="text"  value="<?php  echo $customer->get_country();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Active: </td>

					<td><select id="is_active" name="is_active" >
							<option value=""></option>
							<option value="Y" <?php  if ($customer->get_active() == "Y"){ echo " selected='selected' ";}  ?>>Y</option>
							<option value="N" <?php  if ($customer->get_active() == "N"){ echo " selected='selected' ";}  ?>>N</option>						
						</select>
					</td>
				</tr>
  		
		</table>
          <br />
          <input type="submit" value="Add/Update Customer" />&nbsp;&nbsp;
          <input type="button" value="Cancel" onClick="window.location ='<?php echo $_SERVER["HTTP_REFERER"];?>'" />
        </form>
		<br>
		
        <?php  if($customer->get_id() > 0){  ?>
          <p><em>Last updated: <?php  echo $customer->get_last_updated();  ?> by <?php  echo $customer->get_last_updated_user();  ?></em></p>
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
		$('#form_customer').validate(validationObj);
});		
// Include any masks here:
		 //   $("#student_tel").mask("(999) 999-9999");		
  </script>		
  </body>
</html>