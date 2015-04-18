<?php 
 include("includes/init.php"); 
 include(CLASS_FOLDER . "/class_orders.php");
 $activeMenuItem = "Orders"; 

if(!isset($_GET["id"])) {
	$session->setAlertMessage("Can not edit - the ID is invalid. Please try again.");
	$session->setAlertColor("yellow");
	header("location:" . $base_href . "/index.php");
	exit;
}

// load the orders		
$orders_id = $_GET["id"];
$orders = new Orders();
$status = escaped_var_from_post("status");

if ($_GET["id"] ==0){
	// Change this to pass a parent value if creating a new record:
	//	$orders->set_customer_id($_GET['customer_id']);
} else {
	$orders->get_by_id($orders_id);
}	

require_once(CLASS_FOLDER . "/class_drop_downs.php");
$dd = New DropDown();
	
 ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
    	<title>Dashboard | You've Been Framed</title>
		<?php require(INCLUDES_FOLDER."head.php")?>
<style>
.measurement {
	width:80px !important;
}
.full-size {
	width:auto; 
	float:right;
}
tr:nth-child(odd) {
background: #D3D3D3;
}
.success tbody tr:nth-child(odd) {
	background:#666;
	color:#fff;
}
.success tbody tr:nth-child(even) {
	background:#666;
	color:#fff;
}
.success tbody tr th {
	background:#666;
	color:#fff;
}
.form-control {
width: 90%;
}
</style>
	</head>
	<body class="no-skin">
		<!-- #section:basics/navbar.layout -->
				<?php include(INCLUDES_FOLDER . "navbar.php"); ?>

		<!-- /section:basics/navbar.layout -->
		<div class="main-container" id="main-container">

			<div id="sidebar" class="sidebar responsive">
			<?php include(INCLUDES_FOLDER . "sidebar_menu.php"); ?>
			</div>
			<!-- /section:basics/sidebar -->
			<div class="main-content">
				<div class="main-content-inner">
					<!-- #section:basics/content.breadcrumbs -->
					<div class="breadcrumbs" id="breadcrumbs">

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>

							<li>
								<a href="#">Orders</a>
							</li>
							<li class="active">Order Edit </li>
						</ul><!-- /.breadcrumb -->

					<?php include(INCLUDES_FOLDER . "search.php"); ?>

						<!-- /section:basics/content.searchbox -->
					</div>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<!-- #section:settings.box -->
						<!-- /.ace-settings-container -->

						<!-- /section:settings.box -->
						<div class="page-header">
							<h1>
							<?php  if($orders->get_id() > 0){  ?>
								Add/Edit Order #<?php echo $orders_id ?>
							<?php } else { ?>
								Create New Order
							<?php } ?>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
<div class="col-md-12 body">
        <?php  include(INCLUDES_FOLDER . "system_messaging.php");  ?>

        <div class="errorContainer">
          <p><strong>There are errors in your form submission. Please read below for details.</strong></p>
          <ol>
		            </ol>
		  <br>
        </div>
	<form id="form_orders" action="<?php  echo ACTIONS_URL . "action_"; ?>orders_edit.php" method="post">
	<input type="hidden" name="orders_id" id="orders_id" value="<?php  echo $orders->get_id();  ?>" />
	
