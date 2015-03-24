<?php 
 require($_SERVER['DOCUMENT_ROOT'] . "/admin/includes/init.php"); 
  $activeMenuItem = "POS";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Point-of-sale | You've Been Framed</title>
		<?php require(INCLUDES_FOLDER."head.php")?>
	</head>

	<body class="skin-3 no-skin">
		<?php include(INCLUDES_FOLDER . "navbar.php"); ?>

		<div class="main-container" id="main-container">
		<?php include(INCLUDES_FOLDER . "pos_menu.php"); ?>
		<div class="hidden">			
			<div id="sidebar2" class="sidebar responsive">
			<?php include(INCLUDES_FOLDER . "sidebar_menu.php"); ?>
			</div>	
		</div>
								
			<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">

						<div class="page-header">
							<h1>Sales Register</h1>
						</div>

						<div class="row">
							<div class="col-md-12">

							<div class="col-md-6" id="left-panel">
								Left panel
							</div>

							<div class="col-md-6" id="right-panel">
								Right Panel
							</div>

							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<?php include(INCLUDES_FOLDER . "footer.php"); ?>

		<!-- basic scripts -->

		<script src="js/jquery-1.11.2.min.js"></script>
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
			   $('#sidebar2').insertBefore('.page-content'); //.ace_sidebar('collapse', false);
			   $('#navbar').addClass('h-navbar');
			   $('.footer').insertAfter('.page-content');
			   
			   $('.page-content').addClass('main-content');
			   
			   $('.menu-toggler[data-target="#sidebar2"]').insertBefore('.navbar-brand');
			   
			   
			   $(document).on('settings.ace.two_menu', function(e, event_name, event_val) {
				 if(event_name == 'sidebar_fixed') {
					 if( $('#sidebar').hasClass('sidebar-fixed') ) $('#sidebar2').addClass('sidebar-fixed')
					 else $('#sidebar2').removeClass('sidebar-fixed')
				 }
			   }).triggerHandler('settings.ace.two_menu', ['sidebar_fixed' ,$('#sidebar').hasClass('sidebar-fixed')]);
			   
			   $('#sidebar2[data-sidebar-hover=true]').ace_sidebar_hover('reset');
			   $('#sidebar2[data-sidebar-scroll=true]').ace_sidebar_scroll('reset', true);
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
