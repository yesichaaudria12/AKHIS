<div class="page-wrapper">
	<div class="page-content">
	<?= $this->session->flashdata('message'); ?>
		<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
			<div class="col">
				<div class="card radius-10 bg-warning bg-gradient">
					<div class="card-body">
						<div class="d-flex align-items-center">
							<div>
								<p class="mb-0 text-dark">Total Users</p>
								<h4 class="text-dark my-1"><?= $this->db->count_all_results('pasien'); ?></h4>
							</div>
							<div class="text-dark ms-auto font-35"><i class='bx bx-user-pin'></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card radius-10 bg-info bg-gradient">
					<div class="card-body">
						<div class="d-flex align-items-center">
							<div>
								<p class="mb-0 text-dark">Total Resep</p>
								<h4 class="my-1 text-dark"><?= $this->db->count_all_results('resep'); ?></h4>
							</div>
							<div class="text-dark ms-auto font-35"><i class="fas fa-scroll"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card radius-10 bg-primary bg-gradient">
					<div class="card-body">
						<div class="d-flex align-items-center">
							<div>
								<p class="mb-0 text-white">Total Obat</p>
								<h4 class="my-1 text-white"><?= $this->db->count_all_results('obat'); ?></h4>
							</div>
							<div class="text-white ms-auto font-35"><i class='fas fa-capsules'></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--end row-->
		<div class="row">
			<div class="col d-flex">
				<div class="card radius-10 w-100">
					<div class="card-body">
						<div class="d-flex align-items-center">
							<div>
								<h5 class="mb-1">Resep History</h5>
								<p class="mb-0 font-13 text-secondary"><i class='bx bxs-calendar'></i>in last 30 days
									revenue</p>
							</div>
							<div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
							</div>
						</div>
						<div class="table-responsive mt-4">
							<table class="table align-middle mb-0 table-hover" id="Transaction-History">
								<thead class="table-light">
									<tr>
										<th>Payment Name</th>
										<th>Date & Time</th>
										<th>Amount</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<div class="d-flex align-items-center">
												<div class="">
													<img src="<?= base_url('assets'); ?>/akhis/images/avatars/avatar-1.png"
														class="rounded-circle" width="46" height="46" alt="" />
												</div>
												<div class="ms-2">
													<h6 class="mb-1 font-14">Payment from Michle Jhon</h6>
													<p class="mb-0 font-13 text-secondary">Refrence Id #8547846</p>
												</div>
											</div>
										</td>
										<td>Jan 10, 2021</td>
										<td>+256.00</td>
										<td>
											<div class="badge rounded-pill bg-success w-100">Completed</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--end row-->

		<!--end row-->

		<!--end row-->

	</div>
</div>
