<?php 
$uri1    = $this->uri->segment(2);
$uri2    = $this->uri->segment(3);
$page_dashboard	= "";
$page_user	= "";
$page_room		= "";
$page_room_typebed ="";
$page_room_typeroom ="";
$page_room_room ="";
$page_booking		= "";
$page_booking_order		= "";
$page_booking_calendar		= "";
$page_booking_avail		= "";
if ($uri1=='rooms'){
    if ($uri2 == 'type_bed') {
    	$page_room		= "nav-expanded nav-active";
    	$page_room_typebed ="nav-active";
    }else if ($uri2 == 'type_room') {
    	$page_room		= "nav-expanded nav-active";
    	$page_room_typeroom ="nav-active";
    }else if ($uri2 == '') {
    	$page_room		= "nav-expanded nav-active";
    	$page_room_room ="nav-active";
    }
    
}else if ($uri1=='booking'){
    if ($uri2 == 'order_book') {
    	$page_booking		= "nav-expanded nav-active";
    	$page_booking_order ="nav-active";
    }else if ($uri2 == 'order_book_detail') {
    	$page_booking		= "nav-expanded nav-active";
    	$page_booking_order ="nav-active";
    }
    else if ($uri2 == 'calendar') {
    	$page_booking		= "nav-expanded nav-active";
    	$page_booking_calendar ="nav-active";
    }
    else if ($uri2 == 'available') {
    	$page_booking		= "nav-expanded nav-active";
    	$page_booking_avail ="nav-active";
    }
    
} elseif ($uri1=='dashboard'){
    $page_dashboard	= "nav-active";  
} elseif ($uri1=='users') {
	$page_user	= "nav-active";
}
?>
<aside id="sidebar-left" class="sidebar-left">

				    <div class="sidebar-header">
				        <div class="sidebar-title">
				            Navigation
				        </div>
				        <div class="sidebar-toggle d-none d-md-block" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
				            <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
				        </div>
				    </div>

				    <div class="nano">
				        <div class="nano-content">
				            <nav id="menu" class="nav-main" role="navigation">

				                <ul class="nav nav-main">
				                    <li class="<?php echo $page_dashboard; ?>">
				                        <a href="<?php echo site_url('admin/dashboard'); ?>" class="nav-link" href="layouts-default.html">
				                            <i class="bx bxs-dashboard" aria-hidden="true"></i>
				                            <span>Dashboard</span>
				                        </a>                        
				                    </li>
				                      <li class="nav-parent <?php echo $page_room; ?>">
				                        <a class="nav-link" href="#">
				                            <i class="bx bx-home-alt" aria-hidden="true"></i>
				                            <span>Manage Rooms</span>
				                        </a>
				                        <ul class="nav nav-children">
				                            <li class="<?php echo $page_room_typebed; ?>">
				                                <a class="nav-link" href="<?php echo site_url('admin/rooms/type_bed'); ?>">
				                                 	<i class="fas fa-bed" aria-hidden="true"></i>
				                                    Type Bed
				                                </a>
				                            </li>
				                            <li class="<?php echo $page_room_typeroom; ?>">
				                                <a class="nav-link" href="<?php echo site_url('admin/rooms/type_room'); ?>">
				                                   <i class="fas fa-book" aria-hidden="true"></i>
				                                   Type Room
				                                </a>
				                            </li>
				                            <li class="<?php echo $page_room_room; ?>">
				                                <a class="nav-link" href="<?php echo site_url('admin/rooms'); ?>">
				                                    <i class="fas fa-home" aria-hidden="true"></i>Room
				                                </a>
				                            </li>
				                        </ul>
				                    </li>
				                 	 <li class="nav-parent <?php echo $page_booking; ?>">
				                        <a class="nav-link" href="#">
				                            <i class="bx bx-book" aria-hidden="true"></i>
				                            <span>Booking</span>
				                        </a>
				                        <ul class="nav nav-children">
				                            <li class="<?php echo $page_booking_order; ?>">
				                                <a class="nav-link" href="<?php echo site_url('admin/booking/order_book'); ?>">
				                                 	</i>
				                                    Order Booking
				                                </a>
				                            </li>
				                            <li class="<?php echo $page_booking_avail; ?>">
				                                <a class="nav-link" href="<?php echo site_url('admin/booking/available'); ?>">
				                                   </i>
				                                   Available Room
				                                </a>
				                            </li>
				                              <li class="<?php echo $page_booking_calendar; ?>">
				                                <a class="nav-link" href="<?php echo site_url('admin/booking/calendar'); ?>">
				                                    Calendar
				                                </a>
				                            </li>
				                            <li class="">
				                                <a class="nav-link" href="<?php echo site_url('admin/report'); ?>">
				                                    Report
				                                </a>
				                            </li>
				                        </ul>
				                    </li>
				                     <li class="<?php echo $page_user; ?>">
				                        <a href="<?php echo site_url('admin/users'); ?>" class="nav-link" href="layouts-default.html">
				                            <i class="bx bxs-user-account" aria-hidden="true"></i>
				                            <span>Manager Users</span>
				                        </a>                        
				                    </li>
				                  
				                 
				                  

				                </ul>
				            </nav>

				         
				        </div>

				        <script>
				            // Maintain Scroll Position
				            if (typeof localStorage !== 'undefined') {
				                if (localStorage.getItem('sidebar-left-position') !== null) {
				                    var initialPosition = localStorage.getItem('sidebar-left-position'),
				                        sidebarLeft = document.querySelector('#sidebar-left .nano-content');

				                    sidebarLeft.scrollTop = initialPosition;
				                }
				            }
				        </script>

				    </div>

				</aside>