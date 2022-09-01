<!DOCTYPE html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">
		<title><?php echo $title; ?></title>
		<Meta Content='<?php echo $desc; ?>' Name='Description'/>
        <Meta Content='<?php echo $keyword; ?>' Name='Keywords'/>
		<meta name="author" content="okler.net">
		<link rel="icon" href="<?=base_url();?>assets/icon_pura.png">
		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">


		<link rel="stylesheet" href="<?php echo base_url('assets/');?>vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="<?php echo base_url('assets/');?>vendor/animate/animate.compat.css">
		<link rel="stylesheet" href="<?php echo base_url('assets/');?>vendor/font-awesome/css/all.min.css" />
		<link rel="stylesheet" href="<?php echo base_url('assets/');?>vendor/boxicons/css/boxicons.min.css" />
		<link rel="stylesheet" href="<?php echo base_url('assets/');?>vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="<?php echo base_url('assets/');?>vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/');?>css/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/');?>css/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/');?>css/custom.css">

		<!-- Head Libs -->
		<script src="<?php echo base_url('assets/');?>vendor/modernizr/modernizr.js"></script>

	</head>
	<body class="alternative-font-4 loading-overlay-showing" data-plugin-page-transition data-loading-overlay data-plugin-options="{'hideDelay': 100}">
		<div class="loading-overlay">
			<div class="bounce-loader">
				<div class="bounce1"></div>
				<div class="bounce2"></div>
				<div class="bounce3"></div>
			</div>
		</div>

		<!-- start: page -->
		
		<section class="body-sign">
			<div class="center-sign">
				<a href="/" class="logo float-left">
					<img src="<?php echo base_url('assets/');?>logo_panjang.jpg" height="70" alt="Porto Admin" />
				</a>

				<div class="panel card-sign">
					<div class="card-title-sign mt-3 text-end">
						<h1 class="title text-uppercase font-weight m-0"><i class="bx bx-user-circle me-1 text-6 position-relative top-5"></i> Sign In Guest House Pura group</h1>
					</div>

					<div class="card-body">

                              <?php if (isset($message)) {
                                 echo $message;
                              }
                              ?>
						  <?php echo form_open("auth/login");?>
							<div class="form-group mb-3">
								<label>Username</label>
								<div class="input-group">
									<?php echo form_input($identity);?>
									<span class="input-group-text">
										<i class="bx bx-user text-4"></i>
									</span>
								</div>
							</div>

							<div class="form-group mb-3">
								<div class="clearfix">
									<label class="float-left">Password</label>
									
								</div>
								<div class="input-group">
									 <?php echo form_input($password);?>
									<span class="input-group-text">
										<i class="bx bx-lock text-4"></i>
									</span>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-6">
									<div class="checkbox-custom checkbox-default">
										 <?php echo form_checkbox('remember', '1', FALSE, 'id="test1"');?>
									
										<label for="RememberMe">Remember Me</label>
									</div>
								</div>
							</div>
							<div class="row justify-content-end">
											<div class="col-sm-8">
											<button type="submit" class="btn btn-primary mt-2">LOGIN</button>

											</div>
										</div>
					
						 <?php echo form_close();?>
					</div>
				</div>

				<p class="text-center text-muted mt-3 mb-3">&copy; Copyright 2022. MIS Pura Group.</p>
			</div>
		</section>
		<!-- end: page -->

		<script src="<?php echo base_url('assets/');?>vendor/jquery/jquery.js"></script>
		<script src="<?php echo base_url('assets/');?>vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="<?php echo base_url('assets/');?>vendor/popper/umd/popper.min.js"></script>
		<script src="<?php echo base_url('assets/');?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="<?php echo base_url('assets/');?>vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="<?php echo base_url('assets/');?>vendor/common/common.js"></script>
		<script src="<?php echo base_url('assets/');?>vendor/nanoscroller/nanoscroller.js"></script>
		<script src="<?php echo base_url('assets/');?>vendor/magnific-popup/jquery.magnific-popup.js"></script>
		<script src="<?php echo base_url('assets/');?>vendor/jquery-placeholder/jquery.placeholder.js"></script>


		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo base_url('assets/');?>js/theme.js"></script>

		<!-- Theme Custom -->
		<script src="<?php echo base_url('assets/');?>js/custom.js"></script>

		<!-- Theme Initialization Files -->
		<script src="<?php echo base_url('assets/');?>js/theme.init.js"></script>

	</body>
</html>