<style>
	@media (min-width: 991.98px) {
		.basic-form {
			padding-inline: 4rem;
		}
	}
</style>
<div class="page-wrapper">
	<div class="page-content">
		<div class="container-fluid mt-3">
			<div class="my-3">
				<?= $this->session->flashdata('message'); ?>
			</div>
			<a href="<?= $kembali; ?>" class="btn btn-dark mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>
			<div class="card">
				<div class="card-header justify-content-center mb-2">
					<h3 class="text-body"><?= $title; ?></h3>
				</div>
				<div class="card-body">
					<div class="basic-form">
						<?= form_open_multipart(current_url()); ?>
						<?php $i = 0;
						foreach ($columns as $c) : ?>
							<div class="form-group row my-2">
								<label class="col-lg-3 col-form-label text-dark"><?= ucwords(str_replace("_", " ", $c->name)); ?></label>
								<div class="col-lg-9">
									<?php if (isset($input) && $input[$i] == 'options') : ?>
										<select class="form-control input-rounded" id="sel1" name="<?= $c->name; ?>">
											<option value="<?= set_value($c->name); ?>">
												<?= set_value($c->name) ? set_value($c->name) : "Silahkan Pilih " . ucwords(str_replace('_', ' ', $c->name)); ?>
											</option>
											<?php foreach ($options as $o) : ?>
												<option value="<?= $o[$value]; ?>"><?= $o[$list]; ?></option>
											<?php endforeach; ?>
										</select>
										<?= form_error($c->name, '<small class="pl-3 text-danger">', '</small>'); ?>
									<?php elseif (isset($input) && $input[$i] == 'textarea') : ?>
										<div class="form-floating">
											<textarea class="form-control" name="<?= $c->name; ?>" id="<?= $c->name; ?>" style="height: 100px" placeholder="Masukan <?= str_replace("_", " ", $c->name); ?>" <?= isset($add_atribut) ? $add_atribut[$i] : ""; ?> value="<?= set_value($c->name); ?>"><?= set_value($c->name); ?></textarea>
											<label for="<?= $c->name; ?>"><?= str_replace("_", " ", $c->name); ?></label>
											<?= form_error($c->name, '<small class="pl-3 text-danger">', '</small>'); ?>
										</div>
									<?php else : ?>
										<div class="input-group">
											<?php if ($c->name == 'harga') : ?>
												<div class="input-group-prepend"><span class="input-group-text" id="basic-addon1">Rp.</span></div>
											<?php endif; ?>
											<input type="<?= isset($type) ? $type[$i] : "text"; ?>" class="form-control input-rounded" name="<?= $c->name; ?>" id="<?= $c->name; ?>" placeholder="Masukan <?= str_replace("_", " ", $c->name); ?>" <?= isset($add_atribut) ? $add_atribut[$i] : ""; ?> value="<?= set_value($c->name); ?>">
											<script>
												$('#harga').mask('#.##0', {
													reverse: true
												});
											</script>
										</div>
										<?= form_error($c->name, '<small class="pl-3 text-danger">', '</small>'); ?>
									<?php endif; ?>

								</div>
							</div>
						<?php $i++;
						endforeach; ?>
						<div class="row text-left justify-content-end">
							<div class="col-lg-9 my-2 pr-4 text-right">
								<button type="submit" class="btn btn-rounded btn-success px-5">Tambah</button>
							</div>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>