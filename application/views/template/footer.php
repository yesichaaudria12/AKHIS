</body>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js">
</script>
<script src="<?= base_url('assets'); ?>/akhis/plugins/select2/js/select2.min.js"></script>
	<script>
		$('.single-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});
</script>

<!-- Swiper JS -->
<script src="<?= base_url('assets'); ?>/vendor/swiper/js/swiper-bundle.min.js"></script>

<!-- My JS -->
<script src="<?= base_url('assets'); ?>/js/script.js"></script>

</html>
