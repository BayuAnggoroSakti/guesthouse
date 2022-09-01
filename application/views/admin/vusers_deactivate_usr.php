
<section role="main" class="content-body">
					<header class="page-header">
						<h2>Manages Users</h2>

						<div class="right-wrapper text-end">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="bx bx-home-alt"></i>
									</a>
								</li>

								<li><span>Manages Users</span></li>
								<li><span>Deactived User</span></li>

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

								<h2 class="card-title">Nonaktifkan User</h2>
							</header>
							<div class="card-body">
								
								<div id="infoMessage"><?php echo $message;?></div>
								
									<?php echo form_open("admin/users/deactivate/".$user->ID);?>

									  <p>
									  	<?php echo lang('deactivate_confirm_y_label', 'confirm');?>
									    <input type="radio" name="confirm" value="yes" checked="checked" />
									    <?php echo lang('deactivate_confirm_n_label', 'confirm');?>
									    <input type="radio" name="confirm" value="no" />
									  </p>

									  <?php echo form_hidden($csrf); ?>
									  <?php echo form_hidden(['id' => $user->id]); ?>

									  <p><?php echo form_submit('submit', lang('deactivate_submit_btn'));?></p>

									<?php echo form_close();?>
							</div>
						</section>
					<!-- end: page -->
				</section>
