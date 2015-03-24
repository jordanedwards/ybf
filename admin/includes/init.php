<?php
	session_start();
	// Application Configuration

	date_default_timezone_set("America/Vancouver");	
	$appConfig['app_title'] = "You've Been Framed";
	
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	ini_set('display_errors',1);
	ini_set('log_errors',1);
	ini_set('log_errors_max_len',0);
	ini_set('error_log','./error_log.txt');
	
	// Discover which environment we are in:
		
	if($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == '127.0.0.1'):
		ini_set('display_errors', 'on');
		error_reporting(E_ALL & ~E_NOTICE);
		$appConfig["environment"] = "local_development";
		//define("BASE_FOLDER",$_SERVER['DOCUMENT_ROOT']);
		//define("BASE_URL","");
		define("BASE_FOLDER",$_SERVER['DOCUMENT_ROOT'] . "/admin");
		define("BASE_URL","/admin");		
	else:
		$appConfig["environment"] = "production";
		ini_set('display_errors', 'on');
		error_reporting(E_ERROR | E_WARNING  | E_PARSE);
		define("BASE_FOLDER",$_SERVER['DOCUMENT_ROOT'] . "/admin");
		define("BASE_URL","/admin");
	endif;
	
// Sets the paths for includes for these folders. To access the URL itself, use $json_project_settings array

	define("INCLUDES_FOLDER", BASE_FOLDER . "/includes/");
	define("CLASS_FOLDER", BASE_FOLDER . "/classes/");
	define("ACTIONS_FOLDER", BASE_FOLDER . "/actions/");
		
	define("INCLUDES_URL",BASE_URL . "/includes/");
	define("CLASS_URL",BASE_URL . "/classes/");
	define("ACTIONS_URL",BASE_URL . "/actions/");

	//require_once(INCLUDES_FOLDER . 'config_app.php');
	require_once(CLASS_FOLDER . 'class_session_manager.php');
	require_once(CLASS_FOLDER . 'class_functions.php');
	require_once(CLASS_FOLDER . 'class_data_manager.php');
	
	$session = new SessionManager();
	
	// Get settings:
	$dm = new DataManager(); 
	$strSQL = "SELECT * FROM settings";						

	$result = $dm->queryRecords($strSQL);	
	while($row = mysqli_fetch_assoc($result)):
		$const_name = strtoupper($row['settings_name']);
		define($const_name,$row['settings_value']);
	endwhile;									
		
	$alert_msg = $session->getAlertMessage();
	$alert_color = $session->getAlertColor();
	
	$admin_email = "jordan@orchardcity.ca";
	
// ****************************************** USER NOT LOGGED IN **********************************	
if($session->get_user_id() == ""):
	
	// ************************************** LIST OF PUBLIC ACCESS PAGES *****************************
	// Add any public access pages to the array:
	$publicPageArray = array(
	BASE_URL . "/index.php",
	BASE_URL . "/actions/action_login_user.php",
	BASE_URL . "/forgot_password.php",
	BASE_URL . "/actions/action_forgot_password_admin.php"
	);
	
	if (!in_array($_SERVER['PHP_SELF'], $publicPageArray)):
		
			$current_adr = str_replace("?","*",$_SERVER["REQUEST_URI"]);
			$current_adr = str_replace("&","~",$current_adr);
			
	// ****************************************** SET TO YOUR LOGIN PAGE **********************************		
			header("location: " . BASE_URL . "/index.php?redirect=".$current_adr );
			exit;
	endif;
endif;