<div class="col-md-4">

         <table class="admin_table">
		 <tr><th colspan="2">Order Details:</th></tr>
				<tr>
           			<td style="width:1px;  ">Customer: </td>
					<td><?php  
								$dd->set_table("customer");
								$dd->set_name_field("customer_first_name");
								$dd->set_name_field_2("customer_last_name");								
								$dd->set_name("orders_customer_id");
								$dd->set_selected_value($orders->get_customer_id());
								$dd->set_class_name("form-control inline");
								$dd->set_active_only(false);
								$dd->set_required(true);	
								$dd->set_order("ASC");	
								$dd->display();
							?>
							<a href="#"><i class="fa fa-plus-circle fa-lg" style="color:#006600; padding:5px"></i></a>
					</td>
				</tr>
				<tr>
           			<td style="width:1px;  ">Received date: </td>
            		<td><input id="orders_received_date" name="orders_received_date" type="date"  value="<?php  echo $orders->get_received_date();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px;  ">Promised date: </td>
            		<td><input id="orders_promised_date" name="orders_promised_date" type="date"  value="<?php  echo $orders->get_promised_date();  ?>" style="width:90%" /> </td>
				</tr>				
				<tr>
           			<td style="width:1px;  ">Production status: </td>
					<td><?php  
								$dd->clear();	
								$dd->set_static(true);								
								$dd->set_name("orders_production_status");
								$dd->set_selected_value($orders->get_production_status());
								$dd->set_required(true);
								$dd->set_option_list("New,Pending,In Production,Complete,Shipped/Picked up");
								$dd->set_class_name("form-control");			
								$dd->display();
							?>
					</td>
				</tr>
				<tr>
           			<td style="width:1px;  ">Condition: </td>

					<td><?php  
								$dd->clear();	
								$dd->set_static(true);								
								$dd->set_name("orders_condition");
								$dd->set_selected_value($orders->get_condition());
								$dd->set_required(true);
								$dd->set_option_list("Good,Creased,Marked,Torn");
								$dd->set_class_name("form-control");			
								$dd->display();
							?>
					</td>
				</tr>
				<tr>
           			<td style="width:1px;  ">Special instructions: </td>
            		<td><textarea id="orders_special_instructions" name="orders_special_instructions" rows="4" style="width:90%" /><?php  echo $orders->get_special_instructions();  ?></textarea></td>
				</tr>
			<!--	<tr>
           			<td style="width:1px;  ">Backing: </td>			
					<td><?php  
			/*		$dd->clear();
					$dd->set_table("backing");
					$dd->set_name_field("backing_type");
					$dd->set_name("orders_backing");
					$dd->set_selected_value($orders->get_backing());
					$dd->set_active_only(true);
					$dd->set_order("ASC");	
					$dd->display();*/
				?>
					</td>
				</tr>-->
				<tr>
           			<td style="width:1px;">Storage location: </td>
            		<td><?php  
					$dd->clear();
					$dd->set_table("artLocation");
					$dd->set_name_field("artLocation_value");
					$dd->set_name("orders_art_location");
					$dd->set_active_only(true);
					$dd->set_selected_value($orders->get_art_location());					
					$dd->set_order("ASC");	
					$dd->display();
				?>
				 </td>
				</tr>
				<tr>
           			<td style="width:1px;  ">Special labour: </td>
            		<td><input id="orders_special_labour" name="orders_special_labour" type="number" step="0.25" value="<?php  echo $orders->get_special_labour();  ?>" style="width:80%" /> hrs. </td>
				</tr>
  		
		</table>
		<br>
		
		<table class="admin_table">
			<?php	
			$strSQL = "SELECT * FROM shippingrecord 
			WHERE shippingRecord_order_id = " . $orders->get_id();
			$shipping_id=0;
			$shipping_company = NULL;
			$shipping_date = NULL;
			$shipping_tracking = NULL;
			
			$result = $dm->queryRecords($strSQL);
			if ($result):
				while ($line = mysqli_fetch_assoc($result)):
					$shipping_id = $line['shippingRecord_id'];				
					$shipping_company = $line['shippingRecord_company'];
					$shipping_date = $line['shippingRecord_date_shipped'];
					$shipping_tracking = $line['shippingRecord_tracking'];
				endwhile;	
			endif;
			?>
			<tr><th colspan="2">Shipping:</th></tr>
			<tr>
				<td>Company:</td>
				<td>
				<?php  
					$dd->clear();	
					$dd->set_static(true);								
					$dd->set_name("shipping_company");
					$dd->set_selected_value($shipping_company);
					$dd->set_required(true);
					$dd->set_option_list("Canada Post,Purolator,FedEx");
					$dd->display();
				?>
				</td>
			</tr>
			<tr>
				<td>Date Shipped:</td>
				<td>							
					<input id="shipping_date" name="shipping_date" type="date"  value="<?php echo $shipping_date ?>" style="width:90%" />
				</td>
			</tr>
			<tr>
				<td>Tracking #:</td>
				<td>							
					<input id="shipping_tracking" name="shipping_tracking" type="text" style="width:90%" value="<?php echo $shipping_tracking ?>"/>
					<input id="shipping_id" name="shipping_id" type="hidden" value="<?php echo $shipping_id ?>"/>
				</td>
			</tr>		
		</table>
		<br>
		<table class="admin_table" >
		<tr><th colspan="2" style="background:#62a8d1"><h4 style="display:inline-block;">Invoice:</h4>
		<span style="float:right; display:inline-block;"><a href="#"><img src="images/invoice.gif" style="height:40px; margin-right:10px;"></a><a href="#"><img src="images/pdf_logo.png" style="height:40px"></a></span>
		</th></tr>
		<tr>
			<td style="text-align:right">Materials: </td>
			<td><span style="float:right">$495.60</span></td>
		</tr>
		<tr>
			<td style="text-align:right">Labour: </td>
			<td><span style="float:right">$88.50</span></td>
		</tr>
		<tr>
			<td style="text-align:right">Tax: </td>
			<td><span style="float:right">$70.10</span></td>
		</tr>
		<tr>
			<td style="text-align:right">Payment: </td>
			<td><span style="float:right">$0.00</span></td>
		</tr>				
		<tr style="background: #666; color: #fff;">
			<td style="text-align:right">Total:</td><td><span style="float:right">$654.20</span></td>
		</tr>
	</table>
