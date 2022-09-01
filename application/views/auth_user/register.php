<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from emobile.orinostudio.com/preview/page-signin-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Apr 2021 21:27:11 GMT -->
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
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/')?>css/bootstrap.min.css">
    <!-- 
        theiconof v3.0
        https://www.theiconof.com/search
     -->
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/')?>css/icons.css">
    <!-- Swiper 6.4.11 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/')?>css/swiper-bundle.min.css">
    <!-- Owl Carousel v2.3.4 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/')?>css/owl.carousel.min.css">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/')?>css/main.css">
    <!-- normalize.css v8.0.1 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/')?>css/normalize.css">

    <!-- manifest meta -->
    <link rel="manifest" href="<?php echo base_url('assets/frontend/js/')?>_manifest.json" />
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

<body>
    <!-- Start em_loading -->
    <section class="em_loading" id="loaderPage">
        <div class="spinner_flash"></div>
    </section>
    <!-- End. em_loading -->
    <div id="wrapper">
        <div id="content">
            <!-- Start main_haeder -->
            <header class="main_haeder bg-transparent justify-content-start">
                <div class="em_side_right">
                    <a class="btn btn__back rounded-circle" href="<?php echo site_url('auth_user/login') ?>">
                        <i class="tio-chevron_left"></i>
                    </a>
                </div>
            </header>
            <!-- End.main_haeder -->

            <section class="em__signTypeOne">
                <div class="em_titleSign">
                    <h1>Register User Guest House</h1>
                    <div class="brand">
                            <img src="<?php echo base_url('assets/');?>icon_pura.png"  alt="Porto Admin" />
                       
                    </div>
                </div>
                <div class="em__body">
                      <?php if (isset($message)) {
                                 echo $message;
                              }
                              ?>
                        <?php echo form_open("auth_user/create_user");?>
                          <div class="form-group with_icon">
                            <label>First Name</label>
                            <div class="input_group">
                                 <?php echo form_input($first_name);?>
                               <div class="icon">
                                    <svg id="Iconly_Two-tone_Profile" data-name="Iconly/Two-tone/Profile"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <g id="Profile" transform="translate(4 2)">
                                            <circle id="Ellipse_736" cx="4.778" cy="4.778" r="4.778"
                                                transform="translate(2.801 0)" fill="none" stroke="#200e32"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                stroke-width="1.5" opacity="0.4"></circle>
                                            <path id="Path_33945"
                                                d="M0,3.016a2.215,2.215,0,0,1,.22-.97A4.042,4.042,0,0,1,3.039.426,16.787,16.787,0,0,1,5.382.1,25.053,25.053,0,0,1,9.767.1a16.979,16.979,0,0,1,2.343.33c1.071.22,2.362.659,2.819,1.62a2.27,2.27,0,0,1,0,1.95c-.458.961-1.748,1.4-2.819,1.611a15.716,15.716,0,0,1-2.343.339A25.822,25.822,0,0,1,6.2,6a4.066,4.066,0,0,1-.815-.055,15.423,15.423,0,0,1-2.334-.339C1.968,5.4.687,4.957.22,4A2.279,2.279,0,0,1,0,3.016Z"
                                                transform="translate(0 13.185)" fill="none" stroke="#200e32"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                stroke-width="1.5"></path>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                          <div class="form-group with_icon">
                            <label>Last Name</label>
                            <div class="input_group">
                                <?php echo form_input($last_name);?>
                               <div class="icon">
                                    <svg id="Iconly_Two-tone_Profile" data-name="Iconly/Two-tone/Profile"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <g id="Profile" transform="translate(4 2)">
                                            <circle id="Ellipse_736" cx="4.778" cy="4.778" r="4.778"
                                                transform="translate(2.801 0)" fill="none" stroke="#200e32"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                stroke-width="1.5" opacity="0.4"></circle>
                                            <path id="Path_33945"
                                                d="M0,3.016a2.215,2.215,0,0,1,.22-.97A4.042,4.042,0,0,1,3.039.426,16.787,16.787,0,0,1,5.382.1,25.053,25.053,0,0,1,9.767.1a16.979,16.979,0,0,1,2.343.33c1.071.22,2.362.659,2.819,1.62a2.27,2.27,0,0,1,0,1.95c-.458.961-1.748,1.4-2.819,1.611a15.716,15.716,0,0,1-2.343.339A25.822,25.822,0,0,1,6.2,6a4.066,4.066,0,0,1-.815-.055,15.423,15.423,0,0,1-2.334-.339C1.968,5.4.687,4.957.22,4A2.279,2.279,0,0,1,0,3.016Z"
                                                transform="translate(0 13.185)" fill="none" stroke="#200e32"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                stroke-width="1.5"></path>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="form-group with_icon">
                            <label>Email Address</label>
                            <div class="input_group">
                                <?php echo form_input($email);?>
                                <div class="icon">
                                    <svg id="Iconly_Two-tone_Message" data-name="Iconly/Two-tone/Message"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <g id="Message" transform="translate(2 3)">
                                            <path id="Path_445" d="M11.314,0,7.048,3.434a2.223,2.223,0,0,1-2.746,0L0,0"
                                                transform="translate(3.954 5.561)" fill="none" stroke="#200e32"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                stroke-width="1.5" opacity="0.4" />
                                            <path id="Rectangle_511"
                                                d="M4.888,0h9.428A4.957,4.957,0,0,1,17.9,1.59a5.017,5.017,0,0,1,1.326,3.7v6.528a5.017,5.017,0,0,1-1.326,3.7,4.957,4.957,0,0,1-3.58,1.59H4.888C1.968,17.116,0,14.741,0,11.822V5.294C0,2.375,1.968,0,4.888,0Z"
                                                transform="translate(0 0)" fill="none" stroke="#200e32"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                stroke-width="1.5" />
                                        </g>
                                    </svg>

                                </div>
                            </div>
                        </div>
                         <div class="form-group with_icon">
                            <label>Unit Pura</label>
                            <div class="input_group">
                                <?php echo form_input($company);?>
                                <div class="icon">
                                    <svg id="Iconly_Two-tone_Home" data-name="Iconly/Two-tone/Home" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <g id="Home" transform="translate(2.5 2)">
                                            <path id="Home-2" data-name="Home" d="M6.657,18.771V15.7a1.426,1.426,0,0,1,1.424-1.419h2.886A1.426,1.426,0,0,1,12.4,15.7h0v3.076A1.225,1.225,0,0,0,13.6,20h1.924A3.456,3.456,0,0,0,19,16.562h0V7.838a2.439,2.439,0,0,0-.962-1.9L11.458.685a3.18,3.18,0,0,0-3.944,0L.962,5.943A2.42,2.42,0,0,0,0,7.847v8.714A3.456,3.456,0,0,0,3.473,20H5.4a1.235,1.235,0,0,0,1.241-1.229h0" fill="none" stroke="#200e32" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5">
                                            </path>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                         <div class="form-group with_icon">
                            <label>Phone</label>
                            <div class="input_group">
                                <?php echo form_input($phone);?>
                               <div class="icon">
                                    <svg id="Iconly_Two-tone_Call" data-name="Iconly/Two-tone/Call" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <g id="Call" transform="translate(2.5 2.5)">
                                            <path id="Call-2" data-name="Call" d="M.49,2.373C.807,1.849,2.549-.056,3.793,0a1.636,1.636,0,0,1,.967.517,16.863,16.863,0,0,1,2.468,3.34C7.471,5.026,6.078,5.7,6.5,6.878a9.873,9.873,0,0,0,5.619,5.616c1.177.426,1.851-.966,3.019-.723a16.894,16.894,0,0,1,3.34,2.468,1.639,1.639,0,0,1,.517.967c.046,1.309-1.977,3.077-2.371,3.3-.93.665-2.144.654-3.624-.034C8.874,16.757,2.274,10.282.524,6-.145,4.525-.192,3.3.49,2.373Z" fill="none" stroke="#200e32" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5">
                                            </path>
                                            <path id="Stroke_1" data-name="Stroke 1" d="M0,0,1.469,2.179" transform="translate(1.883 1.294)" fill="none" stroke="#200e32" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5" opacity="0.4"></path>
                                            <path id="Stroke_3" data-name="Stroke 3" d="M0,0,2.188,1.71" transform="translate(15.364 15.567)" fill="none" stroke="#200e32" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5" opacity="0.4"></path>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="form-group with_icon mb-2" id="show_hide_password">
                            <label>Password</label>
                            <div class="input_group">
                                <?php echo form_input($password);?>
                                <div class="icon">
                                    <svg id="Iconly_Two-tone_Password" data-name="Iconly/Two-tone/Password"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <g id="Password" transform="translate(2 2)">
                                            <path id="Stroke_1" data-name="Stroke 1"
                                                d="M13.584,0H4.915C1.894,0,0,2.139,0,5.166v8.168C0,16.361,1.885,18.5,4.915,18.5h8.668c3.031,0,4.917-2.139,4.917-5.166V5.166C18.5,2.139,16.614,0,13.584,0Z"
                                                transform="translate(0.75 0.75)" fill="none" stroke="#200e32"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                stroke-width="1.5" opacity="0.4" />
                                            <path id="Stroke_3" data-name="Stroke 3"
                                                d="M3.7,1.852A1.852,1.852,0,1,1,1.851,0,1.852,1.852,0,0,1,3.7,1.852Z"
                                                transform="translate(4.989 8.148)" fill="none" stroke="#200e32"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                stroke-width="1.5" />
                                            <path id="Stroke_5" data-name="Stroke 5" d="M0,0H6.318V1.852"
                                                transform="translate(8.692 10)" fill="none" stroke="#200e32"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                stroke-width="1.5" />
                                            <path id="Stroke_7" data-name="Stroke 7" d="M.5,1.852V0"
                                                transform="translate(11.682 10)" fill="none" stroke="#200e32"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                stroke-width="1.5" />
                                        </g>
                                    </svg>
                                </div>
                                <button type="button" class="btn hide_show icon_password">
                                    <i class="tio-hidden_outlined"></i>
                                </button>
                            </div>
                        </div>
                         <div class="form-group with_icon mb-2" id="show_hide_password">
                            <label>Confirm Password</label>
                            <div class="input_group">
                                <?php echo form_input($password_confirm);?>
                                <div class="icon">
                                    <svg id="Iconly_Two-tone_Password" data-name="Iconly/Two-tone/Password"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <g id="Password" transform="translate(2 2)">
                                            <path id="Stroke_1" data-name="Stroke 1"
                                                d="M13.584,0H4.915C1.894,0,0,2.139,0,5.166v8.168C0,16.361,1.885,18.5,4.915,18.5h8.668c3.031,0,4.917-2.139,4.917-5.166V5.166C18.5,2.139,16.614,0,13.584,0Z"
                                                transform="translate(0.75 0.75)" fill="none" stroke="#200e32"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                stroke-width="1.5" opacity="0.4" />
                                            <path id="Stroke_3" data-name="Stroke 3"
                                                d="M3.7,1.852A1.852,1.852,0,1,1,1.851,0,1.852,1.852,0,0,1,3.7,1.852Z"
                                                transform="translate(4.989 8.148)" fill="none" stroke="#200e32"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                stroke-width="1.5" />
                                            <path id="Stroke_5" data-name="Stroke 5" d="M0,0H6.318V1.852"
                                                transform="translate(8.692 10)" fill="none" stroke="#200e32"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                stroke-width="1.5" />
                                            <path id="Stroke_7" data-name="Stroke 7" d="M.5,1.852V0"
                                                transform="translate(11.682 10)" fill="none" stroke="#200e32"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                stroke-width="1.5" />
                                        </g>
                                    </svg>
                                </div>
                                <button type="button" class="btn hide_show icon_password">
                                    <i class="tio-hidden_outlined"></i>
                                </button>
                            </div>
                        </div>
                 
                </div>
                <div class="em__footer">
                  
                    <button type="submit" class="btn bg-primary color-white justify-content-center">Submit</button>

                </div>
                  <?php echo form_close();?>
            </section>



        </div>

    </div>

    <!-- jquery -->
    <script src="<?php echo base_url('assets/frontend/')?>js/jquery-3.6.0.js"></script>
    <!-- popper.min.js 1.16.1 -->
    <script src="<?php echo base_url('assets/frontend/')?>js/popper.min.js"></script>
    <!-- bootstrap.js v4.6.0 -->
    <script src="<?php echo base_url('assets/frontend/')?>js/bootstrap.min.js"></script>

    <!-- Owl Carousel v2.3.4 -->
    <script src="<?php echo base_url('assets/frontend/')?>js/vendor/owl.carousel.min.js"></script>
    <!-- Swiper 6.4.11 -->
    <script src="<?php echo base_url('assets/frontend/')?>js/vendor/swiper-bundle.min.js"></script>
    <!-- sharer 0.4.0 -->
    <script src="<?php echo base_url('assets/frontend/')?>js/vendor/sharer.js"></script>
    <!-- short-and-sweet v1.0.2 - Accessible character counter for input elements -->
    <script src="<?php echo base_url('assets/frontend/')?>js/vendor/short-and-sweet.min.js"></script>
    <!-- jquery knob -->
    <script src="<?php echo base_url('assets/frontend/')?>js/vendor/jquery.knob.min.js"></script>
    <!-- main.js -->
    <script src="<?php echo base_url('assets/frontend/')?>js/main.js" defer></script>
    <!-- PWA app service registration and works js -->
       <!--  <script src="<?php echo base_url('assets/frontend/') ?>js/pwa-services.js"></script> -->
   <script>

       'use strict';var _0x4c4d=['207INmSxE','851869FPFkNb','11415HtIgNH','1157zeXESr','log','2251724ujFqdc','1WJXJLH','49CTwMhY','service\x20worker\x20not\x20registered\x20-\x20there\x20is\x20an\x20error.','976271crHEyX','14227bXiTrD','catch','serviceWorker','2965AzfmdN','register','35gdhjhJ'];var _0x2148=function(_0x25251a,_0x5df366){_0x25251a=_0x25251a-0x1d9;var _0x4c4d53=_0x4c4d[_0x25251a];return _0x4c4d53;};var _0x333bef=_0x2148;(function(_0x5ca2fd,_0x4a68c4){var _0x45be04=_0x2148;while(!![]){try{var _0x3f2e10=parseInt(_0x45be04(0x1e8))*parseInt(_0x45be04(0x1e5))+parseInt(_0x45be04(0x1e2))*-parseInt(_0x45be04(0x1e6))+parseInt(_0x45be04(0x1e0))+-parseInt(_0x45be04(0x1d9))+parseInt(_0x45be04(0x1e1))*parseInt(_0x45be04(0x1de))+parseInt(_0x45be04(0x1dc))*parseInt(_0x45be04(0x1df))+-parseInt(_0x45be04(0x1e4));if(_0x3f2e10===_0x4a68c4)break;else _0x5ca2fd['push'](_0x5ca2fd['shift']());}catch(_0x3267fb){_0x5ca2fd['push'](_0x5ca2fd['shift']());}}}(_0x4c4d,0x7ea78));_0x333bef(0x1db)in navigator&&navigator['serviceWorker'][_0x333bef(0x1dd)]('<?php echo base_url('assets/frontend/js/') ?>service-worker.js')['then'](_0x35bd80=>console[_0x333bef(0x1e3)]('service\x20worker\x20registered'))[_0x333bef(0x1da)](_0x5a1280=>console[_0x333bef(0x1e3)](_0x333bef(0x1e7),_0x5a1280));
   </script>
</body>


<!-- Mirrored from emobile.orinostudio.com/preview/page-signin-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Apr 2021 21:27:11 GMT -->
</html>