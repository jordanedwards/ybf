<?php 
 class Component {
 
		private $id;
		private $supplier_id;
 		private $item_number;
 		private $barcode;
 		private $url;
 		private $price;
 		private $cost;
 		private $inventory;
 		private $type;
 		private $colour;
 		private $style;
 		private $width;
 		private $description;
 		private $active;
 		private $date_created;
 		private $last_updated;
 		private $last_updated_user;
 		
	function __construct() {
	
	}
				public function get_id() { return $this->id;}
		 		public function set_id($value) {$this->id=$value;}
 
		 		public function get_supplier_id() { return $this->supplier_id;}
		 		public function set_supplier_id($value) {$this->supplier_id=$value;}
 
		 		public function get_item_number() { return $this->item_number;}
		 		public function set_item_number($value) {$this->item_number=$value;}
 
		 		public function get_barcode() { return $this->barcode;}
		 		public function set_barcode($value) {$this->barcode=$value;}
 
		 		public function get_url() { return $this->url;}
		 		public function set_url($value) {$this->url=$value;}
 
		 		public function get_price() { return $this->price;}
		 		public function set_price($value) {$this->price=$value;}
 
		 		public function get_cost() { return $this->cost;}
		 		public function set_cost($value) {$this->cost=$value;}
 
		 		public function get_inventory() { return $this->inventory;}
		 		public function set_inventory($value) {$this->inventory=$value;}
 
		 		public function get_type() { return $this->type;}
		 		public function set_type($value) {$this->type=$value;}
 
		 		public function get_colour() { return $this->colour;}
		 		public function set_colour($value) {$this->colour=$value;}
 
		 		public function get_style() { return $this->style;}
		 		public function set_style($value) {$this->style=$value;}
 
		 		public function get_width() { return $this->width;}
		 		public function set_width($value) {$this->width=$value;}
 
		 		public function get_description() { return $this->description;}
		 		public function set_description($value) {$this->description=$value;}
 
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
			
				$strSQL = "INSERT INTO component (component_id, component_supplier_id, component_item_number, component_barcode, component_url, component_price, component_cost, component_inventory, component_type, component_colour, component_style, component_width, component_description, is_active, component_date_created, component_last_updated, component_last_updated_user) 
        VALUES (
								'".mysqli_real_escape_string($dm->connection, $this->get_id())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_supplier_id())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_item_number())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_barcode())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_url())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_price())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_cost())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_inventory())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_type())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_colour())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_style())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_width())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_description())."',
								'".mysqli_real_escape_string($dm->connection, $this->get_active())."',
								NOW(),
							NOW(),
							'".mysqli_real_escape_string($dm->connection, $this->get_last_updated_user())."')";	
						}
			else {
				$strSQL = "UPDATE component SET 
								component_supplier_id='".mysqli_real_escape_string($dm->connection, $this->get_supplier_id())."',						 
						 		component_item_number='".mysqli_real_escape_string($dm->connection, $this->get_item_number())."',						 
						 		component_barcode='".mysqli_real_escape_string($dm->connection, $this->get_barcode())."',						 
						 		component_url='".mysqli_real_escape_string($dm->connection, $this->get_url())."',						 
						 		component_price='".mysqli_real_escape_string($dm->connection, $this->get_price())."',						 
						 		component_cost='".mysqli_real_escape_string($dm->connection, $this->get_cost())."',						 
						 		component_inventory='".mysqli_real_escape_string($dm->connection, $this->get_inventory())."',						 
						 		component_type='".mysqli_real_escape_string($dm->connection, $this->get_type())."',						 
						 		component_colour='".mysqli_real_escape_string($dm->connection, $this->get_colour())."',						 
						 		component_style='".mysqli_real_escape_string($dm->connection, $this->get_style())."',						 
						 		component_width='".mysqli_real_escape_string($dm->connection, $this->get_width())."',						 
						 		component_description='".mysqli_real_escape_string($dm->connection, $this->get_description())."',						 
						 		is_active='".mysqli_real_escape_string($dm->connection, $this->get_active())."',						 
						 		component_last_updated=NOW(),						
						 		component_last_updated_user='".mysqli_real_escape_string($dm->connection, $this->get_last_updated_user())."'
							
						 	WHERE component_id=".mysqli_real_escape_string($dm->connection, $this->get_id());

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

			$strSQL = "DELETE FROM component WHERE component_id=" . $id;
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
			$strSQL = "SELECT * FROM component WHERE component_id=" . $id;
      
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
	$this->set_id($row["component_id"]);
				$this->set_supplier_id($row["component_supplier_id"]);
				$this->set_item_number($row["component_item_number"]);
				$this->set_barcode($row["component_barcode"]);
				$this->set_url($row["component_url"]);
				$this->set_price($row["component_price"]);
				$this->set_cost($row["component_cost"]);
				$this->set_inventory($row["component_inventory"]);
				$this->set_type($row["component_type"]);
				$this->set_colour($row["component_colour"]);
				$this->set_style($row["component_style"]);
				$this->set_width($row["component_width"]);
				$this->set_description($row["component_description"]);
				$this->set_active($row["is_active"]);
				$this->set_date_created($row["component_date_created"]);
				$this->set_last_updated($row["component_last_updated"]);
				$this->set_last_updated_user($row["component_last_updated_user"]);
				  }
}