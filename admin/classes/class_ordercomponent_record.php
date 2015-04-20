<?php 
 class Ordercomponent_record {
 
		private $id;
 		private $orderComponentId;
 		private $componentTypeField;
 		private $value;
 		
	function __construct() {
	
	}
				public function get_id() { return $this->id;}
		 		public function set_id($value) {$this->id=$value;}
 
		 		public function get_orderComponentId() { return $this->orderComponentId;}
		 		public function set_orderComponentId($value) {$this->orderComponentId=$value;}
 
		 		public function get_componentTypeField() { return $this->componentTypeField;}
		 		public function set_componentTypeField($value) {$this->componentTypeField=$value;}
 
		 		public function get_value() { return $this->value;}
		 		public function set_value($value) {$this->value=$value;}
 
		 
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
			
				$strSQL = "INSERT INTO ordercomponent_record (id, orderComponentId, componentTypeField, value) 
        VALUES (
								'".mysqli_real_escape_string($dm->connection, $this->get_id())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_orderComponentId())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_componentTypeField())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_value())."')";
							 }
			else {
				$strSQL = "UPDATE ordercomponent_record SET 
								id='".mysqli_real_escape_string($dm->connection, $this->get_id())."',						 
						 		orderComponentId='".mysqli_real_escape_string($dm->connection, $this->get_orderComponentId())."',						 
						 		componentTypeField='".mysqli_real_escape_string($dm->connection, $this->get_componentTypeField())."',						 
						 		value='".mysqli_real_escape_string($dm->connection, $this->get_value())."'
							
						 	WHERE ordercomponent_record_id=".mysqli_real_escape_string($dm->connection, $this->get_id());

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

			$strSQL = "DELETE FROM ordercomponent_record WHERE ordercomponent_record_id=" . $id;
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
			$strSQL = "SELECT * FROM ordercomponent_record WHERE ordercomponent_record_id=" . $id;
      
			$result = $dm->queryRecords($strSQL);
			if ($result){
			$num_rows = mysqli_num_rows($result);

			if ($num_rows != 0){
				$row = mysqli_fetch_assoc($result);
        		$this->load($row);
				$status = true;
			}
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
	$this->set_id($row["id"]);
				$this->set_orderComponentId($row["orderComponentId"]);
				$this->set_componentTypeField($row["componentTypeField"]);
				$this->set_value($row["value"]);
				  }
}