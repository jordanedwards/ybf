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

if ($_GET["id"] ==0){
	// Change this to pass a parent value if creating a new record:
	//	$orders->set_customer_id($_GET['customer_id']);
} else {
	$orders->get_by_id($orders_id);
}			
 ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
    	<title>Dashboard | You've Been Framed</title>
		<?php require(INCLUDES_FOLDER."head.php")?>
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
							<li class="active">In Progress</li>
						</ul><!-- /.breadcrumb -->

						<!-- #section:basics/content.searchbox -->
						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->

						<!-- /section:basics/content.searchbox -->
					</div>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<!-- #section:settings.box -->
						<!-- /.ace-settings-container -->

						<!-- /section:settings.box -->
						<div class="page-header">
							<h1>
								Add/Edit Order #<?php echo $orders_id ?>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
<div class="col-md-12">
        <?php  include(INCLUDES_FOLDER . "system_messaging.php");  ?>

        <div class="errorContainer">
          <p><strong>There are errors in your form submission. Please read below for details.</strong></p>
          <ol>
		            </ol>
		  <br>
        </div>

	<form id="form_orders" action="<?php  echo ACTIONS_URL . "/action_"; ?>orders_edit.php" method="post">
	<input type="hidden" name="orders_id" value="<?php  echo $orders->get_id();  ?>" />

         <table class="admin_table" style="max-width:800px">
				<tr>
           			<td style="width:1px; white-space:nowrap;">Customer id: </td>
				
					<td><select id="orders_customer_id" name="orders_customer_id"  class="required" >
							<option value="">None</option>
							<?php  $query="SELECT * FROM xxxxxx ORDER BY `xxxxxx_id`";
								$dm = new DataManager();
								$result = $dm->queryRecords($query);
								if ($result):
								while ($row = mysqli_fetch_array($result))
								{
									if ($orders->get_customer_id() == $row['xxxxxx_id']){
										echo "<option value='" . $row['xxxxxxx_id'] . "' selected>" . $row['xxxxxx_name'];
									} else {
										echo "<option value='" . $row['xxxxxxx_id'] . "'>" . $row['xxxxxxx_name'];
									}
								}
								endif;
								 ?>
						</select>
					<span class='red'> *</span> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Production status: </td>

					<td><select id="orders_production_status" name="orders_production_status"  class="required" >
							<option value=""></option>
							<option value="Y" <?php  if ($orders->get_production_status() == "Y"){ echo " selected='selected' ";}  ?>>Y</option>
							<option value="N" <?php  if ($orders->get_production_status() == "N"){ echo " selected='selected' ";}  ?>>N</option>						
						</select>
					<span class='red'> *</span> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Condition: </td>

					<td><select id="orders_condition" name="orders_condition" >
							<option value=""></option>
							<option value="Y" <?php  if ($orders->get_condition() == "Y"){ echo " selected='selected' ";}  ?>>Y</option>
							<option value="N" <?php  if ($orders->get_condition() == "N"){ echo " selected='selected' ";}  ?>>N</option>						
						</select>
					</td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Special instructions: </td>
            		<td><input id="orders_special_instructions" name="orders_special_instructions" type="text"  value="<?php  echo $orders->get_special_instructions();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Received date: </td>
            		<td><input id="orders_received_date" name="orders_received_date" type="date"  value="<?php  echo $orders->get_received_date();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Promised date: </td>
            		<td><input id="orders_promised_date" name="orders_promised_date" type="date"  value="<?php  echo $orders->get_promised_date();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Frame: </td>
				
					<td><select id="orders_frame" name="orders_frame" >
							<option value="">None</option>
							<?php  $query="SELECT * FROM xxxxxx ORDER BY `xxxxxx_id`";
								$dm = new DataManager();
								$result = $dm->queryRecords($query); 
								if ($result):
								while ($row = mysqli_fetch_array($result))
								{
									if ($orders->get_frame() == $row['xxxxxx_id']){
										echo "<option value='" . $row['xxxxxxx_id'] . "' selected>" . $row['xxxxxx_name'];
									} else {
										echo "<option value='" . $row['xxxxxxx_id'] . "'>" . $row['xxxxxxx_name'];
									}
								}
								endif;
								 ?>
						</select>
					</td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Mat 1: </td>
				
					<td><select id="orders_mat_1" name="orders_mat_1" >
							<option value="">None</option>
							<?php  $query="SELECT * FROM xxxxxx ORDER BY `xxxxxx_id`";
								$dm = new DataManager();
								$result = $dm->queryRecords($query);
								if ($result):
								while ($row = mysqli_fetch_array($result))
								{
									if ($orders->get_mat_1() == $row['xxxxxx_id']){
										echo "<option value='" . $row['xxxxxxx_id'] . "' selected>" . $row['xxxxxx_name'];
									} else {
										echo "<option value='" . $row['xxxxxxx_id'] . "'>" . $row['xxxxxxx_name'];
									}
								}
								endif;
								 ?>
						</select>
					</td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Mat 2: </td>
				
					<td><select id="orders_mat_2" name="orders_mat_2" >
							<option value="">None</option>
							<?php  $query="SELECT * FROM xxxxxx ORDER BY `xxxxxx_id`";
								$dm = new DataManager();
								$result = $dm->queryRecords($query); 
								if ($result):
								while ($row = mysqli_fetch_array($result))
								{
									if ($orders->get_mat_2() == $row['xxxxxx_id']){
										echo "<option value='" . $row['xxxxxxx_id'] . "' selected>" . $row['xxxxxx_name'];
									} else {
										echo "<option value='" . $row['xxxxxxx_id'] . "'>" . $row['xxxxxxx_name'];
									}
								}
								endif;
								 ?>
						</select>
					</td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Mat 3: </td>
				
					<td><select id="orders_mat_3" name="orders_mat_3" >
							<option value="">None</option>
							<?php  $query="SELECT * FROM xxxxxx ORDER BY `xxxxxx_id`";
								$dm = new DataManager();
								$result = $dm->queryRecords($query); 
								if ($result):
								while ($row = mysqli_fetch_array($result))
								{
									if ($orders->get_mat_3() == $row['xxxxxx_id']){
										echo "<option value='" . $row['xxxxxxx_id'] . "' selected>" . $row['xxxxxx_name'];
									} else {
										echo "<option value='" . $row['xxxxxxx_id'] . "'>" . $row['xxxxxxx_name'];
									}
								}
								endif;
								 ?>
						</select>
					</td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Liner: </td>
				
					<td><select id="orders_liner" name="orders_liner" >
							<option value="">None</option>
							<?php  $query="SELECT * FROM xxxxxx ORDER BY `xxxxxx_id`";
								$dm = new DataManager();
								$result = $dm->queryRecords($query); 
								if ($result):
								while ($row = mysqli_fetch_array($result))
								{
									if ($orders->get_liner() == $row['xxxxxx_id']){
										echo "<option value='" . $row['xxxxxxx_id'] . "' selected>" . $row['xxxxxx_name'];
									} else {
										echo "<option value='" . $row['xxxxxxx_id'] . "'>" . $row['xxxxxxx_name'];
									}
								}
								endif;
								 ?>
						</select>
					</td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Glass: </td>
				
					<td><select id="orders_glass" name="orders_glass" >
							<option value="">None</option>
							<?php  $query="SELECT * FROM xxxxxx ORDER BY `xxxxxx_id`";
								$dm = new DataManager();
								$result = $dm->queryRecords($query); 
								if ($result):
								while ($row = mysqli_fetch_array($result))
								{
									if ($orders->get_glass() == $row['xxxxxx_id']){
										echo "<option value='" . $row['xxxxxxx_id'] . "' selected>" . $row['xxxxxx_name'];
									} else {
										echo "<option value='" . $row['xxxxxxx_id'] . "'>" . $row['xxxxxxx_name'];
									}
								}
								endif;
								 ?>
						</select>
					</td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Backing: </td>
				
					<td><select id="orders_backing" name="orders_backing" >
							<option value="">None</option>
							<?php  $query="SELECT * FROM xxxxxx ORDER BY `xxxxxx_id`";
								$dm = new DataManager();
								$result = $dm->queryRecords($query);
								if ($result):
								while ($row = mysqli_fetch_array($result))
								{
									if ($orders->get_backing() == $row['xxxxxx_id']){
										echo "<option value='" . $row['xxxxxxx_id'] . "' selected>" . $row['xxxxxx_name'];
									} else {
										echo "<option value='" . $row['xxxxxxx_id'] . "'>" . $row['xxxxxxx_name'];
									}
								}
								endif;
								 ?>
						</select>
					</td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Mount material: </td>
				
					<td><select id="orders_mount_material" name="orders_mount_material" >
							<option value="">None</option>
							<?php  $query="SELECT * FROM xxxxxx ORDER BY `xxxxxx_id`";
								$dm = new DataManager();
								$result = $dm->queryRecords($query); 
								if ($result):
								while ($row = mysqli_fetch_array($result))
								{
									if ($orders->get_mount_material() == $row['xxxxxx_id']){
										echo "<option value='" . $row['xxxxxxx_id'] . "' selected>" . $row['xxxxxx_name'];
									} else {
										echo "<option value='" . $row['xxxxxxx_id'] . "'>" . $row['xxxxxxx_name'];
									}
								}endif;
								 ?>
						</select>
					</td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Conservation: </td>
            		<td><input id="orders_conservation" name="orders_conservation" type="text"  value="<?php  echo $orders->get_conservation();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Fitting labour: </td>
            		<td><input id="orders_fitting_labour" name="orders_fitting_labour" type="number" step="any" value="<?php  echo $orders->get_fitting_labour();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Mat labour: </td>
            		<td><input id="orders_mat_labour" name="orders_mat_labour" type="number" step="any" value="<?php  echo $orders->get_mat_labour();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Mount labour: </td>
            		<td><input id="orders_mount_labour" name="orders_mount_labour" type="number" step="any" value="<?php  echo $orders->get_mount_labour();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Special labour: </td>
            		<td><input id="orders_special_labour" name="orders_special_labour" type="number" step="any" value="<?php  echo $orders->get_special_labour();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Frame w: </td>
            		<td><input id="orders_frame_w" name="orders_frame_w" type="number" step="any" value="<?php  echo $orders->get_frame_w();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Frame h: </td>
            		<td><input id="orders_frame_h" name="orders_frame_h" type="number" step="any" value="<?php  echo $orders->get_frame_h();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Mat outer w: </td>
            		<td><input id="orders_mat_outer_w" name="orders_mat_outer_w" type="number" step="any" value="<?php  echo $orders->get_mat_outer_w();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Mat outer h: </td>
            		<td><input id="orders_mat_outer_h" name="orders_mat_outer_h" type="number" step="any" value="<?php  echo $orders->get_mat_outer_h();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Mat inner w: </td>
            		<td><input id="orders_mat_inner_w" name="orders_mat_inner_w" type="number" step="any" value="<?php  echo $orders->get_mat_inner_w();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Mat inner h: </td>
            		<td><input id="orders_mat_inner_h" name="orders_mat_inner_h" type="number" step="any" value="<?php  echo $orders->get_mat_inner_h();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Fillet w: </td>
            		<td><input id="orders_fillet_w" name="orders_fillet_w" type="number" step="any" value="<?php  echo $orders->get_fillet_w();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Fillet h: </td>
            		<td><input id="orders_fillet_h" name="orders_fillet_h" type="number" step="any" value="<?php  echo $orders->get_fillet_h();  ?>" style="width:90%" /> </td>
				</tr>
				<tr>
           			<td style="width:1px; white-space:nowrap;">Rabbet size: </td>
            		<td><input id="orders_rabbet_size" name="orders_rabbet_size" type="number" step="any" value="<?php  echo $orders->get_rabbet_size();  ?>" style="width:90%" /> </td>
				</tr>
  		
		</table>
          <br />
          <input type="submit" value="Add/Update Orders" />&nbsp;&nbsp;
          <input type="button" value="Cancel" onClick="window.location ='<?php echo $_SERVER["HTTP_REFERRER"];?>'" />
        </form>
		<br>
		
        <?php  if($orders->get_id() > 0){  ?>
          <p><em>Last updated: <?php  $orders->get_last_updated();  ?> By: <?php  echo $orders->get_last_updated_user();  ?></em></p>
        <?php  }  ?>			
	
      </div>

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
		<script src="template/assets/js/dataTables/jquery.dataTables.js"></script>
		<script src="template/assets/js/dataTables/jquery.dataTables.bootstrap.js"></script>
		<script src="template/assets/js/dataTables/extensions/TableTools/js/dataTables.tableTools.js"></script>
		<script src="template/assets/js/dataTables/extensions/ColVis/js/dataTables.colVis.js"></script>

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

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				//initiate dataTables plugin
				var oTable1 = 
				$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.dataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": false },
					  null, null,null, null, null,
					  { "bSortable": false }
					],
					"aaSorting": [],
			
					//,
					//"sScrollY": "200px",
					//"bPaginate": false,
			
					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element
			
					//"iDisplayLength": 50
			    } );
				//oTable1.fnAdjustColumnSizing();
			
			
				//TableTools settings
				TableTools.classes.container = "btn-group btn-overlap";
				TableTools.classes.print = {
					"body": "DTTT_Print",
					"info": "tableTools-alert gritter-item-wrapper gritter-info gritter-center white",
					"message": "tableTools-print-navbar"
				}
			
				//initiate TableTools extension
				var tableTools_obj = new $.fn.dataTable.TableTools( oTable1, {
					"sSwfPath": "../assets/js/dataTables/extensions/TableTools/swf/copy_csv_xls_pdf.swf", //in Ace demo ../assets will be replaced by correct assets path
					
					"sRowSelector": "td:not(:last-child)",
					"sRowSelect": "multi",
					"fnRowSelected": function(row) {
						//check checkbox when row is selected
						try { $(row).find('input[type=checkbox]').get(0).checked = true }
						catch(e) {}
					},
					"fnRowDeselected": function(row) {
						//uncheck checkbox
						try { $(row).find('input[type=checkbox]').get(0).checked = false }
						catch(e) {}
					},
			
					"sSelectedClass": "success",
			        "aButtons": [
						{
							"sExtends": "copy",
							"sToolTip": "Copy to clipboard",
							"sButtonClass": "btn btn-white btn-primary btn-bold",
							"sButtonText": "<i class='fa fa-copy bigger-110 pink'></i>",
							"fnComplete": function() {
								this.fnInfo( '<h3 class="no-margin-top smaller">Table copied</h3>\
									<p>Copied '+(oTable1.fnSettings().fnRecordsTotal())+' row(s) to the clipboard.</p>',
									1500
								);
							}
						},
						
						{
							"sExtends": "csv",
							"sToolTip": "Export to CSV",
							"sButtonClass": "btn btn-white btn-primary  btn-bold",
							"sButtonText": "<i class='fa fa-file-excel-o bigger-110 green'></i>"
						},
						
						{
							"sExtends": "pdf",
							"sToolTip": "Export to PDF",
							"sButtonClass": "btn btn-white btn-primary  btn-bold",
							"sButtonText": "<i class='fa fa-file-pdf-o bigger-110 red'></i>"
						},
						
						{
							"sExtends": "print",
							"sToolTip": "Print view",
							"sButtonClass": "btn btn-white btn-primary  btn-bold",
							"sButtonText": "<i class='fa fa-print bigger-110 grey'></i>",
							
							"sMessage": "<div class='navbar navbar-default'><div class='navbar-header pull-left'><a class='navbar-brand' href='#'><small>Optional Navbar &amp; Text</small></a></div></div>",
							
							"sInfo": "<h3 class='no-margin-top'>Print view</h3>\
									  <p>Please use your browser's print function to\
									  print this table.\
									  <br />Press <b>escape</b> when finished.</p>",
						}
			        ]
			    } );
				//we put a container before our table and append TableTools element to it
			    $(tableTools_obj.fnContainer()).appendTo($('.tableTools-container'));
				
				//also add tooltips to table tools buttons
				//addding tooltips directly to "A" buttons results in buttons disappearing (weired! don't know why!)
				//so we add tooltips to the "DIV" child after it becomes inserted
				//flash objects inside table tools buttons are inserted with some delay (100ms) (for some reason)
				setTimeout(function() {
					$(tableTools_obj.fnContainer()).find('a.DTTT_button').each(function() {
						var div = $(this).find('> div');
						if(div.length > 0) div.tooltip({container: 'body'});
						else $(this).tooltip({container: 'body'});
					});
				}, 200);
				
				
				
				//ColVis extension
				var colvis = new $.fn.dataTable.ColVis( oTable1, {
					"buttonText": "<i class='fa fa-search'></i>",
					"aiExclude": [0, 6],
					"bShowAll": true,
					//"bRestore": true,
					"sAlign": "right",
					"fnLabel": function(i, title, th) {
						return $(th).text();//remove icons, etc
					}
					
				}); 
				
				//style it
				$(colvis.button()).addClass('btn-group').find('button').addClass('btn btn-white btn-info btn-bold')
				
				//and append it to our table tools btn-group, also add tooltip
				$(colvis.button())
				.prependTo('.tableTools-container .btn-group')
				.attr('title', 'Show/hide columns').tooltip({container: 'body'});
				
				//and make the list, buttons and checkboxed Ace-like
				$(colvis.dom.collection)
				.addClass('dropdown-menu dropdown-light dropdown-caret dropdown-caret-right')
				.find('li').wrapInner('<a href="javascript:void(0)" />') //'A' tag is required for better styling
				.find('input[type=checkbox]').addClass('ace').next().addClass('lbl padding-8');
			
			
				
				/////////////////////////////////
				//table checkboxes
				$('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);
				
				//select/deselect all rows according to table header checkbox
				$('#dynamic-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$(this).closest('table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) tableTools_obj.fnSelect(row);
						else tableTools_obj.fnDeselect(row);
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
				$('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
					var row = $(this).closest('tr').get(0);
					if(!this.checked) tableTools_obj.fnSelect(row);
					else tableTools_obj.fnDeselect($(this).closest('tr').get(0));
				});
				
			
				
				
					$(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
					e.stopImmediatePropagation();
					e.stopPropagation();
					e.preventDefault();
				});
				
				
				//And for the first simple table, which doesn't have TableTools or dataTables
				//select/deselect all rows according to table header checkbox
				var active_class = 'active';
				$('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$(this).closest('table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
						else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
				$('#simple-table').on('click', 'td input[type=checkbox]' , function(){
					var $row = $(this).closest('tr');
					if(this.checked) $row.addClass(active_class);
					else $row.removeClass(active_class);
				});
			
				
			
				/********************************/
				//add tooltip for small view action buttons in dropdown menu
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				
				//tooltip placement on right or left
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					//var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			
			})
		</script>

		<!-- the following scripts are used in demo only for onpage help and you don't need them -->
		<link rel="stylesheet" href="template/assets/css/ace.onpage-help.css" />
		<link rel="stylesheet" href="template/docs/assets/js/themes/sunburst.css" />

		<script type="text/javascript"> ace.vars['base'] = '..'; </script>
		<script src="template/assets/js/ace/elements.onpage-help.js"></script>
		<script src="template/assets/js/ace/ace.onpage-help.js"></script>
		<script src="template/docs/assets/js/rainbow.js"></script>
		<script src="template/docs/assets/js/language/generic.js"></script>
		<script src="template./docs/assets/js/language/html.js"></script>
		<script src="template/docs/assets/js/language/css.js"></script>
		<script src="template/docs/assets/js/language/javascript.js"></script>
	</body>
</html>
