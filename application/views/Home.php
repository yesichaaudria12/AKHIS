<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- Bootstrap 5 CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

	<!-- Bootetrap Icon -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css" />

	<!-- Swiper CSS -->
	<link rel="stylesheet" href="./assets/css/swiper-bundle.min.css" />

	<!-- My CSS -->
	<link rel="stylesheet" href="./assets/css/style.css" />
	<title>Document</title>
</head>

<body>
	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-white shadow">
		<div class="container-fluid px-5">
			<a class="navbar-brand" href="#">Navbar</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
				aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav mx-auto">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="#">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Features</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Pricing</a>
					</li>
					<li class="nav-item">
						<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
					</li>
				</ul>
				<ul class="navbar-nav ms-auto">
					<li class="nav-item">
						<button type="button" class="btn btn-primary">Login</button>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- Navbar End -->

	<!-- Hero -->
	<section class="py-5 bg-light" id="hero">
		<div class="container py-5">
			<div class="row">
				<div class="col-6">
					<h1>Solusi Kesehatan Terlengkap</h1>
					<p>Chat dokter, kunjungi rumah sakit, beli obat, cek lab dan update informasi seputar kesehatan,
						semua bisa di AKHIS!</p>
					<div class="text-center">
						<a href="#jual" class="btn drop-down">Jelajahi lebih <i class="bi bi-arrow-down-circle"></i></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Hero End -->

	<!-- Jual -->
	<section class="py-5" id="jual">
		<div class="container py-5">
			<div class="row">
				<div class="col text-center">
					<h1>Kita Melayani</h1>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus mollitia ea fugit ad!
						Laudantium itaque officia impedit quae et, illum enim? Placeat mollitia suscipit dolores
						provident beatae rerum, iusto nihil.</p>
				</div>
			</div>
			<div class="row justify-content-center pt-5">
				<div class="col-sm-5 card-jual-bg shadow mx-3">
					<a href="#" class="card-jual text-center text-dark">
						<img src="./assets/img/jual/1.png" class="card-img-top rounded-circle w-50 bg-light mt-3"
							alt="..." />
						<div class="card-body">
							<h5 class="card-title">Konsultasi Dokter</h5>
							<p class="card-text">Some quick example text to build on the card title and make up the bulk
								of the card's content.</p>
						</div>
					</a>
				</div>
				<div class="col-sm-5 card-jual-bg shadow mx-3">
					<a href="#" class="card-jual text-center text-dark">
						<img src="./assets/img/jual/2.png" class="card-img-top rounded-circle w-50 bg-light mt-3"
							alt="..." />
						<div class="card-body">
							<h5 class="card-title">Toko Obat</h5>
							<p class="card-text">Some quick example text to build on the card title and make up the bulk
								of the card's content.</p>
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
							<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Temporibus, id.</p>
						</div>
					</div>
					<div class="row">
						<div class="col-1">
							<i class="bi bi-search"></i>
						</div>
						<div class="col">
							<p class="fw-bolder">Temukan dokter berpengalaman</p>
							<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ex, repellat.</p>
						</div>
					</div>
					<div class="row">
						<div class="col-1">
							<i class="bi bi-chat-right-dots"></i>
						</div>
						<div class="col">
							<p class="fw-bolder">Silahkan chat dokter yang kamu pilih</p>
							<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facere minima quia delectus
								nesciunt. Excepturi, placeat?</p>
						</div>
					</div>
					<div class="row">
						<div class="col-1">
							<i class="bi bi-chat-right-quote"></i>
						</div>
						<div class="col">
							<p class="fw-bolder">Jelaskan kondisi kamu</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero sunt molestias enim
								necessitatibus dolores est deleniti fugiat impedit doloribus maiores!</p>
						</div>
					</div>
					<div class="row pt-2">
						<div class="col">
							<a href="#" class="btn btn-dokter text-white px-5">Temukan dokter</a>
						</div>
					</div>
				</div>
				<div class="col-lg-5">
					<img src="./assets/img/dokter/Desain tanpa judul.png" alt="" />
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
						Lorem ipsum, dolor sit amet consectetur adipisicing elit. Perferendis fuga quam mollitia magnam
						incidunt reiciendis? Earum dolore consequuntur illo necessitatibus, nesciunt esse expedita iure,
						pariatur tempora alias suscipit,
						harum repellendus.
					</p>
				</div>
			</div>
			<div class="row pt-5">
				<div class="col">
					<h3>Sering Dibeli</h3>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, accusamus.</p>
				</div>
				<div class="col text-end my-auto">
					<a href="#" class="btn text-white btn-dokter">Lihat Semua</a>
				</div>
			</div>
			<div class="row grid pb-3 border-bottom">
				<div class="col-lg-3 py-2">
					<a href="#">
						<div class="card">
							<img src="./assets/img/obat/1233.jpg" class="card-img-top" alt="..." />
							<div class="card-body text-center text-dark">
								<h5 class="card-title">Nama Obat</h5>
								<p class="card-text text-secondary" style="font-size: 13px">With supporting text below
									as a natural lead-in to additional content.</p>
								<p class="card-title">Rp. 99.9999</p>
							</div>
						</div>
					</a>
				</div>
				<div class="col-lg-3 py-2">
					<a href="#">
						<div class="card">
							<img src="./assets/img/obat/1233.jpg" class="card-img-top" alt="..." />
							<div class="card-body text-center text-dark">
								<h5 class="card-title">Nama Obat</h5>
								<p class="card-text text-secondary" style="font-size: 13px">With supporting text below
									as a natural lead-in to additional content.</p>
								<p class="card-title">Rp. 99.9999</p>
							</div>
						</div>
					</a>
				</div>
				<div class="col-lg-3 py-2">
					<a href="#">
						<div class="card">
							<img src="./assets/img/obat/1233.jpg" class="card-img-top" alt="..." />
							<div class="card-body text-center text-dark">
								<h5 class="card-title">Nama Obat</h5>
								<p class="card-text text-secondary" style="font-size: 13px">With supporting text below
									as a natural lead-in to additional content.</p>
								<p class="card-title">Rp. 99.9999</p>
							</div>
						</div>
					</a>
				</div>
				<div class="col-lg-3 py-2">
					<a href="#">
						<div class="card">
							<img src="./assets/img/obat/1233.jpg" class="card-img-top" alt="..." />
							<div class="card-body text-center text-dark">
								<h5 class="card-title">Nama Obat</h5>
								<p class="card-text text-secondary" style="font-size: 13px">With supporting text below
									as a natural lead-in to additional content.</p>
								<p class="card-title">Rp. 99.9999</p>
							</div>
						</div>
					</a>
				</div>
				<div class="col-lg-3 py-2">
					<a href="#">
						<div class="card">
							<img src="./assets/img/obat/1233.jpg" class="card-img-top" alt="..." />
							<div class="card-body text-center text-dark">
								<h5 class="card-title">Nama Obat</h5>
								<p class="card-text text-secondary" style="font-size: 13px">With supporting text below
									as a natural lead-in to additional content.</p>
								<p class="card-title">Rp. 99.9999</p>
							</div>
						</div>
					</a>
				</div>
				<div class="col-lg-3 py-2">
					<a href="#">
						<div class="card">
							<img src="./assets/img/obat/1233.jpg" class="card-img-top" alt="..." />
							<div class="card-body text-center text-dark">
								<h5 class="card-title">Nama Obat</h5>
								<p class="card-text text-secondary" style="font-size: 13px">With supporting text below
									as a natural lead-in to additional content.</p>
								<p class="card-title">Rp. 99.9999</p>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="row pt-3">
				<div class="col">
					<h3>Baru Sampai</h3>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, accusamus.</p>
				</div>
				<div class="col text-end my-auto">
					<a href="#" class="btn text-white btn-dokter">Lihat Semua</a>
				</div>
			</div>
			<div class="row grid">
				<div class="col-lg-3 py-2">
					<a href="#">
						<div class="card">
							<img src="./assets/img/obat/1233.jpg" class="card-img-top" alt="..." />
							<div class="card-body text-center text-dark">
								<h5 class="card-title">Nama Obat</h5>
								<p class="card-text text-secondary" style="font-size: 13px">With supporting text below
									as a natural lead-in to additional content.</p>
								<p class="card-title">Rp. 99.9999</p>
							</div>
						</div>
					</a>
				</div>
				<div class="col-lg-3 py-2">
					<a href="#">
						<div class="card">
							<img src="./assets/img/obat/1233.jpg" class="card-img-top" alt="..." />
							<div class="card-body text-center text-dark">
								<h5 class="card-title">Nama Obat</h5>
								<p class="card-text text-secondary" style="font-size: 13px">With supporting text below
									as a natural lead-in to additional content.</p>
								<p class="card-title">Rp. 99.9999</p>
							</div>
						</div>
					</a>
				</div>
				<div class="col-lg-3 py-2">
					<a href="#">
						<div class="card">
							<img src="./assets/img/obat/1233.jpg" class="card-img-top" alt="..." />
							<div class="card-body text-center text-dark">
								<h5 class="card-title">Nama Obat</h5>
								<p class="card-text text-secondary" style="font-size: 13px">With supporting text below
									as a natural lead-in to additional content.</p>
								<p class="card-title">Rp. 99.9999</p>
							</div>
						</div>
					</a>
				</div>
				<div class="col-lg-3 py-2">
					<a href="#">
						<div class="card">
							<img src="./assets/img/obat/1233.jpg" class="card-img-top" alt="..." />
							<div class="card-body text-center text-dark">
								<h5 class="card-title">Nama Obat</h5>
								<p class="card-text text-secondary" style="font-size: 13px">With supporting text below
									as a natural lead-in to additional content.</p>
								<p class="card-title">Rp. 99.9999</p>
							</div>
						</div>
					</a>
				</div>
				<div class="col-lg-3 py-2">
					<a href="#">
						<div class="card">
							<img src="./assets/img/obat/1233.jpg" class="card-img-top" alt="..." />
							<div class="card-body text-center text-dark">
								<h5 class="card-title">Nama Obat</h5>
								<p class="card-text text-secondary" style="font-size: 13px">With supporting text below
									as a natural lead-in to additional content.</p>
								<p class="card-title">Rp. 99.9999</p>
							</div>
						</div>
					</a>
				</div>
				<div class="col-lg-3 py-2">
					<a href="#">
						<div class="card">
							<img src="./assets/img/obat/1233.jpg" class="card-img-top" alt="..." />
							<div class="card-body text-center text-dark">
								<h5 class="card-title">Nama Obat</h5>
								<p class="card-text text-secondary" style="font-size: 13px">With supporting text below
									as a natural lead-in to additional content.</p>
								<p class="card-title">Rp. 99.9999</p>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</section>
	<!-- Obat End -->

	<!-- Footer -->
	<footer id="footer">
		<div class="container pt-4">
			<div class="row footer-2 text-white">
				<div class="col-lg">
					<p class="fw-bolder">@AKHIS, 2021. ALL RIGHTS RESERVED</p>
				</div>
				<div class="col-lg-2 text-center">
					<p>Follow kami di</p>
				</div>
				<div class="col-lg-2">
					<a href="#"><i class="bi bi-twitter text-white mx-1"></i></a>
					<a href="#"><i class="bi bi-instagram text-white mx-1"></i></a>
					<a href="#"><i class="bi bi-facebook text-white mx-1"></i></a>
				</div>
			</div>
		</div>
	</footer>
	<!-- Footer End -->
</body>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<!-- Swiper JS -->
<script src="./assets/js/swiper-bundle.min.js"></script>

<!-- My JS -->
<script src="./assets/js/script.js"></script>

</html>
