<?php 
 class Matopening {
 
		private $id;
		private $component_id;
 		private $top;
 		private $left_side;
 		private $right_side;
 		private $bottom;
 		private $active;
 		private $date_created;
 		private $last_updated;
 		private $last_updated_user;
 		
	function __construct() {
	
	}
				public function get_id() { return $this->id;}
		 		public function set_id($value) {$this->id=$value;}
 
		 		public function get_component_id() { return $this->component_id;}
		 		public function set_component_id($value) {$this->component_id=$value;}
 
		 		public function get_top() { return $this->top;}
		 		public function set_top($value) {$this->top=$value;}
 
		 		public function get_left_side() { return $this->left_side;}
		 		public function set_left_side($value) {$this->left_side=$value;}
 
		 		public function get_right_side() { return $this->right_side;}
		 		public function set_right_side($value) {$this->right_side=$value;}
 
		 		public function get_bottom() { return $this->bottom;}
		 		public function set_bottom($value) {$this->bottom=$value;}
 
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
			
				$strSQL = "INSERT INTO matopening (matOpening_id, matOpening_component_id, matOpening_top, matOpening_left_side, matOpening_right_side, matOpening_bottom, is_active, matOpening_date_created, matOpening_last_updated, matOpening_last_updated_user) 
        VALUES (
								'".mysqli_real_escape_string($dm->connection, $this->get_id())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_component_id())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_top())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_left_side())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_right_side())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_bottom())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_active())."',
								NOW(),
							NOW(),
							'".mysqli_real_escape_string($dm->connection, $this->get_last_updated_user())."')";	
						}
			else {
				$strSQL = "UPDATE matopening SET 
								matOpening_component_id='".mysqli_real_escape_string($dm->connection, $this->get_component_id())."',						 
						 		matOpening_top='".mysqli_real_escape_string($dm->connection, $this->get_top())."',						 
						 		matOpening_left_side='".mysqli_real_escape_string($dm->connection, $this->get_left_side())."',						 
						 		matOpening_right_side='".mysqli_real_escape_string($dm->connection, $this->get_right_side())."',						 
						 		matOpening_bottom='".mysqli_real_escape_string($dm->connection, $this->get_bottom())."',						 
						 		is_active='".mysqli_real_escape_string($dm->connection, $this->get_active())."',						 
						 		matOpening_last_updated=NOW(),						
						 		matOpening_last_updated_user='".mysqli_real_escape_string($dm->connection, $this->get_last_updated_user())."'
							
						 	WHERE matOpening_id=".mysqli_real_escape_string($dm->connection, $this->get_id());

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

			$strSQL = "DELETE FROM matopening WHERE matOpening_id=" . $id;
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
			$strSQL = "SELECT * FROM matopening WHERE matOpening_id=" . $id;
      
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
	$this->set_id($row["matOpening_id"]);
				$this->set_component_id($row["matOpening_component_id"]);
				$this->set_top($row["matOpening_top"]);
				$this->set_left_side($row["matOpening_left_side"]);
				$this->set_right_side($row["matOpening_right_side"]);
				$this->set_bottom($row["matOpening_bottom"]);
				$this->set_active($row["is_active"]);
				$this->set_date_created($row["matOpening_date_created"]);
				$this->set_last_updated($row["matOpening_last_updated"]);
				$this->set_last_updated_user($row["matOpening_last_updated_user"]);
				  }
}