<?php
//Functions

function consoleLog($val){
	// Don't show anything if IE - Stupid IE breaks
	if (strpos($_SERVER['HTTP_USER_AGENT'],"MSIE",0) == 0){
    $numargs = func_num_args();
    
	if ($numargs >= 2) {
		$val = "";
	    $arg_list = func_get_args();
    	for ($i = 0; $i < $numargs; $i++) {
        	$val .= $arg_list[$i] . " / ";
    	}
	}
		print "<script>console.log('" . mysql_real_escape_string($val) . "')</script>";
	}
}

function addToLog($val){
	require_once($_SERVER['DOCUMENT_ROOT'] . '/admin/classes/class_data_manager.php');
	$dm = new DataManager();
	global $session;
	$user_id = $session->get_user_id();
	
	// What kind of $val is this? string, array, or object:
	ob_start();
	if (is_object($val)){
		$val = var_dump($val);
	} elseif(is_array($val)){
		$val = var_dump($val);			
	} else {
		// Just a string
		echo mysqli_real_escape_string($dm->connection, $val);
	}
	$result = ob_get_contents();
	ob_end_clean();

	$strSQL = "INSERT INTO log (log_user, log_val) VALUES (" . $user_id . ", '" . $result . "')";				
	$result = $dm->updateRecords($strSQL);

}

function escaped_var_from_post($varname){
	$dm = new DataManager();
	if (isset($_REQUEST[$varname])){
		$$varname = mysqli_real_escape_string($dm->connection, $_REQUEST[$varname]);
	}else{
		$$varname = "";
	}
		return $$varname;
}


class Functions {
	function __construct() {
	
	}

public function convertImperial($decValue){
	$whole_number = floor($decValue);
	$decValue = $decValue - $whole_number;
	
	$decValue = round($decValue,5);
	switch($decValue):
	case 0.03125:
	  return '1/32';
	  break;
	case 0.0625:
	  return '1/16';
	  break;
	case 0.09375:
	  return '3/32';
	  break;
	case 0.125:
	  return '1/8';
	  break;
	case 0.15625:
	  return '5/32';
	  break;
	case 0.1875:
	  return '3/16';
	  break;
	case 0.21875:
	  return '7/32';
	  break;
	case 0.25:
	  return '1/4';
	  break;
	case 0.28125:
	  return '9/32';
	  break;
	case 0.3125:
	  return '5/16';
	  break;
	case 0.34375:
	  return '11/32';
	  break;
	case 0.375:
	  return '3/8';
	  break;
	case 0.40625:
	  return '13/32';
	  break;
	case 0.4375:
	  return '7/16';
	  break;
	case 0.46875:
	  return '15/32';
	  break;
	case 0.5:
	  return '1/2';
	  break;
	case 0.53125:
	  return '17/32';
	  break;
	case 0.5625:
	  return '9/16';
	  break;
	case 0.59375:
	  return '19/32';
	  break;
	case 0.625:
	  return '5/8';
	  break;
	case 0.65625:
	  return '21/32';
	  break;
	case 0.6875:
	  return '11/16';
	  break;
	case 0.71875:
	  return '23/32';
	  break;
	case 0.75:
	  return '6/8';
	  break;
	case 0.78125:
	  return '25/32';
	  break;
	case 0.8125:
	  return '13/16';
	  break;
	case 0.84375:
	  return '27/32';
	  break;
	case 0.875:
	  return '7/8';
	  break;
	case 0.90625:
	  return '29/32';
	  break;
	case 0.9375:
	  return '15/16';
	  break;
	case 0.96875:
	  return '31/32';
	  break;	
	endswitch;
}

public function convertMetric($impValue){
	switch($impValue):
	case "1/32":
	   return '0.03125';
	   break;
	case "1/16":
	   return '0.0625';
	   break;
	case "3/32":
	   return '0.09375';
	   break;
	case "1/8":
	   return '0.125';
	   break;
	case "5/32":
	   return '0.15625';
	   break;
	case "3/16":
	   return '0.1875';
	   break;
	case "7/32":
	   return '0.21875';
	   break;
	case "1/4":
	   return '0.25';
	   break;
	case "9/32":
	   return '0.28125';
	   break;
	case "5/16":
	   return '0.3125';
	   break;
	case "11/32":
	   return '0.34375';
	   break;
	case "3/8":
	   return '0.375';
	   break;
	case "13/32":
	   return '0.40625';
	   break;
	case "7/16":
	   return '0.4375';
	   break;
	case "15/32":
	   return '0.46875';
	   break;
	case "1/2":
	   return '0.5';
	   break;
	case "17/32":
	   return '0.53125';
	   break;
	case "9/16":
	   return '0.5625';
	   break;
	case "19/32":
	   return '0.59375';
	   break;
	case "5/8":
	   return '0.625';
	   break;
	case "21/32":
	   return '0.65625';
	   break;
	case "11/16":
	   return '0.6875';
	   break;
	case "23/32":
	   return '0.71875';
	   break;
	case "6/8":
	   return '0.75';
	   break;
	case "25/32":
	   return '0.78125';
	   break;
	case "13/16":
	   return '0.8125';
	   break;
	case "27/32":
	   return '0.84375';
	   break;
	case "7/8":
	   return '0.875';
	   break;
	case "29/32":
	   return '0.90625';
	   break;
	case "15/16":
	   return '0.9375';
	   break;
	case "31/32":
	   return '0.96875';
	   break;
	default:
		return "not found";
		break;
	endswitch;
}

	public function get_whole_int($var = 0) { 
		$n = floor($var);
		return $n;
	}

	public function get_fraction($var = 0) { 
		$n = floor($var);
		$remainder = $var - $n;
		$converted_remainder = $this->convertImperial($remainder);
		return $converted_remainder;
	}
}
?>
