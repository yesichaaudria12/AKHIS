<div class="page-wrapper">
	<div class="page-content">
	<?= $this->session->flashdata('message'); ?>
		<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
			<div class="col">
				<div class="card radius-10 bg-warning bg-gradient">
					<div class="card-body">
						<div class="d-flex align-items-center">
							<div>
								<p class="mb-0 text-dark">Total Dokter</p>
								<h4 class="text-dark my-1"><?= $this->db->count_all_results('dokter'); ?></h4>
							</div>
							<div class="text-dark ms-auto font-35"><i class="fas fa-user-md"></i>
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
								<h5 class="mb-1">List Dokter</h5>
							</div>
							<div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
							</div>
						</div>
						<div class="table-responsive mt-4">
							<table class="table align-middle mb-0 table-hover" id="Transaction-History">
								<thead class="table-light">
									<tr>
										<?php foreach($columns as $column): ?>
										<th class="text-center align-middle">
											<?= ucwords(str_replace('_',' ', $column)); ?></th>
										<?php endforeach; ?>
									</tr>
								</thead>
								<tbody>
									<?php foreach($dokter as $d): ?>
									<tr>
										<?php $i = 0; 
										foreach($columns as $column): ?>
										<?php if ($column == 'foto') :?>
										<th class="text-center align-middle" style="width: 10%;"><img
												src="<?= base_url('assets'); ?>/img/dokter/<?= $d[$column]; ?>"
												class="img-thumbnail" alt="foto_dokter" width="60" height="60"></th>
										<?php else: ?>
										<th class="text-center align-middle" style="<?= $width[$i]; ?>;">
											<?= $d[$column]; ?></th>
										<?php endif; ?>
										<?php $i++; 
										endforeach; ?>
									</tr>
									<?php endforeach; ?>
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