</div>
<div class="col-md-5">

<?php	
	$dm = new DataManager();
	$strSQL = "SELECT * FROM ordercomponent 
	LEFT JOIN ordercomponent_record ON ordercomponent.orderComponent_id = ordercomponent_record.orderComponent_id
	LEFT JOIN componenttypefields ON ordercomponent_record.componentTypeField = componenttypefields.name
WHERE ordercomponent.orderComponent_orders_id= " . $orders_id;
	$result = $dm->queryRecords($strSQL);
	if ($result):
		while ($line = mysqli_fetch_assoc($result)):
			echo '<table class="admin_table ">
		<tr>
		<th>' .$line['componentTypeField']. '</th>
		<th><input type="button" value="Done" class="component-done" data-component="mount" id="mountDone"></th>
		</tr>	
	</table><br>';
		endwhile;
	endif;
		?>
	<table class="admin_table ">
		<tr>
		<th> Add component:
		<a href="#"><i class="fa fa-plus-circle fa-lg component-add" style="color:#fff; padding:5px; float:right"></i></a></th>
		</tr>	
	</table>
</div>
<div class="col-md-3">
	<table class="admin_table" id="specialItemsTable">
		<tr><th colspan="5">Special items:</th></tr>
		<tr><th colspan="2">#</th><th colspan="2">Item</th><th style="text-align:center"><i class="fa fa-times-circle fa-lg"></i></th></tr>
		<?php	
	$dm = new DataManager();
	$strSQL = "SELECT * FROM ordersspecialitem 
LEFT JOIN specialitems ON ordersspecialitem.ordersSpecialItem_item_id = specialitems.specialItems_id
WHERE ordersspecialitem.is_active = 'Y' AND ordersspecialitem.ordersSpecialItem_order_id = " . $orders_id;
	$result = $dm->queryRecords($strSQL);
	if ($result):
		while ($line = mysqli_fetch_assoc($result)):
			echo '<tr><td colspan="2">' . $line['ordersSpecialItem_quantity'] .'<span class="small_text" style="margin-left: 2px;">x</span></td><td colspan="2">' . $line['specialItems_name'] .'</td><td align="center" style="width:50px"><a href="#" data-itemId="' . $line['ordersSpecialItem_id'] .'" class="remove-item"><i class="fa fa-times-circle fa-lg"></i></a></td></tr>';
		endwhile;	
	endif;
	?>
		<tr class="lightblue" id="addItemRow">
			<td>Add item:</td>
			<td colspan="4">
				<select id="addInvoiceItemType" style="width:100%">
				<option></option>
				<?php				
			$strSQL = "SELECT specialItems_id, specialItems_name, specialItemCategories_name FROM specialitems 
			LEFT JOIN specialitemcategories ON specialitems.specialItems_category = specialitemcategories.specialItemCategories_id
			WHERE specialitems.is_active = 'Y'
			ORDER BY specialItemCategories_name ASC, specialItems_name ASC
			";
			$result = $dm->queryRecords($strSQL);
			if ($result):
				$category = "";
				while ($line = mysqli_fetch_assoc($result)):
					if ($category != $line['specialItemCategories_name']){
						if ($category != ""){ echo "</optgroup>";}
						echo '<optgroup label="' .$line['specialItemCategories_name']. '">';
						$category = $line['specialItemCategories_name'];
					}
					echo '<option value="' .$line['specialItems_id']. '">' .$line['specialItems_name']. '</option>';
				endwhile;	
			endif;
			?>
			</select>
			</td>
		</tr>
		<tr class="lightblue">
			<td>Quantity:</td>
			<td colspan="4"><input type="number" id="addInvoiceItemQuantity" step="any" value="1">
			</td>
		</tr>
		<tr class="lightblue">
			<td colspan="5"><input type="button" class="btn btn-primary" value="Add" onClick="addItem();"></td>
		</tr>
	</table>
	<br />
	<table class="admin_table">
		<tr><th colspan="4">Activity Log:</th></tr>
		<tr><th>Date</th><th>Activity</th><th>Operator</th></tr>
	<?php	
