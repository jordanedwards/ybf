<?php
// Database Configuration File

	require(INCLUDES_FOLDER .'config_app.php');
	
	if ($appConfig["environment"] == 'development'){
		$dbConfig['dbhost'] = "localhost";		
		$dbConfig['dbuser'] = "orchardc_ybf";
		$dbConfig['dbpass'] = "BuRSyeuOaQ4*";		
		$dbConfig['dbname'] = "orchardc_ybf";		
	}elseif ($appConfig["environment"] == 'local_development'){
		$dbConfig['dbhost'] = "localhost";		
		$dbConfig['dbuser'] = "root";
		$dbConfig['dbpass'] = "";		
		$dbConfig['dbname'] = "ybf";
	}else{
		// Production		
		$dbConfig['dbhost'] = "localhost";		
		$dbConfig['dbuser'] = "orchardc_ybf";
		$dbConfig['dbpass'] = "BuRSyeuOaQ4*";		
		$dbConfig['dbname'] = "orchardc_ybf";	
	}