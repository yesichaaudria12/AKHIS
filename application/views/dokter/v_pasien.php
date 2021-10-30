<div class="page-wrapper">
	<div class="page-content">
	<?= $this->session->flashdata('message'); ?>
		<div class="card">
            <div class="card-header text-center">
                <h3>Data Pasien</h3>
            </div>
			<div class="card-body">
                <style>
                    tbody tr td{
                        text-align: center !important;
                    }
                </style>
				<div class="table-responsive">
					<table class="table mb-0">
						<thead class="table-light">
							<tr class="text-center">
								<th>nama_lengkap</th>
								<th>Jenis Kelamin</th>
								<th>Tanggal Lahir</th>
								<th>Umur</th>
								<th>Terakhir Konsult</th>
								<th>Lihat Details</th>
							</tr>
						</thead>
						<tbody>
                            <?php foreach($pasien as $p): ?>
							<tr>
								<td>
									<h6 class="mb-0 font-14"><?= $p['nama_lengkap']; ?></h6>
								</td>
								<td><?= $p['jenis_kelamin']; ?></td>
								<td>
                                    <?= $p['tanggal_lahir']; ?>
								</td>
								<td><?= umur($p['tanggal_lahir']); ?></td>
								<td><?= terakhir_konsul($p['id_pasien']); ?></td>
								<td>
                                    <a href="<?= base_url('dokter/chat/index/'.$p['id_pasien']); ?>" class="btn btn-primary btn-sm radius-30 px-4">View Details</a>
                                </td>
							</tr>
                            <?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
