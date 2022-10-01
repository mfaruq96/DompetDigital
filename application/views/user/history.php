
	<!-- Begin Page Content -->
	<div class="container">

		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('user'); ?>">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">History</li>
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
									<i class="fas fa-history"></i>
									History
								</h1>

								<?= $this->session->flashdata('message'); ?>

								<div class="table-responsive">
									<table class="table table-bordered text-center" id="dompetTable" width="100%" cellspacing="0">
										<thead>
											<tr>
												<th class="text-center">No</th>
												<th class="text-center">Saldo Name</th>
												<th class="text-center">Saldo</th>
												<th class="text-center">Status</th>
												<th class="text-center">Date</th>
												<th class="text-center">Remark</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 1; ?>
											<?php foreach( $get_history as $history ) : ?>
											<tr>
												<td>
													<?= $i++; ?>
												</td>
												<td>
													<?php
														if( $history['id_saldo'] == 1 ) {
															echo "Saldo In";
														} else {
															echo "Saldo Out";
														}
													?>
												</td>
												<td>
													Rp. <?= number_format($history['saldo']); ?>,-
												</td>
												<td>Success</td>
												<td>
													<?= date('F d, Y H:i', strtotime($history['created_at'])); ?>
												</td>
												<td>
													<?= $history['remark']; ?>
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
