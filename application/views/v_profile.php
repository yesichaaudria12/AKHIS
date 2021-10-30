
<div class="page-wrapper">
	<div class="page-content">
		<!--breadcrumb-->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3"><?= ucwords($this->session->userdata('role')); ?> Profile</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item">
							<a href="javascript:;"><i class="bx bx-home-alt"></i></a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							<?= ucwords($this->session->userdata('role')); ?> Profile</li>
					</ol>
				</nav>
			</div>
		</div>
		<?= $this->session->flashdata('message'); ?>
		<!--end breadcrumb-->
		<div class="container">
			<div class="main-body">
				<div class="row">
					<div class="col-lg-4">
						<div class="card">
							<div class="card-body">
								<div class="d-flex flex-column align-items-center text-center">
									<img src="<?= base_url('assets'); ?>/img/<?= $role; ?>/<?= $profile['foto']; ?>"
										alt="Admin" class="rounded-circle p-1 bg-primary" width="110" />
									<div class="mt-3">
										<h4><?= $profile['nama_lengkap']; ?></h4>
										<p class="text-secondary mb-1"><?= $role; ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-8">
						<div class="card">
							<div class="card-body">
								<form action="<?= current_url(); ?>" method="POST">
									<div class="row mb-3">
										<div class="col-sm-3">
											<h6 class="mb-0">Nama Lengkap</h6>
										</div>
										<div class="col-sm-9 text-secondary">
											<input type="text" class="form-control" name="nama_lengkap"
												value="<?= $profile['nama_lengkap']; ?>" />
											<?= form_error('nama_lengkap', '<small class="text-danger">', '</small>'); ?>
										</div>
									</div>
									<div class="row mb-3">
										<div class="col-sm-3">
											<h6 class="mb-0">Email</h6>
										</div>
										<div class="col-sm-9 text-secondary">
											<input type="text" class="form-control" name="email"
												value="<?= $profile['email']; ?>" />
											<?= form_error('email', '<small class="text-danger">', '</small>'); ?>
										</div>
									</div>
									<?php if ($role == 'dokter'): ?>
									<?php else: ?>
									<div class="row mb-3">
										<div class="col-sm-3">
											<h6 class="mb-0">No Handphone</h6>
										</div>
										<div class="col-sm-9 text-secondary">
											<input type="text" class="form-control" name="no_hp"
												value="<?= $profile['no_hp']; ?>" />
											<?= form_error('no_hp', '<small class="text-danger">', '</small>'); ?>
										</div>
									</div>
									<?php endif ?>
									<?php if ($role == 'pasien'): ?>
									<div class="row mb-3">
										<div class="col-sm-3">
											<h6 class="mb-0">Alamat</h6>
										</div>
										<div class="col-sm-9 text-secondary">
											<textarea id="mytextarea"
												name="alamat"><?= $profile['alamat']; ?></textarea>
											<?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
										</div>
									</div>
									<div class="row mb-3">
										<div class="col-sm-3">
											<h6 class="mb-0">Tanggal Lahir</h6>
										</div>
										<div class="col-sm-9 text-secondary">
												<input class="form-control" type="date" name="tanggal_lahir" id="date" value="<?= $profile['tanggal_lahir']; ?>">
										</div>
									</div>

									<?php endif ?>
									<div class="row">
										<div class="col-sm-3"></div>
										<div class="col-sm-9 text-secondary">
											<button type="submit" class="btn btn-primary px-4">Ubah</button>
											<button type="button" class="btn btn-secondary" data-bs-toggle="modal"
												data-bs-target="#password">Ubah Passoword</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="password" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-body">
				<div class="card border-top border-0 border-4 border-primary">
					<div class="card-body p-5">
						<div class="card-title d-flex align-items-center">
							<div><i class="fas fa-key text-primary me-1"></i>
							</div>
							<h5 class="mb-0 text-primary">Ganti Password</h5>
						</div>
						<hr>
						<form action="<?= current_url(); ?>" method="POST" class="row row-cols-1 g-2">
							<div class="col">
								<label for="password_lama" class="form-label">Password Lama</label>
								<input type="password" name="password_lama" class="form-control" id="password_lama"
									required>
								<?= form_error('password_lama', '<small class="text-danger">', '</small>'); ?>
							</div>
							<div class="col">
								<label for="password_baru" class="form-label">Password Baru</label>
								<input type="password" name="password_baru" class="form-control" id="password_baru">
								<?= form_error('password_baru', '<small class="text-danger">', '</small>'); ?>
							</div>
							<div class="col">
								<label for="konfirmasi_password" class="form-label">Konfirmasi Password</label>
								<input type="password" name="konfirmasi_password" class="form-control"
									id="konfirmasi_password">
								<?= form_error('konfirmasi_password', '<small class="text-danger">', '</small>'); ?>
							</div>
							<div class="col-12 text-center">
								<button type="submit" class="btn btn-primary px-5">Rubah</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?= base_url('assets'); ?>/vendor/tinymce/tinymce.min.js"></script>
<script>
	tinymce.init({
		selector: '#mytextarea',
		menubar: 'custom',
	});

</script>
