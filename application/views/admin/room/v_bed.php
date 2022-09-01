<?php 
function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}
?>
<section role="main" class="content-body">
					<header class="page-header">
						<h2>Type Bed</h2>

						<div class="right-wrapper text-end">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="bx bx-home-alt"></i>
									</a>
								</li>

								<li><span>Manages Rooms</span></li>
								<li><span>Type Bed</span></li>

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

								<h2 class="card-title">Data Type Bed</h2>
							</header>
							<div class="card-body">
							<div id="infoMessage"><?php echo $message;?></div>
							<div class="col-sm-auto text-left mb-4 mb-sm-0 mt-2 mt-sm-0">
								<a href="#modalForm" class="modal-with-form ecommerce-sidebar-link btn btn-primary btn-md font-weight-semibold btn-py-2 px-4"><i class="fas fa-plus"></i> Add Type Bed</a>
								
							</div>
						
								<table class="table table-bordered table-striped" id="datatable-users">
									<thead>
										<tr>
											<th>Type Bed</th>
											<th>Rate</th>
											<th>Is Active ?</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
									 <?php 
									 $i=0;
									 	foreach ($bed as $data) { 
										$i++;
									 		?>
									 		<tr>
									 			<td><?php echo $data->BED_NAME; ?></td>
									 			<td><?php echo rupiah($data->RATE); ?></td>
									 			<td>
									 				<?php 
									 					if ($data->IS_ACTIVE == 1) {
									 						echo '<span class="badge badge-success">Active</span>';
									 					} else {
									 						echo '<span class="badge badge-danger">Not Active</span>';
									 					}
									 					
									 				?>
									 			</td>
									 			<td width="20%">
									 				<a href="#editForm<?php echo $i;?>" class="modal-with-form mb-1 mt-1 me-1 btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit Data"><i class="fas fa-pen"></i></a>
									 				<a  href="#modalDelete<?php echo $i;?>"class="modal-basic mb-1 mt-1 me-1 btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus Data"><i class="fas fa-trash"></i></a>
									 			</td>
									 				<div id="editForm<?php echo $i;?>" class="modal-block modal-header-color modal-block-warning mfp-hide">
													<section class="card">
														<header class="card-header">
															<h2 class="card-title">Form Edit Bed</h2>
														</header>
														<div class="card-body">
															<form action="<?php echo site_url('admin/rooms/type_bed_update');?>" method="post">
																<div class="form-group">
																	<label for="inputAddress"><b>Type Bed</b></label>
																	<input readonly value="<?php echo $data->BED_NAME;?>" required type="text" name="bed_name" class="form-control" id="inputAddress" placeholder="Masukkan Type Bed">
																</div>
																<div class="form-group">
																	<label for="inputAddress2"><b>Rate</b></label>
																	<input required type="number" name="rate" value="<?php echo $data->RATE;?>" class="form-control" id="inputAddress2" placeholder="Masukkan Harga bed per hari">
																</div>
																<div class="form-group">
																	<label for="inputAddress2"><b>Status Bed</b></label>
																	<select class="form-control" name="is_active">
																		<option <?php if ($data->IS_ACTIVE ==1) {
																			echo 'selected';
																		} 
																		 ?> value="1">Active</option>
																		<option <?php if ($data->IS_ACTIVE ==0) {
																			echo 'selected';
																		} 
																		 ?> value="0">Not Active</option>
																	</select>
																</div>
															
														</div>
														<footer class="card-footer">
															<div class="row">
																<div class="col-md-12 text-end">
																	<input type="submit" value="Update" class="btn btn-warning"></input>
																	<button class="btn btn-default modal-dismiss">Cancel</button>
																</div>
															</div>
															
														</footer>
														</form>
													</section>
												</div>
												<div id="modalDelete<?php echo $i;?>" class="modal-block modal-block-primary mfp-hide">
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
																	<h4 class="font-weight-bold text-dark">Menghapus <?php echo $data->BED_NAME; ?></h4>
																	<p>Are you sure that you want to delete this type bed?</p>
																</div>
															</div>
														</div>
														<footer class="card-footer">
															<div class="row">
																<div class="col-md-12 text-end">
																	<form action="<?php echo site_url('admin/rooms/type_bed_delete');?>" method="post">
																		<input type="hidden" name="type_bed" value="<?php echo $data->BED_NAME;?>">
																		<input type="submit" value="confirm" class="btn btn-primary"></input>
																		<button class="btn btn-default modal-dismiss">Cancel</button>
																	</form>
																</div>
															</div>
														</footer>
													</section>
												</div>
									 		</tr>
									 <?php
									 	}
									 ?>
									</tbody>
								</table>
							</div>
						</section>
					<!-- end: page -->
				</section>
				<div id="modalForm" class="modal-block modal-header-color modal-block-primary mfp-hide">
										<section class="card">
											<header class="card-header">
												<h2 class="card-title">Form Tambah Bed</h2>
											</header>
											<div class="card-body">
												<form action="<?php echo site_url('admin/rooms/type_bed_add');?>" method="post">
													<div class="form-group">
														<label for="inputAddress"><b>Type Bed</b></label>
														<input required type="text" name="bed_name" class="form-control" id="inputAddress" placeholder="Masukkan Type Bed">
													</div>
													<div class="form-group">
														<label for="inputAddress2"><b>Rate</b></label>
														<input required type="number" name="rate" class="form-control" id="inputAddress2" placeholder="Masukkan Harga bed per hari">
													</div>
													<div class="form-group">
														<label for="inputAddress2"><b>Status Bed</b></label>
														<select class="form-control" name="is_active">
															<option value="1">Active</option>
															<option value="0">Not Active</option>
														</select>
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
								