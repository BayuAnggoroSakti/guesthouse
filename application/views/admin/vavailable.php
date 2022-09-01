<?php 
function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}
?>
<section role="main" class="content-body">
					<header class="page-header">
						<h2>Available Room</h2>

						<div class="right-wrapper text-end">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="bx bx-home-alt"></i>
									</a>
								</li>

								<li><span>Booking</span></li>
								<li><span>Available Room</span></li>

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

								<h2 class="card-title">Data Room Dalam 2 Minggu ke depan</h2>
							</header>
							<div class="card-body table-responsive">
						
							<?php echo $booking; ?> 
						
							</div>
						</section>
						<!-- <section class="card">
							<header class="card-header">
								<div class="card-actions">
									<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
									<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
								</div>

								<h2 class="card-title">Data Booking dalam 2 Minggu ke depan</h2>
							</header>
							<div class="card-body">
						
							<?php echo $type_booking; ?> 
						
							</div>
						</section> -->
							
					<!-- end: page -->
				</section>

