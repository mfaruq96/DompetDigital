
                <!-- Begin Page Content -->
                <div class="container">

					<!-- fitur -->
					<div class="row">
						<div class="col-lg-12">
							<div class="card mb-4 bg-light">
								<div class="card-body">
									<div class="row m-4">

										<!-- topup -->
										<div class="col-lg-6 mb-5">
											<a href="<?= base_url('admin/account'); ?>" style="width:100%; padding: 40px;" class="btn btn-primary">
												<h4 class="text-center text-light">
													<i class="fas fa-users"></i>
													ACCOUNT
												</h4>
												<h5>
													<?= $count_user; ?>
												</h5>
											</a>
										</div>

										<!-- request saldo -->
										<div class="col-lg-6 mb-5">
											<a href="<?= base_url('admin/request_saldo'); ?>" style="width:100%; padding: 40px;" class="btn btn-primary">
												<h4 class="text-center text-light">
													<i class="fas fa-hand-holding-usd"></i>
													REQUEST SALDO
												</h4>
												<h5>
													<?= $count_request_saldo; ?>
												</h5>
											</a>
										</div>

										<!-- saldo in -->
										<div class="col-lg-6 mb-5">
											<a href="<?= base_url('admin/saldo_in'); ?>" style="width:100%; padding: 40px;" class="btn btn-primary">
												<h4 class="text-center text-light">
													<i class="fas fa-hand-holding-medical"></i>
														SALDO IN
												</h4>
												<h5>
													<?= $count_saldo_in; ?>
												</h5>
											</a>
										</div>

										<!-- saldo out -->
										<div class="col-lg-6 mb-5">
											<a href="" style="width:100%; padding: 40px;" class="btn btn-primary" data-toggle="modal" data-target="#modalHistory">
												<h4 class="text-center text-light">
													<i class="fas fa-donate"></i>
														SALDO OUT
												</h4>
												<h5>12</h5>
											</a>
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
