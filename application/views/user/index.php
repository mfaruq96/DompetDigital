
                <!-- Begin Page Content -->
                <div class="container">

                    <!-- get saldo -->
					<div class="mt-5 mb-5 text-center text-light">
						<h1>
							Rp. <?= number_format($current_saldo); ?>,-
						</h1>
					</div>

					<?= $this->session->flashdata('message'); ?>

					<!-- fitur -->
					<div class="row">
						<div class="col-lg-12">
							<div class="card mb-4 bg-light">
								<div class="card-body">
									<div class="row m-4">

										<!-- topup -->
										<div class="col-lg-6 mb-5">
											<a href="" style="width:100%; padding: 40px;" class="btn btn-primary" data-toggle="modal" data-target="#modalTopup">
												<h4 class="text-center text-light mt-4 mb-4">
													<i class="fas fa-plus-circle"></i>
													TOP UP
												</h4>
											</a>
										</div>

										<!-- pembayaran -->
										<div class="col-lg-6 mb-5">
											<a href="" style="width:100%; padding: 40px;" class="btn btn-primary" data-toggle="modal" data-target="#modalPay">
												<h4 class="text-center text-light mt-4 mb-4">
													<i class="fas fa-hand-holding-usd"></i>
													PAY
												</h4>
											</a>
										</div>

										<!-- history -->
										<div class="col-lg-6 mb-5">
											<a href="<?= base_url('user/history'); ?>" style="width:100%; padding: 40px;" class="btn btn-primary">
												<h4 class="text-center text-light mt-4 mb-4">
													<i class="fas fa-history"></i>
														HISTORY
												</h4>
											</a>
										</div>

										<!-- virtual account -->
										<div class="col-lg-6 mb-5">
											<a href="" style="width:100%; padding: 40px;" class="btn btn-primary" data-toggle="modal" data-target="#modalVirtual">
												<h4 class="text-center text-light mt-4 mb-4">
													<i class="fas fa-money-bill-wave"></i>
														CHECK OUT
												</h4>
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
