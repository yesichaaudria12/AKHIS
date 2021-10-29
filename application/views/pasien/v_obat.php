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
							data-bs-target="#detail<?= $dr['id_obat']?>" style="cursor: pointer;">
							<div class="col">
								<img src="<?= base_url('assets'); ?>/img/obat/<?= $dr['gambar']; ?>" alt="gambar obat"
									width="100">
							</div>
							<div class="col text-start">
								<p><?= $dr['nama_obat']; ?></p>
							</div>
						</div>
						<div class="modal fade" id="detail<?= $dr['id_obat']; ?>" tabindex="-1"
				aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-fullscreen">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Detail <?= $dr['nama_obat']; ?></h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
						<?php endforeach ?>
					</div>
					<div class="card-footer text-center">
						<a href="<?= base_url('pasien/kunjungi/pembayaran/'.$id_pasien."/".$r['id_resep']); ?>"
							class="btn btn-primary px-4">Bayar</a>
					</div>
				</div>
			</div>
			<?php endforeach ?>
		</div>
	</div>
</div>
