<?php 
function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}

function timestamp_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
$sum_adding_bed = 0;
$sum_room = 0;
$total = 0;
$disabled = '';
if ($booking->STATUS == 2 || $booking->STATUS == 3) {
	$disabled = 'disabled';
}

?>	
<style type="text/css">
	.disabled {
	  pointer-events: none;
	  cursor: default;
	}
</style>
  <!-- Script -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


	<section role="main" class="content-body">
					<header class="page-header">
						<h2>Booking #<?php echo $this->uri->segment(4); ?> Details</h2>

						<div class="right-wrapper text-end">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="bx bx-home-alt"></i>
									</a>
								</li>

								<li><span>Booking</span></li>
								<li><span>Order Booking</span></li>
								<li><span>Booking Detail</span></li>

							</ol>

							<a class="sidebar-right-toggle" ></a>
						</div>
					</header>
					<?php 
					if ($booking->STATUS == 3) {
						echo '<div class="alert alert-danger" role="alert">Order booking ini telah di cancel dengan catatan : '.$booking->NOTE.'</div>';
					} 
					
					 ?>
					<div id="infoMessage"><?php echo $message;?></div>
					<!-- start: page -->
					<form class="order-details action-buttons-fixed" method="post">
						<div class="row">
							<div class="col-xl-4 mb-4 mb-xl-0">

								<div class="card card-primary">
									<div class="card-header">
										<h2 class="card-title">General</h2>
									</div>
									<div class="card-body">
										<div class="form-row">
											<div class="form-group col mb-3">
												<strong class="d-block text-color-dark">Status</strong>
												<?php 
									 					if ($booking->STATUS == 0) {
									 						echo '<span class="badge badge-info">News Booking</span>';
									 					}else if ($booking->STATUS == 1) {
									 						echo '<span class="badge badge-warning">Setting Rooms</span>';
									 					}else if ($booking->STATUS == 2) {
									 						echo '<span class="badge badge-success">Completed</span>';
									 					} else {
									 						echo '<span class="badge badge-danger">Canceled</span>';
									 					}
									 					
									 				?>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col mb-3">
												<strong class="d-block text-color-dark">Check In</strong>
												<div class="date-time-field">
													<?php echo timestamp_indo(substr($booking->STR_CHECKIN,0,10)).', '.substr($booking->STR_CHECKIN,11,5); ?>
												</div>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col mb-3">
												<strong class="d-block text-color-dark">Check Out</strong>
												<div class="date-time-field">
													<?php echo timestamp_indo(substr($booking->STR_CHECKOUT,0,10)).', '.substr($booking->STR_CHECKOUT,11,5); ?>
												</div>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col mb-3">
												<strong class="d-block text-color-dark">User Created</strong>
												<?php echo $booking->USER_CREATED; ?>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col mb-3">
												<strong class="d-block text-color-dark">Created On</strong>
												<?php echo $booking->STR_DATETIME_INSERT; ?>
											</div>
										</div>
									</div>
								</div>

							</div>
							<div class="col-xl-8">

								<div class="card card-primary">
									<div class="card-header">
										<h2 class="card-title">Personal Info</h2>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-xl-auto me-xl-5 pe-xl-5 mb-4 mb-xl-0">
												<h3 class="text-color-dark font-weight-bold text-4 line-height-1 mt-0 mb-3">PIC Booking</h3>
												
												<strong class="d-block text-color-dark">Name:</strong>
												<?php echo $booking->NAME_PIC_BOOKING; ?>
												<strong class="d-block text-color-dark mt-3">Unit:</strong>
												<?php echo $booking->UNIT_PIC_BOOKING; ?>
												<strong class="d-block text-color-dark mt-3">No HP:</strong>
												<?php echo $booking->NOHP_PIC_BOOKING; ?>
												<strong class="d-block text-color-dark">Keterangan :</strong>
												<?php echo $booking->DESC; ?>
											</div>
											<div class="col-xl-auto ps-xl-5">
												<h3 class="font-weight-bold text-color-dark text-4 line-height-1 mt-0 mb-3">Guest</h3>
												<strong class="d-block text-color-dark">Name:</strong>
												<?php echo $booking->GUEST_NAME_LEAD; ?>
												<strong class="d-block text-color-dark mt-3">Unit:</strong>
												<?php echo $booking->UNIT_PIC_BOOKING; ?>
												<strong class="d-block text-color-dark mt-3">No HP:</strong>
												<?php echo $booking->GUEST_NOHP_LEAD; ?>
											</div>

										</div>
									</div>
								</div>

							</div>
						</div>
						<div class="row">
							<div class="col">

								<div class="card card-primary">
									<div class="card-header">
										<h2 class="card-title">Rooms Detail</h2>
									</div>
								
									<div class="card-body">
									<div class="col-sm-auto text-left mb-4 mb-sm-0 mt-2 mt-sm-0">
										<a href="#roomForm"  class="<?php echo $disabled; ?> modal-with-form ecommerce-sidebar-link btn btn-primary btn-md font-weight-semibold btn-py-2 px-4"><i class="fas fa-plus"></i> Add Room</a>
										
										
										
									</div>
										<div class="table-responsive">
											<table class="table table-ecommerce-simple table-ecommerce-simple-border-bottom table-borderless table-striped mb-0" style="min-width: 380px;">
												<thead>
													<tr>
														<th class="ps-4">No.</th>
														<th>Type Room</th>
														<th>No. Room</th>
														<th>Check In/Out</th>
														<th class="text-end">Qty Person</th>
														<th class="text-end">Total</th>
													</tr>
												</thead>
												<tbody>
													<?php 
													if (count($booking_room) == 0) { ?>
														 <tr>
												            <td colspan="6" align="center">
												                <?php echo "Tidak ada data pemesanan kamar"; ?>
												            </td>
												        </tr>
													<?php
													} else {

														$i=0;
														foreach ($booking_room as $data_room) { $i++; ?>
															<tr>
																<td class="ps-4"><strong><?php echo $i; ?></strong></td>
																<td>

																	<!-- <a class="<?php echo $disabled; ?> modal-with-form" href="#detailRoomForm<?php echo $i;?>">
																	
																		<strong><?php echo $data_room->ROOM_CATEGORY.' - '.$data_room->ROOM_NAME; ?>
																		</strong>
																	</a> -->
																	<a data-id='<?php echo $data_room->ID_BOOKING_ROOM; ?>'  class="<?php echo $disabled; ?> booking-typeroom-detail" href="#">
																	
																		<strong><?php echo $data_room->ROOM_CATEGORY.' - '.$data_room->ROOM_NAME; ?>
																		</strong>
																	</a>
																<!-- 	<button <?php echo $disabled; ?> type="button" data-id='<?php echo $data_room->ID_BOOKING_ROOM; ?>' class="booking-typeroom-detail mb-1 mt-1 me-1 btn btn-primary"><i class="fas fa-bed"></i> Edit</button> -->
																</td>
																<td><?php 
																	if ($data_room->ROOM_NO == '') { ?>
																		<button <?php echo $disabled; ?> type="button" data-id='<?php echo $data_room->ID_BOOKING_ROOM; ?>' class="booking-room-detail mb-1 mt-1 me-1 btn btn-primary"><i class="fas fa-bed"></i> Pilih Room</button>
																	<?php
																	} else { ?>
																		<a data-id='<?php echo $data_room->ID_BOOKING_ROOM; ?>' class="<?php echo $disabled; ?> booking-room-detail mb-1 mt-1 me-1 btn btn-primary"> <?php echo $data_room->ROOM_NO ?></a>
																<?php
																	}
																	
																?></td>
																<td>
																	<b>Checkin :</b><br> <?php
																	if ($data_room->STR_CHECKIN != "") {
																	 	 echo timestamp_indo(substr($data_room->STR_CHECKIN,0,10)).', '.substr($data_room->STR_CHECKIN,11,5);
																	 }
																	  ?>
																	<br>
																	<br>
																	<b>Checkout :</b><br> <?php 
																	if ($data_room->STR_CHECKOUT != "") {
																	 	echo timestamp_indo(substr($data_room->STR_CHECKOUT,0,10)).', '.substr($data_room->STR_CHECKOUT,11,5); 
																	 }
																?>
																</td>
																<td class="text-end"><?php echo $data_room->TOTAL_PERSON;?> Orang</td>
																<td class="text-end"><?php echo rupiah($data_room->PRICE);?></td>
														
															</tr>
																<div id="detailRoomForm<?php echo $i;?>" class="modal-block modal-header-color modal-block-primary mfp-hide">
																<section class="card">
																	<header class="card-header">
																		<h2 class="card-title">Form Detail Room</h2>
																	</header>
																	<div class="card-body">
																		<form action="<?php echo site_url('admin/booking/order_book_detail_editroom');?>" method="post">
																			<input type="hidden" name="id_booking" value="<?php echo $this->uri->segment(4);?>">
																			<input type="hidden" name="id_booking_room" value="<?php echo $data_room->ID_BOOKING_ROOM;?>">
																			<div class="form-group">
																				<label for="inputAddress"><b>Type Room</b></label>
																				<select disabled class="form-control" required name="id_room_type">
																					<option value="">Silahkan pilih type room</option>
																					<?php 
																						foreach ($room_type as $data_type) {
																							if ($data_type->ID_ROOM_TYPE == $data_room->ID_ROOM_TYPE) {
																								$selected = 'selected';
																							} else {
																								$selected = '';
																							}
																							
																							echo '<option '.$selected.' value="'.$data_type->ID_ROOM_TYPE.'">'.$data_type->ROOM_NAME.' - '.$data_type->ROOM_CATEGORY.'</option>';
																						}
																					?>
																				</select>
																			</div>
																			<div class="form-group">
																				<label for="inputAddress2"><b>Check In</b></label>
																				<input required value="<?php echo substr($data_room->STR_CHECKIN,0,10); ?>" type="date" name="checkin_date" class="form-control" >
																			</div>
																			<div class="form-group">
																				<label for="inputAddress2"><b>Jam Check In</b></label>
																				<input required value="<?php echo substr($data_room->STR_CHECKIN,11,5); ?>" type="time" name="checkin_time" class="form-control" >
																			</div>
																			<div class="form-group">
																				<label for="inputAddress2"><b>Check Out</b></label>
																				<input required value="<?php echo substr($data_room->STR_CHECKOUT,0,10); ?>" type="date" name="checkout_date" class="form-control"  >
																			</div>
																			<div class="form-group">
																				<label for="inputAddress2"><b>Jam Check Out</b></label>
																				<input required value="<?php echo substr($data_room->STR_CHECKOUT,11,5); ?>" type="time" name="checkout_time" class="form-control" >
																			</div>
																		
																	</div>
																	<footer class="card-footer">
																		<div class="row">
																			<div class="col-md-2">
																			
																				<a href="<?php echo site_url('admin/booking/delete_room_booking/').$data_room->ID_BOOKING_ROOM; ?>" onclick="return confirm('Apakah anda yakin akan menghapus room ini?')" class="btn btn-danger">Delete</a>
																			</div>
																			<div class="col-md-10 text-end">
																				<input type="submit" value="update" class="btn btn-primary">
																				<button class="btn btn-default modal-dismiss">Cancel</button>
																			</div>
																			
																		</div>
																		
																	</footer>
																	</form>
																</section>
															</div>
														
													<?php
													$sum_room = $sum_room+$data_room->PRICE;
														}
													}
													?>

												</tbody>
											</table>
											<div class="card-header">
												<h2 class="card-title">Additonal Bed</h2>
											</div>
											<a href="#bedForm" class="<?php echo $disabled; ?> modal-with-form ecommerce-sidebar-link btn btn-info btn-md font-weight-semibold btn-py-2 px-4"><i class="fas fa-plus"></i> Add Bed</a>
											<table class="table table-ecommerce-simple table-ecommerce-simple-border-bottom table-borderless table-striped mb-0" style="min-width: 380px;">
												<thead>
													<tr>
														<th class="ps-4">No.</th>
														<th>No. Room</th>
														<th>Bed Name</th>
														<th>Bed Count</th>

														<th>Check IN/OUT</th>
														<th>Total</th>
													</tr>
												</thead>
												<tbody>
													<?php
													if (count($adding_bed) == 0) { ?>
														 <tr>
												            <td colspan="6" align="center">
												                <?php echo "Tidak ada data penambahan bed"; ?>
												            </td>
												        </tr>
													<?php
													} else {
														
													
													$i=0;
														foreach ($adding_bed as $data_bed) { $i++;?>
															<tr>
																<td><?php echo $i; ?></td>
																<td><a class="<?php echo $disabled; ?> modal-with-form" href="#detailBedForm<?php echo $i;?>">
																		<strong><?php echo $data_bed->ROOM_NO;  ?>
																		</strong>
																	</a></td>
																<td><?php echo $data_bed->TYPE_BED; ?></td>
																<td><?php echo $data_bed->BED_COUNT;  ?></td>
																
																<td>
																	<b>Start :</b><br> <?php echo timestamp_indo(substr($data_bed->STR_CHECKIN,0,10)); ?>
																	<br>
																	<br>
																	<b>Stop :</b><br> <?php echo timestamp_indo(substr($data_bed->STR_CHECKOUT,0,10)); ?>
																</td>
																<td><?php echo rupiah($data_bed->PRICE);  ?></td>
																	<div id="detailBedForm<?php echo $i;?>" class="modal-block modal-header-color modal-block-primary mfp-hide">
																<section class="card">
																	<header class="card-header">
																		<h2 class="card-title">Form Detail Addtional Bed</h2>
																	</header>
																	<div class="card-body">
																		<form action="<?php echo site_url('admin/booking/order_book_detail_editbed');?>" onsubmit="return checkvaliddate()" method="post">
																	<input type="hidden" name="id_booking" value="<?php echo $this->uri->segment(4);?>">
																	<input type="hidden" name="id_booking_room_add_bed" value="<?php echo $data_bed->ID_BOOKING_ROOM_ADD_BED;?>">
																	<div class="form-group">
																		<label for="inputAddress"><b>Pilih Room</b></label>
																		<select class="form-control" required name="id_booking_room">
																			<option value="">Silahkan pilih room</option>
																			<?php 
																				foreach ($booking_room as $data_room_form) {
																					if ($data_room_form->ID_ROOM != "") { 
																						if ($data_room_form->ID_BOOKING_ROOM == $data_bed->ID_BOOKING_ROOM ) {
																							$selected = "selected";
																						} else {
																							$selected = "";
																						}
																						
																						?>
																						<option <?php echo $selected;?> value="<?php echo $data_room_form->ID_BOOKING_ROOM  ?>"><?php
																							echo $data_room_form->ROOM_NO.' : '. timestamp_indo(substr($data_room_form->STR_CHECKIN,0,10)).' - '.timestamp_indo(substr($data_room_form->STR_CHECKOUT,0,10));
																						?></option>
																				<?PHP
																					}
																				}
																			?>
																		</select>
																	</div>
																	<div class="form-group">
																		<label for="inputAddress2"><b>Jenis Bed</b></label>
																			<select class="form-control" required name="type_bed">
																			<option value="">Silahkan pilih type bed</option>
																			<?php 
																				foreach ($bed_type as $data_bed_type) {
																			if ($data_bed->TYPE_BED == $data_bed_type->BED_NAME ) {
																							$selected = "selected";
																						} else {
																							$selected = "";
																						}
																					?>
																						<option <?php echo $selected; ?> value="<?php echo $data_bed_type->BED_NAME;  ?>"><?php
																							echo $data_bed_type->BED_NAME;
																						?></option>
																				<?php
																				}
																			?>
																		</select>
																	</div>
																	<div class="form-group">
																		<label for="inputAddress2"><b>Jumlah Bed</b></label>
																		<input required value="<?php echo $data_bed->BED_COUNT?>" type="number" name="bed_count" class="form-control" >
																	</div>
																	<div class="form-group">
																		<label for="inputAddress2"><b>Start</b></label>
																		<input required value="<?php echo substr($data_bed->STR_CHECKIN,0,10); ?>" type="date" id="checkvaliddate_checkin_date" name="start" class="form-control" >
																	</div>
																	<div class="form-group">
																		<label for="inputAddress2"><b>Stop</b></label>
																		<input required id="checkvaliddate_checkout_date" value="<?php echo substr($data_bed->STR_CHECKOUT,0,10); ?>" type="date" name="end" class="form-control"  >
																	</div>
																
															</div>
															<footer class="card-footer">
																<div class="row">
																	<div class="col-md-2">
																			
																				<a href="<?php echo site_url('admin/booking/delete_room_booking_addbed/').$data_bed->ID_BOOKING_ROOM_ADD_BED; ?>" onclick="return confirm('Apakah anda yakin akan menghapus bed ini?')" class="btn btn-danger">Delete</a>
																			</div>
																	<div class="col-md-10 text-end">
																		<input type="submit" class="btn btn-primary"></input>
																		<button class="btn btn-default modal-dismiss">Cancel</button>
																	</div>
																</div>
																
															</footer>
															</form>
																</section>
															</div>
															</tr>
													<?php
													$sum_adding_bed = $sum_adding_bed+$data_bed->PRICE;
														}
													}
													?>
												</tbody>
											</table>
										</div>

										<div class="row justify-content-end flex-column flex-lg-row my-3">
											<div class="col-auto me-2">
												<h3 class="font-weight-bold text-color-dark text-4 mb-3">Addtional Bed</h3>
												<span class="d-flex align-items-center">
													add <?php echo count($adding_bed); ?> bed
													<i class="fas fa-chevron-right text-color-primary px-3"></i>
													<b class="text-color-dark text-xxs"><?php echo rupiah($sum_adding_bed); ?></b>
												</span>
											</div>
										
											<div class="col-auto me-5">
												<h3 class="font-weight-bold text-color-dark text-4 mb-3">Rooms Sub total</h3>
												<span class="d-flex align-items-center">
													<?php echo count($booking_room); ?> Rooms
													<i class="fas fa-chevron-right text-color-primary px-3"></i>
													<b class="text-color-dark text-xxs"><?php echo rupiah($sum_room); ?></b>
												</span>
											</div>
											<div class="col-auto">
												<h3 class="font-weight-bold text-color-dark text-4 mb-3">Order Total</h3>
												<span class="d-flex align-items-center justify-content-lg-end">
													<strong class="text-color-dark text-5"><?php echo rupiah($sum_room+$sum_adding_bed); ?></strong>
												</span>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
						<div class="row">
							<div class="col">

								<div class="card card-modern">
									<div class="card-header">
										<h2 class="card-title">Activity Booking</h2>
									</div>
									<div class="card-body">
										<div class="ecommerce-timeline mb-3">
											<div class="ecommerce-timeline-items-wrapper">
												<?php foreach ($log_booking as $data_log) { ?>
														<div class="ecommerce-timeline-item">
															<small>added on <?php echo $data_log->STR_DATETIME_INSERT ?> <a href="" class="text-color-danger"><?php echo $data_log->FIRST_NAME.' '.$data_log->LAST_NAME ?></a></small>
															<p><?php echo $data_log->MESSAGE ?></p>
														</div>
												<?php
												} ?>
											
											</div>
										</div>
	
									</div>
								</div>

							</div>
						</div>
						<div class="row action-buttons">
							<div class="col-12 col-md-auto">
								<a  href="#modalCompleted" class="<?php echo $disabled; ?> modal-basic submit-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" data-loading-text="Loading...">
									<i class="bx bx-save text-4 me-2"></i> Complete Order
								</a>
							</div>
							<div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
								<a href="#modalCancel" class="<?php echo $disabled; ?> modal-basic delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
									<i class="bx bx-trash text-4 me-2"></i> Cancel Order
								</a>
							</div>
						</div>
					</form>
					<!-- end: page -->
				</section>
				<div id="modalCancel" class="modal-block modal-block-primary mfp-hide">
					<section class="card">
						<header class="card-header">
							<h2 class="card-title">Are you sure?</h2>
						</header>
						<div class="card-body">
							<div class="modal-wrapper">
								<div class="modal-icon">
									<i class="fas fa-question-circle"></i>
								</div>
								<div class="modal-text">
									<h4 class="font-weight-bold text-dark">Cancel Booking #<?php echo $this->uri->segment(4); ?></h4>
									<p>Apakah anda yakin akan cancel order booking ini, booking yg di cancel tidak dapat dikembalikan lagi?</p>
								</div>
							</div>
						</div>
						<footer class="card-footer">
							<div class="row">
								<div class="col-md-12 text-end">
									<form action="<?php echo site_url('admin/booking/canceled');?>" method="post">
										<input type="hidden" name="id_booking" value="<?php echo $this->uri->segment(4); ?>">
										<input type="text" required class="form-control" placeholder="Add Note" name="add_note">
										<br>
										<input type="submit" value="confirm" class="btn btn-primary"></input>
										<button class="btn btn-default modal-dismiss">Cancel</button>
									</form>
								</div>
							</div>
						</footer>
					</section>
				</div>
				<div id="modalCompleted" class="modal-block modal-block-primary mfp-hide">
						<section class="card">
							<header class="card-header">
								<h2 class="card-title">Are you sure?</h2>
							</header>
							<div class="card-body">
								<div class="modal-wrapper">
									<div class="modal-icon">
										<i class="fas fa-question-circle"></i>
									</div>
									<div class="modal-text">
										<h4 class="font-weight-bold text-dark">Completed Booking #<?php echo $this->uri->segment(4); ?></h4>
										<p>Apakah anda yakin akan menyelesaikan order booking ini? booking yang sudah completed tidak dapat diubah lagi</p>
									</div>
								</div>
							</div>
							<footer class="card-footer">
								<div class="row">
									<div class="col-md-12 text-end">
										<form action="<?php echo site_url('admin/booking/completed');?>" method="post">
											<input type="hidden" name="id_booking" value="<?php echo $this->uri->segment(4); ?>">
											<input type="text" required class="form-control" placeholder="Add Note" name="add_note">
											<br>
											<input type="submit" value="confirm" class="btn btn-primary"></input>
											<button class="btn btn-default modal-dismiss">Cancel</button>
										</form>
									</div>
								</div>
							</footer>
						</section>
					</div>
	   <div class="modal fade modal-header-color modal-block-primary " id="RoomTypeModal" role="dialog">
	 <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	  <section class="card">
																	<header class="card-header">
																		<h2 class="card-title">Form Detail Room</h2>
																	</header>
																	<div class="card-body">
																		<form action="<?php echo site_url('admin/booking/order_book_detail_editroom');?>" onsubmit="return RoomTypeModal_valid()" method="post">
																			<input type="hidden" name="id_booking" value="<?php echo $this->uri->segment(4);?>">
																			<input type="hidden" name="id_booking_room" id="RoomTypeModal_id_booking_room">
																			<div class="form-group">
																				<label for="inputAddress"><b>Type Room</b></label>
																				<input 	class="form-control" type="text" disabled id="RoomTypeModal_id_room_type">
																			</div>
																			<div class="form-group">
																				<label for="inputAddress2"><b>Check In</b></label>
																				<input required  type="date" id="RoomTypeModal_checkin_date" name="checkin_date" class="form-control" >
																			</div>
																			<div class="form-group">
																				<label for="inputAddress2"><b>Jam Check In</b></label>
																				<input required id="RoomTypeModal_checkin_time" type="time" name="checkin_time" class="form-control" >
																			</div>
																			<div class="form-group">
																				<label for="inputAddress2"><b>Check Out</b></label>
																				<input required id="RoomTypeModal_checkout_date"type="date" name="checkout_date" class="form-control"  >
																			</div>
																			<div class="form-group">
																				<label for="inputAddress2"><b>Jam Check Out</b></label>
																				<input required id="RoomTypeModal_checkout_time" type="time" name="checkout_time" class="form-control" >
																			</div>
																		
																	</div>
																	<footer class="card-footer">
																		<div class="row">
																			<div class="col-md-2">
																			
																				<a id="RoomTypeModal_delete" onclick="return confirm('Apakah anda yakin akan menghapus room ini?')" class="btn btn-danger">Delete</a>
																			</div>
																			<div class="col-md-10 text-end">
																				<input type="submit" value="update" class="btn btn-primary">

																				<a class="btn btn-default "   data-bs-dismiss="modal">Cancel</a>
																			</div>
																			
																		</div>
																		
																	</footer>
																	</form>
																</section>
	    </div>
	  </div>
   </div>
   <div class="modal fade modal-header-color modal-block-primary " id="empModal" role="dialog">
	 <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	     <section class="card">
				<header class="card-header">
					<h2 class="card-title" style="color:white">Silahkan Pilih Room yang tersedia</h2>
				</header>
				<div class="col-lg-3-5 col-xl-4-5">
							<div class="row row-gutter-sm" id="result_ajax">

							

							</div>
							
						</div>
			</section>
	    </div>
	  </div>
   </div>
