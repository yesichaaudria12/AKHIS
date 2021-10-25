<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid px-4">
			<h1 class="mt-4"><?= ucwords($this->session->userdata('role')); ?></h1>
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item active">Dashboard</li>
			</ol>
			<div class="row justify-content-evenly">
				<div class="col-xl-3 col-md-6">
					<div class="shadow-lg bg-primary pt-3 text-center text-white mb-4">
						<div>Jumlah Pasien</div>
						<h3><?= $this->db->count_all_results('pasien'); ?></h3>
						<div class="card-footer d-flex align-items-center mt-3 justify-content-between">
							<a class="small text-white stretched-link" href="#">View Details</a>
							<div class="small text-white"><i class="fas fa-angle-right"></i></div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6">
					<div class="shadow-lg bg-warning pt-3 text-center text-white mb-4">
						<div>Jumlah Obat</div>
						<h3><?= $this->db->count_all_results('obat'); ?></h3>
						<div class="card-footer d-flex mt-3 align-items-center justify-content-between">
							<a class="small text-white stretched-link" href="#">View Details</a>
							<div class="small text-white"><i class="fas fa-angle-right"></i></div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6">
					<div class="shadow-lg bg-success pt-3 text-center text-white mb-4">
						<div>Jumlah Dokter</div>
						<h3><?= $this->db->count_all_results('dokter'); ?></h3>
						<div class="card-footer d-flex mt-3 align-items-center justify-content-between">
							<a class="small text-white stretched-link" href="#">View Details</a>
							<div class="small text-white"><i class="fas fa-angle-right"></i></div>
						</div>
					</div>
				</div>
			</div>
			<div class="card mb-4">
				<div class="card-header">
					<i class="fas fa-table me-1"></i>
					List Dokter
				</div>
				<div class="card-body">
					<table id="datatablesSimple">
						<thead>
							<tr>
								<?php foreach($columns as $column): ?>
								<th class="text-center align-middle"><?= ucwords(str_replace('_',' ', $column)); ?></th>
								<?php endforeach; ?>
							</tr>
						</thead>
						<tbody>
							<?php foreach($dokter as $d): ?>
							<tr>
								<?php $i = 0; 
								foreach($columns as $column): ?>
									<?php if ($column == 'foto') :?>
										<th class="text-center align-middle" style="width: 10%;"><img src="<?= base_url('assets'); ?>/img/dokter/<?= $d[$column]; ?>" class="img-thumbnail" alt="foto_dokter" width="60" height="60"></th>
									<?php else: ?>
										<th class="text-center align-middle" style="<?= $width[$i]; ?>;"><?= $d[$column]; ?></th>
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
	</main>
</div>
