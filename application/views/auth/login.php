<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets'); ?>/img/logo.ico">
	<title><?= $title; ?></title>
	<!-- CSS Sb-Admin -->
	<link href="<?= base_url('assets'); ?>/css/sb-admin.css" rel="stylesheet" />
	<link href="<?= base_url('assets'); ?>/vendor/bootstrap-5/css/bootstrap.min.css" rel="stylesheet" />
	<script src="<?= base_url('assets'); ?>/icon/font-awesome/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
	<div id="layoutAuthentication">
		<div id="layoutAuthentication_content">
			<main>
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-5">
							<div class="card shadow-lg border-0 rounded-lg mt-5">
								<div class="card-header">
									<h3 class="text-center font-weight-light my-4">Login</h3>
								</div>
								<div class="card-body">
									<?= $this->session->flashdata('message'); ?>
									<?= form_open('auth/login'); ?>
									<div class="form-floating mb-3">
										<input class="form-control" id="inputEmail" type="email"
											placeholder="masukan email anda" name="email"
											value="<?= set_value('email'); ?>" />
										<?= form_error('email', '<small class="text-danger">', '</small>'); ?>
										<label for="inputEmail">Email</label>
									</div>
									<div class="form-floating mb-3">
										<input class="form-control" id="inputPassword" type="password"
											placeholder="masukan password anda" name="password" />
										<?= form_error('password', '<small class="text-danger">', '</small>'); ?>
										<label for="inputPassword">Password</label>
									</div>
									<div class="d-flex align-items-center justify-content-between mt-4 mb-0">
										<a class="small" href="password.html">Forgot Password?</a>
										<button type="submit" class="btn btn-primary">Login</button>
									</div>
									</form>
								</div>
								<div class="card-footer text-center py-3">
									<div class="small"><a href="<?= base_url('auth/daftar'); ?>">Belum punya akun?
											Daftar</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</main>
		</div>
	</div>
	<script src="<?= base_url('assets'); ?>/vendor/bootstrap-5/js/bootstrap.bundle.js" crossorigin="anonymous"></script>
	<!-- JS Sb-Admin -->
	<script src="<?= base_url('assets'); ?>/js/sb-admin.js"></script>
</body>

</html>
