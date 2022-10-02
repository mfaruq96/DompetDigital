
	<!-- Begin Page Content -->
	<div class="container">

		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<?php if( $current_user['id_role'] == 1 ) : ?>
				<li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Admin</a></li>
				<?php else: ?>
				<li class="breadcrumb-item"><a href="<?= base_url('user'); ?>">Home</a></li>
				<?php endif; ?>
				<li class="breadcrumb-item active" aria-current="page">Profile</li>
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
									<i class="fas fa-user"></i>
									Profile
								</h1>

								<?= $this->session->flashdata('message'); ?>
								<!-- <div class="alert alert-danger" role="alert">Failed! no transactions!</div> -->

								<div class="row">
									<div class="col-lg-12">
										<div class="card shadow-sm">
											<div class="card-body">
												<div class="row">
													<div class="col-lg-4">
														<img class="card-img shadow" src="<?= base_url('assets/img/profile/') . $current_user['image']; ?>" class="card-img" title="<?= $current_user['name']; ?>" alt="<?= $current_user['name']; ?>">
													</div>
													<div class="col-lg-8">
														<div class="card-body shadow">
															<h5 class="m-0 font-weight-bold text-dark"><?= $current_user['name']; ?></h5>
															<hr>
															<p class="card-text">
																<i class="fas fa-envelope fa-sm -fa-fw mr-3"></i><?= $current_user['email']; ?><br>
																<i class="fas fa-phone fa-sm -fa-fw mr-3"></i><?= $current_user['phone']; ?><br>
																<i class="fas fa-home fa-sm -fa-fw mr-3"></i><?= $current_user['address']; ?>
															</p>
															<hr>
															<p class="card-text" style="text-align: right;"><small class="text-muted">Member since <?= date('F d, Y', strtotime($current_user['created_at'])); ?></small></p>
														</div>
														<div class="card-body shadow-sm">
															<a href="<?= base_url('profile/edit_profile'); ?>" class="btn btn-primary btn-sm mb-2">
																<i class="fas fa-sm fa-user-edit"></i>
																Edit profile
															</a>
															<a href="<?= base_url('profile/change_password'); ?>" class="btn btn-primary btn-sm mb-2">
																<i class="fas fa-sm fa-user-cog"></i>
																Change password
															</a>
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
