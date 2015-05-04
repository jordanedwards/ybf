<?php 
 class Customer {
 
		private $id;
		private $first_name;
 		private $last_name;
 		private $email;
 		private $password;
 		private $tel;
 		private $address;
 		private $city;
 		private $postal;
 		private $country;
 		private $confirmed_email;
 		private $active;
 		private $date_created;
 		private $last_updated;
 		private $last_updated_user;
 		
	function __construct() {
	
	}
				public function get_id() { return $this->id;}
		 		public function set_id($value) {$this->id=$value;}
 
		 		public function get_first_name() { return $this->first_name;}
		 		public function set_first_name($value) {$this->first_name=$value;}
 
		 		public function get_last_name() { return $this->last_name;}
		 		public function set_last_name($value) {$this->last_name=$value;}
 
		 		public function get_email() { return $this->email;}
		 		public function set_email($value) {$this->email=$value;}
 
		 		public function get_password() { return $this->password;}
		 		public function set_password($value) {$this->password=$value;}
 
		 		public function get_tel() { return $this->tel;}
		 		public function set_tel($value) {$this->tel=$value;}
 
		 		public function get_address() { return $this->address;}
		 		public function set_address($value) {$this->address=$value;}
 
		 		public function get_city() { return $this->city;}
		 		public function set_city($value) {$this->city=$value;}
 
		 		public function get_postal() { return $this->postal;}
		 		public function set_postal($value) {$this->postal=$value;}
 
		 		public function get_country() { return $this->country;}
		 		public function set_country($value) {$this->country=$value;}
 
		 		public function get_confirmed_email() { return $this->confirmed_email;}
		 		public function set_confirmed_email($value) {$this->confirmed_email=$value;}
 
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
			
				$strSQL = "INSERT INTO customer (customer_id, customer_first_name, customer_last_name, customer_email, customer_password, customer_tel, customer_address, customer_city, customer_postal, customer_country, customer_confirmed_email, is_active, customer_date_created, customer_last_updated, customer_last_updated_user) 
        VALUES (
								'".mysqli_real_escape_string($dm->connection, $this->get_id())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_first_name())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_last_name())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_email())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_password())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_tel())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_address())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_city())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_postal())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_country())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_confirmed_email())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_active())."',
								NOW(),
							NOW(),
							'".mysqli_real_escape_string($dm->connection, $this->get_last_updated_user())."')";	
						}
			else {
				$strSQL = "UPDATE customer SET 
								customer_first_name='".mysqli_real_escape_string($dm->connection, $this->get_first_name())."',						 
						 		customer_last_name='".mysqli_real_escape_string($dm->connection, $this->get_last_name())."',						 
						 		customer_email='".mysqli_real_escape_string($dm->connection, $this->get_email())."',						 
						 		customer_password='".mysqli_real_escape_string($dm->connection, $this->get_password())."',						 
						 		customer_tel='".mysqli_real_escape_string($dm->connection, $this->get_tel())."',						 
						 		customer_address='".mysqli_real_escape_string($dm->connection, $this->get_address())."',						 
						 		customer_city='".mysqli_real_escape_string($dm->connection, $this->get_city())."',						 
						 		customer_postal='".mysqli_real_escape_string($dm->connection, $this->get_postal())."',						 
						 		customer_country='".mysqli_real_escape_string($dm->connection, $this->get_country())."',						 
						 		customer_confirmed_email='".mysqli_real_escape_string($dm->connection, $this->get_confirmed_email())."',						 
						 		is_active='".mysqli_real_escape_string($dm->connection, $this->get_active())."',						 
						 		customer_last_updated=NOW(),						
						 		customer_last_updated_user='".mysqli_real_escape_string($dm->connection, $this->get_last_updated_user())."'
							
						 	WHERE customer_id=".mysqli_real_escape_string($dm->connection, $this->get_id());

				}		
				
			addToLog($strSQL);
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

			$strSQL = "DELETE FROM customer WHERE customer_id=" . $id;
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
			$strSQL = "SELECT * FROM customer WHERE customer_id=" . $id;
      
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
	$this->set_id($row["customer_id"]);
				$this->set_first_name($row["customer_first_name"]);
				$this->set_last_name($row["customer_last_name"]);
				$this->set_email($row["customer_email"]);
				$this->set_password($row["customer_password"]);
				$this->set_tel($row["customer_tel"]);
				$this->set_address($row["customer_address"]);
				$this->set_city($row["customer_city"]);
				$this->set_postal($row["customer_postal"]);
				$this->set_country($row["customer_country"]);
				$this->set_confirmed_email($row["customer_confirmed_email"]);
				$this->set_active($row["is_active"]);
				$this->set_date_created($row["customer_date_created"]);
				$this->set_last_updated($row["customer_last_updated"]);
				$this->set_last_updated_user($row["customer_last_updated_user"]);
				  }
}