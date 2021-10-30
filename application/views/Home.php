<!-- Hero -->
<section class="py-5 bg-light" id="hero">
	<div class="container py-5">
		<div class="row">
			<div class="col-6">
				<h1><span class="text-success">AKHIS</span> Solusi Kesehatan Terbaik</h1>
				<p>Chat dokter, Dapat Resep, beli obat, dan cek update informasi seputar kesehatan,
					semua bisa di <span class="text-success">AKHIS!</span></p>
				<div class="text-center">
					<a href="#melayani" class="btn drop-down">Jelajahi lebih <i class="bi bi-arrow-down-circle"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Hero End -->

<!-- Jual -->
<section class="py-5" id="melayani">
	<div class="container py-5">
		<div class="row">
			<div class="col text-center">
				<h1>Kita Melayani</h1>
				<p>Konsultasi resep obat Berbagai macam penyakit umum seperti Batuk, Demam, Darah Tinggi dan lain - lain</p>
			</div>
		</div>
		<div class="row justify-content-center pt-5">
			<div class="col-sm-5 card-jual-bg shadow mx-3">
				<a href="#dokter" class="card-jual text-center text-dark">
					<img src="<?= base_url('assets'); ?>/img/jual/1.png"
						class="card-img-top rounded-circle w-50 bg-light mt-3" alt="..." />
					<div class="card-body">
						<h5 class="card-title">Konsultasi Dokter</h5>
						<p class="card-text">Anda akan di layani oleh dokter profisional lebih dari 5 tahun untuk solusi berbagaimacam penyakit umum </p>
					</div>
				</a>
			</div>
			<div class="col-sm-5 card-jual-bg shadow mx-3">
				<a href="#obat" class="card-jual text-center text-dark">
					<img src="<?= base_url('assets'); ?>/img/jual/2.png"
						class="card-img-top rounded-circle w-50 bg-light mt-3" alt="..." />
					<div class="card-body">
						<h5 class="card-title">Toko Obat</h5>
						<p class="card-text">Anda hanya bisa membeli obat berdasarkan resep dokter kami, untuk menghindari penyalah gunaan obat</p>
					</div>
				</a>
			</div>
		</div>
	</div>
</section>
<!-- Jual End -->

<!-- Dokter -->
<section class="py-5 bg-light" id="dokter">
	<div class="container py-5">
		<div class="row justify-content-center">
			<div class="col-lg">
				<div class="row">
					<div class="col">
						<h1>Temukan dokter yang tepat</h1>
						<p>pilih dokter berdasarkan yang kami sediakan</p>
					</div>
				</div>
				<div class="row">
					<div class="col-1">
						<i class="bi bi-search"></i>
					</div>
					<div class="col">
						<p class="fw-bolder">Temukan dokter berpengalaman</p>
						<p>dokter kami berpengalaman lebih dari 5 tahun</p>
					</div>
				</div>
				<div class="row">
					<div class="col-1">
						<i class="bi bi-chat-right-dots"></i>
					</div>
					<div class="col">
						<p class="fw-bolder">Silahkan chat dokter yang kamu pilih</p>
						<p>anda bisa langsung chat di website kami</p>
					</div>
				</div>
				<div class="row">
					<div class="col-1">
						<i class="bi bi-chat-right-quote"></i>
					</div>
					<div class="col">
						<p class="fw-bolder">Jelaskan kondisi kamu</p>
						<p>anda bisa Jelaskan keluh kesah penyakit yang di alami</p>
					</div>
				</div>
				<div class="row pt-2">
					<div class="col">
						<a href="<?= base_url('home/cari_dokter'); ?>" class="btn btn-dokter text-white px-5">Temukan dokter</a>
					</div>
				</div>
			</div>
			<div class="col-lg-5">
				<img src="<?= base_url('assets') ?>/img/dokter/Desain tanpa judul.png" alt="" />
			</div>
		</div>
	</div>
</section>
<!-- Dokter End -->

<!-- Obat -->
<section class="py-5" id="obat">
	<div class="container py-5">
		<div class="row justify-content-center">
			<div class="col-md-9 text-center">
				<h1>Obat & Vitamin</h1>
				<p>
					kami menyediakan berbagai macam obat dan vitamin untuk kebutuhan anda
				</p>
			</div>
		</div>
		<div class="row py-5">
			<div class="col">
				<h3>daftar obat yang tersedia</h3>
			</div>
			<div class="col text-end my-auto">
				<a href="<?= base_url('pasien/home'); ?>" class="btn text-white btn-dokter">Lihat Semua</a>
			</div>
		</div>
		<style>
				@media (min-width: 992px) {
					#list_obat {
						min-height: 360px;
					}
				}
			</style>
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
</section>


<!-- Obat End -->
