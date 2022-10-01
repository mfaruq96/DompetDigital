
	<!-- Begin Page Content -->
	<div class="container">

		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<?php if( $current_user['id_role'] == 1 ) : ?>
				<li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Admin</a></li>
				<?php else: ?>
				<li class="breadcrumb-item"><a href="<?= base_url('user'); ?>">Home</a></li>
				<?php endif; ?>
				<li class="breadcrumb-item"><a href="<?= base_url('profile'); ?>">Profile</a></li>
				<li class="breadcrumb-item active" aria-current="page">Change Password</li>
			</ol>
		</nav>

		<!-- fitur -->
		<div class="row">
			<div class="col-lg-12">
				<div class="card mb-4 bg-light">
					<div class="card-body">
						<div class="row m-4">
							<div class="col-lg-12">
								<h1 class="mb-5">
									<i class="fas fa-user-cog"></i>
									Change Password
								</h1>

								<?= $this->session->flashdata('message'); ?>
								<!-- <div class="alert alert-danger" role="alert">Failed! no transactions!</div> -->

								<div class="row">
									<div class="col-lg-12">
										<div class="card shadow-sm">
											<div class="card-body">
												<div class="row">
													<div class="col-lg-12">
														<div class="card-body shadow">
															<form action="<?= base_url('profile/change_password'); ?>" method="post">
																<div class="form-group row">
																	<label for="current_password" class="col-sm-4 col-form-label">Current Password</label>
																	<div class="col-sm-8">
																		<input type="password" class="form-control" id="current_password" name="current_password">
																		<?= form_error('current_password', '<small class="text-danger">', '</small>'); ?>
																	</div>
																</div>
																<div class="form-group row">
																	<label for="new_password1" class="col-sm-4 col-form-label">New Password</label>
																	<div class="col-sm-8">
																		<input type="password" class="form-control" id="new_password1" name="new_password1">
																		<?= form_error('new_password1', '<small class="text-danger">', '</small>'); ?>
																	</div>
																</div>
																<div class="form-group row">
																	<label for="new_password2" class="col-sm-4 col-form-label">Confirm New Password</label>
																	<div class="col-sm-8">
																		<input type="password" class="form-control" id="new_password2" name="new_password2">
																		<?= form_error('new_password2', '<small class="text-danger">', '</small>'); ?>
																	</div>
																</div>
																<div class="form-group row justify-content-end">
																	<div class="col-sm-12">
																		<button type="submit" class="btn btn-primary form-control">
																			<i class="fas fa-sm fa-save"></i>
																			Save
																		</button>
																	</div>
																</div>
															</form>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