<div id="roomForm" class="modal-block modal-header-color modal-block-primary mfp-hide">
										<section class="card">
											<header class="card-header">
												<h2 class="card-title">Form Tambah Room</h2>
											</header>
											<div class="card-body">
												<form action="<?php echo site_url('admin/booking/order_book_detail_addroom');?>" method="post">
													<input type="hidden" name="id_booking" value="<?php echo $this->uri->segment(4);?>">
													<div class="form-group">
														<label for="inputAddress"><b>Type Room</b></label>
														<select class="form-control" required name="id_room_type">
															<option value="">Silahkan pilih type room</option>
															<?php 
																foreach ($room_type as $data) {
																	echo '<option value="'.$data->ID_ROOM_TYPE.'">'.$data->ROOM_NAME.' - '.$data->ROOM_CATEGORY.'</option>';
																}
															?>
														</select>
													</div>
													<div class="form-group">
														<label for="inputAddress2"><b>Check In</b></label>
														<input required value="<?php echo substr($booking->STR_CHECKIN,0,10); ?>" type="date" name="checkin_date" class="form-control" >
													</div>
													<div class="form-group">
														<label for="inputAddress2"><b>Jam Check In</b></label>
														<input required value="<?php echo substr($booking->STR_CHECKIN,11,5); ?>" type="time" name="checkin_time" class="form-control" >
													</div>
													<div class="form-group">
														<label for="inputAddress2"><b>Check Out</b></label>
														<input required value="<?php echo substr($booking->STR_CHECKOUT,0,10); ?>" type="date" name="checkout_date" class="form-control"  >
													</div>
													<div class="form-group">
														<label for="inputAddress2"><b>Jam Check Out</b></label>
														<input required value="<?php echo substr($booking->STR_CHECKOUT,11,5); ?>" type="time" name="checkout_time" class="form-control" >
													</div>
												
											</div>
											<footer class="card-footer">
												<div class="row">
													<div class="col-md-12 text-end">
														<input type="submit" class="btn btn-primary"></input>
														<button class="btn btn-default modal-dismiss">Cancel</button>
													</div>
												</div>
												
											</footer>
											</form>
										</section>
									</div>
