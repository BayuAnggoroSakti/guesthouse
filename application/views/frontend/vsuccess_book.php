<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from emobile.orinostudio.com/preview/page-payment-successful.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Apr 2021 21:27:23 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="format-detection" content="telephone=no">

    <meta name="theme-color" content="#ff3f3f">
      <title><?php echo $title; ?></title>
    <Meta Content='<?php echo $desc; ?>' Name='Description'/>
    <Meta Content='<?php echo $keyword; ?>' Name='Keywords'/>

    <!-- favicon -->
     <link rel="icon" type="image/png" href="<?php echo base_url('assets/') ?>icon_pura.png" sizes="32x32">
    <link rel="apple-touch-icon" href="<?php echo base_url('assets/') ?>icon_pura.png">


    <!-- CSS Libraries-->
    <!-- bootstrap v4.6.0 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/') ?>css/bootstrap.min.css">
    <!-- 
        theiconof v3.0
        https://www.theiconof.com/search
     -->
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/') ?>css/icons.css">
    <!-- Swiper 6.4.11 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/') ?>css/swiper-bundle.min.css">
    <!-- Owl Carousel v2.3.4 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/') ?>css/owl.carousel.min.css">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/') ?>css/main.css">
    <!-- normalize.css v8.0.1 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/') ?>css/normalize.css">

    <!-- manifest meta -->
    <link rel="manifest" href="<?php echo base_url('assets/frontend/js/') ?>_manifest.json" />
    <!-- Hotjar Tracking Code for https://emobile.orinostudio.com/preview/index.html -->
    <script>
        (function (h, o, t, j, a, r) {
            h.hj = h.hj || function () { (h.hj.q = h.hj.q || []).push(arguments) };
            h._hjSettings = { hjid: 2340091, hjsv: 6 };
            a = o.getElementsByTagName('head')[0];
            r = o.createElement('script'); r.async = 1;
            r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
            a.appendChild(r);
        })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
    </script>
</head>

<body class="d-flex align-items-center justify-content-center">
    <!-- Start em_loading -->
    <section class="em_loading" id="loaderPage">
        <div class="spinner_flash"></div>
    </section>
    <!-- End. em_loading -->
    <div id="wrapper">
        <div id="content">
            <!-- Start main_haeder -->
            <header class="main_haeder bg-transparent">
                <div class="em_side_right absolute top-0 padding-t-20">
                    <a class="btn btn__back rounded-circle" href="<?php echo site_url('home') ?>">
                        <i class="tio-clear"></i>
                    </a>
                </div>

            </header>
            <!-- End.main_haeder -->

            <section class="emPage__ResultPayment">
                <div class="em__seccess">
                    <div class="icon">
                        <i class="tio-done"></i>
                    </div>
                    <h2 class="size-18 weight-500 color-secondary margin-b-10">Terima Kasih</h2>
                    <p class="size-13 color-text margin-b-40">Booking anda sudah berhasil masuk</p>
                    <a href="<?php echo site_url('home/booking_detail/'.$id_booking) ?>"
                        class="btn rounded-8 h-48 min-w-130 size-14 color-secondary border-snow border-solid d-inline-flex align-items-center justify-content-center">Booking
                        Details</a>
                </div>
            </section>

        </div>

    </div>

    <!-- jquery -->
    <script src="<?php echo base_url('assets/frontend/') ?>js/jquery-3.6.0.js"></script>
    <!-- popper.min.js 1.16.1 -->
    <script src="<?php echo base_url('assets/frontend/') ?>js/popper.min.js"></script>
    <!-- bootstrap.js v4.6.0 -->
    <script src="<?php echo base_url('assets/frontend/') ?>js/bootstrap.min.js"></script>

    <!-- Owl Carousel v2.3.4 -->
    <script src="<?php echo base_url('assets/frontend/') ?>js/vendor/owl.carousel.min.js"></script>
    <!-- Swiper 6.4.11 -->
    <script src="<?php echo base_url('assets/frontend/') ?>js/vendor/swiper-bundle.min.js"></script>
    <!-- sharer 0.4.0 -->
    <script src="<?php echo base_url('assets/frontend/') ?>js/vendor/sharer.js"></script>
    <!-- short-and-sweet v1.0.2 - Accessible character counter for input elements -->
    <script src="<?php echo base_url('assets/frontend/') ?>js/vendor/short-and-sweet.min.js"></script>
    <!-- jquery knob -->
    <script src="<?php echo base_url('assets/frontend/') ?>js/vendor/jquery.knob.min.js"></script>
    <!-- main.js -->
    <script src="<?php echo base_url('assets/frontend/') ?>js/main.js" defer></script>
    <!-- PWA app service registration and works js -->
    <script src="<?php echo base_url('assets/frontend/') ?>js/pwa-services.js"></script>
</body>


<!-- Mirrored from emobile.orinostudio.com/preview/page-payment-successful.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Apr 2021 21:27:23 GMT -->
</html>