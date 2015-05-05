<?php 
 class Specialitems {
 
		private $id;
		private $name;
 		private $price;
 		private $use_pricegrid;
 		private $category;
 		private $active;
 		private $date_created;
 		private $last_updated;
 		private $last_updated_user;
 		
	function __construct() {
	
	}
				public function get_id() { return $this->id;}
		 		public function set_id($value) {$this->id=$value;}
 
		 		public function get_name() { return $this->name;}
		 		public function set_name($value) {$this->name=$value;}
 
		 		public function get_price() { return $this->price;}
		 		public function set_price($value) {$this->price=$value;}
 
		 		public function get_use_pricegrid() { return $this->use_pricegrid;}
		 		public function set_use_pricegrid($value) {$this->use_pricegrid=$value;}
 
		 		public function get_category() { return $this->category;}
		 		public function set_category($value) {$this->category=$value;}
 
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
			
				$strSQL = "INSERT INTO specialitems (specialItems_id, specialItems_name, specialItems_price, specialItems_use_pricegrid, specialItems_category, is_active, specialItems_date_created, specialItems_last_updated, specialItems_last_updated_user) 
        VALUES (
								'".mysqli_real_escape_string($dm->connection, $this->get_id())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_name())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_price())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_use_pricegrid())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_category())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_active())."',
								NOW(),
							NOW(),
							'".mysqli_real_escape_string($dm->connection, $this->get_last_updated_user())."')";	
						}
			else {
				$strSQL = "UPDATE specialitems SET 
								specialItems_name='".mysqli_real_escape_string($dm->connection, $this->get_name())."',						 
						 		specialItems_price='".mysqli_real_escape_string($dm->connection, $this->get_price())."',						 
						 		specialItems_use_pricegrid='".mysqli_real_escape_string($dm->connection, $this->get_use_pricegrid())."',						 
						 		specialItems_category='".mysqli_real_escape_string($dm->connection, $this->get_category())."',						 
						 		is_active='".mysqli_real_escape_string($dm->connection, $this->get_active())."',						 
						 		specialItems_last_updated=NOW(),						
						 		specialItems_last_updated_user='".mysqli_real_escape_string($dm->connection, $this->get_last_updated_user())."'
							
						 	WHERE specialItems_id=".mysqli_real_escape_string($dm->connection, $this->get_id());

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

			$strSQL = "DELETE FROM specialitems WHERE specialItems_id=" . $id;
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
			$strSQL = "SELECT * FROM specialitems WHERE specialItems_id=" . $id;
      
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
	$this->set_id($row["specialItems_id"]);
				$this->set_name($row["specialItems_name"]);
				$this->set_price($row["specialItems_price"]);
				$this->set_use_pricegrid($row["specialItems_use_pricegrid"]);
				$this->set_category($row["specialItems_category"]);
				$this->set_active($row["is_active"]);
				$this->set_date_created($row["specialItems_date_created"]);
				$this->set_last_updated($row["specialItems_last_updated"]);
				$this->set_last_updated_user($row["specialItems_last_updated_user"]);
				  }
}