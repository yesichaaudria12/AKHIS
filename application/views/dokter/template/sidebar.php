<div class="sidebar-wrapper" data-simplebar="true">
	<div class="sidebar-header">
		<a href="<?= base_url(); ?>" class="d-flex align-items-center">
			<div>
				<img src="<?= base_url('assets'); ?>/img/logo.jpg" class="logo-icon" alt="logo icon">
			</div>
			<div>
				<h4 class="logo-text text-success">AKHIS</h4>
			</div>
		</a>
		<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
		</div>
	</div>
	<!--navigation-->
	<ul class="metismenu" id="menu">
		<li>
			<a href="<?= base_url('dokter'); ?>">
				<div class="parent-icon"><i class='bx bx-home-circle'></i>
				</div>
				<div class="menu-title">Dashboard</div>
			</a>
		</li>
		<li class="menu-label">Master</li>
		<li>
			<a href="<?= base_url('dokter/lihat/obat'); ?>">
				<div class="parent-icon"><i class="fas fa-capsules"></i>
				</div>
				<div class="menu-title">Obat</div>
			</a>
		</li>
		<li>
			<a href="<?= base_url('dokter/lihat/pasien'); ?>">
				<div class="parent-icon"><i class='bx bx-user'></i>
				</div>
				<div class="menu-title">Pasien</div>
			</a>
		</li>
		<li>
			<a href="<?= base_url('dokter/chat'); ?>">
				<div class="parent-icon"><i class="far fa-comments"></i>
				</div>
				<div class="menu-title">Chat <div id="chat-notif"></div></div>
			</a>
		</li>
	</ul>
	<!--end navigation-->
</div>
<script>
	setInterval(function () {
		$.ajax({
			url: "<?= base_url('dokter/chat/belum_dibaca'); ?>",
			success: function (result) {
				console.log(result)
				$('#chat-notif').html(result);
			}
		})
	}, 500)

</script>
