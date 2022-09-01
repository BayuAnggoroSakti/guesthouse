
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

								<h2 class="card-title">Data User</h2>
							</header>
							<div class="card-body">
							<div id="infoMessage"><?php echo $message;?></div>
							<div class="col-sm-auto text-left mb-4 mb-sm-0 mt-2 mt-sm-0">
								<a href="<?php echo site_url('admin/users/create_user'); ?>" class="ecommerce-sidebar-link btn btn-primary btn-md font-weight-semibold btn-py-2 px-4"><i class="fas fa-user"></i> Add Users</a>
								
							</div>
						
								<table class="table table-bordered table-striped" id="datatable-users">
									<thead>
										<tr>
											<th><?php echo lang('index_fname_th');?></th>
											<th><?php echo lang('index_lname_th');?></th>
											<th><?php echo lang('index_email_th');?></th>
											<th>Unit</th>
											<th>Nomor HP</th>
											<th><?php echo lang('index_groups_th');?></th>
											<th><?php echo lang('index_status_th');?></th>
											<th><?php echo lang('index_action_th');?></th>
										</tr>
									</thead>
									<tbody>
											<?php foreach ($users as $user):?>
												<tr>
										            <td><?php echo htmlspecialchars($user->FIRST_NAME,ENT_QUOTES,'UTF-8');?></td>
										            <td><?php echo htmlspecialchars($user->LAST_NAME,ENT_QUOTES,'UTF-8');?></td>
										            <td><?php echo htmlspecialchars($user->EMAIL,ENT_QUOTES,'UTF-8');?></td>
										            	 <td><?php echo htmlspecialchars($user->COMPANY,ENT_QUOTES,'UTF-8');?></td>
													  <td><?php echo htmlspecialchars($user->PHONE,ENT_QUOTES,'UTF-8');?></td>
												<td><?php echo htmlspecialchars($user->ROLE,ENT_QUOTES,'UTF-8');?></td>
												
													<td><?php echo ($user->ACTIVE) ? anchor("admin/users/deactivate/".$user->ID, lang('index_active_link')) : anchor("admin/users/activate/". $user->ID, lang('index_inactive_link'));?></td>
													<td><?php echo anchor("admin/users/edit_user/".$user->ID, 'Edit') ;?></td>
												</tr>
											<?php endforeach;?>
									</tbody>
								</table>
							</div>
						</section>
					<!-- end: page -->
				</section>
			