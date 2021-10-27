<div class="page-wrapper">
	<div class="page-content">
		<div class="chat-wrapper">
			<div class="chat-sidebar">
				<div class="chat-sidebar-header">
					<div class="d-flex align-items-center">
						<div class="chat-user-online">
							<img src="../assets/img/avatar/avatar-1.png" width="45" height="45" class="rounded-circle"
								alt="" />
						</div>
						<div class="flex-grow-1 ms-2">
							<p class="mb-0">Rachel Zane</p>
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
								<div class="list-group list-group-flush">
									<a href="javascript:;" class="list-group-item active">
										<div class="d-flex">
											<div class="chat-user-online">
												<img src="../assets/img/avatar/avatar-3.png" width="42" height="42"
													class="rounded-circle" alt="" />
											</div>
											<div class="flex-grow-1 ms-2">
												<h6 class="mb-0 chat-title">Harvey Specter</h6>
												<p class="mb-0 chat-msg">Wrong. You take the gun....</p>
											</div>
											<div class="chat-time">4:32 PM</div>
										</div>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="chat-header d-flex align-items-center">
				<div class="chat-toggle-btn"><i class="bx bx-menu-alt-left"></i></div>
				<div>
					<h4 class="mb-1 font-weight-bold">Harvey Inspector</h4>
					<div class="list-inline d-sm-flex mb-0 d-none">
						<a href="javascript:;" class="list-inline-item d-flex align-items-center text-secondary"><small
								class="bx bxs-circle me-1 chart-online"></small>Active Now</a>
					</div>
				</div>
			</div>
			<div class="chat-content" id="data_pesan">>
				<div class="chat-content-leftside">
					<div class="d-flex">
						<img src="../assets/img/avatar/avatar-3.png" width="48" height="48" class="rounded-circle"
							alt="" />
						<div class="flex-grow-1 ms-2">
							<p class="mb-0 chat-time">Harvey, 2:35 PM</p>
							<p class="chat-left-msg">Hi, harvey where are you now a days?</p>
						</div>
					</div>
				</div>
				<div class="chat-content-rightside">
					<div class="d-flex ms-auto">
						<div class="flex-grow-1 me-2">
							<p class="mb-0 chat-time text-end" #>you, 2:37 PM</p>
							<p class="chat-right-msg">I am in USA</p>
						</div>
					</div>
				</div>
			</div>
			<div class="chat-footer d-flex align-items-center">
				<input type="hidden" name="pengirim" id="pengirim" value="<?= $this->session->userdata('id'); ?>">
				<input type="hidden" name="kepada" id="kepada" value="<?= $dokter ?>">
				<div class="flex-grow-1 pe-2">
					<div class="form-floating">
						<textarea class="form-control" placeholder="Masukan Pesan"
							id="pesan"></textarea>
						<label for="pesan">Kirim Pesan</label>
					</div>
				</div>
				<div class="chat-footer-menu">
					<a href="javascript:;" value="kirim" onclick="coba()"><i class="bx bx-send"></i></a>
				</div>
			</div>
			<!--start chat overlay-->
			<div class="overlay chat-toggle-btn-mobile"></div>
			<!--end chat overlay-->
		</div>
	</div>
</div>

<script>
	function coba() {
		const kirim = {
			pengirim: $('#pengirim').val(),
			kepada: $('#kepada').val(),
			pesan: $('#pesan').val()
		}
		$.ajax({
			type: "GET",
			data: kirim,
			url: "<?= base_url('dokter/chat/kirim'); ?>",
			success: $('#data_pesan').html('Berhasil')
		})
	}
</script>