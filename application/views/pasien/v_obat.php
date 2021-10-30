<div class="page-wrapper">
	<div class="page-content">
		<?= $this->session->flashdata('message'); ?>
		<div class="row my-3">
			<h4>Resep Untuk Anda</h4>
		</div>
		<div class="row">
			<?php foreach($resep as $r): ?>
			<div class="col-lg-4">
				<div class="card p-3 shadow">
					<div class="card-header text-center">
						<h4><?= $r['nama_resep']; ?></h4>
					</div>
					<div class="card-body">
						<?php foreach(detail_resep($r['id_resep']) as $dr) : ?>
						<div class="row align-items-center border m-2" data-bs-toggle="modal"
							data-bs-target="#detail<?= $r['id_resep']; ?><?= $dr['id_obat']; ?>" style="cursor: pointer;">
							<div class="col">
								<img src="<?= base_url('assets'); ?>/img/obat/<?= $dr['gambar']; ?>" alt="gambar obat"
									width="100">
							</div>
							<div class="col text-start">
								<p><?= $dr['nama_obat']; ?></p>
							</div>
						</div>
						<div class="modal fade" id="detail<?= $r['id_resep']; ?><?= $dr['id_obat']; ?>" tabindex="-1"
							aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-fullscreen">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Detail <?= $dr['nama_obat']; ?>
										</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal"
											aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<div class="container">
											<div class="row">
												<div class="col-lg-3 border-end">
													<div class="p-3">
														<img src="<?= base_url('assets'); ?>/img/obat/<?= $dr['gambar']; ?>"
															class="card-img-top" alt="..." />
														<div class="card-body text-center">
															<h5 class="card-title"><?= $dr['nama_obat']; ?></h5>
															<p>jumlah obat X <?= $dr['Qty']; ?></p>
														</div>
													</div>
												</div>
												<div class="col">
													<div class="border-bottom py-3">
														<h5>Aturan Minum</h5>
														<p><?= $dr['aturan_minum']; ?></p>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="modal-footer justify-content-center">
										<button type="button" class="btn btn-secondary"
											data-bs-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
						<?php endforeach ?>
					</div>
					<?php if(cek_bayar($r['id_resep']) == 'dikemas'): ?>
					<button class="btn btn-info">Sedang Diproses</button>
					<?php elseif(cek_bayar($r['id_resep']) == 'dikirim'): ?>
					<button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#resi<?= $r['id_resep']; ?>">Sedang Dikirim</button>
					<?php elseif(cek_bayar($r['id_resep']) == 'selesai'): ?>
					<button class="btn btn-success">Sampai</button>
					<?php else: ?>
					<div class="card-footer text-center">
						<a href="<?= base_url('pasien/kunjungi/pembayaran/'.$id_pasien."/".$r['id_resep']); ?>"
							class="btn btn-primary px-4">Bayar</a>
					</div>
					<?php endif ?>
				</div>
			</div>
			<!-- Modal Resi -->
			<div class="modal fade" id="resi<?= $r['id_resep']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
				aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-body">
							<div class="card border-top border-0 border-4 border-primary">
								<div class="card-body p-5 text-center">
									<div class="card-title d-flex align-items-center justify-content-center">
										<div><i class="fas fa-box me-2 font-22 text-primary"></i>
										</div>
										<h5 class="mb-0 text-primary">Nomer Resi</h5>
									</div>
									<hr>
									<form action="<?= base_url('admin/ubah/pesanan/'.$r['id_resep'].'/dikirim'); ?>"
										method="POST" class="row g-3">
										<div class="col">
											<label for="no_resi" class="form-label">No Resi</label>
											<input type="text" name="no_resi" class="form-control"
												value="<?= ambil_resi($r['id_resep']); ?>" id="no_resi" readonly>
										</div>
										<div class="col-12 text-center my-2">
											<button type="button" class="btn btn-secondary"
												data-bs-dismiss="modal">Close</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Modal Resi -->
			<?php endforeach ?>
		</div>
	</div>
</div>
