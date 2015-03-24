<?php 
 class ShippingRecord {
 
		private $id;
		private $order_id;
 		private $tracking;
 		private $company;
 		private $date_shipped;
 		private $date_received;
 		private $active;
 		private $date_created;
 		private $last_updated;
 		private $last_updated_user;
 		
	function __construct() {
	
	}
				public function get_id() { return $this->id;}
		 		public function set_id($value) {$this->id=$value;}
 
		 		public function get_order_id() { return $this->order_id;}
		 		public function set_order_id($value) {$this->order_id=$value;}
 
		 		public function get_tracking() { return $this->tracking;}
		 		public function set_tracking($value) {$this->tracking=$value;}
 
		 		public function get_company() { return $this->company;}
		 		public function set_company($value) {$this->company=$value;}
 
		 		public function get_date_shipped() { return $this->date_shipped;}
		 		public function set_date_shipped($value) {$this->date_shipped=$value;}
 
		 		public function get_date_received() { return $this->date_received;}
		 		public function set_date_received($value) {$this->date_received=$value;}
 
		 		public function get_active() { return $this->active;}
		 		public function set_active($value) {$this->active=$value;}
 
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

public function clear(){
	 foreach ($this as $key => $value) {
		 $this->$key=NULL;
	}
}	
		
public function save() {

		try{
			//require_once($class_folder . '/class_data_manager.php');
			$dm = new DataManager();

			// if record does not already exist, create a new one
			if($this->get_id() == 0) {
			
				$strSQL = "INSERT INTO shippingRecord (shippingRecord_id, shippingRecord_order_id, shippingRecord_tracking, shippingRecord_company, shippingRecord_date_shipped, shippingRecord_date_received, is_active, shippingRecord_date_created, shippingRecord_last_updated, shippingRecord_last_updated_user) 
        VALUES (
								'".mysqli_real_escape_string($dm->connection, $this->get_id())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_order_id())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_tracking())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_company())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_date_shipped())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_date_received())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_active())."',
								NOW(),
							NOW(),
							'".mysqli_real_escape_string($dm->connection, $this->get_last_updated_user())."')";	
						}
			else {
				$strSQL = "UPDATE shippingRecord SET 
								shippingRecord_order_id='".mysqli_real_escape_string($dm->connection, $this->get_order_id())."',						 
						 		shippingRecord_tracking='".mysqli_real_escape_string($dm->connection, $this->get_tracking())."',						 
						 		shippingRecord_company='".mysqli_real_escape_string($dm->connection, $this->get_company())."',						 
						 		shippingRecord_date_shipped='".mysqli_real_escape_string($dm->connection, $this->get_date_shipped())."',						 
						 		shippingRecord_date_received='".mysqli_real_escape_string($dm->connection, $this->get_date_received())."',						 
						 		is_active='".mysqli_real_escape_string($dm->connection, $this->get_active())."',						 
						 		shippingRecord_last_updated=NOW(),						
						 		shippingRecord_last_updated_user='".mysqli_real_escape_string($dm->connection, $this->get_last_updated_user())."'
							
						 	WHERE shippingRecord_id=".mysqli_real_escape_string($dm->connection, $this->get_id());

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

			$strSQL = "DELETE FROM shippingRecord WHERE shippingRecord_id=" . $id;
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

	// function to fetch the record and populate the object
	public function get_by_id($id) {
		try{
		//	require_once($class_folder . '/class_data_manager.php');
			$status = false;
			$dm = new DataManager();
			$strSQL = "SELECT * FROM shippingRecord WHERE shippingRecord_id=" . $id;
      
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
  
	// loads the object data from a mysql assoc array
  private function load($row){
	$this->set_id($row["shippingRecord_id"]);
				$this->set_order_id($row["shippingRecord_order_id"]);
				$this->set_tracking($row["shippingRecord_tracking"]);
				$this->set_company($row["shippingRecord_company"]);
				$this->set_date_shipped($row["shippingRecord_date_shipped"]);
				$this->set_date_received($row["shippingRecord_date_received"]);
				$this->set_active($row["is_active"]);
				$this->set_date_created($row["shippingRecord_date_created"]);
				$this->set_last_updated($row["shippingRecord_last_updated"]);
				$this->set_last_updated_user($row["shippingRecord_last_updated_user"]);
				  }
}