<header>
	<div class="topbar d-flex align-items-center">
		<nav class="navbar navbar-expand">
			<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
			</div>
			<div class="top-menu ms-auto">
				<ul class="navbar-nav align-items-center">
					<li class="nav-item mobile-search-icon">
						<a class="nav-link" href="#"> <i class='bx bx-search'></i>
						</a>
					</li>
					<li class="nav-item dropdown dropdown-large">
						<div class="dropdown-menu dropdown-menu-end">
						</div>
					</li>
					<li class="nav-item dropdown dropdown-large">
						<div class="dropdown-menu dropdown-menu-end">
							<div class="header-notifications-list">
							</div>
						</div>
					</li>
					<li class="nav-item dropdown dropdown-large">
						<div class="dropdown-menu dropdown-menu-end">
							<div class="header-message-list">
							</div>
						</div>
					</li>
				</ul>
			</div>
			<div class="user-box dropdown ms-auto">
				<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
					role="button" data-bs-toggle="dropdown" aria-expanded="false">
					<img src="<?= base_url('assets'); ?>/img/<?= $this->session->userdata('role'); ?>/<?= $this->session->userdata('foto'); ?>"
						class="user-img" alt="user avatar">
					<div class="user-info ps-3">
						<p class="user-name mb-0"><?= $this->session->userdata('nama'); ?></p>
						<p class="designattion mb-0"><?= $this->session->userdata('role'); ?></p>
					</div>
				</a>
				<ul class="dropdown-menu dropdown-menu-end">
					<li><a class="dropdown-item" href="<?= base_url('profile/lihat'); ?>"><i class="bx bx-user"></i><span>Profile</span></a>
					</li>
					<li><a class="dropdown-item" href="<?= base_url($this->session->userdata('role').'/home'); ?>"><i class="fas fa-tachometer-alt"></i><span> dashboard</span></a>
					</li>
					<li>
						<div class="dropdown-divider mb-0"></div>
					</li>
					<li><a class="dropdown-item" href="<?= base_url('auth/logout'); ?>"><i
								class='bx bx-log-out-circle'></i><span>Logout</span></a>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</header>
