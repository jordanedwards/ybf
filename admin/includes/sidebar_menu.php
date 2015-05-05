<?php if($activeMenuItem == ""){ $activeMenuItem ="Dashboard";}?>
<ul class="nav nav-list">
	<li class=" <?php if($activeMenuItem == "Dashboard"){ echo " active open";}?>">
		<a href="dashboard.php">
			<i class="menu-icon fa fa-tachometer"></i>
			<span class="menu-text"> Dashboard </span>						</a>

		<b class="arrow"></b>					</li>

	<li class="hover <?php if($activeMenuItem == "POS"){ echo " active open";}?>">
		<a href="pos.php">
			<i class="menu-icon fa fa-barcode"></i>
			<span class="menu-text"> POS </span>
		</a>
		<b class="arrow"></b>
	</li>
	
	<li class="<?php if($activeMenuItem == "Inbox"){ echo " active open";}?>">
		<a href="inbox.php">
			<i class="menu-icon fa fa-envelope-o"></i>
			<span class="menu-text"> Inbox </span>
		</a>
		<b class="arrow"></b>
	</li>
	
	<li class="<?php if($activeMenuItem == "Orders"){ echo " active open";}?>">
		<a href="#" class="dropdown-toggle">
			<i class="menu-icon fa fa-picture-o"></i>
			<span class="menu-text"> Orders </span>

			<b class="arrow fa fa-angle-down"></b>						</a>

		<b class="arrow"></b>

		<ul class="submenu">
			<li class="">
				<a href="orders_edit.php?id=0">
					<i class="menu-icon fa fa-caret-right"></i>
					<i class="fa fa-plus-circle"></i> Create New
				</a>
				<b class="arrow"></b>
			</li>
			<li class="">
				<a href="orders_list.php?s_production_status=Quote&reload=true">
					<i class="menu-icon fa fa-caret-right"></i>
					Quote
				</a>
				<b class="arrow"></b>
			</li>
								
			<li class="">
				<a href="orders_list.php?s_production_status=Confirmed&reload=true">
					<i class="menu-icon fa fa-caret-right"></i>
					Confirmed
				</a>
				<b class="arrow"></b>
			</li>

			<li class="">
				<a href="orders_list.php?s_production_status=In Production&reload=true">
					<i class="menu-icon fa fa-caret-right"></i>
					In Production
				</a>
				<b class="arrow"></b>
			</li>
			<li class="">
				<a href="orders_list.php?s_production_status=Completed&reload=true">
					<i class="menu-icon fa fa-caret-right"></i>
					Completed
				</a>
				<b class="arrow"></b>
			</li>	
			<li class="">
				<a href="orders_list.php?reload=true">
					<i class="menu-icon fa fa-caret-right"></i>
					All
				</a>
				<b class="arrow"></b>
			</li>						
		</ul>
	</li>
	
	<li class="hover <?php if($activeMenuItem == "Customers"){ echo " active open";}?>">
		<a href="customers_list.php">
			<i class="menu-icon fa fa-list"></i>
			<span class="menu-text"> Customers </span>
		</a>
		<b class="arrow"></b>
	</li>
	
	<li class="<?php if($activeMenuItem == "Manage"){ echo " active open";}?>">
		<a href="#" class="dropdown-toggle">
			<i class="menu-icon fa fa-gears"></i>
			<span class="menu-text"> Manage </span>

			<b class="arrow fa fa-angle-down"></b>						</a>

		<b class="arrow"></b>

		<ul class="submenu">
					
			<li class="">
				<a href="materials_list.php?reload=true">
					<i class="menu-icon fa fa-caret-right"></i>
					Materials
				</a>
				<b class="arrow"></b>
			</li>

			<li class="">
				<a href="specialitems_list.php?reload=true">
					<i class="menu-icon fa fa-caret-right"></i>
					Retail Products & Labour
				</a>
				<b class="arrow"></b>
			</li>
			
			<li class="">
				<a href="componenttype_list.php?reload=true">
					<i class="menu-icon fa fa-caret-right"></i>
					Components
				</a>
				<b class="arrow"></b>
			</li>
						
			<li class="">
				<a href="orders_list.php?s_production_status=Completed&reload=true">
					<i class="menu-icon fa fa-caret-right"></i>
					Settings
				</a>
				<b class="arrow"></b>
			</li>			
		</ul>
	</li>
		
	<li class="<?php if($activeMenuItem == "Website"){ echo " active open";}?>">
		<a href="#" class="dropdown-toggle">
			<i class="menu-icon fa fa-tag"></i>
			<span class="menu-text"> Website Admin </span>

			<b class="arrow fa fa-angle-down"></b>						</a>

		<b class="arrow"></b>

		<ul class="submenu">
			<li class="">
				<a href="page_edit.php">
					<i class="menu-icon fa fa-caret-right"></i>
					Webpage Editor
				</a>

				<b class="arrow"></b>
			</li>

			<li class="">
				<a href="carousel_list.php">
					<i class="menu-icon fa fa-caret-right"></i>
					Promotional Banners
				</a>

				<b class="arrow"></b>
			</li>
		</ul>
	</li>									
	
	<li class="<?php if($activeMenuItem == "Reports"){ echo " active open";}?>">
		<a href="#" class="dropdown-toggle">
			<i class="menu-icon fa fa-list"></i>
			<span class="menu-text"> Reports </span>

			<b class="arrow fa fa-angle-down"></b>						</a>

		<b class="arrow"></b>

		<ul class="submenu">
			<li class="">
				<a href="page_edit.php">
					<i class="menu-icon fa fa-caret-right"></i>
					Sales Report
				</a>

				<b class="arrow"></b>
			</li>

		</ul>
	</li>
	
	<li class="<?php if($activeMenuItem == "Users"){ echo " active open";}?>">
		<a href="users.php">
			<i class="menu-icon fa fa-user"></i>
			<span class="menu-text"> Users </span>
		</a>
		<b class="arrow"></b>
	</li>
</ul>

<!-- #section:basics/sidebar.layout.minimize -->
<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
	<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
</div>
					