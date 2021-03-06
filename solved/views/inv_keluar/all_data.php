	<!-- =========================== CONTENT =========================== -->

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Inv Keluar
				<small>Semua Item Data</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url("inventory") ?>"><i class="fa fa-archive"></i> Inv Keluar</a></li>
				<li class="active">Semua Data</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">

			<!-- Default box -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Inv Keluar &ensp;
						<a class="btn btn-sm btn-default btn-print" role="button">
							<i class="fa fa-print"></i> Print</a>
					</h3>

					<div class="box-tools pull-right">
						<!-- <button class="btn btn-default btn-box-tool" title="Show / Hide" id="myboxwidget"><i class="fa fa-plus"></i> Show / Hide</button> -->
						<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					</div>
				</div>
				<div class="box-body">
					<?php if ($this->session->userdata('message')) {
						echo $this->session->userdata('message');
						$this->session->unset_userdata('message');
					} ?>

					<div class="table-responsive">
						<table class="table table-hover table-bordered table-striped">
							<thead>
								<tr>
									<th width="180">Id/Kode</th>
									<th width="200">Tanggal Keluar</th>
									<th width="200">Jam Keluar</th>
									<th width="150">Pengambil</th>
									<th width="200">Nama Produk</th>
									<th width="150">Masuk</th>
									<th width="150">Keluar</th>
									<th width="150">Sisa</th>
									<th width="150">Satuan</th>
									<th>#</th>
								</tr>
							</thead>
							<tbody>
								<?php if (count($data_list->result()) > 0) : ?>
									<?php foreach ($data_list->result() as $data) : ?>
										<tr>
											<td><?php echo $data->id; ?><br><?php echo $data->code; ?></td>
											<td><?php echo $data->date_of_sale; ?></td>
											<td><?php echo $data->time_of_sale; ?></td>
											<td><?php echo $data->agent; ?></td>
											<td><?php echo $data->brand; ?></td>
											<td><?= $data->jumlah_awal; ?></td>
											<td><?= $data->jumlah_datas; ?></td>
											<td><?= $data->jumlah_datas; ?></td>
											<td><?= $data->satuan_datas ?></td>
											<td width="15%" align="center">
												<form action="<?php echo base_url('inv_keluar/delete/' . $data->code) ?>" method="post" autocomplete="off">
													<div class="btn-group-vertical">
														<a class="btn btn-sm btn-default" href="<?php echo base_url('inv_keluar/detail/' . $data->id) ?>" role="button"><i class="fa fa-eye"></i> Detail</a>
														<a class="btn btn-sm btn-primary" href="<?php echo base_url('inv_keluar/edit/' . $data->id) ?>" role="button"><i class="fa fa-pencil"></i> Edit</a>
														<input type="hidden" name="id" value="<?php echo $data->id; ?>">
														<!-- <button type="submit" class="btn btn-sm btn-danger" role="button" onclick="return confirm('Delete this data?')"><i class="fa fa-trash"></i> Hapus</button> -->
													</div>
												</form>
											</td>
										</tr>
									<?php endforeach ?>
								<?php else : ?>
									<tr>
										<td class="text-center" colspan="9">Data Tidak Ditemukan!</td>
									</tr>
								<?php endif ?>
							</tbody>
						</table>
					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer text-center">
					<?php echo $pagination; ?>
					<?php echo (isset($last_query)) ? $last_query : ""; ?>&nbsp;
					<!-- Footer -->
				</div>
				<!-- /.box-footer-->
			</div>
			<!-- /.box -->

		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

	<!-- =========================== / CONTENT =========================== -->

	<!-- Print box -->
	<div class="modal fade" id="printModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="box-header with-border">
					<h3 class="box-title">Print Data</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-white btn-box-tool" data-dismiss="modal" id="myboxwidget"><i class="fa fa-close"></i></button>
					</div>
				</div>
				<div class="box-body">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<form id="input_form" action="<?php echo base_url('inv_keluar/print/') ?>" method="post" autocomplete="off" class="form form-horizontal" enctype="multipart/form-data">
							<div class="form-group">
								<label for="tanggal_cetak" class="control-label col-md-3">Tanggal</label>
								<div class="col-md-9">
									<div class="input-group">
										<input type="text" name="tanggal_cetak" id="tanggal_cetak" class="form-control datepicker" maxlength="10" value="<?= date('Y-m-d'); ?>" required="required">
										<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="tanggal_cetak" class="control-label col-md-3">Submit</label>
								<div class="col-md-9">
									<div class="input-group">
										<input type="submit" class="btn btn-primary" value="ok">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="<?= base_url('assets/plugins/modal/jquery-3.4.1.min.js') ?>"></script>
	<script>
		$(document).ready(function() {
			// get Edit Product
			$('.btn-print').on('click', function() {
				// Call Modal Edit
				$('#printModal').modal('show');
			});
		});
	</script>