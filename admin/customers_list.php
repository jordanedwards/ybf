<?php 
require($_SERVER['DOCUMENT_ROOT'] . "/admin/includes/init.php");
$activeMenuItem = "Customers"; 
 
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors',0);
ini_set('log_errors',0);

$s_id = escaped_var_from_post("s_id");
$s_first_name = escaped_var_from_post("s_first_name");
$s_last_name = escaped_var_from_post("s_last_name");
$s_email = escaped_var_from_post("s_email");
$s_tel = escaped_var_from_post("s_tel");
$s_city = escaped_var_from_post("s_city");
$s_active = escaped_var_from_post("s_active");
$s_sort = escaped_var_from_post("s_sort");
$s_sort_dir = escaped_var_from_post("s_sort_dir");		 		 		 

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
								<a href="#">Customers</a>
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
								Customers
							</h1>
						</div><!-- /.page-header -->

<div class="" style="margin-left: initial;">

        <div class="col-md-12">
        <?php  include(INCLUDES_FOLDER . "/system_messaging.php");  ?>
   		</div>

  
      <div class="row">
        <div class="col-md-12">
		 <p><span id="search_toggle" title="Search/Filter Results"><i class="fa fa-search"></i> Search/Filter</span> <i class="fa fa-chevron-down"></i> | 
        <i class="fa fa-plus-circle"></i> <a href="customers_edit.php?id=0">Add New Customer</a></p>
<?php 
	
		if ($s_sort == ""){
			// if no sort is set, pick a default
			$s_sort = "customer_first_name, customer_last_name";
			$s_sort_dir = "desc";	
		}

		$order = " ORDER BY " . $s_sort . " " . $s_sort_dir;		
					
 ?>
        <div id="search">
          <form action="<?php  echo $_SERVER["PHP_SELF"]  ?>?reload=true" method="post" name="frmFilter" id="frmFilter">
            <table class="admin_table" style="display:block">
              <tr>
			  <td>Customer Id</td><td>Customer First name</td><td>Customer Last name</td><td>Customer Email</td><td>Customer Tel</td><td>Customer City</td><td>Customer Active</td>	<td><input type="button" class="clear" value="Clear" /></td>
              </tr>
			  
 				<tr>
			  	<td><input type="text" name="s_id"  value="<?php  echo $s_id  ?>"/></td>
				<td><input type="text" name="s_first_name"  value="<?php  echo $s_first_name  ?>"/></td>
				<td><input type="text" name="s_last_name"  value="<?php  echo $s_last_name ?>"/></td>
				<td><input type="text" name="s_email"  value="<?php  echo $s_email  ?>"/></td>
				<td><input type="text" name="s_tel"  value="<?php  echo $s_tel  ?>"/></td>
				<td><input type="text" name="s_city"  value="<?php  echo $s_city  ?>"/></td>
				<td><input type="text" name="s_active"  value="<?php  echo $s_active  ?>"/></td>
				<input type="hidden" id="s_sort" name="s_sort" value="<?php echo $s_sort?>" />
				<input type="hidden" id="s_sort_dir" name="s_sort_dir" value="<?php echo $s_sort_dir?>" />
								
                <td valign="top"><input type="submit" class="submit" value="Search" /></td>
              </tr>
            </table>
          </form>
        </div>
			<br>	
<?php 
		$query = $session->getQuery($_SERVER["PHP_SELF"]);
		$query_where = "";
		$reload = (isset($_GET['reload']) && $_GET['reload'] == "true" && isset($_GET['page']) == false ? $_GET['reload'] : "");
		
		if ($query == "" || $reload == "true") {
		
		// Page set to reload (new query)		
				 
			if($s_id != ""){
					$query_where .= ' AND customer_id = "'.$s_id.'"';
			} 
			if($s_first_name != ""){
					$query_where .= ' AND customer_first_name = "'.$s_first_name.'"';
			} 
			if($s_last_name != ""){
					$query_where .= ' AND customer_last_name = "'.$s_last_name.'"';
			} 
			if($s_email != ""){
					$query_where .= ' AND customer_email = "'.$s_email.'"';
			} 
			if($s_tel != ""){
					$query_where .= ' AND customer_tel = "'.$s_tel.'"';
			} 
			if($s_city != ""){
					$query_where .= ' AND customer_city = "'.$s_city.'"';
			} 
			if($s_active != ""){
					$query_where .= ' AND customer_active = "'.$s_active.'"';
			}		

			$query = "SELECT * from customer WHERE 1=1" . $query_where .$order;
			
			//Handle the sorting of the records
			$session->setQuery($_SERVER["PHP_SELF"],$query);
			$session->setSort($_SERVER["PHP_SELF"],$s_sort);
			$session->setSortDir($_SERVER["PHP_SELF"],$s_sort_dir);
		}else{
			//The page is not reloaded so use the query from the session
			$query = $session->getQuery($_SERVER["PHP_SELF"]);
		}

		if(isset($_GET['page'])){$page = $_GET['page'];}else{$page = 1;}
		$session->setPage($page);
		
		require_once(CLASS_FOLDER ."/class_record_pager.php");
		$pager=new Pager($query,'paginglinks',20,0,1,'page_templates/customer_list_template.htm');
		echo $pager->displayRecords(mysqli_escape_string($dm->connection, $page));
		//echo $query;
			 ?>
        </div>

    </div> 
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

		<link rel="stylesheet" href="template/docs/assets/js/themes/sunburst.css" />
		
<?php  if ($session->getSort($_SERVER["PHP_SELF"]) != ""){
  // If there is a sort saved in session, print a jquery function to add class to the selected column
   ?>
<script>

$(function() {
	  $('#<?php  echo $session->getSort($_SERVER["PHP_SELF"]);  ?>').addClass('sort_<?php  echo $session->getSortDir($_SERVER["PHP_SELF"])  ?>');
	  /* Set the input field for sort direction so that it can be toggled*/
	  $('#s_sort_dir').val("<?php  echo $session->getSortDir($_SERVER['PHP_SELF'])  ?>")
  }); 
</script>

<?php  }  ?>
  <script> 
$('.sort_column').click(function(){
  // Field clicked; 
  // - Set sort & sort direction input values
  // - Submit form
  $('#s_sort').val($(this).attr('id'));
  
 if ($('#s_sort_dir').val() == "asc"){
 		$('#s_sort_dir').val("desc");
	} else {
		$('#s_sort_dir').val("asc");
	}
  $('#frmFilter').submit();
});
  
$(document).ready(function() { 
	$('#search_toggle').click(function() {
		$('#search').toggle();
	});
	<?php  if ($query_where != ""){
	echo "$('#search').toggle();";
	} ?>
	
});

$(".clear").bind("click", function() {
  $("input[type=text], input[type=number], textarea, select").val("");
  $('#frmFilter').submit();  
});

  </script>		
	</body>
</html>