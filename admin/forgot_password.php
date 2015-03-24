<?php include($_SERVER['DOCUMENT_ROOT'] . "/admin/includes/init.php"); ?>
<?php
	// verify that the admin user is logged in
	if($session->get_user_id() != "") {
		header("location: dashboard.php");
		exit;
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

    <title><?php echo $appConfig["app_title"]; ?> | Login</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">    
    
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link href="/site/css/bootstrap-responsive.min.css" rel="stylesheet">
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="/site/css/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">        
    
    <link href="/site/css/ui-lightness/jquery-ui-1.10.0.custom.min.css" rel="stylesheet">
    
    <link href="/site/css/base-admin-3.css" rel="stylesheet">
    <link href="/site/css/base-admin-3-responsive.css" rel="stylesheet">
    
    <link href="/site/css/pages/dashboard.css" rel="stylesheet">   

    <link href="/site/css/styles.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<style>
tr:nth-child(even) {
background: initial;
}
body {
padding-top: 10px;
}
</style>
  </head>
  <body>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" style="padding-left:0; padding-right:0;  ">
		<img src="../images/logo_long.png" class="img-responsive" style="width:100%">
		<!--<img src="../images/store-inside.gif" alt="You've Been Framed" width="1960" height="280" class="img-responsive" style="margin:0px; padding-top:0px; padding-bottom: 0px;">   -->
	</div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-12">
        <?php  include($includes_folder . "/system_messaging.php");  ?>
		
 <p>Enter the email address associated with your account. If your email address is found in the system we will send an email to your account with intructions on how to reset your password.</p>
        <form id="form1" action="actions/action_forgot_password_admin.php" method="post">
        <table class="table">
          <tr><td>Email:</td><td><input id="email" name="email" type="text" size="50" /></td></tr>
          <tr><td></td><td><input type="submit" value="Reset Password" /></td></tr>
          </table>
        </form>
				<a href="/">&laquo; Back</a>
        <br />
        </div>
      </div>

      <hr>


    </div> <!-- /container -->
<?php include("includes/admin_footer.php")?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  </body>
</html>