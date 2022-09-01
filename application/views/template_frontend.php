<!DOCTYPE html>
<html lang="en">

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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/frontend/css') ?>/addtohomescreen.css">
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

<body class="bg-snow">

    <!-- Start em_loading -->
    <section class="em_loading" id="loaderPage">
        <div class="spinner_flash"></div>
    </section>
    <!-- End. em_loading -->

    <div id="wrapper">
        <div id="content">
            <!-- Start main_haeder -->
           	<?php echo $main_header; ?>
            <!-- End.main_haeder -->
            <?php echo $content; ?>
           

        </div>
        <!-- Start em_main_footer -->
      	<?php echo $main_footer; ?>
        <!-- End. em_main_footer -->

        <!-- Start searchMenu__hdr -->
      
        <!-- End. searchMenu__hdr -->

       
       
        <!-- Modal Sidebar Menu (withBackground) -->
      	<?php echo $sidebar; ?>

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
      <!--  <script src="<?php echo base_url('assets/frontend/') ?>js/pwa-services.js"></script> -->
 <script src="<?php echo base_url('assets/frontend/') ?>js/addtohomescreen.js"></script>
   <script>
	
       'use strict';var _0x4c4d=['207INmSxE','851869FPFkNb','11415HtIgNH','1157zeXESr','log','2251724ujFqdc','1WJXJLH','49CTwMhY','service\x20worker\x20not\x20registered\x20-\x20there\x20is\x20an\x20error.','976271crHEyX','14227bXiTrD','catch','serviceWorker','2965AzfmdN','register','35gdhjhJ'];var _0x2148=function(_0x25251a,_0x5df366){_0x25251a=_0x25251a-0x1d9;var _0x4c4d53=_0x4c4d[_0x25251a];return _0x4c4d53;};var _0x333bef=_0x2148;(function(_0x5ca2fd,_0x4a68c4){var _0x45be04=_0x2148;while(!![]){try{var _0x3f2e10=parseInt(_0x45be04(0x1e8))*parseInt(_0x45be04(0x1e5))+parseInt(_0x45be04(0x1e2))*-parseInt(_0x45be04(0x1e6))+parseInt(_0x45be04(0x1e0))+-parseInt(_0x45be04(0x1d9))+parseInt(_0x45be04(0x1e1))*parseInt(_0x45be04(0x1de))+parseInt(_0x45be04(0x1dc))*parseInt(_0x45be04(0x1df))+-parseInt(_0x45be04(0x1e4));if(_0x3f2e10===_0x4a68c4)break;else _0x5ca2fd['push'](_0x5ca2fd['shift']());}catch(_0x3267fb){_0x5ca2fd['push'](_0x5ca2fd['shift']());}}}(_0x4c4d,0x7ea78));_0x333bef(0x1db)in navigator&&navigator['serviceWorker'][_0x333bef(0x1dd)]('<?php echo base_url('assets/frontend/js/') ?>service-worker.js')['then'](_0x35bd80=>console[_0x333bef(0x1e3)]('service\x20worker\x20registered'))[_0x333bef(0x1da)](_0x5a1280=>console[_0x333bef(0x1e3)](_0x333bef(0x1e7),_0x5a1280));
	addToHomescreen();   
</script>
</body>


<!-- Mirrored from emobile.orinostudio.com/preview/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Apr 2021 21:25:49 GMT -->
</html>