$strSQL = "SELECT * FROM orderactivity 
WHERE orderActivity_orderId = " . $orders_id;
$result = $dm->queryRecords($strSQL);
if ($result):
	while ($line = mysqli_fetch_assoc($result)):
		echo '<tr><td>' . substr($line['orderActivity_date_created'],0,10) .'</td><td>' . $line['orderActivity_content'] .'</td><td>' . $line['orderActivity_last_updated_user'] .'</td></tr>';
	endwhile;	
endif;
?>
		<tr class="lightblue" id="addActivityRow">
			<td>Add activity:</td>
			<td colspan="2">
				<select id="addActivityType">
					<option></option>
					<option>In production</option>
					<option>Frame cut</option>
					<option>Mat cut</option>
					<option>Glass cut</option>
					<option>Completed</option>
					<option>Customer Called</option>
					<option>Shipped</option>
					<option>Picked up by customer</option>
					<option>Waiting on materials</option>
					<option></option>
				</select>
			</td>
		</tr>
		<tr class="lightblue">
			<td>Add note:</td>
			<td colspan="2"><textarea style="width:100%" rows="4" id="addActivityNote"></textarea>
			</td>
		</tr>
		<tr class="lightblue">
			<td colspan="3"><input type="button" class="btn btn-primary" value="Submit" onClick="addActivity();"></td>
		</tr>
	</table>
</div>

