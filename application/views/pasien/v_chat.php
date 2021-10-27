<div class="page-wrapper">
	<div class="page-content">
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
									$id_LC = $chat['id_LC']?>
								<div class="list-group list-group-flush">
									<a href="<?= base_url('pasien/chat/index/'.$id_LC); ?>"
										class="list-group-item active">
										<div class="d-flex">
											<div class="chat-user-online">
												<img src="<?= base_url('assets'); ?>/img/dokter/<?= ambil_foto_byID($chat['id_dokter'], 'dokter'); ?>"
													width="42" height="42" class="rounded-circle" alt="" />
											</div>
											<div class="flex-grow-1 ms-2">
												<h6 class="mb-0 chat-title">
													<?= ambil_nama_byID($chat['id_dokter'], 'dokter'); ?></h6>
												<p class="mb-0 chat-msg"><?= chat_terbaru($id_LC); ?></p>
											</div>
											<div class="chat-time"></div>
										</div>
									</a>
								</div>
								<?php endforeach ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php if(isset($semua_chat)): ?>
			<div class="chat">
				<div class="chat-header d-flex align-items-center">
					<div class="chat-toggle-btn"><i class="bx bx-menu-alt-left"></i></div>
					<div>
						<h4 class="mb-1 font-weight-bold"><?= ambil_nama_byID($id_dokter,'dokter'); ?></h4>
						<div class="list-inline d-sm-flex mb-0 d-none">
							<a href="javascript:;"
								class="list-inline-item d-flex align-items-center text-secondary"><small
									class="bx bxs-circle me-1 chart-online"></small>Active Now</a>
						</div>
					</div>
				</div>
				<div class="chat-content">
					<?php foreach($semua_chat as $sc): ?>
					<?php if($sc['dari'] == $this->session->userdata('id')) :?>
					<div class="chat-content-rightside">
						<div class="d-flex ms-auto">
							<div class="flex-grow-1 me-2">
								<p class="mb-0 chat-time text-end" #>Anda, <?= $sc['jam_dikirim']; ?></p>
								<p class="chat-right-msg"><?= $sc['pesan']; ?></p>
							</div>
						</div>
					</div>
					<?php else: ?>
					<div class="chat-content-leftside">
						<div class="d-flex">
							<img src="<?= base_url('assets'); ?>/img/dokter/<?= ambil_foto_byID($id_dokter, 'dokter'); ?>"
								width="48" height="48" class="rounded-circle" alt="" />
							<div class="flex-grow-1 ms-2">
								<p class="mb-0 chat-time"><?= ambil_nama_byID($id_dokter,'dokter'); ?>, <?= $sc['jam_dikirim  ']; ?></p>
								<p class="chat-left-msg"><?= $sc['pesan']; ?></p>
							</div>
						</div>
					</div>
					<?php endif ?>
					<?php endforeach ?>
				</div>
				<div class="chat-footer d-flex align-items-center">
					<div class="flex-grow-1 pe-2">
						<div class="form-floating">
							<textarea class="form-control" placeholder="Leave a comment here"
								id="floatingTextarea"></textarea>
							<label for="floatingTextarea">Kirim Pesan</label>
						</div>
					</div>
					<div class="chat-footer-menu">
						<a href="javascript:;"><i class="bx bx-send"></i></a>
					</div>
				</div>
			</div>
			<?php else : ?>
			<p>pilih</p>
			<?php endif ?>
			<!--start chat overlay-->
			<div class="overlay chat-toggle-btn-mobile"></div>
			<!--end chat overlay-->
		</div>
	</div>
</div>
<script>
	function chat(id_dokter) {
		$.ajax({
			type: "POST",
			data: '',
			url: "<?= base_url('pasien/chat/index/'); ?>" + id_dokter,
		})
	}

</script>
