<!-- Modal -->
<div class="modal fade" id="modalTopup" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalTopup" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTopup">TOP UP</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('user/add_saldo'); ?>" method="post">
					<div class="form-group">
						<label for="topup">Top Up</label>
						<input type="number" class="form-control" id="topup" name="topup">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
				</form>
        </div>
    </div>
</div>

<!-- Modal Pay -->
<div class="modal fade" id="modalPay" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalPay" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalPay">PAY</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('user/pay'); ?>" method="post">
					<div class="form-group">
						<label for="token">Token Virtual Account</label>
						<input type="number" class="form-control" id="token" name="token">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="current_password" name="current_password">
					</div>
					<?php foreach( $get_out_false as $get_out ) : ?>

					<div class="card mb-2 shadow-sm">
						<div class="card-body">
							<div class="d-flex align-items-center" href="#">
								<div class="mr-3">
									<div class="icon-circle bg-success">
										<i class="fas fa-money-bill-wave text-white"></i>
									</div>
								</div>
								<div>
									<div class="small text-gray-500">
										<?= date('F d, Y H:i', strtotime($get_out['created_at'])); ?>
									</div>
									<?= $get_out['token_va']; ?>
									</br>
									Rp. <?= number_format($get_out['saldo_out']); ?>,-
									</br>
									<?= $get_out['remark']; ?>
								</div>
							</div>
						</div>
					</div>

					<?php endforeach; ?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
				</form>
        </div>
    </div>
</div>

<!-- Modal History -->
<div class="modal fade" id="modalHistory" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalHistory" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalHistory">HISTORY</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            MAAF, FITUR INI BELUM BISA DIGUNAKAN YAA..
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Understood</button>
        </div>
        </div>
    </div>
</div>

<!-- Modal Check Out -->
<div class="modal fade" id="modalVirtual" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalVirtual" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalVirtual">CHECK OUT</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('user/check_out'); ?>" method="post">
						<div class="form-group">
							<label for="price">Price</label>
							<input type="number" class="form-control" id="price" name="price">
						</div>
						<div class="form-group">
							<label for="remark">Remark</label>
							<input type="text" class="form-control" id="remark" name="remark">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
			</div>
        </div>
    </div>
</div>

<!-- Modal Checkout -->
<div class="modal fade" id="modalCheckout" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalCheckout" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalCheckout">TOKEN VIRTUAL ACCOUNT</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

			<?php if( $notif_checkout ) : ?>
        
			<?php foreach( $get_out_false as $get_out ) : ?>

			<div class="card mb-2 shadow-sm">
				<div class="card-body">
					<div class="d-flex align-items-center" href="#">
						<div class="mr-3">
							<div class="icon-circle bg-success">
								<i class="fas fa-money-bill-wave text-white"></i>
							</div>
						</div>
						<div>
							<div class="small text-gray-500">
								<?= date('F d, Y H:i', strtotime($get_out['created_at'])); ?>
							</div>
							<?= $get_out['token_va']; ?>
							</br>
							Rp. <?= number_format($get_out['saldo_out']); ?>,-
							</br>
							<?= $get_out['remark']; ?>
						</div>
					</div>
				</div>
			</div>

			<?php endforeach; ?>

			<?php else : ?>

			<div class="card mb-2 shadow-sm">
				<div class="card-body">
					<div class="text-gray-500 text-center">
						No transactions!
					</div>
				</div>
			</div>

			<?php endif; ?>
		
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>

<!-- Modal Notif Topup -->
<div class="modal fade" id="modalNotifTopup" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalNotifTopup" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalNotifTopup">REQUEST TOP UP</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

			<?php if( $notif_topup ) : ?>
        
			<?php foreach( $get_in_false as $get_in ) : ?>

			<div class="card mb-2 shadow-sm">
				<div class="card-body">
					<div class="d-flex align-items-center" href="#">
						<div class="mr-3">
							<div class="icon-circle bg-primary">
								<i class="fas fa-plus-circle text-white"></i>
							</div>
						</div>
						<div>
							<div class="small text-gray-500">
								<?= date('F d, Y H:i', strtotime($get_in['created_at'])); ?>
							</div>
							Rp. <?= number_format($get_in['saldo_in']); ?>,-
						</div>
					</div>
				</div>
			</div>

			<?php endforeach; ?>

			<?php else : ?>

			<div class="card mb-2 shadow-sm">
				<div class="card-body">
					<div class="text-gray-500 text-center">
						No transactions!
					</div>
				</div>
			</div>

			<?php endif; ?>
		
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>
