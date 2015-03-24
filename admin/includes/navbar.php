<div id="navbar" class="navbar navbar-default navbar-collapse">

	<div class="navbar-container" id="navbar-container">
		<!-- #section:basics/sidebar.mobile.toggle -->
		<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
			<span class="sr-only">Toggle sidebar</span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>				</button>

		<!-- /section:basics/sidebar.mobile.toggle -->
		<div class="navbar-header pull-left">
			<!-- #section:basics/navbar.layout.brand -->
			<a href="#" class="navbar-brand">
				<small>
					<!--<img src="/images/convict.png" />-->
					You've Been Framed Web Application
				</small>
			</a>

			<!-- /section:basics/navbar.layout.brand -->

			<!-- #section:basics/navbar.toggle -->

			<!-- /section:basics/navbar.toggle -->
		</div>

		<!-- #section:basics/navbar.dropdown -->
		<div class="navbar-buttons navbar-header pull-right" role="navigation">
			<ul class="nav ace-nav">
				<li class="grey">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
						<i class="ace-icon fa fa-tasks"></i>
						<span class="badge badge-grey">4</span>							</a>

					<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
						<li class="dropdown-header">
							<i class="ace-icon fa fa-check"></i>
							4 Orders in progress								</li>

						<li class="dropdown-content">
							<ul class="dropdown-menu dropdown-navbar">
								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">New Order to be acknowledged</span>
											<!--<span class="pull-right">15%</span>												</div>-->
											</div>
											<div class="progress progress-mini">
											<div style="width:15%" class="progress-bar progress-bar-warning"></div>
										</div>
									</a>
								</li>							

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">Order waiting to enter production</span>
											<!--<span class="pull-right">35%</span>	-->
											</div>

										<div class="progress progress-mini">
											<div style="width:35%" class="progress-bar progress-bar-danger"></div>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">Order to be shipped</span>
											<!--<span class="pull-right">65%</span>	-->
											</div>
										<div class="progress progress-mini">
											<div style="width:65%" class="progress-bar"></div>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">Waiting for customer pick up</span>
											<!--<span class="pull-right">90%</span>	-->
											</div>
										<div class="progress progress-mini progress-striped active">
											<div style="width:90%" class="progress-bar progress-bar-success"></div>
										</div>
									</a>										</li>
							</ul>
						</li>

						<li class="dropdown-footer">
							<a href="orders.php">
								See orders with details
								<i class="ace-icon fa fa-arrow-right"></i>									</a>								</li>
					</ul>
				</li>


				<li class="green">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
						<i class="ace-icon fa fa-envelope"></i>
						<span class="badge badge-default">5</span>							</a>

					<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
						<li class="dropdown-header">
							<i class="ace-icon fa fa-envelope-o"></i>
							5 Messages
						</li>

						<li class="dropdown-content">
							<ul class="dropdown-menu dropdown-navbar">
								<li>
									<a href="#" class="clearfix">
										<span class="msg-body">
											<span class="msg-title">
												<span class="blue">Alex:</span>
												Ciao sociis natoque penatibus et auctor ...													</span>

											<span class="msg-time">
												<i class="ace-icon fa fa-clock-o"></i>
												<span>a moment ago</span>													</span>												</span>											</a>										</li>

								<li>
									<a href="#" class="clearfix">
										<span class="msg-body">
											<span class="msg-title">
												<span class="blue">Susan:</span>
												Vestibulum id ligula porta felis euismod ...													</span>

											<span class="msg-time">
												<i class="ace-icon fa fa-clock-o"></i>
												<span>20 minutes ago</span>													</span>												</span>											</a>										</li>

								<li>
									<a href="#" class="clearfix">
										<span class="msg-body">
											<span class="msg-title">
												<span class="blue">Bob:</span>
												Nullam quis risus eget urna mollis ornare ...													</span>

											<span class="msg-time">
												<i class="ace-icon fa fa-clock-o"></i>
												<span>3:15 pm</span>													</span>												</span>											</a>										</li>

								<li>
									<a href="#" class="clearfix">
										<span class="msg-body">
											<span class="msg-title">
												<span class="blue">Kate:</span>
												Ciao sociis natoque eget urna mollis ornare ...													</span>

											<span class="msg-time">
												<i class="ace-icon fa fa-clock-o"></i>
												<span>1:33 pm</span>													</span>												</span>											</a>										</li>

								<li>
									<a href="#" class="clearfix">
										<span class="msg-body">
											<span class="msg-title">
												<span class="blue">Fred:</span>
												Vestibulum id penatibus et auctor  ...													</span>

											<span class="msg-time">
												<i class="ace-icon fa fa-clock-o"></i>
												<span>10:09 am</span>													</span>												</span>											</a>										</li>
							</ul>
						</li>

						<li class="dropdown-footer">
							<a href="inbox.php">
								See all messages
								<i class="ace-icon fa fa-arrow-right"></i>									</a>								</li>
					</ul>
				</li>

				<!-- #section:basics/navbar.user_menu -->
				<li class="light-blue">
					<a data-toggle="dropdown" href="#" class="dropdown-toggle">
						<img class="nav-user-photo" src="images/staff/james.jpg"  />
						<span class="user-info">
							<small>Welcome,</small>
							James
						</span>

						<i class="ace-icon fa fa-caret-down"></i>							</a>

					<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
						<li>
							<a href="#">
								<i class="ace-icon fa fa-cog"></i>
								Settings									</a>								</li>

						<li>
							<a href="profile.html">
								<i class="ace-icon fa fa-user"></i>
								Profile									</a>								</li>

						<li class="divider"></li>

						<li>
							<a href="./actions/action_logout.php">
								<i class="ace-icon fa fa-power-off"></i>
								Logout									</a>
						</li>
					</ul>
				</li>

				<!-- /section:basics/navbar.user_menu -->
			</ul>
		</div>

		<!-- /section:basics/navbar.dropdown -->
	</div><!-- /.navbar-container -->
</div>