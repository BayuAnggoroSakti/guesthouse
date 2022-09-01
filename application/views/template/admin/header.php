<header class="header">
				<div class="logo-container">
					<a href="../4.0.0" class="logo">
						<img src="<?php echo base_url('assets/'); ?>logo_panjang.jpg" width="180" height="35" alt="Porto Admin" />
						
					</a>

					<div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fas fa-bars" aria-label="Toggle sidebar"></i>
					</div>
					
				</div>
				
				<!-- start: search & user box -->
				<div class="header-right">

					<div id="userbox" class="userbox">
						<a href="#" data-bs-toggle="dropdown">
							<figure class="profile-picture">
								<img src="<?php echo base_url('assets/'); ?>img/!logged-user.jpg" alt="Joseph Doe" class="rounded-circle" data-lock-picture="<?php echo base_url('assets/'); ?>img/!logged-user.jpg" />
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
								<span class="name"><?php echo $namalogin ?></span>
								<span class="role">Administrator</span>
							</div>

							<i class="fa custom-caret"></i>
						</a>

						<div class="dropdown-menu">
							<ul class="list-unstyled mb-2">
								<li class="divider"></li>
								
								<li>
									<a role="menuitem" tabindex="-1" href="<?php echo site_url("auth/logout"); ?>"><i class="bx bx-power-off"></i> Logout</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>