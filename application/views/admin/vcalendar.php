
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Calendar</h2>

						<div class="right-wrapper text-end">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="bx bx-home-alt"></i>
									</a>
								</li>

								<li><span>Pages</span></li>

								<li><span>Calendar</span></li>

							</ol>

							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					<section class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-lg-12">
									<div id="calendar"></div>
								</div>
							
							</div>
						</div>
					</section>

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
		console.log(Date(y, m, d-5));
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