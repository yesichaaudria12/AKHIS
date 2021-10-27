<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid px-4">
			<h1 class="mt-4">List Obat</h1>
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item active">Dashboard</li>
				<li class="breadcrumb-item active">Chat</li>
				<li class="breadcrumb-item active">List Obat</li>
			</ol>
			<div class="row my-3 justify-content-end">
				<div class="col-9">
					<form class="d-flex">
						<input class="form-control me-2" type="search" placeholder="Cari Obat" aria-label="Search" />
						<button class="btn btn-outline-success" type="submit">Cari</button>
					</form>
				</div>
			</div>
			<div class="row row-cols-2 row-cols-lg-2">
				<div class="col-lg-3">
					<div class="card p-3 shadow">
						<h2 class="py-3">Obat Sakit Panas</h2>
						<p style="cursor: pointer" class="border p-3" data-bs-toggle="modal" data-bs-target="#obat1">
							Obat 1</p>
						<p style="cursor: pointer" class="border p-3" data-bs-toggle="modal" data-bs-target="#obat1">
							Obat 2</p>
						<p style="cursor: pointer" class="border p-3" data-bs-toggle="modal" data-bs-target="#obat1">
							Obat 3</p>
						<button type="button" class="btn btn-primary" data-bs-toggle="modal"
							data-bs-target="#masukan">Masukan Ke Resep</button>
					</div>
				</div>
				<div class="col-lg-9">
					<div class="row">
                        <?php foreach($obat as $obat): ?>
						<div class="col-lg-4 py-2">
							<div style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#detail-obat-resep">
								<div class="card card-obat">
									<img src="<?= base_url('assets'); ?>/img/obat/<?= $obat['gambar']; ?>" class="card-img-top" alt="..." />
									<div class="card-body text-center text-dark">
										<h5 class="card-title"><?= $obat['nama_obat']; ?></h5>
										<p class="card-title">Rp. <?= number_format($obat['harga'],0,',','.'); ?> / Srip</p>
										<button type="button" class="btn btn-primary px-5">Pilih</button>
									</div>
								</div>
							</div>
						</div>
                        <?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</main>
</div>
