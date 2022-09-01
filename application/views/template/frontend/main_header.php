 <header class="main_haeder bg-transparent header-sticky">
                <div class="em_menu_sidebar">
                    <button type="button" class="btn btn_menuSidebar item-show" data-toggle="modal"
                        data-target="#mdllSidebarMenu-background">
                        <i class="tio-menu_hamburger"></i>
                    </button>
                </div>
                <?php
                    if (isset($title_head)) { ?>
                         <div class="title_page">
                            <h1 class="page_name">
                                <?php echo $title_head; ?>
                            </h1>
                        </div>
                <?php
                    } else { ?>
                         <div class="em_brand">
                            <a href="<?php echo site_url('home') ?>">
                                 <img src="<?php echo base_url('assets/');?>logo.png"  alt="Porto Admin" />
                            </a>
                        </div>
                <?php
                    }
                    
                ?>
               
                <div class="em_side_right">
                    <button type="button" class="btn btn_meunSearch" id="saerch-On-header">
                        <svg class="ico_search" id="Iconly_Two-tone_Search" data-name="Iconly/Two-tone/Search"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <g id="Search" transform="translate(2 2)">
                                <circle id="Ellipse_739" cx="8.989" cy="8.989" r="8.989"
                                    transform="translate(0.778 0.778)" fill="none" stroke="#200e32"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                    stroke-width="1.5" />
                                <path id="Line_181" d="M0,0,3.524,3.515" transform="translate(16.018 16.485)"
                                    fill="none" stroke="#200e32" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-miterlimit="10" stroke-width="1.5" opacity="0.4" />
                            </g>
                        </svg>
                    </button>
                </div>
            </header>