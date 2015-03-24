<?php 
 require($_SERVER['DOCUMENT_ROOT'] . "/admin/includes/init.php"); 
 $activeMenuItem = "Dashboard";
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

		<?php include(INCLUDES_FOLDER . "navbar.php"); ?>

		<div class="main-container" id="main-container">
				<div id="sidebar" class="sidebar responsive">
				<?php include(INCLUDES_FOLDER . "sidebar_menu.php"); ?>
				</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">
<?php  include(INCLUDES_FOLDER . "system_messaging.php");  ?>	
						<div class="page-header">
							<h1>Dashboard</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<?php // include(INCLUDES_FOLDER . "page_menu.php"); ?>
														
								<!-- PAGE CONTENT BEGINS -->
							<!--	<div class="hidden">
									<button data-target="#sidebar2" data-toggle="collapse" type="button" class="pull-left navbar-toggle collapsed">
										<span class="sr-only">Toggle sidebar</span>

										<i class="ace-icon fa fa-dashboard white bigger-125"></i>									</button> 
										-->


								
								
							</div>


							</div><!-- /.col -->
						</div>
						
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<?php include(INCLUDES_FOLDER . "footer.php"); ?>

			
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

		<script src="template/assets/js/bootstrap.js"></script>

		<!-- page specific plugin scripts -->

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
			   $('#sidebar2').insertBefore('.page-content');
			   
			   $('.navbar-toggle[data-target="#sidebar2"]').insertAfter('#menu-toggler');
			   
			   
			   $(document).on('settings.ace.two_menu', function(e, event_name, event_val) {
				 if(event_name == 'sidebar_fixed') {
					 if( $('#sidebar').hasClass('sidebar-fixed') ) {
						$('#sidebar2').addClass('sidebar-fixed');
						$('#navbar').addClass('h-navbar');
					 }
					 else {
						$('#sidebar2').removeClass('sidebar-fixed')
						$('#navbar').removeClass('h-navbar');
					 }
				 }
			   }).triggerHandler('settings.ace.two_menu', ['sidebar_fixed' ,$('#sidebar').hasClass('sidebar-fixed')]);
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
		<script src="template/docs/assets/js/language/html.js"></script>
		<script src="template/docs/assets/js/language/css.js"></script>
		<script src="template/docs/assets/js/language/javascript.js"></script>
	</body>
</html>
