<style>
    #list_obat{
        min-height: 340px;
        cursor:pointer;
    }
</style>
<div class="page-wrapper">
	<div class="page-content">
	<?= $this->session->flashdata('message'); ?>
		<div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid">
            <?php foreach($obat as $obat) :?>
			<div class="col">
				<div class="card">
					<div id="list_obat" data-bs-toggle="modal" data-bs-target="#detail<?= $obat['id_obat']; ?>">
                        <img src="<?= base_url('assets'); ?>/img/obat/<?= $obat['gambar']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h6 class="card-title cursor-pointer"><?= $obat['nama_obat']; ?></h6>
                            <div class="clearfix">
                                <p class="mb-0 float-start"><strong>134</strong> Order</p>
                                <p class="mb-0 float-end fw-bold"><span>Rp. <?= number_format($obat['harga'],0,',','.'); ?></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a href="<?= base_url('pasien/kunjungi/konsultasi'); ?>" class="btn btn-sm btn-success px-5">Konsul</a>
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
							<div class="modal-footer justify-content-center">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
            <!-- End Modal -->
            <?php endforeach ?>
		</div>
	</div>
</div>
