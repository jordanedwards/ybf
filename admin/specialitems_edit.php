<?php 
 include("includes/init.php"); 
 include(CLASS_FOLDER . "/class_specialitems.php");
 
	if(!isset($_GET["id"])) {
		$session->setAlertMessage("Can not edit - the ID is invalid. Please try again.");
		$session->setAlertColor("yellow");
		header("location:" . $base_href . "/index.php");
		exit;
	}

	// load the specialitems		
	$specialitems_id = $_GET["id"];
	$specialitems = new Specialitems();
	
	if ($_GET["id"] ==0){
		// Change this to pass a parent value if creating a new record:
		//	$specialitems->set_customer_id($_GET['customer_id']);
	} else {
		$specialitems->get_by_id($specialitems_id);
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
    <title><?php   echo $appConfig["app_title"];  ?> | Specialitems Edit</title>

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

        <h1><?php if ($_GET["id"] ==0){ ?> Add Specialitems<?php  } else { ?> Edit Specialitems<?php  } ?></h1>
        <p><span class="red">*</span> The red asterisk indicates all mandatory fields.</p>
        <div class="errorContainer">
          <p><strong>There are errors in your form submission. Please read below for details.</strong></p>
          <ol>
		            </ol>
		  <br>
        </div>

	<form id="form_specialitems" action="<?php  echo ACTIONS_URL; ?>action_specialitems_edit.php" method="post">
	<input type="hidden" name="specialitems_id" value="<?php  echo $specialitems->get_id();  ?>" />

         <table class="admin_table">
				<tr>
           			<td style="width:1px; white-space:nowrap;">Name: </td>
            		<td><input id="specialItems_name" name="specialItems_name" type="text"  value="<?php  echo $specialitems->get_name();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Price: </td>
            		<td><input id="specialItems_price" name="specialItems_price" type="text"  value="<?php  echo $specialitems->get_price();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Use pricegrid: </td>

					<td><select id="specialItems_use_pricegrid" name="specialItems_use_pricegrid" >
							<option value=""></option>
							<option value="Y" <?php  if ($specialitems->get_use_pricegrid() == "Y"){ echo " selected='selected' ";}  ?>>Y</option>
							<option value="N" <?php  if ($specialitems->get_use_pricegrid() == "N"){ echo " selected='selected' ";}  ?>>N</option>						
						</select>
					</td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Category: </td>
				
					<td><select id="specialItems_category" name="specialItems_category" >
							<option value="">None</option>
							<?php  $query="SELECT * FROM xxxxxx ORDER BY `xxxxxx_id`";
								$dm = new DataManager();
								$result = $dm->queryRecords($query);
								while ($row = mysqli_fetch_array($result))
								{
									if ($specialitems->get_category() == $row['xxxxxx_id']){
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
           			<td style="width:1px; white-space:nowrap;">Active: </td>

					<td><select id="is_active" name="is_active" >
							<option value=""></option>
							<option value="Y" <?php  if ($specialitems->get_active() == "Y"){ echo " selected='selected' ";}  ?>>Y</option>
							<option value="N" <?php  if ($specialitems->get_active() == "N"){ echo " selected='selected' ";}  ?>>N</option>						
						</select>
					</td>
				</tr>
  		
		</table>
          <br />
          <input type="submit" value="Add/Update Specialitems" />&nbsp;&nbsp;
          <input type="button" value="Cancel" onClick="window.location ='<?php echo $_SERVER["HTTP_REFERER"];?>'" />
        </form>
		<br>
		
        <?php  if($specialitems->get_id() > 0){  ?>
          <p><em>Last updated: <?php  echo $specialitems->get_last_updated();  ?> by <?php  echo $specialitems->get_last_updated_user();  ?></em></p>
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
		$('#form_specialitems').validate(validationObj);
});		
// Include any masks here:
		 //   $("#student_tel").mask("(999) 999-9999");		
  </script>		
  </body>
</html>