<div class="col-md-12">
        <?php  if($orders->get_id() > 0){  ?>
          <p><em>Last updated: <?php echo $orders->get_last_updated();  ?> by <?php  echo $orders->get_last_updated_user();  ?></em></p>
        <?php  }  ?>	
          <input type="submit" value="Save" class="btn btn-primary"/>
		  <input type="submit" value="POS" class="btn btn-primary"/>
		  <input type="button" value="Print" class="btn btn-primary" onClick="window.print();"/>
          <input type="button" value="Cancel" onClick="window.location ='<?php $str = (isset($_SERVER["HTTP_REFERER"]) ?  $_SERVER["HTTP_REFERER"] :  "dashboard.php"); echo $str;?>'" class="btn btn-default"/>		
      </div>
        </form>
	<div class="hr hr-18 dotted hr-double"></div>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<?php include(INCLUDES_FOLDER . "footer.php"); ?>

			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="js/jquery-1.11.2.min.js"></script>
		<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='../assets/js/jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='../assets/js/jquery.mobile.custom.js'>"+"<"+"/script>");
		</script>
		<script src="template/assets/js/bootstrap.js"></script>

		<!-- page specific plugin scripts -->
		<!--<script src="template/assets/js/dataTables/jquery.dataTables.js"></script>
		<script src="template/assets/js/dataTables/jquery.dataTables.bootstrap.js"></script>
		<script src="template/assets/js/dataTables/extensions/TableTools/js/dataTables.tableTools.js"></script>
		<script src="template/assets/js/dataTables/extensions/ColVis/js/dataTables.colVis.js"></script>-->

		<!-- ace scripts -->
		<script src="template/assets/js/ace/elements.scroller.js"></script>
		<script src="template/assets/js/ace/elements.colorpicker.js"></script>
		<script src="template/assets/js/ace/elements.fileinput.js"></script>
		<script src="template/assets/js/ace/elements.typeahead.js"></script>
		<script src="template/assets/js/ace/elements.wysiwyg.js"></script>
		<script src="template/assets/js/ace/elements.spinner.js"></script>
		<script src="template/assets/js/ace/elements.treeview.js"></script>
		<script src="template/assets/js/ace/elements.wizard.js"></script>
		<script src="template/assets/js/ace/elements.aside.js"></script>
		<script src="template/assets/js/ace/ace.js"></script>
		<script src="template/assets/js/ace/ace.ajax-content.js"></script>
		<script src="template/assets/js/ace/ace.touch-drag.js"></script>
		<script src="template/assets/js/ace/ace.sidebar.js"></script>
		<script src="template/assets/js/ace/ace.sidebar-scroll-1.js"></script>
		<script src="template/assets/js/ace/ace.submenu-hover.js"></script>
		<script src="template/assets/js/ace/ace.widget-box.js"></script>
		<script src="template/assets/js/ace/ace.settings.js"></script>
		<script src="template/assets/js/ace/ace.settings-rtl.js"></script>
		<script src="template/assets/js/ace/ace.settings-skin.js"></script>
		<script src="template/assets/js/ace/ace.widget-on-reload.js"></script>
		<script src="template/assets/js/ace/ace.searchbox-autocomplete.js"></script>
		<script type="text/javascript"> ace.vars['base'] = '..'; </script>
		<script src="template/assets/js/ace/elements.onpage-help.js"></script>
		<script src="template/assets/js/ace/ace.onpage-help.js"></script>
		<script src="template/docs/assets/js/rainbow.js"></script>
		<script src="template/docs/assets/js/language/generic.js"></script>
		<script src="template/docs/assets/js/language/html.js"></script>
		<script src="template/docs/assets/js/language/css.js"></script>
		<script src="template/docs/assets/js/language/javascript.js"></script>
		<script type="text/javascript" src="js/jquery.mask.js"></script>
		<script>
	//	$("#orders_received_date").mask("(999) 999-9999");	
		$( "#orders_received_date" ).datepicker({
			dateFormat: "yy-mm-dd",
			changeMonth: true,
			changeYear: true
    	});
		$( "#orders_promised_date" ).datepicker({
			dateFormat: "yy-mm-dd",
			changeMonth: true,
			changeYear: true
   		});
		$( "#shipping_date" ).datepicker({
			dateFormat: "yy-mm-dd",
			changeMonth: true,
			changeYear: true
   		});	
	
		</script>
		<script>

		function addItem(){
			$.ajax({
				url: "ajax/ajax_invoice_item.php?order_id="+$('#orders_id').val()+"&addInvoiceItemType="+$('#addInvoiceItemType').val()+"&addInvoiceItemQuantity="+$('#addInvoiceItemQuantity').val()+"&text="+$('#addInvoiceItemType option:selected').text(),	
				success: function (html) {	
					$(html).insertBefore("#addItemRow");
				}
			});
		}
		
		function addActivity() {
			$.ajax({
				url: "ajax/ajax_order_activity.php?action=add&order_id="+$('#orders_id').val()+"&activity="+$('#addActivityType option:selected').text(),	
				success: function (html) {	
					$(html).insertBefore("#addActivityRow");
				}
			});
		}
		
		$(".component-done").on("click", function (e) {
			e.preventDefault();
			var component = $(this).data("component");
			var element = $(this).attr("id");
			$.ajax({
				url: "ajax/ajax_order_component.php?action=done&component="+component+"&order_id="+$('#orders_id').val(),	
				success: function () {	
				  $("#"+element).parents("table").addClass("success");
				}		
			});
		});
		
		$("#specialItemsTable").on("click", '.remove-item', function (e) {
			e.preventDefault();
			var result = confirm('You are about to delete an item from the system. Do you want to continue?');
			if (result == true){
				var itemId = $(this).data("itemid");
				var element = $(this);
				$.ajax({
					url: "ajax/ajax_invoice_item.php?action=delete&ordersSpecialItem_id="+itemId+"&order_id="+$('#orders_id').val(),	
					success: function (html) {	
				  		element.parents("tr").remove();
					}	
				});
			}
		});
		

		$(".barcode").on("blur", function (e) {
			/*e.preventDefault();
			var result = confirm('You are about to delete an item from the system. Do you want to continue?');
			if (result == true){
				var itemId = $(this).data("itemid");
				var element = $(this);
				$.ajax({
					url: "ajax/ajax_invoice_item.php?action=delete&ordersSpecialItem_id="+itemId+"&order_id="+$('#orders_id').val(),	
					success: function (html) {	
				  		element.parents("tr").remove();
					}	
				});
			}*/
		});		
		</script>
			<?php require("includes/component_add_dialog.php"); ?>

	</body>
</html>
