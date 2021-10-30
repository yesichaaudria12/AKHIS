<div class="page-wrapper">
	<div class="page-content">
		<div class="container-fluid px-4">
			<div class="row">
				<div class="col">
					<div class="mt-3">
						<?= $this->session->flashdata('message'); ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<a href="<?= rubah_url('lihat', 'tambah'); ?>" class="btn btn-primary px-5">Tambah Baru</a>
				</div>
			</div>
			<style>
				@media (min-width: 992px) {
					#obat {
						min-height: 460px;
					}
				}
			</style>
			<div class="row py-5">
				<?php foreach($obat as $obat): ?>
				<div class="col-lg-3">
					<div style="cursor: pointer" id="obat" class="shadow p-3" data-bs-toggle="modal"
						data-bs-target="#detail<?= $obat['id_obat']; ?>">
						<img style="" src="<?= base_url('assets'); ?>/img/obat/<?= $obat['gambar']; ?>" class="card-img-top"
							alt="obat"/>
						<div class="card-body">
							<h5 class="card-title"><?= $obat['nama_obat']; ?></h5>
							<p class="card-title fw-bold">Rp. <?= number_format($obat['harga'],0,',','.'); ?> / <?= $obat['satuan']; ?></p>
							<div class="d-flex justify-content-end">
								<a href="<?= rubah_url('lihat', 'ubah').'/'.$obat['id_obat']; ?>" class="btn btn-primary px-3 mx-2">Edit</a>
								<button type="button" class="btn btn-danger" data-bs-toggle="modal"
									data-bs-target="#hapus<?= $obat['id_obat']; ?>">Hapus</button>
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
												<p><?= $obat['komposisi']; ?></p>
											</div>
											<div class="border-bottom py-3">
												<h5>Dosis</h5>
												<p><?= $obat['dosis']; ?></p>
											</div>
											<div class="border-bottom py-3">
												<h5>Efek Samping</h5>
												<p><?= $obat['efek_samping']; ?></p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
				<!-- Modal Hapus -->
				<div class="modal fade" id="hapus<?= $obat['id_obat']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-body">
								<input type="hidden" name="gambar" value="<?= $obat['gambar']; ?>">
								Yakin ining menghapus obat?
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
								<a href="<?= base_url('hapus/data/'."obat/"."id_obat/".$obat['id_obat'])."./assets/img/obat"; ?>" class="btn btn-danger">Hapus</a>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>



