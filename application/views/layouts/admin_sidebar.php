<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin'); ?>">
	<div class="sidebar-brand-icon">
		<i class="fas fa-wallet"></i>
	</div>
	<div class="sidebar-brand-text mx-3">Dompet Digital</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
	Admin
</div>

<!-- Nav Item - Dashboard -->
<?php if( $active_page == "dashboard" ) : ?>
<li class="nav-item active">
<?php else: ?>
<li class="nav-item">
<?php endif; ?>
	<a class="nav-link" href="<?= base_url('admin'); ?>">
		<i class="fas fa-fw fa-tachometer-alt"></i>
		<span>Dashboard</span></a>
</li>

<!-- Nav Item - Account -->
<?php if( $active_page == "account" ) : ?>
<li class="nav-item active">
<?php else: ?>
<li class="nav-item">
<?php endif; ?>
	<a class="nav-link" href="<?= base_url('admin/account'); ?>">
		<i class="fas fa-fw fa-users"></i>
		<span>Account</span></a>
</li>

<!-- Nav Item - Request Saldo -->
<?php if( $active_page == "req_saldo" ) : ?>
<li class="nav-item active">
<?php else: ?>
<li class="nav-item">
<?php endif; ?>
	<a class="nav-link" href="<?= base_url('admin/request_saldo'); ?>">
		<i class="fas fa-fw fa-hand-holding-usd"></i>
		<span>
			Request Saldo
			<sup class="badge badge-danger"><?= $count_request_saldo; ?></sup>
		</span></a>
</li>

<!-- Nav Item - Saldo In -->
<?php if( $active_page == "saldo_in" ) : ?>
<li class="nav-item active">
<?php else: ?>
<li class="nav-item">
<?php endif; ?>
	<a class="nav-link" href="<?= base_url('admin/saldo_in'); ?>">
		<i class="fas fa-fw fa-hand-holding-medical"></i>
		<span>Saldo In</span></a>
</li>

<!-- Nav Item - Saldo Out -->
<?php if( $active_page == "saldo_out" ) : ?>
<li class="nav-item active">
<?php else: ?>
<li class="nav-item">
<?php endif; ?>
	<a class="nav-link" href="<?= base_url('admin/saldo_out'); ?>">
		<i class="fas fa-fw fa-donate"></i>
		<span>Saldo Out</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
	<button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->
