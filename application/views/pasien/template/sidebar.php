<div class="sidebar-wrapper" data-simplebar="true">
	<div class="sidebar-header">
		<div>
			<img src="<?= base_url('assets'); ?>/img/logo.jpg" class="logo-icon" alt="logo icon">
		</div>
		<div>
			<h4 class="logo-text text-success">AKHIS</h4>
		</div>
		<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
		</div>
	</div>
	<!--navigation-->
	<ul class="metismenu" id="menu">
		<li>
			<a href="<?= base_url('pasien/home'); ?>">
				<div class="parent-icon"><i class='bx bx-home-circle'></i>
				</div>
				<div class="menu-title">Home</div>
			</a>
		</li>
		<li>
			<a href="<?= base_url('pasien/kunjungi/konsultasi'); ?>">
				<div class="parent-icon"><i class='bx bx-user'></i>
				</div>
				<div class="menu-title">Konsultasi</div>
			</a>
		</li>
		<li>
			<a href="<?= base_url('pasien/lihat/obat/'. $this->session->userdata('id')); ?>">
				<div class="parent-icon"><i class="fas fa-capsules"></i>
				</div>
				<div class="menu-title">Obat Saya</div>
			</a>
		</li>
		<li>
			<a href="<?= base_url('pasien/chat'); ?>">
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
			url: "<?= base_url('pasien/chat/belum_dibaca'); ?>",
			success: function (result) {
				console.log(result);
				$('#chat-notif').html(result);
			}
		})
	}, 500)

</script>
