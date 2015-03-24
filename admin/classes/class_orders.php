<?php 
 class Orders extends Functions{
 
		private $id;
		private $customer_id;
 		private $production_status;
 		private $condition;
 		private $special_instructions;
 		private $received_date;
 		private $promised_date;
 		private $frame;
 		private $frame_w;
 		private $frame_h;			
 		private $outer_mat;
 		private $inner_mat;
 		private $fillet;
 		private $liner;
 		private $glass;
 		private $glass_w;
 		private $glass_h;		
 		private $backing;
 		private $mount;
 		private $fitting_labour;
 		private $mat_labour;
 		private $mount_labour;
 		private $special_labour;
 		private $outer_mat_t;
 		private $outer_mat_b;
 		private $outer_mat_l;
 		private $outer_mat_r;		
 		private $inner_mat_w;
 		private $inner_mat_h;
 		private $fillet_w;
 		private $fillet_h;
 		private $rabbet_size;
 		private $frame_done;
 		private $outer_mat_done;
 		private $inner_mat_done;
 		private $fillet_done;
 		private $mount_done;
 		private $glass_done;	
		private $art_location;											
 		private $date_created;
 		private $last_updated;
 		private $last_updated_user;
 		
	function __construct() {
	
	}
				public function get_id() { return $this->id;}
		 		public function set_id($value) {$this->id=$value;}
 
		 		public function get_customer_id() { return $this->customer_id;}
		 		public function set_customer_id($value) {$this->customer_id=$value;}
 
		 		public function get_production_status() { return $this->production_status;}
		 		public function set_production_status($value) {$this->production_status=$value;}
 
		 		public function get_condition() { return $this->condition;}
		 		public function set_condition($value) {$this->condition=$value;}
 
		 		public function get_special_instructions() { return $this->special_instructions;}
		 		public function set_special_instructions($value) {$this->special_instructions=$value;}
 
		 		public function get_received_date() { return $this->received_date;}
		 		public function set_received_date($value) {$this->received_date=$value;}
 
		 		public function get_promised_date() { return $this->promised_date;}
		 		public function set_promised_date($value) {$this->promised_date=$value;}
 
		 		public function get_frame($var = "",$floor=false) { 
					switch ($var):
						case "":
							return $this->frame;
						break;
						case "id":
							return $this->frame;
						break;						
						case "done":
							return $this->frame_done;
						break;
						case "height":
							return ($floor ? floor($this->frame_h) : $this->frame_h);
						break;
						case "width":
							return ($floor ? floor($this->frame_w) : $this->frame_w);
						break;
						case "height-fraction":
							$n = floor($this->frame_h);
							$remainder = $this->frame_h - $n;
							$converted_remainder = $this->convertImperial($remainder);
							return $converted_remainder;
						break;		
						case "width-fraction":
							$n = floor($this->frame_w);
							$remainder = $this->frame_w - $n;
							$converted_remainder = $this->convertImperial($remainder);
							return $converted_remainder;
						break;														
					endswitch;
				}
		 		public function set_frame($value) {$this->frame=$value;}
				
		 		public function get_outer_mat($var = "",$floor=false) { 
					switch ($var):
						case "":
							return $this->outer_mat;
						break;
						case "id":
							return $this->outer_mat;
						break;						
						case "done":
							return $this->outer_mat_done;
						break;
						case "top":
							return ($floor ? floor($this->outer_mat_t) : $this->outer_mat_t);
						break;
						case "bottom":
							return ($floor ? floor($this->outer_mat_b) : $this->outer_mat_b);
						break;
						case "left":
							return ($floor ? floor($this->outer_mat_l) : $this->outer_mat_l);
						break;
						case "right":
							return ($floor ? floor($this->outer_mat_r) : $this->outer_mat_r);
						break;						
						case "top-fraction":
							$n = floor($this->outer_mat_t);
							$remainder = $this->outer_mat_t - $n;
							$converted_remainder = $this->convertImperial($remainder);
							return $converted_remainder;
						break;		
						case "bottom-fraction":
							$n = floor($this->outer_mat_b);
							$remainder = $this->outer_mat_b - $n;
							$converted_remainder = $this->convertImperial($remainder);
							return $converted_remainder;
						break;
						case "left-fraction":
							$n = floor($this->outer_mat_l);
							$remainder = $this->outer_mat_l - $n;
							$converted_remainder = $this->convertImperial($remainder);
							return $converted_remainder;
						break;		
						case "right-fraction":
							$n = floor($this->outer_mat_r);
							$remainder = $this->outer_mat_r - $n;
							$converted_remainder = $this->convertImperial($remainder);
							return $converted_remainder;
						break;																					
					endswitch;
				}				
		 		public function set_outer_mat($value) {$this->outer_mat=$value;}
 
		 		public function get_inner_mat($var = "",$floor=false) { 
					switch ($var):
						case "":
							return $this->inner_mat;
						break;
						case "id":
							return $this->inner_mat;
						break;						
						case "done":
							return $this->inner_mat_done;
						break;
						case "width":
							return ($floor ? floor($this->inner_mat_w) : $this->inner_mat_w);
						break;	
						case "width-fraction":
							$n = floor($this->inner_mat_w);
							$remainder = $this->inner_mat_w - $n;
							$converted_remainder = $this->convertImperial($remainder);
							return $converted_remainder;
						break;														
					endswitch;
				}	
		 		public function set_inner_mat($value) {$this->inner_mat=$value;}
 
		 		public function get_fillet($var = "",$floor=false) { 
					switch ($var):
						case "":
							return $this->fillet;
						break;
						case "id":
							return $this->fillet;
						break;						
						case "done":
							return $this->fillet_done;
						break;
						case "height":
							return ($floor ? floor($this->fillet_h) : $this->fillet_h);
						break;
						case "width":
							return ($floor ? floor($this->fillet_w) : $this->fillet_w);
						break;
						case "height-fraction":
							$n = floor($this->fillet_h);
							$remainder = $this->fillet_h - $n;
							$converted_remainder = $this->convertImperial($remainder);
							return $converted_remainder;
						break;		
						case "width-fraction":
							$n = floor($this->fillet_w);
							$remainder = $this->fillet_w - $n;
							$converted_remainder = $this->convertImperial($remainder);
							return $converted_remainder;
						break;														
					endswitch;
				}	
		 		public function set_fillet($value) {$this->fillet=$value;}
 
		 		public function get_liner() { return $this->liner;}
		 		public function set_liner($value) {$this->liner=$value;}
 
		 		public function get_glass($var = "",$floor=false) { 
					switch ($var):
						case "":
							return $this->glass;
						break;
						case "id":
							return $this->glass;
						break;						
						case "done":
							return $this->glass_done;
						break;
						case "height":
							return ($floor ? floor($this->glass_h) : $this->glass_h);
						break;
						case "width":
							return ($floor ? floor($this->glass_w) : $this->glass_w);
						break;
						case "height-fraction":
							$n = floor($this->glass_h);
							$remainder = $this->glass_h - $n;
							$converted_remainder = $this->convertImperial($remainder);
							return $converted_remainder;
						break;		
						case "width-fraction":
							$n = floor($this->glass_w);
							$remainder = $this->glass_w - $n;
							$converted_remainder = $this->convertImperial($remainder);
							return $converted_remainder;
						break;														
					endswitch;
				}
		 		public function set_glass($value) {$this->glass=$value;}
 
		 		public function get_backing() { return $this->backing;}
		 		public function set_backing($value) {$this->backing=$value;}
 
		 		public function get_mount($var = "",$floor=false) { 
					switch ($var):
						case "":
							return $this->mount;
						break;
						case "id":
							return $this->mount;
						break;						
						case "done":
							return $this->mount_done;
						break;
						case "height":
							return ($floor ? floor($this->mount_h) : $this->mount_h);
						break;
						case "width":
							return ($floor ? floor($this->mount_w) : $this->mount_w);
						break;
						case "height-fraction":
							$n = floor($this->mount_h);
							$remainder = $this->mount_h - $n;
							$converted_remainder = $this->convertImperial($remainder);
							return $converted_remainder;
						break;		
						case "width-fraction":
							$n = floor($this->mount_w);
							$remainder = $this->mount_w - $n;
							$converted_remainder = $this->convertImperial($remainder);
							return $converted_remainder;
						break;														
					endswitch;
				}
		 		public function set_mount($value) {$this->mount=$value;}
 
		 		public function get_art_location() { return $this->art_location;}
		 		public function set_art_location($value) {$this->art_location=$value;}
 
		 		public function get_fitting_labour() { return $this->fitting_labour;}
		 		public function set_fitting_labour($value) {$this->fitting_labour=$value;}
 
		 		public function get_mat_labour() { return $this->mat_labour;}
		 		public function set_mat_labour($value) {$this->mat_labour=$value;}
 
		 		public function get_mount_labour() { return $this->mount_labour;}
		 		public function set_mount_labour($value) {$this->mount_labour=$value;}
 
		 		public function get_special_labour() { return $this->special_labour;}
		 		public function set_special_labour($value) {$this->special_labour=$value;}
 
 				public function set_frame_w($value) {$this->frame_w=$value;}
				public function set_frame_h($value) {$this->frame_h=$value;}
				public function set_outer_mat_t($value) {$this->outer_mat_t=$value;}
				public function set_outer_mat_b($value) {$this->outer_mat_b=$value;}
				public function set_outer_mat_l($value) {$this->outer_mat_l=$value;}
				public function set_outer_mat_r($value) {$this->outer_mat_r=$value;}				
				public function set_inner_mat_w($value) {$this->inner_mat_w=$value;}
				public function set_fillet_w($value) {$this->fillet_w=$value;}
				public function set_fillet_h($value) {$this->fillet_h=$value;}
 
		 		public function get_rabbet_size() { return $this->rabbet_size;}
		 		public function set_rabbet_size($value) {$this->rabbet_size=$value;}
 
		 		public function get_date_created() { return $this->date_created;}
		 		public function set_date_created($value) {$this->date_created=$value;}
 
		 		public function get_last_updated() { return $this->last_updated;}
		 		public function set_last_updated($value) {$this->last_updated=$value;}
 
		 		public function get_last_updated_user() { return $this->last_updated_user;}
		 		public function set_last_updated_user($value) {$this->last_updated_user=$value;}
 
		 
public function __toString(){
	// Debugging tool
	// Dumps out the attributes and method names of this object
	// To implement:
	// $a = new SomeClass();
	// echo $a;
	
	// Get Class name:
	$class = get_class($this);
	
	// Get attributes:
	$attributes = get_object_vars($this);
	
	// Get methods:
	$methods = get_class_methods($this);
	
	$str = "<h2>Information about the $class object</h2>";
	$str .= '<h3>Attributes</h3><ul>';
	foreach ($attributes as $key => $value){
		$str .= "<li>$key: $value</li>";
	}
	$str .= "</ul>";
	
	$str .= "<h3>Methods</h3><ul>";
	foreach ($methods as $value){
		$str .= "<li>$value</li>";
	}
	$str .= "</ul>";
	
	return $str;
}
	



public function save() {
	try{
		//require_once($class_folder . '/class_data_manager.php');
		$dm = new DataManager();
	
		// if record does not already exist, create a new one
		if($this->get_id() == 0) {
			
				$strSQL = "INSERT INTO orders (orders_id, orders_customer_id, orders_production_status, orders_condition, orders_special_instructions, orders_received_date, orders_promised_date, orders_frame, orders_outer_mat, orders_inner_mat, orders_fillet, orders_liner, orders_glass, orders_backing, orders_mount_material, orders_art_location, orders_fitting_labour, orders_mat_labour, orders_mount_labour, orders_special_labour, orders_frame_w, orders_frame_h, orders_outer_mat_t, orders_outer_mat_b, orders_outer_mat_l, orders_outer_mat_r, orders_inner_mat_w, orders_fillet_w, orders_fillet_h, orders_rabbet_size, orders_frame_done, orders_outer_mat_done, orders_inner_mat_done, orders_fillet_done, orders_glass_done, orders_mount_done, orders_date_created, orders_last_updated, orders_last_updated_user) 
        VALUES (
								'".mysqli_real_escape_string($dm->connection, $this->get_id())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_customer_id())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_production_status())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_condition())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_special_instructions())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_received_date())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_promised_date())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_frame())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_outer_mat())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_inner_mat())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_fillet())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_liner())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_glass())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_backing())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_mount())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_art_location())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_fitting_labour())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_mat_labour())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_mount_labour())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_special_labour())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_frame_w())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_frame_h())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_outer_mat_t())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_outer_mat_b())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_outer_mat_l())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_outer_mat_r())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_inner_mat_w())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_fillet_w())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_fillet_h())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_rabbet_size())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_frame_done())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_outer_mat_done())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_inner_mat_done())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_fillet_done())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_glass_done())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_mount_done())."',
								NOW(),
							NOW(),
							'".mysqli_real_escape_string($dm->connection, $this->get_last_updated_user())."')";	
						}
			else {
				$strSQL = "UPDATE orders SET 
								orders_customer_id='".mysqli_real_escape_string($dm->connection, $this->get_customer_id())."',						 
						 		orders_production_status='".mysqli_real_escape_string($dm->connection, $this->get_production_status())."',						 
						 		orders_condition='".mysqli_real_escape_string($dm->connection, $this->get_condition())."',						 
						 		orders_special_instructions='".mysqli_real_escape_string($dm->connection, $this->get_special_instructions())."',						 
						 		orders_received_date='".mysqli_real_escape_string($dm->connection, $this->get_received_date())."',						 
						 		orders_promised_date='".mysqli_real_escape_string($dm->connection, $this->get_promised_date())."',						 
						 		orders_frame='".mysqli_real_escape_string($dm->connection, $this->get_frame())."',						 
						 		orders_outer_mat='".mysqli_real_escape_string($dm->connection, $this->get_outer_mat())."',						 
						 		orders_inner_mat='".mysqli_real_escape_string($dm->connection, $this->get_inner_mat())."',						 
						 		orders_fillet='".mysqli_real_escape_string($dm->connection, $this->get_fillet())."',						 
						 		orders_liner='".mysqli_real_escape_string($dm->connection, $this->get_liner())."',						 
						 		orders_glass='".mysqli_real_escape_string($dm->connection, $this->get_glass())."',						 
						 		orders_backing='".mysqli_real_escape_string($dm->connection, $this->get_backing())."',						 
						 		orders_mount_material='".mysqli_real_escape_string($dm->connection, $this->get_mount())."',						 
						 		orders_art_location='".mysqli_real_escape_string($dm->connection, $this->get_art_location())."',						 
						 		orders_fitting_labour='".mysqli_real_escape_string($dm->connection, $this->get_fitting_labour())."',						 
						 		orders_mat_labour='".mysqli_real_escape_string($dm->connection, $this->get_mat_labour())."',						 
						 		orders_mount_labour='".mysqli_real_escape_string($dm->connection, $this->get_mount_labour())."',						 
						 		orders_special_labour='".mysqli_real_escape_string($dm->connection, $this->get_special_labour())."',						 
						 		orders_frame_w='".mysqli_real_escape_string($dm->connection, $this->get_frame("width",false))."',						 
						 		orders_frame_h='".mysqli_real_escape_string($dm->connection, $this->get_frame("height",false))."',						 
						 		orders_outer_mat_t='".mysqli_real_escape_string($dm->connection, $this->get_outer_mat("top",false))."',						 
						 		orders_outer_mat_b='".mysqli_real_escape_string($dm->connection, $this->get_outer_mat("bottom",false))."',						 
						 		orders_outer_mat_l='".mysqli_real_escape_string($dm->connection, $this->get_outer_mat("left",false))."',						 
						 		orders_outer_mat_r='".mysqli_real_escape_string($dm->connection, $this->get_outer_mat("right",false))."',						 
						 		orders_inner_mat_w='".mysqli_real_escape_string($dm->connection, $this->get_inner_mat("width",false))."',						 
						 		orders_fillet_w='".mysqli_real_escape_string($dm->connection, $this->get_fillet("width",false))."',						 
						 		orders_fillet_h='".mysqli_real_escape_string($dm->connection, $this->get_fillet("height",false))."',						 
						 		orders_rabbet_size='".mysqli_real_escape_string($dm->connection, $this->get_rabbet_size())."',						 
						 		orders_frame_done='".mysqli_real_escape_string($dm->connection, $this->get_frame("done"))."',						 
						 		orders_outer_mat_done='".mysqli_real_escape_string($dm->connection, $this->get_outer_mat("done"))."',						 
						 		orders_inner_mat_done='".mysqli_real_escape_string($dm->connection, $this->get_inner_mat("done"))."',						 
						 		orders_fillet_done='".mysqli_real_escape_string($dm->connection, $this->get_fillet("done"))."',						 
						 		orders_glass_done='".mysqli_real_escape_string($dm->connection, $this->get_glass("done"))."',						 
						 		orders_mount_done='".mysqli_real_escape_string($dm->connection, $this->get_mount("done"))."',						 
						 		orders_last_updated=NOW(),						
						 		orders_last_updated_user='".mysqli_real_escape_string($dm->connection, $this->get_last_updated_user())."'
							
						 	WHERE orders_id=".mysqli_real_escape_string($dm->connection, $this->get_id());

				}				
			
		$result = $dm->updateRecords($strSQL);
	
		// if this is a new record get the record id from the database
		if(!$this->get_id() >= "0") {
			$this->set_id(mysqli_insert_id($dm->connection));
		}
		
		if (!$result):
			throw new Exception("Failed Query: ". $strSQL);
		endif;
	
		// fetch data from the db to update object properties      
		$this->get_by_id($this->get_id());
	
		return $result;
	
	}
	catch(Exception $e) {
		// CATCH EXCEPTION HERE -- DISPLAY ERROR MESSAGE & EMAIL ADMINISTRATOR
		include_once($_SERVER['DOCUMENT_ROOT'] . '/classes/class_error_handler.php');
		$errorVar = new ErrorHandler();
		$errorVar->notifyAdminException($e);
		exit;
	}
}

// function to delete the record
public function delete_by_id($id) {
	try{
	//	require_once($class_folder . '/class_data_manager.php');
		$dm = new DataManager();
	
		$strSQL = "DELETE FROM orders WHERE orders_id=" . $id;
		$result = $dm->updateRecords($strSQL);
		return $result;
	}
	catch(Exception $e) {
		// CATCH EXCEPTION HERE -- DISPLAY ERROR MESSAGE & EMAIL ADMINISTRATOR
		include_once($_SERVER['DOCUMENT_ROOT'] . '/classes/class_error_handler.php');
		$errorVar = new ErrorHandler();
		$errorVar->notifyAdminException($e);
		exit;
	}
}

public function get_by_id($id) {
	try{
	//	require_once($class_folder . '/class_data_manager.php');
		$status = false;
		$dm = new DataManager();
		$strSQL = "SELECT * FROM orders WHERE orders_id=" . $id;
  
		$result = $dm->queryRecords($strSQL);
		$num_rows = mysqli_num_rows($result);

		if ($num_rows != 0){
			$row = mysqli_fetch_assoc($result);
			$this->load($row);
			$status = true;
		}

		return $status;
	}
	catch(Exception $e) {
		// CATCH EXCEPTION HERE -- DISPLAY ERROR MESSAGE & EMAIL ADMINISTRATOR
		include_once($_SERVER['DOCUMENT_ROOT'] . '/classes/class_error_handler.php');
		$errorVar = new ErrorHandler();
		$errorVar->notifyAdminException($e);
		exit;
	}
}
 
public function set_component_done($component,$value) {
	switch ($component):
		case "frame":
			$this->frame_done=$value;
		break;
		case "outer_mat":
			$this->outer_mat_done=$value;
		break;
		case "inner_mat":
			$this->inner_mat_done=$value;
		break;
		case "fillet":
			$this->fillet_done=$value;
		break;
		case "glass":
			$this->glass_done=$value;
		break;	
		case "mount":
			$this->mount_done=$value;
		break;
		default:
		break;
	endswitch;					
}

// loads the object data from a mysql assoc array
private function load($row){
	$this->set_id($row["orders_id"]);
	$this->set_customer_id($row["orders_customer_id"]);
	$this->set_production_status($row["orders_production_status"]);
	$this->set_condition($row["orders_condition"]);
	$this->set_special_instructions($row["orders_special_instructions"]);
	$this->set_received_date($row["orders_received_date"]);
	$this->set_promised_date($row["orders_promised_date"]);
	$this->set_frame($row["orders_frame"]);
	$this->set_component_done("frame",$row["orders_frame_done"]);	
	$this->set_outer_mat($row["orders_outer_mat"]);
	$this->set_component_done("outer_mat",$row["orders_outer_mat_done"]);	
	$this->set_inner_mat($row["orders_inner_mat"]);
	$this->set_component_done("inner_mat",$row["orders_inner_mat_done"]);		
	$this->set_fillet($row["orders_fillet"]);
	$this->set_component_done("fillet",$row["orders_fillet_done"]);		
	$this->set_liner($row["orders_liner"]);
	$this->set_glass($row["orders_glass"]);
	$this->set_component_done("glass",$row["orders_glass_done"]);	
	$this->set_backing($row["orders_backing"]);
	$this->set_mount($row["orders_mount_material"]);
	$this->set_component_done("mount",$row["orders_mount_done"]);			
	$this->set_art_location($row["orders_art_location"]);
	$this->set_fitting_labour($row["orders_fitting_labour"]);
	$this->set_mat_labour($row["orders_mat_labour"]);
	$this->set_mount_labour($row["orders_mount_labour"]);
	$this->set_special_labour($row["orders_special_labour"]);
	$this->set_frame_w($row["orders_frame_w"]);
	$this->set_frame_h($row["orders_frame_h"]);
	$this->set_outer_mat_t($row["orders_outer_mat_t"]);
	$this->set_outer_mat_b($row["orders_outer_mat_b"]);
	$this->set_outer_mat_l($row["orders_outer_mat_l"]);
	$this->set_outer_mat_r($row["orders_outer_mat_r"]);	
	$this->set_inner_mat_w($row["orders_inner_mat_w"]);
	$this->set_fillet_w($row["orders_fillet_w"]);
	$this->set_fillet_h($row["orders_fillet_h"]);
	$this->set_rabbet_size($row["orders_rabbet_size"]);
	$this->set_date_created($row["orders_date_created"]);
	$this->set_last_updated($row["orders_last_updated"]);
	$this->set_last_updated_user($row["orders_last_updated_user"]);
}
}