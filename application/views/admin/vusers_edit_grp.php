
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
								<li><span>Data Group User</span></li>

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

								<h2 class="card-title">Edit Data Group User</h2>
							</header>
							<div class="card-body">
								
								<div id="infoMessage"><?php echo $message;?></div>

								<?php echo form_open(current_url());?>

								      <p>
								            <?php echo lang('edit_group_name_label', 'group_name');?> <br />
								            <?php echo form_input($group_name);?>
								      </p>

								      <p>
								            <?php echo lang('edit_group_desc_label', 'description');?> <br />
								            <?php echo form_input($group_description);?>
								      </p>

								      <p><?php echo form_submit('submit', lang('edit_group_submit_btn'));?></p>

								<?php echo form_close();?>
							</div>
						</section>
					<!-- end: page -->
				</section>
