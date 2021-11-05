<div class="d-flex align-items-center justify-content-center my-5">
	<div class="container">
		<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
			<div class="col mx-auto">
				<div class="card mt-5">
					<div class="card-body">
						<div class="border p-4 rounded">
							<div class="text-center">
								<h3 class="text-success">Daftar</h3>
								<p>Sudah punya akun? <a href="<?= base_url('auth/login'); ?>">Login</a>
								</p>
							</div>
							<div class="login-separater text-center mb-4"> <span>DENGAN EMAIL</span>
								<hr />
							</div>
							<div class="form-body">
								<form action="<?= base_url('auth/daftar'); ?>" method="POST" class="row g-3">
									<label for="nama_lengkap" class="form-label">Nama Lengkap</label>
									<input type="text" class="form-control mt-0" id="nama_lengkap" name="nama_lengkap" value="<?= set_value('nama_lengkap'); ?>" placeholder="Masukan Nama lengkap Anda">
									<?= form_error('nama_lengkap', '<small class="text-danger">', '</small>'); ?>
									<label for="nama_lengkap" class="form-label">jenis Kelamin</label>
									<select class="form-select mt-0" name="jenis_kelamin">
										<option selected value="<?= set_value('jenis_kelamin'); ?>"><?= set_value('jenis_kelamin') ? (set_value('jenis_kelamin') == 'L' ? "Laki - Laki" : "Perempuan") : "Pilih"; ?></option>
										<option value="L">Laki - Laki</option>
										<option value="P">Perempuan</option>
									</select>
									<?= form_error('jenis_kelamin', '<small class="text-danger">', '</small>'); ?>

									<label for="email" class="form-label">Email Address</label>
									<input type="email" class="form-control mt-0" id="email" name="email" value="<?= set_value('email'); ?>" placeholder="Masukan Email Valid">
									<?= form_error('email', '<small class="text-danger">', '</small>'); ?>
									<label for="password" class="form-label">Password</label>
									<div class="input-group mt-0" id="show_hide_password">
										<input type="password" class="form-control border-end-0" id="password" name="password" placeholder="Masukan Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
									</div>
									<?= form_error('password', '<small class="text-danger">', '</small>'); ?>
									<label for="password_konfirmasi" class="form-label">Konfirmasi Password</label>
									<div class="input-group mt-0" id="show_hide_password">
										<input type="password" class="form-control border-end-0" id="password_konfirmasi" name="password_konfirmasi" placeholder="Masukan Konfirmasi Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
									</div>
									<?= form_error('password_konfirmasi', '<small class="text-danger">', '</small>'); ?>
									<div class="d-grid">
										<button type="submit" class="btn btn-success"><i class='bx bx-user'></i>DAFTAR</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--end row-->
	</div>
</div>