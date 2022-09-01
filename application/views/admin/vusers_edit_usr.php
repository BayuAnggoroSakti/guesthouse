
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
								<li><span>Data User</span></li>

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

								<h2 class="card-title">Edit Data User</h2>
							</header>
							<div class="card-body">
								
								<div id="infoMessage"><?php echo $message;?></div>

							<?php echo form_open(uri_string());?>

						      <p>
						            <?php echo lang('edit_user_fname_label', 'first_name');?> <br />
						            <?php echo form_input($first_name);?>
						      </p>

						      <p>
						            <?php echo lang('edit_user_lname_label', 'last_name');?> <br />
						            <?php echo form_input($last_name);?>
						      </p>

						      <p>
						            <?php echo lang('edit_user_company_label', 'company');?> <br />
						            <?php echo form_input($company);?>
						      </p>

						      <p>
						            <?php echo lang('edit_user_phone_label', 'phone');?> <br />
						            <?php echo form_input($phone);?>
						      </p>

						      <p>
						            <?php echo lang('edit_user_password_label', 'password');?> <br />
						            <?php echo form_input($password);?>
						      </p>

						      <p>
						            <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?><br />
						            <?php echo form_input($password_confirm);?>
						      </p>

						      <?php if ($this->ion_auth->is_admin()): ?>
						          <h3><?php echo lang('edit_user_groups_heading');?></h3>
						          <?php foreach ($groups as $group):?>
						              <label class="checkbox">
						              <input type="checkbox" name="groups[]" value="<?php echo $group['ID'];?>" <?php echo (in_array($group, $currentGroups)) ? 'checked="checked"' : null; ?>>
						              <?php echo htmlspecialchars($group['NAME'],ENT_QUOTES,'UTF-8');?>
						              </label>
						          <?php endforeach?>

						      <?php endif ?>

						      <?php echo form_hidden('id', $user->ID);?>
						      <?php echo form_hidden($csrf); ?>

						      <p><?php echo form_submit('submit', lang('edit_user_submit_btn'));?></p>

						<?php echo form_close();?>

							</div>
						</section>
					<!-- end: page -->
				</section>
