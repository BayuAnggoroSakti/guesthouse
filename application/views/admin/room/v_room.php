<?php 
function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}
?>
<section role="main" class="content-body">
					<header class="page-header">
						<h2>Room</h2>

						<div class="right-wrapper text-end">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="bx bx-home-alt"></i>
									</a>
								</li>

								<li><span>Manages Rooms</span></li>
								<li><span>Room</span></li>

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

								<h2 class="card-title">Data Room</h2>
							</header>
							<div class="card-body">
							<div id="infoMessage"><?php echo $message;?></div>
							<div class="col-sm-auto text-left mb-4 mb-sm-0 mt-2 mt-sm-0">
								<a href="#modalForm" class="modal-with-form ecommerce-sidebar-link btn btn-primary btn-md font-weight-semibold btn-py-2 px-4"><i class="fas fa-plus"></i> Add Room</a>
								
							</div>
						
								<table class="table table-bordered table-striped" id="datatable-users">
									<thead>
										<tr>
											<th>Room No</th>
											<th>Category</th>
											<th>Name</th>
											<th>Facility</th>
											<th>Type Bed</th>
											<th>Person</th>
											<th>Rate</th>
											<th>Is Active ?</th>
											<!-- <th>Action</th> -->
										</tr>
									</thead>
									<tbody>
									 <?php 
									 $i=0;
									 	foreach ($room as $data) { 
										$i++;
									 		?>
									 		<tr>
									 			<td><a class="modal-with-form" href="#editForm<?php echo $i;?>"><b> <?php echo $data->ROOM_NO; ?></b></a></td>
									 			<td><?php echo $data->ROOM_CATEGORY; ?></td>
									 			<td><?php echo $data->ROOM_NAME; ?></td>
									 			<td style="text-align: center; vertical-align: middle;"><input disabled name="facility" id="tags-input" data-role="tagsinput" value="<?php echo $data->FACILITY; ?>" data-tag-class="badge badge-primary"  /></td>
									 			<td><?php echo $data->TYPE_BED; ?></td>
									 			<td><?php echo $data->PERSON; ?></td>
									 			<td><?php echo rupiah($data->RATE); ?></td>
									 			<td>
									 				<?php 
									 					if ($data->IS_ACTIVE == 1) {
									 						echo '<a class="modal-basic" href="#modalDeactive'.$i.'"><span class="badge badge-success">Active</span></a>';
									 					} else {
									 						echo '<a class="modal-basic" href="#modalActive'.$i.'"><span class="badge badge-danger">Not Active</span></a>';
									 					}
									 					
									 				?>
									 			</td>
									 			<!-- <td>
									 				<a href="#editForm<?php echo $i;?>" class="modal-with-form mb-1 mt-1 me-1 btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit Data"><i class="fas fa-pen"></i></a>
									 				<a  href="#modalDelete<?php echo $i;?>"class="modal-basic mb-1 mt-1 me-1 btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus Data"><i class="fas fa-trash"></i></a>
									 			</td> -->
									 			<div id="modalActive<?php echo $i;?>" class="modal-block modal-block-primary mfp-hide">
													<section class="card">
														<header class="card-header">
															<h2 class="card-title">Are you sure?</h2>
														</header>
														<div class="card-body">
															<div class="modal-wrapper">
																<div class="modal-icon">
																	<i class="fas fa-check"></i>
																</div>
																<div class="modal-text">
																	<h4 class="font-weight-bold text-dark">Mengaktifkan <?php echo $data->ROOM_NO; ?></h4>
																	<p>Apakah anda yakin akan mengaktifkan Room ini?</p>
																</div>
															</div>
														</div>
														<footer class="card-footer">
															<div class="row">
																<div class="col-md-12 text-end">
																	<form action="<?php echo site_url('admin/rooms/room_activate');?>" method="post">
																		<input type="hidden" name="id_room" value="<?php echo $data->ID_ROOM;?>">
																		<input type="submit" value="confirm" class="btn btn-primary"></input>
																		<button class="btn btn-default modal-dismiss">Cancel</button>
																	</form>
																</div>
															</div>
														</footer>
													</section>
												</div>
									 			<div id="modalDeactive<?php echo $i;?>" class="modal-block modal-block-primary mfp-hide">
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
																	<h4 class="font-weight-bold text-dark">Menonaktifkan <?php echo $data->ROOM_NO; ?></h4>
																	<p>Apakah anda yakin akan menonaktifkan Room ini?</p>
																</div>
															</div>
														</div>
														<footer class="card-footer">
															<div class="row">
																<div class="col-md-12 text-end">
																	<form action="<?php echo site_url('admin/rooms/room_deactivate');?>" method="post">
																		<input type="hidden" name="id_room" value="<?php echo $data->ID_ROOM;?>">
																		<input type="submit" value="confirm" class="btn btn-primary"></input>
																		<button class="btn btn-default modal-dismiss">Cancel</button>
																	</form>
																</div>
															</div>
														</footer>
													</section>
												</div>
									 			<div id="editForm<?php echo $i;?>" class="modal-block modal-header-color modal-block-warning mfp-hide">
													<section class="card">
														<header class="card-header">
															<h2 class="card-title">Form Detail Room</h2>
														</header>
														<div class="card-body">
																<form action="<?php echo site_url('admin/rooms/room_update');?>" method="post">
																	<input type="hidden" name="id_room" value="<?php echo $data->ID_ROOM; ?>">
																	<div class="form-group">
																		<label for="inputAddress"><b>Type Room</b></label>
																		<select class="form-control" required name="id_room_type">
																			<?php 
																				foreach ($type_room as $dtype_room) { ?>
																					<option <?php
																						if ($dtype_room->ID_ROOM_TYPE == $data->ID_ROOM_TYPE) {
																							echo 'selected';
																						} 
																					?> value="<?php echo $dtype_room->ID_ROOM_TYPE ?>"><?php echo $dtype_room->ROOM_NAME.' - '.$dtype_room->ROOM_CATEGORY; ?></option>
																			<?php
																				}
																			?>
																			
																		</select>
																	</div>
																	<div class="form-group">
																		<label for="inputAddress2"><b>Room Number</b></label>
																		<input value="<?php echo $data->ROOM_NO; ?>" required type="text" name="room_no" class="form-control"  placeholder="Masukkan Nama Type Room">
																	</div>
																	<div class="form-group">
																		<label for="inputAddress2"><b>Facility</b></label>
																		<input  value="<?php echo $data->FACILITY; ?>" name="facility" id="tags-input" data-role="tagsinput" data-tag-class="badge badge-primary" class="form-control" />
																	</div>
																	<div class="form-group">
																		<label for="inputAddress2"><b>type Bed</b></label>
																		<select class="form-control" required name="type_bed">
																			<?php 
																				foreach ($type_bed as $dtype_bed) { ?>
																					<option <?php
																						if ($dtype_bed->BED_NAME == $data->TYPE_BED) {
																							echo 'selected';
																						} 
																					?> value="<?php echo $dtype_bed->BED_NAME ?>"><?php echo $dtype_bed->BED_NAME; ?></option>
																			<?php
																				}
																			?>
																		</select>
																	</div>
																	<div class="form-group">
																		<label for="inputAddress2"><b>Person</b></label>
																		<div class="input-group input-group-4 mb-3">
																			<span class="input-group-text"><i class="fas fa-user"></i></span>
																			<input value="<?php echo $data->PERSON; ?>" required type="number" name="person" class="form-control"  placeholder="Masukkan jumlah orang">
																		</div>
																	</div>
																	<div class="form-group">
																		<label for="inputAddress2"><b>Rate</b></label>
																		<div class="input-group input-group-4 mb-3">
																			<span class="input-group-text">Rp</span>
																			<input value="<?php echo $data->RATE; ?>" required type="number" name="rate" class="form-control"  placeholder="Masukkan Rate Harga">
																		</div>
																		
																	</div>
																	<div class="form-group">
																		<label for="inputAddress2"><b>Status Room</b></label>
																		<select class="form-control" name="is_active">
																			<option value="1">Active</option>
																			<option value="0">Not Active</option>
																		</select>
																	</div>
																
															</div>
															<footer class="card-footer">
																<div class="row">
																	<div class="col-md-12 text-end">
																		<input type="submit" value="Update" class="btn btn-primary"></input>
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
																	<h4 class="font-weight-bold text-dark">Menghapus <?php echo $data->ROOM_NAME; ?></h4>
																	<p>Are you sure that you want to delete this type bed?</p>
																</div>
															</div>
														</div>
														<footer class="card-footer">
															<div class="row">
																<div class="col-md-12 text-end">
																	<form action="<?php echo site_url('admin/rooms/type_room_delete');?>" method="post">
																		<input type="hidden" name="id_room_type" value="<?php echo $data->ID_ROOM_TYPE;?>">
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
												<h2 class="card-title">Form Tambah Room</h2>
											</header>
											<div class="card-body">
												<form action="<?php echo site_url('admin/rooms/room_add');?>" method="post">
													<div class="form-group">
														<label for="inputAddress"><b>Type Room</b></label>
														<select class="form-control" required name="id_room_type">
															<option value="">Silahkan pilih type room</option>
															<?php 
																foreach ($type_room as $data) {
																	echo '<option value="'.$data->ID_ROOM_TYPE.'">'.$data->ROOM_NAME.' - '.$data->ROOM_CATEGORY.'</option>';
																}
															?>
														</select>
													</div>
													<div class="form-group">
														<label for="inputAddress2"><b>Room Number</b></label>
														<input required type="text" name="room_no" class="form-control"  placeholder="Masukkan Nama Type Room">
													</div>
													<div class="form-group">
														<label for="inputAddress2"><b>Facility</b></label>
														<input name="facility" id="tags-input" data-role="tagsinput" data-tag-class="badge badge-primary" class="form-control" />
													</div>
													<div class="form-group">
														<label for="inputAddress2"><b>type Bed</b></label>
														<select class="form-control" required name="type_bed">
															<option value="">Silahkan pilih type bed</option>
															<?php 
																foreach ($type_bed as $data) {
																	echo '<option value="'.$data->BED_NAME.'">'.$data->BED_NAME.'</option>';
																}
															?>
														</select>
													</div>
													<div class="form-group">
														<label for="inputAddress2"><b>Person</b></label>
														<div class="input-group input-group-4 mb-3">
															<span class="input-group-text"><i class="fas fa-user"></i></span>
															<input required type="number" name="person" class="form-control"  placeholder="Masukkan jumlah orang">
														</div>
													</div>
													<div class="form-group">
														<label for="inputAddress2"><b>Rate</b></label>
														<div class="input-group input-group-4 mb-3">
															<span class="input-group-text">Rp</span>
															<input required type="number" name="rate" class="form-control"  placeholder="Masukkan Rate Harga">
														</div>
														
													</div>
													<div class="form-group">
														<label for="inputAddress2"><b>Status Room</b></label>
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
