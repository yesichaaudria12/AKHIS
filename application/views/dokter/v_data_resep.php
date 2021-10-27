<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid px-4">
			<h1 class="mt-4">Resep Pasien Nama Pasien</h1>
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item active">Dashboard</li>
				<li class="breadcrumb-item active">Chat</li>
			</ol>
			<div class="row">
				<div class="col pb-5">
					<a href="<?= rubah_url('lihat', 'tambah'); ?>" class="btn btn-primary px-5">Tambah Baru</a>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4">
					<div class="card p-3 shadow">
						<h2 class="py-3">Obat Sakit Panas</h2>
						<p style="cursor: pointer" class="border p-3" data-bs-toggle="modal" data-bs-target="#obat1">
							Obat 1</p>
						<p style="cursor: pointer" class="border p-3" data-bs-toggle="modal" data-bs-target="#obat2">
							Obat 2</p>
						<p style="cursor: pointer" class="border p-3" data-bs-toggle="modal" data-bs-target="#obat3">
							Obat 3</p>
						<a href="./edit.html" class="btn btn-primary">Edit</a>
						<button type="button" class="btn btn-danger" data-bs-toggle="modal"
							data-bs-target="#obat-hapus">Hapus</button>
					</div>
				</div>
			</div>
		</div>
	</main>
	<footer class="py-4 bg-light mt-auto">
		<div class="container-fluid px-4">
			<div class="d-flex align-items-center justify-content-between small">
				<div class="text-muted">Copyright &copy; Your Website 2021</div>
				<div>
					<a href="#">Privacy Policy</a>
					&middot;
					<a href="#">Terms &amp; Conditions</a>
				</div>
			</div>
		</div>
	</footer>
</div>
