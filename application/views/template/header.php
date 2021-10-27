<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-white shadow">
		<div class="container-fluid px-5">
			<a class="navbar-brand" href="#"><img src="<?= base_url('assets'); ?>/img/logo.jpg" alt="" width="50" > <h5 class="d-inline-block text-success fw-bold" style="font-family: poppins;">AKHIS</h5></a>
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
						<a href="<?= base_url('auth/login'); ?>" class="btn btn-primary">Login</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
<!-- End Navbar -->