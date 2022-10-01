
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
				<li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
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
									<i class="fas fa-user-edit"></i>
									Edit Profile
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
															<form action="<?= base_url('profile/update_profile'); ?>" method="post" enctype="multipart/form-data">
																<div class="form-group row">
																	<label for="email" class="col-sm-2 col-form-label">Email</label>
																	<div class="col-sm-10">
																		<input type="text" class="form-control" id="email" name="email" value="<?= $current_user['email']; ?>" readonly>
																	</div>
																</div>
																<div class="form-group row">
																	<label for="fullname" class="col-sm-2 col-form-label">Name</label>
																	<div class="col-sm-10">
																		<input type="text" class="form-control" id="name" name="name" value="<?= $current_user['name']; ?>">
																		<?= form_error('name', '<small class="text-danger">', '</small>'); ?>
																	</div>
																</div>
																<div class="form-group row">
																	<label for="phone" class="col-sm-2 col-form-label">Phone</label>
																	<div class="col-sm-10">
																		<input type="text" class="form-control" id="phone" name="phone" value="<?= $current_user['phone']; ?>">
																		<?= form_error('phone', '<small class="text-danger">', '</small>'); ?>
																	</div>
																</div>
																<div class="form-group row">
																	<label for="address" class="col-sm-2 col-form-label">Address</label>
																	<div class="col-sm-10">
																		<textarea name="address" id="address" rows="4" class="form-control"><?= $current_user['address']; ?></textarea>
																		<?= form_error('address', '<small class="text-danger">', '</small>'); ?>
																	</div>
																</div>
																<div class="form-group row">
																	<div class="col-sm-2">Picture</div>
																	<div class="col-sm-10">
																		<div class="row">
																			<div class="col-sm-3">
																				<img src="<?= base_url('assets/img/profile/') . $current_user['image']; ?>" class="img-thumbnail">
																			</div>
																			<div class="col-sm-9">
																				<div class="custom-file">
																					<input type="file" class="custom-file-input" id="image" name="image">
																					<label for="image" class="custom-file-label">Choose file</label>
																				</div>
																			</div>
																		</div>
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
