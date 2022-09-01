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
?>
<section role="main" class="content-body">
					<header class="page-header">
						<h2>Booking</h2>

						<div class="right-wrapper text-end">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="bx bx-home-alt"></i>
									</a>
								</li>

								<li><span>Booking</span></li>
								<li><span>Order Booking</span></li>

							</ol>

							<a class="sidebar-right-toggle" ></a>
						</div>
					</header>

					<!-- start: page -->
						<section class="card">
							<header class="card-header">
								<div class="card-actions">
									<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
									<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
								</div>

								<h2 class="card-title">Data Order List</h2>
							</header>
							<div class="card-body">
							<div id="infoMessage"><?php echo $message;?></div>
			<!-- 				<div class="col-sm-auto text-left mb-4 mb-sm-0 mt-2 mt-sm-0">
								<a href="#modalForm" class="modal-with-form ecommerce-sidebar-link btn btn-primary btn-md font-weight-semibold btn-py-2 px-4"><i class="fas fa-plus"></i> Add Booking</a>
								
							</div> -->
							<div class="table-responsive">
								
							
								<table class="table table-bordered table-striped" id="datatable-users">
									<thead>
										<tr>
											<th>No Booking</th>
											<th>PIC Booking</th>
											<th>Guest</th>
											<th>Check In/Out</th>
											<th>Total Kamar</th>
											<th>Total Person</th>
											<th>Total Price</th>
											<th>Status</th>
											<th>Date Create</th>
											<!-- <th>Action</th> -->
										</tr>
									</thead>
									<tbody>
										<?php 
											foreach ($order as $data_order) { 
												?>
												<tr>
													<td><a href="<?php echo site_url('admin/booking/order_book_detail/').$data_order->ID_BOOKING ?>"><b><?php echo $data_order->ID_BOOKING; ?></b></a></td>
													<td>
														<?php echo $data_order->NAME_PIC_BOOKING; ?>
														<br>
														<b><?php echo $data_order->UNIT_PIC_BOOKING; ?></b>
													</td>
													<td>
														<?php echo $data_order->GUEST_NAME_LEAD; ?>
														<br>
														<b><?php echo $data_order->GUEST_NOHP_LEAD; ?></b>
													</td>
													<td>
														<b>Checkin :</b><br> <?php echo timestamp_indo(substr($data_order->STR_CHECKIN,0,10)).', '.substr($data_order->STR_CHECKIN,11,5); ?>
														<br>
														<br>
														<b>Checkout :</b><br> <?php echo timestamp_indo(substr($data_order->STR_CHECKOUT,0,10)).', '.substr($data_order->STR_CHECKOUT,11,5); ?>
													</td>
													
													<td><?php echo $data_order->KAMAR;?> Kamar</td>
													<td><?php echo $data_order->TOTAL_PERSON; ?></td>
													<td><?php echo rupiah($data_order->TOTAL_PRICE); ?></td>
													<td><?php 
									 					if ($data_order->STATUS == 0) {
									 						echo '<span class="badge badge-info">New Booking</span>';
									 					}else if ($data_order->STATUS == 1) {
									 						echo '<span class="badge badge-warning">Setting Room</span>';
									 					}else if ($data_order->STATUS == 2) {
									 						echo '<span class="badge badge-success">Completed</span>';
									 					} else {
									 						echo '<span class="badge badge-danger">Canceled</span>';
									 					}
									 					
									 				?></td>
													<td><?php echo $data_order->STR_DATETIME_INSERT; ?></td>
												</tr>
										<?php
											}
										?>
									</tbody>
								</table>
							</div>
							</div>
						</section>
					<!-- end: page -->
				</section>
			