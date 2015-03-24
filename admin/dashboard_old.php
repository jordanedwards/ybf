<?php 
$page_id = basename(__FILE__);
require($_SERVER['DOCUMENT_ROOT'] . "/admin/includes/init.php"); 
//require(INCLUDES_FOLDER . "/acl_module.php"); 
$activeMenuItem = "Dashboard";

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Dashboard | You've Been Framed</title>

		<?php require(INCLUDES_FOLDER."head.php")?>
		    


    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>

<body>

<?php require(INCLUDES_FOLDER. "/navbar.php");?>
 <!-- navbar -->
    
    
<div class="main">

    <div class="container">

      <div class="row">
	  
      <div class="row">
        <div class="col-md-12">	  
	          <?php  include(INCLUDES_FOLDER . "system_messaging.php");  ?>
		</div>
	</div>

      	
      	<div class="col-md-6 col-xs-12">
      		
      		<div class="widget stacked">
					
				<div class="widget-header">
					<i class="fa fa-star"></i>
					<h3>Quick Stats</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					
					<div class="stats">
						
						<div class="stat">
							<span class="stat-value">12,386</span>									
							Site Visits						</div> <!-- /stat -->
						
						<div class="stat">
							<span class="stat-value">9,249</span>									
							Unique Visits						</div> <!-- /stat -->
						
						<div class="stat">
							<span class="stat-value">70%</span>									
							New Visits						</div> <!-- /stat -->
					</div> <!-- /stats -->
					
					
					<div id="chart-stats" class="stats">
						
						<div class="stat stat-chart">							
							<div id="donut-chart" class="chart-holder"></div> <!-- #donut -->							
						</div> <!-- /substat -->
						
						<div class="stat stat-time">									
							<span class="stat-value">00:28:13</span>
							Average Time on Site						</div> <!-- /substat -->
					</div> <!-- /substats -->
				</div> <!-- /widget-content -->
			</div> <!-- /widget -->	
			
			
			<div class="widget widget-nopad stacked">
						
				<div class="widget-header">
					<i class="fa fa-list-alt"></i>
					<h3>Recent News</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					
					<ul class="news-items">
						<li>
							
							<div class="news-item-detail">										
								<a href="javascript:;" class="news-item-title">Duis aute irure dolor in reprehenderit</a>
								<p class="news-item-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
							</div>
							
							<div class="news-item-date">
								<span class="news-item-day">08</span>
								<span class="news-item-month">Mar</span>							</div>
						</li>
						<li>
							<div class="news-item-detail">										
								<a href="javascript:;" class="news-item-title">Duis aute irure dolor in reprehenderit</a>
								<p class="news-item-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
							</div>
							
							<div class="news-item-date">
								<span class="news-item-day">08</span>
								<span class="news-item-month">Mar</span>							</div>
						</li>
						<li>
							<div class="news-item-detail">										
								<a href="javascript:;" class="news-item-title">Duis aute irure dolor in reprehenderit</a>
								<p class="news-item-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
							</div>
							
							<div class="news-item-date">
								<span class="news-item-day">08</span>
								<span class="news-item-month">Mar</span>							</div>
						</li>
					</ul>
				</div> <!-- /widget-content -->
			</div> <!-- /widget -->	
					
										
			<div class="widget stacked">
				
				<div class="widget-header">
					<i class="fa fa-file"></i>
					<h3>Content</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					
					
					<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>					
				</div> <!-- /widget-content -->
			</div> <!-- /widget -->
	    </div> 
      	<!-- /span6 -->
      	
      	
      	<div class="col-md-6">	
      		
      		
      		<div class="widget stacked">
					
				<div class="widget-header">
					<i class="fa fa-bookmark"></i>
					<h3>Quick Shortcuts</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					
					<div class="shortcuts">
						<a href="javascript:;" class="shortcut">
							<i class="shortcut-icon fa fa-list-alt"></i>
							<span class="shortcut-label">Apps</span>						</a>
						
						<a href="javascript:;" class="shortcut">
							<i class="shortcut-icon fa fa-bookmark"></i>
							<span class="shortcut-label">Bookmarks</span>						</a>
						
						<a href="javascript:;" class="shortcut">
							<i class="shortcut-icon fa fa-signal"></i>
							<span class="shortcut-label">Reports</span>						</a>
						
						<a href="javascript:;" class="shortcut">
							<i class="shortcut-icon fa fa-comment"></i>
							<span class="shortcut-label">Comments</span>						</a>
						
						<a href="javascript:;" class="shortcut">
							<i class="shortcut-icon fa fa-user"></i>
							<span class="shortcut-label">Users</span>						</a>
						
						<a href="javascript:;" class="shortcut">
							<i class="shortcut-icon fa fa-file"></i>
							<span class="shortcut-label">Notes</span>						</a>
						
						<a href="javascript:;" class="shortcut">
							<i class="shortcut-icon fa fa-picture"></i>
							<span class="shortcut-label">Photos</span>						</a>
						
						<a href="javascript:;" class="shortcut">
							<i class="shortcut-icon fa fa-tag"></i>
							<span class="shortcut-label">Tags</span>						</a>					</div> <!-- /shortcuts -->	
				</div> <!-- /widget-content -->
			</div> <!-- /widget -->
      		
      		
					
					
			<div class="widget stacked">
					
				<div class="widget-header">
					<i class="fa fa-signal"></i>
					<h3>Chart</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">					
					<div id="area-chart" class="chart-holder"></div>					
				</div> <!-- /widget-content -->
			</div> <!-- /widget -->
					
					
					
					
			<div class="widget stacked widget-table action-table">
					
				<div class="widget-header">
					<i class="fa fa-th-list"></i>
					<h3>Table</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Engine</th>
								<th>Browser</th>
								<th class="td-actions"></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Trident</td>
								<td>Internet
									 Explorer 4.0</td>
								<td class="td-actions">
									<a href="javascript:;" class="btn btn-xs btn-primary">
										<i class="btn-fa fa-only fa fa-ok"></i>									</a>								</td>
							</tr>
							<tr>
								<td>Trident</td>
								<td>Internet
									 Explorer 5.0</td>
								<td class="td-actions">
									<a href="javascript:;" class="btn btn-xs btn-primary">
										<i class="btn-fa fa-only fa fa-ok"></i>									</a>								</td>
							</tr>
							<tr>
								<td>Trident</td>
								<td>Internet
									 Explorer 5.5</td>
								<td class="td-actions">
									<a href="javascript:;" class="btn btn-xs btn-primary">
										<i class="btn-fa fa-only fa fa-ok"></i>									</a>								</td>
							</tr>
							<tr>
								<td>Trident</td>
								<td>Internet
									 Explorer 5.5</td>
								<td class="td-actions">
									<a href="javascript:;" class="btn btn-xs btn-primary">
										<i class="btn-fa fa-only fa fa-ok"></i>									</a>								</td>
							</tr>
							<tr>
								<td>Trident</td>
								<td>Internet
									 Explorer 5.5</td>
								<td class="td-actions">
									<a href="javascript:;" class="btn btn-xs btn-primary">
										<i class="btn-fa fa-only fa fa-ok"></i>									</a>								</td>
							</tr>
							<tr>
								<td>Trident</td>
								<td>Internet
									 Explorer 5.5</td>
								<td class="td-actions">
									<a href="javascript:;" class="btn btn-xs btn-primary">
										<i class="btn-fa fa-only fa fa-ok"></i>									</a>								</td>
							</tr>
					  </tbody>
				  </table>
				</div> <!-- /widget-content -->
			</div> <!-- /widget -->
        </div> 
      	<!-- /span6 -->
      	
      </div> <!-- /row -->

    </div> <!-- /container -->
    
</div> <!-- /main -->
    


<?php require($_SERVER['DOCUMENT_ROOT'] . "/site/includes/footer.php"); ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	
<script src="./js/libs/jquery-1.9.1.min.js"></script>
<script src="./js/libs/jquery-ui-1.10.0.custom.min.js"></script>
<script src="./js/libs/bootstrap.min.js"></script>

<script src="./js/plugins/flot/jquery.flot.js"></script>
<script src="./js/plugins/flot/jquery.flot.pie.js"></script>
<script src="./js/plugins/flot/jquery.flot.resize.js"></script>

<script src="./js/Application.js"></script>

<script src="./js/charts/area.js"></script>
<script src="./js/charts/donut.js"></script>

  </body>
</html>
