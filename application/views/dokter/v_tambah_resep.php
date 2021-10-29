<?php $this->session->set_userdata('kembali', current_url()); ?>
<div class="page-wrapper">
	<div class="page-content">
		<?= $this->session->flashdata('message'); ?>
		<div class="row my-3">
			<h4>Resep Untuk <?= $panggilan." ". ambil_nama_byID($id_pasien, 'pasien'); ?></h4>
		</div>
		<div class="row">
			<div class="col pb-5">
				<button class="btn btn-primary px-5" data-bs-toggle="modal" data-bs-target="#tambah">Tambah
					Resep</button>
			</div>
		</div>
		<div class="row">
			<?php foreach($resep as $r): ?>
			<div class="col-lg-4">
				<div class="card p-3 shadow">
					<div class="card-header text-center">
						<h4><?= $r['nama_resep']; ?></h4>
					</div>
					<div class="card-body">
						<?php if(detail_resep($r['id_resep'])): ?>
						<?php foreach(detail_resep($r['id_resep']) as $dr) : ?>
						<div class="row align-items-center border m-2" data-bs-toggle="modal"
							data-bs-target="#detail<?= $dr['id_obat']?>" style="cursor: pointer;">
							<div class="col">
								<img src="<?= base_url('assets'); ?>/img/obat/<?= $dr['gambar']; ?>" alt="gambar obat"
									width="100">
							</div>
							<div class="col text-start">
								<p><?= $dr['nama_obat']; ?></p>
							</div>
						</div>
						<?php endforeach ?>
						<?php else: ?>
							<P>Belum ada obat yang di pilih</P>
						<?php endif ?>
					</div>
					<div class="card-footer text-center">
						<a href="<?= base_url('dokter/ubah/detail_resep/'.$id_pasien."/".$r['id_resep']); ?>"
							class="btn btn-primary px-4">Edit</a>
						<button type="button" class="btn btn-danger" data-bs-toggle="modal"
							data-bs-target="#hapus<?= $r['id_resep']; ?>">Hapus</button>
					</div>
				</div>
			</div>
			<div class="modal fade" id="hapus<?= $r['id_resep']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
				aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-body">Yakin ingin Hapus?</div>
						<div class="modal-footer justify-content-center">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
							<a class="btn btn-danger"
								href="<?= base_url('Hapus/data/resep/id_resep/'.$r['id_resep']); ?>">Ya</a>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach ?>
		</div>
	</div>
</div>

<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-body">
				<div class="card border-top border-0 border-4 border-primary">
					<div class="card-body p-5">
						<div class="card-title d-flex align-items-center">
							<div><i class="bx bxs-user me-1 font-22 text-primary"></i>
							</div>
							<h5 class="mb-0 text-primary">Tambah Resep Obat
								<?= $panggilan." ". ambil_nama_byID($id_pasien, 'pasien'); ?></h5>
						</div>
						<hr>
						<form action="<?= current_url(); ?>" method="POST"
							class="row g-3">
							<div class="col">
								<label for="nama_resep" class="form-label">Judul Resep</label>
								<input type="text" name="nama_resep" class="form-control" id="nama_resep" required>
							</div>
							<div class="col-12 text-center">
								<button type="submit" class="btn btn-primary px-5">Tambah</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
