<div id="layoutSidenav_nav">
	<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
		<div class="sb-sidenav-menu">
			<div class="nav">
				<div class="sb-sidenav-menu-heading"><?= $this->session->userdata('role'); ?></div>
				<a class="nav-link" href="<?= base_url('admin/home'); ?>">
					<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
					Dashboard
				</a>
				<a class="nav-link" href="<?= base_url('admin/tambah/dokter'); ?>">
					<div class="sb-nav-link-icon"><i class="fas fa-user-md"></i></div>
					Tambah Dokter
				</a>
				<a class="nav-link" href="<?= base_url('admin/lihat/obat'); ?>">
					<div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
					Data Obat
				</a>
				<a class="nav-link" href="<?= base_url(); ?>">
					<div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
					Profile
				</a>
			</div>
		</div>
	</nav>
</div>
