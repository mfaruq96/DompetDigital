
                <!-- Begin Page Content -->
                <div class="container">

				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Admin</a></li>
						<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
					</ol>
				</nav>

					<!-- fitur -->
					<div class="row">
						<div class="col-lg-12">
							<div class="card mb-4 bg-light">
								<div class="card-body">

									<div class="row m-4">

										<!-- card -->
										<div class="col-lg-6 mb-4">
											<div class="card border-left-primary shadow h-100 py-2">
												<div class="card-body">
													<div class="row no-gutters align-items-center">
														<div class="col mr-2">
															<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
																Account</div>
															<div class="h5 mb-0 font-weight-bold text-gray-800">
																<?= $count_user; ?>
															</div>
														</div>
														<div class="col-auto">
															<i class="fas fa-users fa-2x text-gray-300"></i>
														</div>
													</div>
												</div>
											</div>
										</div>
										
										<!-- card -->
										<div class="col-lg-6 mb-4">
											<div class="card border-left-primary shadow h-100 py-2">
												<div class="card-body">
													<div class="row no-gutters align-items-center">
														<div class="col mr-2">
															<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
																Request Saldo</div>
															<div class="h5 mb-0 font-weight-bold text-gray-800">
																<?= $count_request_saldo; ?>
															</div>
														</div>
														<div class="col-auto">
															<i class="fas fa-hand-holding-usd fa-2x text-gray-300"></i>
														</div>
													</div>
												</div>
											</div>
										</div>

										<!-- card -->
										<div class="col-lg-6 mb-4">
											<div class="card border-left-success shadow h-100 py-2">
												<div class="card-body">
													<div class="row no-gutters align-items-center">
														<div class="col mr-2">
															<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
																Saldo In</div>
															<div class="h5 mb-0 font-weight-bold text-gray-800">
																Rp. <?= number_format($sum_saldo_in['saldo_in']); ?>,-
															</div>
														</div>
														<div class="col-auto">
															<i class="fas fa-hand-holding-medical fa-2x text-gray-300"></i>
														</div>
													</div>
												</div>
											</div>
										</div>

										<!-- card -->
										<div class="col-lg-6 mb-4">
											<div class="card border-left-danger shadow h-100 py-2">
												<div class="card-body">
													<div class="row no-gutters align-items-center">
														<div class="col mr-2">
															<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
																Saldo Out</div>
															<div class="h5 mb-0 font-weight-bold text-gray-800">
																Rp. <?= number_format($sum_saldo_out['saldo_out']); ?>,-
															</div>
														</div>
														<div class="col-auto">
															<i class="fas fa-donate fa-2x text-gray-300"></i>
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
