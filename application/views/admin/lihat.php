<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid px-4">
			<div class="row">
				<div class="col">
					<div class="mt-3">
						<?= $this->session->flashdata('message'); ?>
					</div>
					<h1 class="mt-4">Data Obat</h1>
					<ol class="breadcrumb mb-4">
						<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
						<li class="breadcrumb-item active">Tambah Obat</li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<a href="<?= rubah_url('lihat', 'tambah'); ?>" class="btn btn-primary px-5">Tambah Baru</a>
				</div>
			</div>
			<div class="row py-5">
				<?php foreach($obat as $obat): ?>
				<div class="col-lg-3">
					<div style="cursor: pointer" class="shadow p-3" data-bs-toggle="modal"
						data-bs-target="#detail<?= $obat['id_obat']; ?>">
						<img src="<?= base_url('assets'); ?>/img/obat/<?= $obat['gambar']; ?>" class="card-img-top"
							alt="obat" />
						<div class="card-body">
							<h5 class="card-title"><?= $obat['nama_obat']; ?></h5>
							<p class="card-title fw-bold">Rp. <?= number_format($obat['harga'],0,',','.'); ?></p>
							<div class="d-flex justify-content-end">
								<a href="<?= rubah_url('lihat', 'ubah').'/'.$obat['id_obat']; ?>" class="btn btn-primary px-3 mx-2">Edit</a>
								<button type="button" class="btn btn-danger" data-bs-toggle="modal"
									data-bs-target="#exampleModal">Hapus</button>
							</div>
						</div>
					</div>
				</div>
				<!-- Modal Detail -->
				<div class="modal fade" id="detail<?= $obat['id_obat']; ?>" tabindex="-1"
					aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-fullscreen">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Detail <?= $obat['nama_obat']; ?></h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal"
									aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<div class="container">
									<div class="row">
										<div class="col-lg-3 border-end">
											<div class="p-3">
												<img src="<?= base_url('assets'); ?>/img/obat/<?= $obat['gambar']; ?>" class="card-img-top" alt="..." />
												<div class="card-body text-center">
													<h5 class="card-title"><?= $obat['nama_obat']; ?></h5>
													<p class="card-title">Rp. <?= number_format($obat['harga'],0,',','.'); ?></p>
												</div>
											</div>
										</div>
										<div class="col">
											<div class="border-bottom py-3">
												<h5>Deskripsi</h5>
												<p><?= $obat['keterangan']; ?></p>
											</div>
											<div class="border-bottom py-3">
												<h5>Komposisi</h5>
												<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Inventore
													repellat ea
													delectus natus voluptas expedita adipisci sint iste deserunt quis!
												</p>
											</div>
											<div class="border-bottom py-3">
												<h5>Dosis</h5>
												<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Inventore
													repellat ea
													delectus natus voluptas expedita adipisci sint iste deserunt quis!
												</p>
											</div>
											<div class="border-bottom py-3">
												<h5>Efek Samping</h5>
												<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Inventore
													repellat ea
													delectus natus voluptas expedita adipisci sint iste deserunt quis!
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								<button type="button" class="btn btn-primary">Save changes</button>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</main>
</div>



<!-- Modal Hapus -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">Jadi Hapus?</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
				<button type="button" class="btn btn-primary">Ya</button>
			</div>
		</div>
	</div>
</div>
