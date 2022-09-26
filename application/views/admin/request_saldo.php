
	<!-- Begin Page Content -->
	<div class="container">

		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Admin</a></li>
				<li class="breadcrumb-item active" aria-current="page">Request Saldo</li>
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
									<i class="fas fa-hand-holding-usd"></i>
									Request Saldo
								</h1>

								<?= $this->session->flashdata('message'); ?>

								<div class="table-responsive">
									<table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
										<thead>
											<tr>
												<th>No</th>
												<th>Name</th>
												<th>Top Up</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 1; ?>
											<?php foreach( $data_request_saldo as $data_req ) : ?>
											<tr>
												<td>
													<?= $i++; ?>
												</td>
												<td>
													<?= $data_req['name']; ?>
												</td>
												<td>
													Rp. <?= number_format($data_req['saldo_in']); ?>,-
												</td>
												<td>
													<form action="<?= base_url('admin/approval_saldo'); ?>" method="post">
														<input type="text" name="id_in" id="id_in" value="<?= $data_req['id_in']; ?>" hidden>
														<button type="submit" class="btn badge badge-primary" onclick="return confirm('Are you sure want to approve ?');">
															<i class="fas fa-check-circle mr-1"></i> approve
														</button>
													</form>
												</td>
											</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
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
