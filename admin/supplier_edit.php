<?php 
 include("includes/init.php"); 
 include(CLASS_FOLDER . "/class_supplier.php");
 
	if(!isset($_GET["id"])) {
		$session->setAlertMessage("Can not edit - the ID is invalid. Please try again.");
		$session->setAlertColor("yellow");
		header("location:" . $base_href . "/index.php");
		exit;
	}

	// load the supplier		
	$supplier_id = $_GET["id"];
	$supplier = new Supplier();
	
	if ($_GET["id"] ==0){
		// Change this to pass a parent value if creating a new record:
		//	$supplier->set_customer_id($_GET['customer_id']);
	} else {
		$supplier->get_by_id($supplier_id);
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
    <title><?php   echo $appConfig["app_title"];  ?> | Supplier Edit</title>

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

        <h1>Add/Edit Supplier</h1>
        <p><span class="red">*</span> The red asterisk indicates all mandatory fields.</p>
        <div class="errorContainer">
          <p><strong>There are errors in your form submission. Please read below for details.</strong></p>
          <ol>
		            </ol>
		  <br>
        </div>

	<form id="form_supplier" action="<?php  echo $actions_href . "/action_"; ?>supplier_edit.php" method="post">
	<input type="hidden" name="supplier_id" value="<?php  echo $supplier->get_id();  ?>" />

         <table class="admin_table">
				<tr>
           			<td style="width:1px; white-space:nowrap;">Name: </td>
            		<td><input id="supplier_name" name="supplier_name" type="text"  value="<?php  echo $supplier->get_name();  ?>" style="width:90%"  class="required" /> <span class='red'>*</span> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Contact name: </td>
            		<td><input id="supplier_contact_name" name="supplier_contact_name" type="text"  value="<?php  echo $supplier->get_contact_name();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Phone: </td>
					<td><input id="supplier_phone" name="supplier_phone" type="tel" value="<?php  echo $supplier->get_phone();  ?>"  style="width:90%" /></td>
<script type="text/javascript">
$(document).ready(function() {
	$("#supplier_phone").mask("(999) 999-9999"); 
});	
</script>	
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Email: </td>
            		<td><input id="supplier_email" name="supplier_email" type="email"  value="<?php  echo $supplier->get_email();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Account number: </td>
            		<td><input id="supplier_account_number" name="supplier_account_number" type="text"  value="<?php  echo $supplier->get_account_number();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Terms: </td>
            		<td><input id="supplier_terms" name="supplier_terms" type="text"  value="<?php  echo $supplier->get_terms();  ?>" style="width:90%" /> </td>
				</tr>
  		
		</table>
          <br />
          <input type="submit" value="Add/Update Supplier" />&nbsp;&nbsp;
          <input type="button" value="Cancel" onClick="window.location ='<?php echo $_SERVER["HTTP_REFERER"];?>'" />
        </form>
		<br>
		
        <?php  if($supplier->get_id() > 0){  ?>
          <p><em>Last updated: <?php  $supplier->get_last_updated();  ?> By: <?php  echo $supplier->get_last_updated_user();  ?></em></p>
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
					supplier_name: {
						minlength: 2, required: true
					},				
				}
		    };
		
	    var validationObj = $.extend (rules, Application.validationRules);
		$('#form_supplier').validate(validationObj);
});		
// Include any masks here:
		 //   $("#student_tel").mask("(999) 999-9999");		
  </script>		
  </body>
</html>