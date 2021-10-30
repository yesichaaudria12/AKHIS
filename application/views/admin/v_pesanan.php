<div class="page-wrapper">
	<div class="page-content">
	<?= $this->session->flashdata('message'); ?>
		<div class="card">
			<div class="card-header text-center pt-3">
				<h5><?= $title; ?></h5>
			</div>
			<div class="card-body">
				<div class="table-responsive mt-4">
					<table class="table align-middle mb-0 table-hover" id="Transaction-History">
						<thead class="table-light">
							<tr class="text-center">
								<?php foreach($columns as $column): ?>
								<th class="text-center align-middle">
									<?= ucwords(str_replace('_',' ', $column)); ?></th>
								<?php endforeach; ?>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($pesanan as $p): ?>
							<tr>
								<?php $i = 0; 
                                    foreach($columns as $column): ?>
								<?php if ($column == 'foto') :?>
								<td class="text-center align-middle" style="width: 10%;"><img
										src="<?= base_url('assets'); ?>/img/pasien/<?= $p[$column]; ?>"
										class="img-thumbnail" alt="foto_dokter" width="60" height="60">
								</td>
								<?php else: ?>
								<td class="text-center align-middle" style="<?= $width[$i]; ?>;">
									<?= $p[$column]; ?>
								</td>
								<?php endif; ?>
								<?php $i++; 
                                    endforeach; ?>
								<td class="">
									<button class="btn btn-sm btn-info" data-bs-toggle="modal"
										data-bs-target="#detail<?= $p[$id_resep]; ?>"><i
											class="fal fa-eye fs-6"></i>Detail</button>
									<?php if (cek_bayar($p[$id_resep]) == 'menunggu konfirmasi') : ?>
									<button class="btn btn-sm btn-success" data-bs-toggle="modal"
										data-bs-target="#bukti<?= $p[$id_resep]; ?>"><i
											class="fas fa-exchange-alt fs-6"></i> Bukti</button>
									<a href="<?= base_url('admin/ubah/pesanan/'.$p[$id_resep].'/dikemas'); ?>"
										class="btn btn-sm btn-primary"><i class="fad fa-pen fs-6"></i>Dikemas</a>
									<?php elseif (cek_bayar($p[$id_resep]) == 'dikemas') :?>
									<button class="btn btn-sm btn-success" data-bs-toggle="modal"
										data-bs-target="#kirim<?= $p[$id_resep]; ?>"><i class="fas fa-box fs-6"></i>
										kirim</button>
									<?php elseif (cek_bayar($p[$id_resep]) == 'dikirim') :?>
									<button class="btn btn-sm btn-success" data-bs-toggle="modal"
										data-bs-target="#resi<?= $p[$id_resep]; ?>"><i class="fas fa-file-alt fs-6"></i>
										resi</button>
									<button class="btn btn-sm btn-primary" data-bs-toggle="modal"
										data-bs-target="#selesai<?= $p[$id_resep]; ?>"><i class="fas fa-people-carry fs-6"></i>
										selesai</button>
									<?php endif; ?>
								</td>
							</tr>
							<div class="modal fade" id="bukti<?= $p[$id_resep]; ?>" tabindex="-1"
								aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-body">
											<div class="card border-top border-0 border-4 border-primary">
												<div class="card-body p-5 text-center">
													<div
														class="card-title d-flex align-items-center justify-content-center">
														<div><i
																class="fas fa-exchange-alt me-2 font-22 text-primary"></i>
														</div>
														<h5 class="mb-0 text-primary">bukti Pembayaran</h5>
													</div>
													<hr>
													<img src="<?= base_url('assets'); ?>/img/bukti_pembayaran/<?= lihat_bukti($p[$id_resep]); ?>"
														alt="bukti" width="200">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Modal Detail -->
							<div class="modal fade" id="detail<?= $p[$id_resep]; ?>" tabindex="-1"
								aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-fullscreen">
									<div class="modal-content">
										<div class="modal-body">
											<div class="card border-top border-0 border-4 border-primary">
												<div class="card-body p-5 text-center">
													<div
														class="card-title d-flex align-items-center justify-content-center">
														<div><i
																class="fas fa-exchange-alt me-2 font-22 text-primary"></i>
														</div>
														<h5 class="mb-0 text-primary">Detail Pesanan</h5>
													</div>
													<hr>
													<div class="row row-cols-1 row-cols-md-2 justify-content-end">
														<div class="col">
															<div class="text-start">
																<h6>Alamat -> <?= $p['nama_lengkap']; ?></h6>
																<?= $p['alamat']; ?>
																<h6>No Handphone : <?= $p['no_hp']; ?></h6>
															</div>
															<div class="text-center">
																<h4>Pesanan</h4>
															</div>
															<?php $total = 0;
                                                            $jumlah_obat = 0;
                                                            $ongkir = 15000;
                                                            foreach(detail_resep($p[$id_resep]) as $dr): 
                                                                $alamat = $dr['alamat']?>
															<div class="d-flex align-items-center border">
																<div class="gambar">
																	<img src="<?= base_url('assets'); ?>/img/obat/<?= $dr['gambar']; ?>"
																		alt="gambar obat" width="100">
																</div>
																<div class="text-start">
																	<h6><?= $dr['nama_obat']; ?></h6>
																	<p>Jumlah Obat <?= $dr['Qty']; ?></p>
																</div>
															</div>
															<?php $jumlah_obat++;
                                                            $total += $dr['sub_total'];
                                                            endforeach; ?>
														</div>
														<div class="col">
															<div class="card">
																<div class="card-header text-center">
																	<h4>Detail Pembayaran</h4>
																</div>
																<div class="card-body">
																	<h5>Ringkasan Biaya</h5>
																	<div class="row row-cols-2">
																		<div class="col">
																			<p>Total harga (<?= $jumlah_obat; ?> Obat)
																			</p>
																			<p>Ongkir</p>
																			<p class="fw-bold">Total tagihan</p>
																		</div>
																		<div class="col-3">
																			<p>Rp
																				<?= number_format($total,0,',','.'); ?>
																			</p>
																			<p>Rp
																				<?= number_format($ongkir,0,',','.'); ?>
																			</p>
																			<p class="fw-bold">Rp
																				<?= number_format($total+ $ongkir,0,',','.'); ?>
																			</p>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="modal-footer justify-content-center">
											<button type="button" class="btn btn-secondary"
												data-bs-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>
							<!-- End Modal Detail -->
							<!-- Modal kirim -->
							<div class="modal fade" id="kirim<?= $p[$id_resep]; ?>" tabindex="-1"
								aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-body">
											<div class="card border-top border-0 border-4 border-primary">
												<div class="card-body p-5 text-center">
													<div
														class="card-title d-flex align-items-center justify-content-center">
														<div><i class="fas fa-box me-2 font-22 text-primary"></i>
														</div>
														<h5 class="mb-0 text-primary">Kirim Pesanan</h5>
													</div>
													<hr>
													<form
														action="<?= base_url('admin/ubah/pesanan/'.$p[$id_resep].'/dikirim'); ?>"
														method="POST" class="row g-3">
														<div class="col">
															<label for="no_resi" class="form-label">No Resi</label>
															<input type="text" name="no_resi" class="form-control"
																id="no_resi" required>
														</div>
														<div class="col-12 text-center my-2">
															<button type="submit"
																class="btn btn-success px-5">Kirim</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- End Modal kirim -->
							<!-- Modal Resi -->
							<div class="modal fade" id="resi<?= $p[$id_resep]; ?>" tabindex="-1"
								aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-body">
											<div class="card border-top border-0 border-4 border-primary">
												<div class="card-body p-5 text-center">
													<div
														class="card-title d-flex align-items-center justify-content-center">
														<div><i class="fas fa-box me-2 font-22 text-primary"></i>
														</div>
														<h5 class="mb-0 text-primary">Nomer Resi</h5>
													</div>
													<hr>
													<form
														action="<?= base_url('admin/ubah/pesanan/'.$p[$id_resep].'/dikirim'); ?>"
														method="POST" class="row g-3">
														<div class="col">
															<label for="no_resi" class="form-label">No Resi</label>
															<input type="text" name="no_resi" class="form-control"
																value="<?= ambil_resi($p[$id_resep]); ?>" id="no_resi"
																readonly>
														</div>
														<div class="col-12 text-center my-2">
															<button type="button" class="btn btn-secondary"
																data-bs-dismiss="modal">Close</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- End Modal Resi -->

							<!-- Modal Sampai -->
							<div class="modal fade" id="selesai<?= $p[$id_resep]; ?>" tabindex="-1"
								aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-body text-center">
											<h3>Yakin Barang Sudah Sampai?</h3>
										</div>
										<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
								<a href="<?= base_url('admin/ubah/pesanan/'.$p[$id_resep].'/selesai'); ?>" class="btn btn-primary">Yakin</a>
							</div>
									</div>
								</div>
							</div>
							<!-- End Modal Sampai -->
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
