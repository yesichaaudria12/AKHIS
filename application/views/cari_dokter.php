<section class="py-5" id="cari-dokter">
	<div class="container py-5">
	<a href="<?= $kembali; ?>" class="btn btn-dark mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>
		<div class="row">
			<div class="col">
				<div class="row d-flex align-items-start">
					<div class="col-lg-2 nav flex-column nav-pills me-5" id="v-pills-tab" role="tablist"
						aria-orientation="vertical">
						<button class="nav-link active text-start" id="v-pills-home-tab" data-bs-toggle="pill"
							data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
							aria-selected="true" style="color:black !important;">
							Dokter Umum
						</button>
					</div>
					<div class="col-lg tab-content py-3 px-5" id="v-pills-tabContent">
						<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
							aria-labelledby="v-pills-home-tab">
							<div class="row justify-content-start">
                                <?php foreach($dokter as $dokter): ?>
								<div class="col-sm-3 my-2 card-dokter-bg shadow mx-3">
									<div class="card-dokter text-center text-dark">
										<img src="<?= base_url('assets'); ?>/img/dokter/<?= $dokter['foto']; ?>"
											class="card-img-top rounded-circle w-50 bg-light mt-3" alt="..." />
										<div class="card-body">
											<h5 class="card-title"><?= $dokter['nama_lengkap']; ?></h5>
											<p class="card-text mb-2">Dokter Umum</p>
											<a href="<?= base_url('pasien/chat/index/'.$dokter['id_dokter']); ?>" class="btn btn-dokter text-white px-5"><i
													class="bi bi-chat-dots"></i> Chat</a>
										</div>
									</div>
								</div>
                                <?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
