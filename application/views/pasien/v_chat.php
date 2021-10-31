<style>
	#chat-content {
		overflow-y: scroll;
	}

</style>
<div class="page-wrapper">
	<div class="page-content">
		<?= $this->session->flashdata('message'); ?>
		<div class="chat-wrapper">
			<div class="chat-sidebar">
				<div class="chat-sidebar-header">
					<div class="d-flex align-items-center">
						<div class="chat-user-online">
							<img src="<?= base_url('assets'); ?>/img/pasien/<?= $this->session->userdata('foto'); ?>"
								width="45" height="45" class="rounded-circle" alt="" />
						</div>
						<div class="flex-grow-1 ms-2">
							<p class="mb-0"><?= $this->session->userdata('nama'); ?></p>
						</div>
					</div>
					<div class="mb-3"></div>
					<div class="input-group input-group-sm">
						<span class="input-group-text bg-transparent"><i class="bx bx-search"></i></span> <input
							type="text" class="form-control" placeholder="People, groups, & messages" />
						<span class="input-group-text bg-transparent"><i class="bx bx-dialpad"></i></span>
					</div>
				</div>
				<div class="chat-sidebar-content">
					<div class="tab-content" id="pills-tabContent">
						<div class="tab-pane fade show active" id="pills-Chats">
							<div class="chat-list">
								<?php foreach($chat as $chat): 
										$id_dokter = $chat['id_dokter'];
										$pesan = chat_terbaru($chat['id_LC'], 'pesan');
										$waktu = chat_terbaru($chat['id_LC'], 'tanggal_dikirim');
										if ($waktu == date('Y-m-d')){
											$waktu = str_replace(':','.',substr(chat_terbaru($chat['id_LC'], 'jam_dikirim'),0,5));
										}?>
								<div class="list-group list-group-flush">
									<a href="<?= base_url('pasien/chat/index/'.$id_dokter); ?>"
										class="list-group-item active">
										<div class="d-flex">
											<div class="chat-user-<?= status_online($id_dokter, 'dokter'); ?>">
												<img src="<?= base_url('assets'); ?>/img/dokter/<?= ambil_foto_byID($chat['id_dokter'], 'dokter'); ?>"
													width="42" height="42" class="rounded-circle" alt="" />
											</div>
											<div class="flex-grow-1 ms-2">
												<h6 class="mb-0 chat-title">
													<?= ambil_nama_byID($chat['id_dokter'], 'dokter'); ?></h6>
												<p class="mb-0 chat-msg"><?= $pesan; ?></p>
												<?= chat_belum_dibaca($chat['id_LC']) ? '<span class="alert-count">'.chat_belum_dibaca($chat['id_LC']).'</span>' : ""; ?>
											</div>
											<div class="chat-time"><?= $waktu; ?></div>
										</div>
									</a>
								</div>
								<?php endforeach ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php if(isset($id_tujuan)): ?>
				<div class="chat">
					<div class="chat-header d-flex align-items-center">
						<div class="chat-toggle-btn"><i class="bx bx-menu-alt-left"></i></div>
						<img src="<?= base_url('assets'); ?>/img/dokter/<?= ambil_foto_byID($id_tujuan,'dokter'); ?>"
							width="48" height="48" class="rounded-circle" alt="" />
						<div class="ms-1 container">
						<div class="row row-cols-2 justify-content-between">
							<div class="col">
								<h4 class="mb-1 font-weight-bold"><?= ambil_nama_byID($id_tujuan, 'dokter'); ?></h4>
								<div class="list-inline d-sm-flex mb-0 d-none">
									<a href="javascript:;"
										class="list-inline-item d-flex align-items-center text-secondary">
										<?= status_online($id_tujuan, 'dokter') == 'online' ? '<small class="bx bxs-circle me-1 chart-online"></small>Online' : ""; ?>
									</a>
								</div>
							</div>
							<div class="col text-end">
								<a href="<?= base_url('pasien/lihat/obat/'. $this->session->userdata('id')); ?>" class="btn btn-sm btn-success">Resep Anda</a>
							</div>
						</div>
						</div>
					</div>
					<div class="chat-content" id="chat-content">
						<!-- live chat dari ajax -->
					</div>
					<div class="chat-footer d-flex align-items-center">
						<input type="hidden" name="dari" id="dari" value="<?= $this->session->userdata('id'); ?>">
						<input type="hidden" name="kepada" id="kepada" value="<?= $id_tujuan; ?>">
						<div class="flex-grow-1 pe-2">
							<div class="form-floating">
								<textarea class="form-control" placeholder="Masukan Pesan" name="pesan"
									id="pesan"></textarea>
								<label for="pesan">Tulis Pesan</label>
							</div>
						</div>
						<div class="chat-footer-menu">
							<a href="javascript:;" id="kirim"><i class="bx bx-send"></i></a>
						</div>
					</div>
				</div>
			<?php else: ?>

			<?php endif ?>
			<!--start chat overlay-->
			<div class="overlay chat-toggle-btn-mobile"></div>
			<!--end chat overlay-->
		</div>
	</div>
</div>
<script>
	$(document).ready(function () {
		$('#kirim').click(function () {
			const nilai = {
				dari: $('#dari').val(),
				kepada: $('#kepada').val(),
				pesan: $('#pesan').val()
			};
			$.ajax({
				url: "<?= base_url('pasien/chat/kirim'); ?>",
				type: 'POST',
				data: nilai,
				success: function (result){
					console.log(result);
					$('#pesan').val("");
				} 
			})
		})
	})
	setInterval(function () {
		const value = {
			dari: $('#dari').val(),
			kepada: $('#kepada').val(),
			pesan: $('#pesan').val(),
		};
		$.ajax({
			url: "<?= base_url('pasien/chat/live_chat'); ?>",
			type: "POST",
			data: value,
			success: function (result) {
				$('#chat-content').html(result);
				$('#chat-content')
					.mouseenter(function () {
						$(this).addClass('active');
					})
					.mouseleave(function () {
						$(this).removeClass('active');
						$('#chat-content').scrollTop($("#chat-content").prop("scrollHeight"))
					})
			}
		})
	}, 500)

</script>