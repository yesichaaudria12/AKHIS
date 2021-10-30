<?php $this->session->set_userdata('kembali', current_url()); ?>
<div class="page-wrapper">
	<div class="page-content">
		<?= $this->session->flashdata('message'); ?>
		<div class="row row-cols-1 row-cols-lg-2 justify-content-center">
			<div class="col">
				<div class="card p-3 shadow text-center">
					<h2 class=""><?= $judul_resep; ?></h2>
					<hr>
					<div class="div" id="data_obat">
						<?php if($detail_resep) : ?>
							<?php foreach($detail_resep as $dr): ?>
							<div class="row align-items-center border mx-3">
								<div class="col" data-bs-toggle="modal" data-bs-target="#detail<?= $dr['id_obat']?>"
									style="cursor: pointer;">
									<img src="<?= base_url('assets'); ?>/img/obat/<?= $dr['gambar']; ?>" alt="gambar obat"
										width="100">
								</div>
								<div class="col text-start" data-bs-toggle="modal"
									data-bs-target="#detail<?= $dr['id_obat']?>" style="cursor: pointer;">
									<p><?= $dr['nama_obat']; ?></p>
								</div>
								<div class="col mb-1">
									<button class="btn btn-success" data-bs-toggle="modal"
										data-bs-target="#ubah<?= $dr['id']; ?>">Ubah</button>
									<button class="btn btn-danger" data-bs-toggle="modal"
										data-bs-target="#hapus<?= $dr['id']; ?>">hapus</button>
								</div>
							</div>
						<!-- ubah obat -->
						<div class="modal fade" id="ubah<?= $dr['id']; ?>" tabindex="-1"
							aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-body">
										<div class="card border-top border-0 border-4 border-primary">
											<div class="card-body p-5">
												<div class="card-title d-flex align-items-center">
													<div><i class="bx bxs-user me-1 font-22 text-primary"></i>
													</div>
													<h5 class="mb-0 text-primary">Ubah Obat untuk
														<?= $panggilan." ". ambil_nama_byID($id_pasien, 'pasien'); ?>
													</h5>
												</div>
												<hr>
												<form action="<?= base_url('dokter/ubah/resep_obat/'.$id_pasien.'/'.$dr['id']); ?>" method="POST" class="row row-cols-1 g-3 text-start">
													<div class="col">
														<label for="nama_obat" class="form-label">Nama Obat</label>
														<input type="text" name="nama_obat" class="form-control"
															id="nama_obat" value="<?= $dr['nama_obat']; ?>" readonly>
													</div>
													<div class="col">
														<label for="Qty" class="form-label">Jumlah obat</label>
														<input type="text" name="Qty" class="form-control" id="Qty"
															value="<?= $dr['Qty'] ?>">
														<?= form_error('Qty', '<small class="text-danger">', '</small>'); ?>
													</div>
													<div class="col">
														<div class="form-floating">
															<textarea class="form-control" placeholder="Aturan Minum"
																name="aturan_minum" id="aturan_minum"
																style="height: 100px"><?= $dr['aturan_minum'] ?></textarea>
															<label for="aturan_minum">Aturan Minum</label>
															<?= form_error('aturan_minum', '<small class="text-danger">', '</small>'); ?>
														</div>
													</div>
													<input type="hidden" name="id_obat" value="<?= $dr['id_obat']; ?>">
													<input type="hidden" name="id_resep" value="<?= $dr['id_resep']; ?>">
													<div class="col text-center">
														<button type="submit" class="btn btn-success px-5">Ubah</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal fade" id="hapus<?= $dr['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
							aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-body">Yakin ingin Hapus?</div>
									<div class="modal-footer justify-content-center">
										<button type="button" class="btn btn-secondary"
											data-bs-dismiss="modal">Tidak</button>
										<a class="btn btn-danger" href="<?= base_url('Hapus/data/detail_resep/id/'.$dr['id']); ?>">Ya</a>
									</div>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
						<?php else : ?>
							obat belum di pilih
						<?php endif ?>
					</div>
					<div class="card-footer">
						<a href="<?= base_url('dokter/chat/index/'.$id_pasien); ?>" class="btn btn-primary">Selesai</a>
					</div>
				</div>
			</div>
		</div>




		<!-- daftar Obat -->
		<style>
			#list_obat {
				min-height: 340px;
				cursor: pointer;
			}

		</style>
		<div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid">
			<?php foreach($obat as $obat) :?>
			<div class="col">
				<div class="card">
					<div id="list_obat" data-bs-toggle="modal" data-bs-target="#detail<?= $obat['id_obat']; ?>">
						<img src="<?= base_url('assets'); ?>/img/obat/<?= $obat['gambar']; ?>" class="card-img-top"
							alt="...">
						<div class="card-body">
							<h6 class="card-title cursor-pointer"><?= $obat['nama_obat']; ?></h6>
							<div class="clearfix">
								<p class="mb-0 float-start"><strong>134</strong> Order</p>
								<p class="mb-0 float-end fw-bold"><span>Rp.
										<?= number_format($obat['harga'],0,',','.'); ?></span>
								</p>
							</div>
						</div>
					</div>
					<div class="card-footer text-center">
						<a href="javascrpt:;" class="btn btn-sm btn-primary px-5" data-bs-toggle="modal"
							data-bs-target="#pilih<?= $obat['id_obat']; ?>">pilih</a>
					</div>
				</div>
			</div>

			<!-- detail Obat Modal -->
			<div class="modal fade" id="detail<?= $obat['id_obat']; ?>" tabindex="-1"
				aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-fullscreen">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Detail <?= $obat['nama_obat']; ?></h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<div class="container">
								<div class="row">
									<div class="col-lg-3 border-end">
										<div class="p-3">
											<img src="<?= base_url('assets'); ?>/img/obat/<?= $obat['gambar']; ?>"
												class="card-img-top" alt="..." />
											<div class="card-body text-center">
												<h5 class="card-title"><?= $obat['nama_obat']; ?></h5>
												<p class="card-title">Rp.
													<?= number_format($obat['harga'],0,',','.'); ?></p>
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
						<div class="modal-footer justify-content-center">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<!-- End Modal -->

			<!-- modal pilih -->
			<div class="modal fade" id="pilih<?= $obat['id_obat']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
				aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-body">
							<div class="card border-top border-0 border-4 border-primary">
								<div class="card-body p-5">
									<div class="card-title d-flex align-items-center">
										<div><i class="bx bxs-user me-1 font-22 text-primary"></i>
										</div>
										<h5 class="mb-0 text-primary">Pilih Obat untuk
											<?= $panggilan." ". ambil_nama_byID($id_pasien, 'pasien'); ?></h5>
									</div>
									<hr>
									<form action="<?= current_url(); ?>" method="POST" class="row row-cols-1 g-3">
										<div class="col">
											<label for="nama_obat" class="form-label">Nama Obat</label>
											<input type="text" name="nama_obat" class="form-control" id="nama_obat"
												value="<?= $obat['nama_obat']; ?>" readonly>
										</div>
										<div class="col">
											<label for="Qty" class="form-label">Jumlah obat</label>
											<input type="text" name="Qty" class="form-control" id="Qty"
												value="<?= set_value('Qty'); ?>">
											<?= form_error('Qty', '<small class="text-danger">', '</small>'); ?>
										</div>
										<div class="col">
											<div class="form-floating">
												<textarea class="form-control" placeholder="Aturan Minum"
													name="aturan_minum" id="aturan_minum"
													style="height: 100px"><?= set_value('aturan_minum'); ?></textarea>
												<label for="aturan_minum">Aturan Minum</label>
												<?= form_error('aturan_minum', '<small class="text-danger">', '</small>'); ?>
											</div>
										</div>
										<input type="hidden" name="id_obat" value="<?= $obat['id_obat']; ?>">
										<div class="col text-center">
											<button type="submit" class="btn btn-primary px-5">Tambah</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end modal -->
			<?php endforeach ?>
		</div>
	</div>
</div>
