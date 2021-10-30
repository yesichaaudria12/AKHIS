<div class="sidebar-wrapper" data-simplebar="true">
	<div class="sidebar-header">
		<div>
			<img src="<?= base_url('assets'); ?>/img/logo.jpg" class="logo-icon" alt="logo icon">
		</div>
		<div>
			<h4 class="logo-text text-success">AKHIS</h4>
		</div>
		<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
		</div>
	</div>
	<!--navigation-->
	<ul class="metismenu" id="menu">
		<li>
			<a href="<?= base_url('pasien/home'); ?>">
				<div class="parent-icon"><i class="fas fa-tachometer-alt"></i>
				</div>
				<div class="menu-title">Dashboard</div>
			</a>
		</li>
		<li>
			<a href="<?= base_url('admin/tambah/dokter'); ?>">
				<div class="parent-icon"><i class="fas fa-user-md"></i>
				</div>
				<div class="menu-title">Tambah Dokter</div>
			</a>
		</li>
		<li>
			<a href="<?= base_url('admin/lihat/obat'); ?>">
				<div class="parent-icon"><i class="fas fa-capsules"></i>
				</div>
				<div class="menu-title">Data Obat</div>
			</a>
		</li>
		<li>
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="fas fa-cash-register"></i>
				</div>
				<div class="menu-title">Pesanan</div>
			</a>
			<ul>
				<li> <a href="<?= base_url('admin/lihat/pesanan/menunggu_konfirmasi'); ?>"><i class="bx bx-right-arrow-alt"></i>Menunggu Konfirmasi <div id="mk"></div></a>
				</li>
				<li> <a href="<?= base_url('admin/lihat/pesanan/dikemas'); ?>"><i class="bx bx-right-arrow-alt"></i>Dikemas <div id="dikemas"></div></a>
				</li>
				<li> <a href="<?= base_url('admin/lihat/pesanan/dikirim'); ?>"><i class="bx bx-right-arrow-alt"></i>Dikirim <div id="dikirim"></div></a>
				</li>
				<li> <a href="<?= base_url('admin/lihat/pesanan/selesai'); ?>"><i class="bx bx-right-arrow-alt"></i>selesai</a>
			</ul>
		</li>
	</ul>
	<!--end navigation-->
</div>