<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-white shadow">
	<div class="container-fluid px-5">
		<a class="navbar-brand" href="<?= base_url(); ?>"><img src="<?= base_url('assets'); ?>/img/logo.jpg" alt="" width="50">
			<h5 class="d-inline-block text-success fw-bold" style="font-family: poppins;">AKHIS</h5>
		</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
			aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav ms-auto">
				<li class="nav-item">
					<a class="nav-link" aria-current="page" href="#hero">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#melayani">Pelayanan</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#dokter">Dokter</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#obat">Obat</a>
				</li>
			</ul>
			<ul class="navbar-nav ms-auto">
				<li class="nav-item">
					<?php if($this->session->userdata('id')): ?>
					<div class="user-box dropdown ms-auto">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
							role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="<?= base_url('assets'); ?>/img/pasien/<?= $this->session->userdata('foto'); ?>"
								class="user-img" alt="user avatar">
							<div class="user-info ps-3">
								<p class="user-name mb-0"><?= $this->session->userdata('nama'); ?></p>
								<p class="designattion mb-0"><?= $this->session->userdata('role'); ?></p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item" href="<?= base_url('profile/lihat'); ?>"><i
										class="bx bx-user"></i><span>Profile</span></a>
							</li>
							<li><a class="dropdown-item"
									href="<?= base_url($this->session->userdata('role').'/home'); ?>"><i
										class='bx bx-home-circle'></i><span>Home</span></a>
							</li>
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li><a class="dropdown-item" href="<?= base_url('auth/logout'); ?>"><i
										class='bx bx-log-out-circle'></i><span>Logout</span></a>
							</li>
						</ul>
			</ul>
		</div>
		<?php else: ?>
			<a href="<?= base_url('auth/login'); ?>" class="btn btn-outline-success me-1">Login</a>
			<a href="<?= base_url('auth/daftar'); ?>" class="btn btn-success">Daftar</a>
		<?php endif; ?>
		</li>
		</ul>
	</div>
	</div>
</nav>
<!-- End Navbar -->
