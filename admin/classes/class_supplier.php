<?php 
 class Supplier {
 
		private $id;
		private $name;
 		private $contact_name;
 		private $phone;
 		private $email;
 		private $account_number;
 		private $terms;
 		private $date_created;
 		private $last_updated;
 		private $last_updated_user;
 		
	function __construct() {
	
	}
				public function get_id() { return $this->id;}
		 		public function set_id($value) {$this->id=$value;}
 
		 		public function get_name() { return $this->name;}
		 		public function set_name($value) {$this->name=$value;}
 
		 		public function get_contact_name() { return $this->contact_name;}
		 		public function set_contact_name($value) {$this->contact_name=$value;}
 
		 		public function get_phone() { return $this->phone;}
		 		public function set_phone($value) {$this->phone=$value;}
 
		 		public function get_email() { return $this->email;}
		 		public function set_email($value) {$this->email=$value;}
 
		 		public function get_account_number() { return $this->account_number;}
		 		public function set_account_number($value) {$this->account_number=$value;}
 
		 		public function get_terms() { return $this->terms;}
		 		public function set_terms($value) {$this->terms=$value;}
 
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
			
				$strSQL = "INSERT INTO supplier (supplier_id, supplier_name, supplier_contact_name, supplier_phone, supplier_email, supplier_account_number, supplier_terms, supplier_date_created, supplier_last_updated, supplier_last_updated_user) 
        VALUES (
								'".mysqli_real_escape_string($dm->connection, $this->get_id())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_name())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_contact_name())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_phone())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_email())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_account_number())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_terms())."',
								NOW(),
							NOW(),
							'".mysqli_real_escape_string($dm->connection, $this->get_last_updated_user())."')";	
						}
			else {
				$strSQL = "UPDATE supplier SET 
								supplier_name='".mysqli_real_escape_string($dm->connection, $this->get_name())."',						 
						 		supplier_contact_name='".mysqli_real_escape_string($dm->connection, $this->get_contact_name())."',						 
						 		supplier_phone='".mysqli_real_escape_string($dm->connection, $this->get_phone())."',						 
						 		supplier_email='".mysqli_real_escape_string($dm->connection, $this->get_email())."',						 
						 		supplier_account_number='".mysqli_real_escape_string($dm->connection, $this->get_account_number())."',						 
						 		supplier_terms='".mysqli_real_escape_string($dm->connection, $this->get_terms())."',						 
						 		supplier_last_updated=NOW(),						
						 		supplier_last_updated_user='".mysqli_real_escape_string($dm->connection, $this->get_last_updated_user())."'
							
						 	WHERE supplier_id=".mysqli_real_escape_string($dm->connection, $this->get_id());

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

			$strSQL = "DELETE FROM supplier WHERE supplier_id=" . $id;
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

	// function that fill the operator object with operator information
	public function get_by_id($id) {
		try{
		//	require_once($class_folder . '/class_data_manager.php');
			$status = false;
			$dm = new DataManager();
			$strSQL = "SELECT * FROM supplier WHERE supplier_id=" . $id;
      
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
  				$this->set_id($row["supplier_id"]);
				$this->set_name($row["supplier_name"]);
				$this->set_contact_name($row["supplier_contact_name"]);
				$this->set_phone($row["supplier_phone"]);
				$this->set_email($row["supplier_email"]);
				$this->set_account_number($row["supplier_account_number"]);
				$this->set_terms($row["supplier_terms"]);
				$this->set_date_created($row["supplier_date_created"]);
				$this->set_last_updated($row["supplier_last_updated"]);
				$this->set_last_updated_user($row["supplier_last_updated_user"]);
				  }
}