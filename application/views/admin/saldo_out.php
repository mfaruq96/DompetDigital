
	<!-- Begin Page Content -->
	<div class="container">

		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Admin</a></li>
				<li class="breadcrumb-item active" aria-current="page">Saldo Out</li>
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
									<i class="fas fa-donate"></i>
									Saldo Out
								</h1>

								<?= $this->session->flashdata('message'); ?>

								<div class="table-responsive">
									<table class="table table-bordered text-center" id="dompetTable" width="100%" cellspacing="0">
										<thead>
											<tr>
												<th class="text-center">No</th>
												<th class="text-center">Name</th>
												<th class="text-center">Saldo Out</th>
												<th class="text-center">Status</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 1; ?>
											<?php foreach( $get_all_in as $get_saldo ) : ?>
											<tr>
												<td>
													<?= $i++; ?>
												</td>
												<td>
													<?= $get_saldo['name']; ?>
												</td>
												<td>
													Rp. <?= number_format($get_saldo['saldo_out']); ?>,-
												</td>
												<td>
													<?php if ( $get_saldo['status'] == 1 ) {
														echo "Success";
													} else {
														echo "Pending";
													}
													?>
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
