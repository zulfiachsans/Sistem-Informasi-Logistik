	<!-- =========================== CONTENT =========================== -->

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Inventory
				<small>Semua Item data</small>
			</h1>
			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-archive"></i> &nbsp; Inventory</li>
				<li class="active">Search</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">
			<?php echo $message; ?>

			<!-- Search Data box -->
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Cari Inventory
					</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-default btn-box-tool" title="Show / Hide" id="myboxwidget"><i class="fa fa-plus"></i> Tampilkan / Sembunyikan</button>
					</div>
				</div>
				<div class="box-body <?php echo (isset($results)) ? "hide" : "show" ?>" id="add_new">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<form id="search_form" action="<?php echo base_url('inventory/search/results') ?>" method="post" autocomplete="off" class="form form-horizontal" enctype="multipart/form-data">
							<div class="form-group">
								<div class="col-md-8 col-md-offset-2">
									<div class="input-group input-group-lg">
										<input type="text" name="keyword" id="keyword" class="form-control" value="<?php echo set_value("keyword"); ?>" placeholder="Search for..." required>
										<span class="input-group-btn">
											<button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span> Search</button>
										</span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-8 col-md-offset-2">
									<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
										<div class="panel panel-default">
											<div class="panel-heading" role="tab" id="CatFilter">
												<h4 class="panel-title">
													<a role="button" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
														<span class="fa fa-star"></span> &nbsp; Urutkan menurut Kategori
														<span class="pull-right">
															<span class="caret"></span>
														</span>
													</a>
												</h4>
											</div>
											<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="CatFilter">
												<div class="panel-body">
													<?php if (count($cat_list->result()) > 3) : ?>
														<?php
														$batas = ceil(count($cat_list->result()) / 2);
														$xs    = 0;
														foreach ($cat_list->result() as $cls2) :
															// Flagging untuk menentukan jumlah data kategori
															$xs++;
															// Jika 1, col 1.
															if ($xs == 1) {
																echo "<div class='col-md-6'>";
															}
															// Jika sudah batas, col 2
															elseif ($xs == $batas + 1) {
																echo "</div>";
																echo "<div class='col-md-6'>";
															}
														?>
															<div class="radio">
																<label for="category_<?php echo $cls2->id; ?>">
																	<input type="checkbox" name="category[]" id="category_<?php echo $cls2->id; ?>" value="<?php echo $cls2->id; ?>" <?php echo set_checkbox('category[]', $cls2->id); ?>>
																	<?php echo $cls2->name ?>
																</label>
															</div>
														<?php endforeach;
														echo "</div>"; ?>
													<?php else : ?>
														<div class="col-md-12">
															<?php $xs = 0;
															foreach ($cat_list->result() as $cls2) :
																$xs++; ?>
																<div class="radio">
																	<label for="category_<?php echo $cls2->id; ?>">
																		<input type="checkbox" name="category[]" id="category_<?php echo $cls2->id; ?>" value="<?php echo $cls2->id; ?>" <?php echo set_checkbox('category[]', $cls2->id); ?>>
																		<?php echo $cls2->name ?>
																	</label>
																</div>
															<?php endforeach; ?>
														</div>
													<?php endif; ?>
												</div>
											</div>
										</div>
										<div class="panel panel-default">
											<div class="panel-heading" role="tab" id="LocFilter">
												<h4 class="panel-title">
													<a class="collapsed" role="button" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
														<span class="fa fa-map-marker"></span> &nbsp; Urutkan Menurut Lokasi
														<span class="pull-right">
															<span class="caret"></span>
														</span>
													</a>
												</h4>
											</div>
											<div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="LocFilter">
												<div class="panel-body">
													<?php if (count($loc_list->result()) > 3) : ?>
														<?php
														$batas = ceil(count($loc_list->result()) / 2);
														$xs    = 0;
														foreach ($loc_list->result() as $lls) :
															// Flagging untuk menentukan jumlah data kategori
															$xs++;
															// Jika 1, col 1.
															if ($xs == 1) {
																echo "<div class='col-md-6'>";
															}
															// Jika sudah batas, col 2
															elseif ($xs == $batas + 1) {
																echo "</div>";
																echo "<div class='col-md-6'>";
															}
														?>
															<div class="radio">
																<label for="location_<?php echo $lls->id; ?>">
																	<input type="checkbox" name="location[]" id="location_<?php echo $lls->id; ?>" value="<?php echo $lls->id; ?>" <?php echo set_checkbox('location[]', $lls->id); ?>>
																	<?php echo $lls->name ?>
																</label>
															</div>
														<?php endforeach;
														echo "</div>"; ?>
													<?php else : ?>
														<div class="col-md-12">
															<?php $xs = 0;
															foreach ($loc_list->result() as $lls) :
																$xs++; ?>
																<div class="radio">
																	<label for="location_<?php echo $lls->id; ?>">
																		<input type="checkbox" name="location[]" id="location_<?php echo $lls->id; ?>" value="<?php echo $lls->id; ?>" <?php echo set_checkbox('location[]', $lls->id); ?>>
																		<?php echo $lls->name ?>
																	</label>
																</div>
															<?php endforeach; ?>
														</div>
													<?php endif; ?>
												</div>
											</div>
										</div>
										<div class="panel panel-default">
											<div class="panel-heading" role="tab" id="StatFilter">
												<h4 class="panel-title">
													<a class="collapsed" role="button" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
														<span class="fa fa-heart"></span> &nbsp; Urutkan menurut Status
														<span class="pull-right">
															<span class="caret"></span>
														</span>
													</a>
												</h4>
											</div>
											<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="StatFilter">
												<div class="panel-body">
													<?php if (count($stat_list->result()) > 3) : ?>
														<?php
														$batas = ceil(count($stat_list->result()) / 2);
														$xs    = 0;
														foreach ($stat_list->result() as $sls2) :
															// Flagging untuk menentukan jumlah data status
															$xs++;
															// Jika 1, col 1.
															if ($xs == 1) {
																echo "<div class='col-md-6'>";
															}
															// Jika sudah batas, col 2
															elseif ($xs == $batas + 1) {
																echo "</div>";
																echo "<div class='col-md-6'>";
															}
														?>
															<div class="radio">
																<label for="status_<?php echo $sls2->id; ?>">
																	<input type="checkbox" name="status[]" id="status_<?php echo $sls2->id; ?>" value="<?php echo $sls2->id; ?>" <?php echo set_checkbox('status[]', $sls2->id); ?>>
																	<?php echo $sls2->name ?>
																</label>
															</div>
														<?php endforeach;
														echo "</div>"; ?>
													<?php else : ?>
														<div class="col-md-12">
															<?php $xs = 0;
															foreach ($stat_list->result() as $sls2) :
																$xs++; ?>
																<div class="radio">
																	<label for="status_<?php echo $sls2->id; ?>">
																		<input type="checkbox" name="status[]" id="status_<?php echo $sls2->id; ?>" value="<?php echo $sls2->id; ?>" <?php echo set_checkbox('status[]', $sls2->id); ?>>
																		<?php echo $sls2->name ?>
																	</label>
																</div>
															<?php endforeach; ?>
														</div>
													<?php endif; ?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->

			<?php if (isset($results)) : ?>
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Search Results
						</h3>
						<div class="box-tools pull-right">
							<!-- <button class="btn btn-default btn-box-tool" title="Show / Hide" id="myboxwidget"><i class="fa fa-plus"></i> Show / Hide</button> -->
						</div>
					</div>
					<div class="box-body show">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<table class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th width="150">Kode</th>
										<th width="150">Tanggal Masuk</th>
										<th width="150">Jam Masuk</th>
										<th width="150">Dari</th>
										<th width="150">Nama Produk</th>
										<th width="150">Total</th>
										<th width="150">Sisa</th>
										<th width="150">Satuan</th>
										<th>#</th>
									</tr>
								</thead>
								<tbody>
									<?php if (count($results->result()) > 0) : ?>
										<?php foreach ($results->result() as $data) : ?>
											<tr>
												<td><?php echo $data->code; ?></td>
												<td><?php echo $data->date_of_purchase; ?></td>
												<td><?php echo $data->time_of_purchase; ?></td>
												<td><?php echo $data->agent; ?></td>
												<td><?php echo $data->brand; ?></td>
												<td><?= $data->jumlah_awal; ?></td>
												<td><?= $data->jumlah_datas; ?></td>
												<td><?= $data->satuan_datas ?></td>
												<td width="15%">
													<form action="<?php echo base_url('inventory/delete/' . $data->code) ?>" method="post" autocomplete="off">
														<div class="btn-group-vertical">
															<a class="btn btn-sm btn-default" href="<?php echo base_url('inventory/detail/' . $data->code) ?>" role="button"><i class="fa fa-eye"></i> Detail</a>
															<a class="btn btn-sm btn-primary" href="<?php echo base_url('inventory/edit/' . $data->code) ?>" role="button"><i class="fa fa-pencil"></i> Edit</a>
															<input type="hidden" name="id" value="<?php echo $data->id; ?>">
															<!-- <button type="submit" class="btn btn-sm btn-danger" role="button" onclick="return confirm('Delete this data?')"><i class="fa fa-trash"></i> Hapus</button> -->
															<a class="btn btn-sm btn-default btn-pindahkan" href="#" role="button" 
															data-id="<?= $data->id ?>" 
															data-code="<?= $data->code ?>" 
															data-brand="<?= $data->brand ?>" 
															data-jumlah_datas="<?= $data->jumlah_datas ?>" 
															data-satuan_datas="<?= $data->satuan_datas ?>" 
															data-status="<?= $data->status ?>" 
															data-date_of_purchase="<?= $data->date_of_purchase ?>"
															data-time_of_purchase="<?= $data->time_of_purchase?>">
														<i class="fa fa-arrow-right"></i> Pindahkan</a>
														</div>
													</form>
												</td>
											</tr>
										<?php endforeach ?>
									<?php else : ?>
										<tr>
											<td class="text-center" colspan="9">Data Tidak Ditemukan !</td>
										</tr>
									<?php endif ?>
								</tbody>
							</table>
						</div>
					</div>
					<!-- /.box-body -->
				</div>
			<?php endif; ?>
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

	<!-- =========================== / CONTENT =========================== -->

	<!-- Insert New Data box -->
	<div class="modal fade" id="pindahkanModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="box-header with-border">
					<h3 class="box-title">Edit Data</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-white btn-box-tool" data-dismiss="modal" id="myboxwidget"><i class="fa fa-close"></i></button>
					</div>
				</div>
				<div class="box-body">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<form id="input_form" action="<?php echo base_url('inventory/move/') ?>" method="post" autocomplete="off" class="form form-horizontal" enctype="multipart/form-data">
							<h3>Basic Info</h3>
							<fieldset>
								<div class="form-group" hidden>
									<label for="id" class="control-label col-md-3">Id</label>
									<div class="col-md-9">
										<input type="text" name="id" id="id" class="form-control required" readonly>
									</div>
								</div>
								<div class="form-group">
									<label for="agent" class="control-label col-md-3">* Kepada</label>
									<div class="col-md-9">
										<input type="text" name="agent" id="agent" class="form-control required" required>
									</div>
								</div>
								<div class="form-group">
									<label for="code" class="control-label col-md-3">* Kode</label>
									<div class="col-md-9">
										<input type="text" name="code" id="code" class="form-control required" readonly>
									</div>
								</div>
								<div class="form-group">
									<label for="brand" class="control-label col-md-3">* Nama Produk</label>
									<div class="col-md-9">
										<input type="text" name="brand" id="brand" class="form-control required>" readonly>
									</div>
								</div>
								<div class="form-group">
									<label for="status" class="control-label col-md-3">* Status</label>
									<div class="col-md-9">
										<select name="status" id="status" class="form-control">
											<?php if (count($stat_list->result()) > 0) : ?>
												<?php foreach ($stat_list->result() as $cls) : ?>
													<option value="<?= $cls->id; ?>"><?= $cls->name; ?>
													<?php endforeach; ?>
												<?php endif; ?>
										</select>
									</div>
									<br>
								</div>
							</fieldset>

							<h3>Spesifikasi</h3>
							<fieldset>
								<div class="form-group">
									<label for="date_of_purchase" class="control-label col-md-3">* Tanggal Masuk</label>
									<div class="col-md-9">
										<input type="text" name="date_of_purchase" id="date_of_purchase" class="form-control required 
										<?php if (form_error('date_of_purchase')) {
											echo "error";
										} ?>" readonly>
									</div>
								</div>
								<div class="form-group">
									<label for="time_of_purchase" class="control-label col-md-3">* Jam Masuk</label>
									<div class="col-md-9">
										<input type="text" name="time_of_purchase" id="time_of_purchase" class="form-control required 
										<?php if (form_error('time_of_purchase')) {
											echo "error";
										} ?>" readonly>
									</div>
								</div>
								<div class="form-group">
									<label for="date_of_sale" class="control-label col-md-3">* Tanggal Keluar</label>
									<div class="col-md-9">
										<input type="text" name="date_of_sale" id="date_of_sale" class="form-control required" value="<?= date('Y-m-d'); ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="time_of_sale" class="control-label col-md-3">* Jam Keluar</label>
									<div class="col-md-9">
										<input type="text" name="time_of_sale" id="time_of_sale" class="form-control required" value="<?= date('H:i'); ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="jumlah_datas" class="control-label col-md-3">* Jumlah Datas</label>
									<div class="col-md-9">
										<input type="text" name="jumlah_datas" id="jumlah_datas" class="form-control required 
										<?php if (form_error('jumlah_datas')) {
											echo "error";
										} ?>" required>
									</div>
								</div>
								<div class="form-group">
									<label for="satuan_datas" class="control-label col-md-3">Satuan Datas</label>
									<div class="col-md-9">
										<div class="input-group">
											<input type="text" name="satuan_datas" id="satuan_datas" class="form-control" readonly="readonly">
										</div>
									</div>
								</div>

							</fieldset>
							<h3>Description</h3>
							<fieldset>
								<div class="form-group">
									<label for="description" class="control-label col-md-3">* Keterangan</label>
									<div class="col-md-9">
										<textarea name="description" id="description" class="form-control"> </textarea>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
	</div>
	<!-- /.box -->



	<script src="<?= base_url('assets/plugins/modal/jquery-3.4.1.min.js') ?>"></script>
	<script>
		$(document).ready(function() {
			// get Edit Product
			$('.btn-pindahkan').on('click', function() {
				// get data from button edit
				const id = $(this).data('id');
				const code = $(this).data('code');
				const brand = $(this).data('brand');
				const jumlah_datas = $(this).data('jumlah_datas');
				const satuan_datas = $(this).data('satuan_datas');
				const status = $(this).data('status');
				const date_of_purchase = $(this).data('date_of_purchase');
				const time_of_purchase = $(this).data('time_of_purchase');
				// Set data to Form Edit
				$('#id').val(id);
				$('#code').val(code);
				$('#brand').val(brand);
				$('#jumlah_datas').val(jumlah_datas);
				$('#satuan_datas').val(satuan_datas);
				$('#status').val(status).trigger('change');
				$('#date_of_purchase').val(date_of_purchase);
				$('#time_of_purchase').val(time_of_purchase);
				// Call Modal Edit
				$('#pindahkanModal').modal('show');
			});
		});
	</script>
