<?php 
 class Orders {
 
		private $id;
		private $customer_id;
 		private $production_status;
 		private $condition;
 		private $special_instructions;
 		private $received_date;
 		private $promised_date;
 		private $art_location;
 		private $fitting_labour;
 		private $mat_labour;
 		private $mount_labour;
 		private $special_labour;
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
			
				$strSQL = "INSERT INTO orders (orders_id, orders_customer_id, orders_production_status, orders_condition, orders_special_instructions, orders_received_date, orders_promised_date, orders_art_location, orders_fitting_labour, orders_mat_labour, orders_mount_labour, orders_special_labour, orders_date_created, orders_last_updated, orders_last_updated_user) 
        VALUES (
								'".mysqli_real_escape_string($dm->connection, $this->get_id())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_customer_id())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_production_status())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_condition())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_special_instructions())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_received_date())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_promised_date())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_art_location())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_fitting_labour())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_mat_labour())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_mount_labour())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_special_labour())."',
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
						 		orders_art_location='".mysqli_real_escape_string($dm->connection, $this->get_art_location())."',						 
						 		orders_fitting_labour='".mysqli_real_escape_string($dm->connection, $this->get_fitting_labour())."',						 
						 		orders_mat_labour='".mysqli_real_escape_string($dm->connection, $this->get_mat_labour())."',						 
						 		orders_mount_labour='".mysqli_real_escape_string($dm->connection, $this->get_mount_labour())."',						 
						 		orders_special_labour='".mysqli_real_escape_string($dm->connection, $this->get_special_labour())."',						 
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

	// function to fetch the record and populate the object
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
  
	// loads the object data from a mysql assoc array
  private function load($row){
	$this->set_id($row["orders_id"]);
				$this->set_customer_id($row["orders_customer_id"]);
				$this->set_production_status($row["orders_production_status"]);
				$this->set_condition($row["orders_condition"]);
				$this->set_special_instructions($row["orders_special_instructions"]);
				$this->set_received_date($row["orders_received_date"]);
				$this->set_promised_date($row["orders_promised_date"]);
				$this->set_art_location($row["orders_art_location"]);
				$this->set_fitting_labour($row["orders_fitting_labour"]);
				$this->set_mat_labour($row["orders_mat_labour"]);
				$this->set_mount_labour($row["orders_mount_labour"]);
				$this->set_special_labour($row["orders_special_labour"]);
				$this->set_date_created($row["orders_date_created"]);
				$this->set_last_updated($row["orders_last_updated"]);
				$this->set_last_updated_user($row["orders_last_updated_user"]);
				  }
}