<div id="bedForm" class="modal-block modal-header-color modal-block-info mfp-hide">
										<section class="card">
											<header class="card-header">
												<h2 class="card-title">Form Tambah Bed</h2>
											</header>
											<div class="card-body">
												<form action="<?php echo site_url('admin/booking/order_book_detail_addbed');?>" method="post">
													<input type="hidden" name="id_booking" value="<?php echo $this->uri->segment(4);?>">
													<div class="form-group">
														<label for="inputAddress"><b>Pilih Room</b></label>
														<select class="form-control" required name="id_booking_room">
															<option value="">Silahkan pilih room</option>
															<?php 
																foreach ($booking_room as $data_room_form) {
																	if ($data_room_form->ID_ROOM != "") { ?>
																		<option value="<?php echo $data_room_form->ID_BOOKING_ROOM  ?>"><?php
																			echo $data_room_form->ROOM_NO.' : '. timestamp_indo(substr($data_room_form->STR_CHECKIN,0,10)).' - '.timestamp_indo(substr($data_room_form->STR_CHECKOUT,0,10));
																		?></option>
																<?PHP
																	}
																}
															?>
														</select>
													</div>
													<div class="form-group">
														<label for="inputAddress2"><b>Jenis Bed</b></label>
															<select class="form-control" required name="type_bed">
															<option value="">Silahkan pilih type bed</option>
															<?php 
																foreach ($bed_type as $data_bed_type) {?>
																		<option value="<?php echo $data_bed_type->BED_NAME;  ?>"><?php
																			echo $data_bed_type->BED_NAME;
																		?></option>
																<?php
																}
															?>
														</select>
													</div>
													<div class="form-group">
														<label for="inputAddress2"><b>Jumlah Bed</b></label>
														<input required  type="number" name="bed_count" class="form-control" >
													</div>
													<div class="form-group">
														<label for="inputAddress2"><b>Start</b></label>
														<input required value="<?php echo substr($booking->STR_CHECKIN,0,10); ?>" type="date" name="start" class="form-control" >
													</div>
													<div class="form-group">
														<label for="inputAddress2"><b>Stop</b></label>
														<input required value="<?php echo substr($booking->STR_CHECKOUT,0,10); ?>" type="date" name="end" class="form-control"  >
													</div>
												
											</div>
											<footer class="card-footer">
												<div class="row">
													<div class="col-md-12 text-end">
														<input type="submit" class="btn btn-primary"></input>
														<button class="btn btn-default modal-dismiss">Cancel</button>
													</div>
												</div>
												
											</footer>
											</form>
										</section>
									</div>

