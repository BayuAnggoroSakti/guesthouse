<?php
function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}
?>
<section role="main" class="content-body">
					<header class="page-header">
						<h2>Dashboard</h2>

						<div class="right-wrapper text-end">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="bx bx-home-alt"></i>
									</a>
								</li>

								<li><span>Dashboard</span></li>

							</ol>

							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					<div class="row">
					
						<div class="col-lg-12">
							<div class="row mb-3">
								<div class="col-xl-6">
									<section class="card card-featured-left card-featured-primary mb-3">
										<div class="card-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-primary">
														<i class="fas fa-life-ring"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Total Rooms</h4>
														<div class="info">
															<strong class="amount"><?php echo count($data_room); ?></strong>
															<span class="text-primary">(<?php echo count($data_room_not) ?> Room tidak aktif)</span>
														</div>
													</div>
												
												</div>
											</div>
										</div>
									</section>
								</div>
								<div class="col-xl-6">
									<section class="card card-featured-left card-featured-secondary">
										<div class="card-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-secondary">
														<i class="fas fa-dollar-sign"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Total Profit</h4>
														<div class="info">
															<strong class="amount"><?php echo rupiah($profit->TOTAL_PRICE); ?></strong>
														</div>
													</div>
													
												</div>
											</div>
										</div>
									</section>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-6">
									<section class="card card-featured-left card-featured-tertiary mb-3">
										<div class="card-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-tertiary">
														<i class="fas fa-shopping-cart"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Total Booking</h4>
														<div class="info">
															<strong class="amount"><?php echo count($booking); ?></strong>
															<span class="text-primary">(<?php echo count($booking_not) ?> Booking canceled)</span>
														</div>
													</div>
													
												</div>
											</div>
										</div>
									</section>
								</div>
								<div class="col-xl-6">
									<section class="card card-featured-left card-featured-quaternary">
										<div class="card-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-quaternary">
														<i class="fas fa-user"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Total User</h4>
														<div class="info">
															<strong class="amount"><?php echo count($user); ?></strong>
														</div>
													</div>
													
												</div>
											</div>
										</div>
									</section>
								</div>
							</div>
						</div>
					</div>

					<div class="row pt-4">
						<div class="col-lg-12 mb-4 mb-lg-0">
							<section class="card">
								<header class="card-header">
									<div class="card-actions">
										<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
										<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
									</div>

									<h2 class="card-title">Available Room</h2>
									<p class="card-subtitle">Menampilkan ketersediaan room selama 2 minggu kedepan</p>
								</header>
								<div class="card-body table-responsive">

									<?php echo $available; ?>

								</div>
							</section>
						</div>
						
					</div>

					
					<div class="row pt-4">
						<div class="col-lg-12 mb-4 mb-lg-0">
							<section class="card">
								<header class="card-header">
									<div class="card-actions">
										<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
										<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
									</div>

									<h2 class="card-title">Calendar Booking</h2>
									<p class="card-subtitle">Menampilkan data booking dalam bentuk kalendaer</p>
								</header>
								<div class="card-body">

									<div id="calendar"></div>

								</div>
							</section>
						</div>
						
					</div>
					<!-- end: page -->
				</section>
				<script src="<?php echo base_url('assets/'); ?>vendor/jquery/jquery.js"></script>
<script>
	(function($) {

	'use strict';

	var initCalendarDragNDrop = function() {
		var Draggable = FullCalendar.Draggable;

		$('#external-events div.external-event').each(function() {
			new Draggable($(this)[0], {
		      	itemSelector: '.external-event',
		      	eventData: function(eventEl) {
		      		var eventObj = $( eventEl ).data('event');
		        	return eventObj;
		      	}
		    });
		});
	};

	var initCalendar = function() {
		var $calendar = $('#calendar');
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();

		var $calendarInstace = new FullCalendar.Calendar( $calendar[0], {
			themeSystem: 'bootstrap',

			eventDisplay: 'block',
			headerToolbar: {
				start: 'title',
				center: '',
				end: 'prev,today,next,dayGridDay,dayGridWeek,dayGridMonth'
			},
		
			bootstrapFontAwesome: {
				close: 'fa-times',
				prev: 'fa-caret-left',
				next: 'fa-caret-right',
				prevYear: 'fa-angle-double-left',
				nextYear: 'fa-angle-double-right'
			},
			editable: false,
			droppable: false, // this allows things to be dropped onto the calendar !!!
			drop: function(eventDropInfo) { // this function is called when something is dropped
				
				// is the "remove after drop" checkbox checked?
		        if ($('#RemoveAfterDrop').is(':checked')) {
		          // if so, remove the element from the "Draggable Events" list
		          eventDropInfo.draggedEl.parentNode.removeChild(eventDropInfo.draggedEl);
		        }

			},
			eventSources: [
				{
					  url: "<?php echo site_url('admin/booking/ajax_calendar') ?>",
				}
			]
        
		});

		$calendarInstace.render();

		// FIX INPUTS TO BOOTSTRAP VERSIONS
		var $calendarButtons = $calendar.find('.fc-header-right > span');
		$calendarButtons
			.filter('.fc-button-prev, .fc-button-today, .fc-button-next')
				.wrapAll('<div class="btn-group mt-sm mr-md mb-sm ml-sm"></div>')
				.parent()
				.after('<br class="hidden"/>');

		$calendarButtons
			.not('.fc-button-prev, .fc-button-today, .fc-button-next')
				.wrapAll('<div class="btn-group mb-sm mt-sm"></div>');

		$calendarButtons
			.attr({ 'class': 'btn btn-sm btn-default' });
	};

	$(function() {
		initCalendar();
		//initCalendarDragNDrop();
	});

}).apply(this, [jQuery]);
</script>