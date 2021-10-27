</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="<?= base_url('assets'); ?>/akhis/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="<?= base_url('assets'); ?>/akhis/js/jquery.min.js"></script>
	<script src="<?= base_url('assets'); ?>/akhis/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="<?= base_url('assets'); ?>/akhis/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="<?= base_url('assets'); ?>/akhis/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});

	</script>
	<!--app JS-->
	<script src="<?= base_url('assets'); ?>/akhis/js/app.js"></script>
</body>

</html>
