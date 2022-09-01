 <!DOCTYPE html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title><?php echo $title; ?></title>
		<Meta Content='<?php echo $desc; ?>' Name='Description'/>
        <Meta Content='<?php echo $keyword; ?>' Name='Keywords'/>
		<meta name="author" content="puragroup.com">
		<link rel="icon" href="<?=base_url();?>assets/icon_pura.png">
		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>vendor/animate/animate.compat.css">
		<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>vendor/font-awesome/css/all.min.css" />
		<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>vendor/boxicons/css/boxicons.min.css" />
		<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />
		<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>vendor/bootstrap-tagsinput/bootstrap-tagsinput.css" />
		<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>vendor/jquery-ui/jquery-ui.css" />
		<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>vendor/jquery-ui/jquery-ui.theme.css" />
		<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>vendor/bootstrap-multiselect/css/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>vendor/morris/morris.css" />
		<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>vendor/datatables/media/css/dataTables.bootstrap5.css" />
		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/theme.css" />
		<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>vendor/fullcalendar/fullcalendar.css" />
		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/custom.css">

		<!-- Head Libs -->
		<script src="<?php echo base_url('assets/'); ?>vendor/modernizr/modernizr.js"></script>

	</head>
	<body>
		<section class="body">

			<!-- start: header -->
			<?php echo $header; ?>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php echo $sidebar; ?>
				<!-- end: sidebar -->

				<?php echo $content; ?>
			</div>

			

		</section>

		
<?php echo $footer; ?>
	</body>
</html>