<script>
		  $(document).ready(function(){

		 $('.booking-room-detail').click(function(){
		   
		   var id_room_detail = $(this).data('id');
		   $('#empModal').modal('show'); 
		   // AJAX request
		   $.ajax({
		    url: '<?php echo site_url('admin/booking/order_book_detail_ajax') ?>',
		    type: 'post',
		    data: {id_room_detail: id_room_detail},
		    success: function(response){ 
		      // Add response in Modal body
		      $('#result_ajax').html(response);

		      $('#empModal').modal('show'); 
		    }
		  });
		 });

		 $('.booking-typeroom-detail').click(function(){
		   
		   var id_room_detail = $(this).data('id');
		   
		   $('#RoomTypeModal').modal('show'); 
		   // AJAX request
		   $.ajax({
		    url: '<?php echo site_url('admin/booking/order_book_typeroom_ajax') ?>',
		    type: 'post',
		     dataType: "json",
		    data: {id_room_detail: id_room_detail},
		    success: function(response){ 
		      // Add response in Modal body
		      $('#RoomTypeModal_id_room_type').val(response['ROOM_NAME']+" - "+response['ROOM_CATEGORY']);
		      $('#RoomTypeModal_id_booking_room').val(response['ID_BOOKING_ROOM']);
		      $('#RoomTypeModal_checkin_date').val(response['STR_CHECKIN'].substr(0,10));
		      $('#RoomTypeModal_checkin_time').val(response['STR_CHECKIN'].substr(11,5));
		      $('#RoomTypeModal_checkout_date').val(response['STR_CHECKOUT'].substr(0,10));
		      $('#RoomTypeModal_checkout_time').val(response['STR_CHECKOUT'].substr(11,5));
		      //$('#RoomTypeModal').modal('show'); 
		      var link = '<?php echo site_url('admin/booking/delete_room_booking/') ?>'+response['ID_BOOKING_ROOM'];
		      $("#RoomTypeModal_delete").attr("href", link);
		    }
		  });
		 });

		
		});

		  function RoomTypeModal_valid()
		 {
  				var d1 = new Date(document.getElementById("RoomTypeModal_checkin_date").value);   
                var d2 = new Date(document.getElementById("RoomTypeModal_checkout_date").value);   
                    
                var diff = d2.getTime() - d1.getTime();   
                    
                var daydiff = diff / (1000 * 60 * 60 * 24);  
                if (daydiff == 0 ) 
                {
                    alert("Tanggal checkin tidak boleh sama dengan tanggal checkout");
                    return false;
                } else if(daydiff < 0)
                {
                    alert("Tanggal checkin tidak boleh melebihi tanggal checkout");
                    return false;
                }else{
                    return true;
                } 
		 }

		  function checkvaliddate()
		 {
  				var d1 = new Date(document.getElementById("checkvaliddate_checkin_date").value);   
                var d2 = new Date(document.getElementById("checkvaliddate_checkout_date").value);   
                    
                var diff = d2.getTime() - d1.getTime();   
                    
                var daydiff = diff / (1000 * 60 * 60 * 24);  
                if (daydiff == 0 ) 
                {
                    alert("Tanggal checkin tidak boleh sama dengan tanggal checkout");
                    return false;
                } else if(daydiff < 0)
                {
                    alert("Tanggal checkin tidak boleh melebihi tanggal checkout");
                    return false;
                }else{
                    return true;
                } 
		 }
		</script>