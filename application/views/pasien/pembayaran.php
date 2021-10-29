<section class="py-5" id="cari-dokter">
	<div class="container py-5">
		<a href="<?= $kembali; ?>" class="btn btn-dark mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>
		<?= $this->session->flashdata('message'); ?>
		<div class="card">
			<div class="card-header text-center">
				<h5>Bayar Resep</h5>
			</div>
			<div class="card-body">
				<div class="row row-cols-1 row-cols-md-2 justify-content-end">
					<div class="col">
						<?php foreach($detail_resep as $dr): 
							$alamat = $dr['alamat']?>
						<div class="d-flex align-items-center border">
							<div class="gambar">
								<img src="<?= base_url('assets'); ?>/img/obat/<?= $dr['gambar']; ?>" alt="gambar obat"
									width="100">
							</div>
							<div class="">
								<h6><?= $dr['nama_obat']; ?></h6>
								<p>Jumlah Obat <?= $dr['Qty']; ?></p>
							</div>
						</div>
						<?php $jumlah_obat++;
						$total += $dr['sub_total'];
					endforeach; ?>
					</div>
					<?php if (cek_bayar($id_resep) == 'menunggu pembayaran'): ?>
						<div class="col">
							<div class="card">
								<div class="card-header text-center">
									<h5>Pembayaran</h5>
								</div>
								<div class="card-body">
									<h6>Alamat Rumah -> <?= ambil_nama_byID($id_pasien, 'pasien'); ?></h6>
									<p><?= $alamat; ?></p>
									<hr>
									<label class="form-label">Pilih Pembayaran</label>
									<select class="single-select" name="id_dp" id="m-payment">
										<option selected value="null">Silahkan Pilih</option>
										<?php foreach($m_payment as $pay) :?>
										<option value="<?= $pay['id_dp']; ?>"><?= $pay['nama_platform']; ?></option>\
										<?php endforeach ?>
									</select>
									<div id="akun_pembayaran" class="m-2 mt-4 text-center">
										<!--akun dari ajax -->
									</div>
								</div>
							</div>
						</div>
					<?php endif; ?>
					<div class="col">
						<div class="card">
							<div class="card-header text-center">
								<h4>Detail Pembayaran</h4>
							</div>
							<div class="card-body">
								<h5>Ringkasan Biaya</h5>
								<div class="row row-cols-2">
									<div class="col">
										<p>Total harga (<?= $jumlah_obat; ?> Obat)</p>
										<p>Ongkir</p>
										<p class="fw-bold">Total tagihan</p>
									</div>
									<div class="col-3">
										<p>Rp <?= number_format($total,0,',','.'); ?></p>
										<p>Rp <?= number_format($ongkir,0,',','.'); ?></p>
										<p class="fw-bold">Rp <?= number_format($total+ $ongkir,0,',','.'); ?></p>
									</div>
								</div>
							</div>
							<div class="card-footer text-center">
								<?php if (cek_bayar($id_resep) == 'menunggu pembayaran') :?>
									<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#bayar">Bayar</button>
								<?php elseif (cek_bayar($id_resep) == 'menunggu konfirmasi'): ?>
									<button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#bukti">lihat bukti</button>
									<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bayar">upload ulang</button>
								<?php else: ?>
									<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#bukti">Lunas</button>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="modal fade" id="bayar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-body">
				<div class="card border-top border-0 border-4 border-primary">
					<div class="card-body p-5">
						<div class="card-title d-flex align-items-center">
							<div><i class="bx bxs-user me-1 font-22 text-primary"></i>
							</div>
							<h5 class="mb-0 text-primary">Upload bukti Pembayaran</h5>
						</div>
						<hr>
						<?= form_open_multipart(current_url()); ?>
						<?php if(cek_bayar($id_resep) == "menunggu konfirmasi"): ?>
							<label class="form-label">Pilih Pembayaran</label>
								<select class="single-select" name="id_dp" id="m-payment">
									<option value="null">Silahkan Pilih</option>
									<?php foreach($m_payment as $pay) :?>
									<option value="<?= $pay['id_dp']; ?>"><?= $pay['nama_platform']; ?></option>\
									<?php endforeach ?>
								</select>
								<div id="akun_pembayaran" class="m-2 mt-4 text-center">
										<!--akun dari ajax -->
								</div>
						<?php endif ?>
						<div class="col">
							<div class="input-group mb-3">
								<input type="file" class="form-control" name="bukti_bayar">
							</div>
						</div>
						<div class="col-12 text-center">
							<input type="hidden" name="total_bayar" value="<?= $total + $ongkir; ?>">
							<input type="hidden" name="id_dp" id="id_dp">
							<input type="hidden" name="id_resep" id="id_resep" value="<?= $id_resep; ?>">
							<button type="submit" class="btn btn-primary px-5">Upload</button>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="bukti" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<div class="card border-top border-0 border-4 border-primary">
					<div class="card-body p-5 text-center">
						<div class="card-title d-flex align-items-center justify-content-center">
							<div><i class="bx bxs-user me-1 font-22 text-primary"></i>
							</div>
							<h5 class="mb-0 text-primary">bukti Pembayaran</h5>
						</div>
						<hr>
						<img src="<?= base_url('assets'); ?>/img/bukti_pembayaran/<?= lihat_bukti($id_resep); ?>" alt="bukti" width="200">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$('#m-payment').change(function () {
		$('#m-payment :selected').each(function () {
			console.log($('#m-payment').val());
			if ($('#m-payment').val() != "null"){
				$('#id_dp').val($('#m-payment').val());
				const nilai = {
					id_dp: $('#m-payment').val(),
				};
				$.ajax({
					type: "POST",
					data: nilai,
					url: "<?= base_url('pasien/kunjungi/pilih_metode'); ?>",
					success: function (result) {
						$('#akun_pembayaran').html(result);
					}
				})
			}else{
				$('#akun_pembayaran').html("");
			}
		});
	});

</script>
