 <!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Links of CSS files -->
        <link rel="stylesheet" href="<?php echo base_url('assets/frontend'); ?>/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/frontend'); ?>/css/aos.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/frontend'); ?>/css/animate.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/frontend'); ?>/css/meanmenu.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/frontend'); ?>/css/flaticon.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/frontend'); ?>/css/remixicon.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/frontend'); ?>/css/odometer.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/frontend'); ?>/css/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/frontend'); ?>/css/owl.theme.default.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/frontend'); ?>/css/magnific-popup.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/frontend'); ?>/css/fancybox.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/frontend'); ?>/css/selectize.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/frontend'); ?>/css/metismenu.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/frontend'); ?>/css/simplebar.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/frontend'); ?>/css/dropzone.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/frontend'); ?>/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/frontend'); ?>/css/navbar.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/frontend'); ?>/css/footer.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/frontend'); ?>/css/dashboard.css">
		<link rel="stylesheet" href="<?php echo base_url('assets/frontend'); ?>/css/responsive.css">
		
		<title><?php echo $title; ?></title>
        <Meta Content='<?php echo $desc; ?>' Name='Description'/>
        <Meta Content='<?php echo $keyword; ?>' Name='Keywords'/>
        <link rel="icon" type="image/png" href="<?php echo base_url('assets/frontend'); ?>/images/favicon.png">
        <style>
        .page-banner-area.item-bg-login {
          background-image: url(<?php echo base_url('assets/frontend'); ?>/images/page-banner/login_banner2.jpg);
        }

        .page-banner-area {
          background-image: url(<?php echo base_url('assets/frontend'); ?>/images/page-banner/banner-1.jpg);
          background-position: center center;
          background-size: cover;
          background-repeat: no-repeat;
          height: 550px;
          position: relative;
          z-index: 1;
        }

        .page-banner-area.item-bg-three {
          background-image: url(<?php echo base_url('assets/frontend'); ?>/images/page-banner/banner-3.jpg);
        }

        .page-banner-area.item-bg-four {
          background-image: url(<?php echo base_url('assets/frontend'); ?>/images/page-banner/banner-4.jpg);
        }
        @font-face {
          font-family: "remixicon";
          src: url('<?php echo base_url('assets/frontend'); ?>/fonts/remixicon.eot?t=1590207869815'); /* IE9*/
          src: url('<?php echo base_url('assets/frontend'); ?>/fonts/remixicon.eot?t=1590207869815#iefix') format('embedded-opentype'), /* IE6-IE8 */
          url("<?php echo base_url('assets/frontend'); ?>/fonts/remixicon.woff2?t=1590207869815") format("woff2"),
          url("<?php echo base_url('assets/frontend'); ?>/fonts/remixicon.woff?t=1590207869815") format("woff"),
          url('<?php echo base_url('assets/frontend'); ?>/fonts/remixicon.ttf?t=1590207869815') format('truetype'), /* chrome, firefox, opera, Safari, Android, iOS 4.2+*/
          url('<?php echo base_url('assets/frontend'); ?>/fonts/remixicon.svg?t=1590207869815#remixicon') format('svg'); /* iOS 4.1- */
          font-display: swap;
        }
        </style>
    </head>

    <body>

        <!-- Start Preloader Area -->
        <div class="preloader-area">
            <div class="spinner">
                <div class="inner">
                    <div class="disc"></div>
                    <div class="disc"></div>
                    <div class="disc"></div>
                </div>
            </div>
        </div>
        <!-- End Preloader Area -->

        <!-- Start Header Area -->
       <?php echo $_header; ?>
        <!-- End Header Area -->
        
        <!-- Start Page Banner Area -->
       <?php echo $content; ?>
        <!-- Start Profile Authentication Area -->

        <!-- Start Footer Area -->
       <?php echo $_footer; ?>
        <!-- End Footer Area -->

        <!-- Start Go Top Area -->
        <div class="go-top">
            <i class="ri-arrow-up-line"></i>
        </div>
        <!-- End Go Top Area -->
        
        <!-- Links of JS files -->
        <script src="<?php echo base_url('assets/frontend'); ?>/js/jquery.min.js"></script>
        <script src="<?php echo base_url('assets/frontend'); ?>/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url('assets/frontend'); ?>/js/jquery.meanmenu.js"></script> 
        <script src="<?php echo base_url('assets/frontend'); ?>/js/owl.carousel.min.js"></script>
        <script src="<?php echo base_url('assets/frontend'); ?>/js/jquery.appear.js"></script>
        <script src="<?php echo base_url('assets/frontend'); ?>/js/odometer.min.js"></script>
        <script src="<?php echo base_url('assets/frontend'); ?>/js/jquery.magnific-popup.min.js"></script>
        <script src="<?php echo base_url('assets/frontend'); ?>/js/fancybox.min.js"></script>
        <script src="<?php echo base_url('assets/frontend'); ?>/js/selectize.min.js"></script>
        <script src="<?php echo base_url('assets/frontend'); ?>/js/TweenMax.min.js"></script>
        <script src="<?php echo base_url('assets/frontend'); ?>/js/aos.js"></script>
        <script src="<?php echo base_url('assets/frontend'); ?>/js/metismenu.min.js"></script>
        <script src="<?php echo base_url('assets/frontend'); ?>/js/simplebar.min.js"></script>
        <script src="<?php echo base_url('assets/frontend'); ?>/js/dropzone.min.js"></script>
        <script src="<?php echo base_url('assets/frontend'); ?>/js/sticky-sidebar.min.js"></script>
		<script src="<?php echo base_url('assets/frontend'); ?>/js/jquery.ajaxchimp.min.js"></script>
		<script src="<?php echo base_url('assets/frontend'); ?>/js/form-validator.min.js"></script>
        <script src="<?php echo base_url('assets/frontend'); ?>/js/contact-form-script.js"></script>
        <script src="<?php echo base_url('assets/frontend'); ?>/js/wow.min.js"></script>
        <script src="<?php echo base_url('assets/frontend'); ?>/js/main.js"></script>
    </body>
</html>