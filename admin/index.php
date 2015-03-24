<?php // include necessary libraries
 require($_SERVER['DOCUMENT_ROOT'] . "/admin/includes/init.php"); 
	// verify that the admin user is logged in
	if($session->get_user_id() != "") {
	// ****************************************** SET TO YOUR HOME PAGE **********************************
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


		<?php require(INCLUDES_FOLDER."head.php")?>


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
    <div class="jumbotron">
		<img src="../images/logo_long.png" class="img-responsive">
		<!--<img src="../images/store-inside.gif" alt="You've Been Framed" width="1960" height="280" class="img-responsive" style="margin:0px; padding-top:0px; padding-bottom: 0px;">   -->
	</div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-12">
        <?php  include(INCLUDES_FOLDER . "system_messaging.php");  ?>
		
          <h2>Please Login</h2>
        <form id="form1" action="actions/action_login_user.php" method="post">
        	<table class="table">
          <tr><td>Email:</td><td><input id="email" name="email" type="text" size="30" /></td></tr>
          <tr><td>Password:</td><td><input id="password" name="password" type="password" /></td></tr>
		  <input type="hidden" name="redirect" id="redirect" value="<?php //echo $_GET["redirect"]; ?>">
          <tr><td></td><td><input type="submit" value="Login" /></td></tr>
          </table>
        </form>
        <br />
      	<a href="forgot_password.php">Reset Your Password</a>
        </div>
      </div>

      <hr>


    </div> <!-- /container -->
<?php include(INCLUDES_FOLDER . "footer.php")?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  </body>
</html>