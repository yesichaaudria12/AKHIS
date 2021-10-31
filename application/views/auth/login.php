<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-4">
	<div class="container-fluid">
		<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3 mt-5">
			<div class="col mx-auto">
				<div class="card mt-5 mt-lg-0">
					<div class="card-body">
						<div class="border p-4 rounded">
							<div class="text-center">
								<?= $this->session->flashdata('message'); ?>
								<h3 class="text-success">Login</h3>
								<p>belum punya akun? <a href="<?= base_url('auth/daftar'); ?>">Daftar di sini</a>
								</p>
							</div>
							
							<div class="login-separater text-center mb-4"> <span>DENGAN EMAIL</span>
								<hr />
							</div>
							<div class="form-body">
								<form action="<?= base_url('auth/login'); ?>" method="POST" class="row g-3">
									<div class="col-12">
										<label for="email" class="form-label">Email Anda</label>
										<input type="email" class="form-control" id="email " placeholder="Masukan Email"
											name="email" value="<?= set_value('email'); ?>">
										<?= form_error('email', '<small class="text-danger">', '</small>'); ?>
									</div>
									<div class="col-12">
										<label for="password" class="form-label">
											Password</label>
										<div class="input-group" id="show_hide_password">
											<input type="password" class="form-control border-end-0" id="password"
												name="password" placeholder="Masukan Password"> <a href="javascript:;"
												class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
										</div>
										<?= form_error('password', '<small class="text-danger">', '</small>'); ?>
									</div>
									<div class="col-12">
										<div class="d-grid">
											<button type="submit" class="btn btn-success"><i
													class="bx bxs-lock-open"></i>Login</button>
										</div>
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
