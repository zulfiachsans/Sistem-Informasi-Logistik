<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>STOK BARANG</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/templates/adminlte-2-3-11/bootstrap/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/templates/adminlte-2-3-11/dist/css/AdminLTE.min.css'); ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets/templates/adminlte-2-3-11/dist/css/skins/_all-skins.min.css'); ?>">
  <link rel="shortcut icon" href="img/umm.png">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <!-- Main content -->
  <section class="content">
    <center>
      <p class="h3 mb-0">Lembaga Penanggulangan Bencana Desa Deyangan
        <br><span class="h3">Laporan Stok Barang</span>
    </center>
    <center>
      <div class="table-responsive">
        <table border="2" class="table table-sm table-hover table-bordered table-striped">
          <thead valign="middle">
            <tr>
              <th>No</th>
              <th>Tanggal Masuk</th>
              <th>Jam Masuk</th>
              <th>Dari</th>
              <th>Nama Produk</th>
              <th>Total</th>
              <th>Sisa</th>
              <th>Satuan</th>
              <th>Keterangan</th>
            </tr>
          </thead>
          <tbody valign="middle">
            <?php if (count($data_list->result()) > 0) : ?> <?php $i=1; ?>
              <?php foreach ($data_list->result() as $data) : ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $data->date_of_purchase; ?></td>
                  <td><?php echo $data->time_of_purchase; ?></td>
                  <td><?php echo $data->agent; ?></td>
                  <td><?php echo $data->brand; ?></td>
                  <td><?= $data->jumlah_awal; ?></td>
                  <td><?= $data->jumlah_datas; ?></td>
                  <td><?= $data->satuan_datas ?></td>
                  <td><?php echo $data->description; $i++; ?></td>
                </tr>
              <?php endforeach ?>
            <?php else : ?>
              <tr>
                <td class="text-center" colspan="7">Data Tidak Ditemukan!</td>
              </tr>
            <?php endif ?>
          </tbody>
        </table>
      </div>
    </center>

</body>
<script type="text/javascript">
  window.print();
</script>

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url('assets/templates/adminlte-2-3-11/plugins/jQuery/jquery-2.2.3.min.js'); ?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url('assets/templates/adminlte-2-3-11/bootstrap/js/bootstrap.min.js'); ?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/templates/adminlte-2-3-11/plugins/slimScroll/jquery.slimscroll.min.js'); ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/templates/adminlte-2-3-11/plugins/fastclick/fastclick.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/templates/adminlte-2-3-11/dist/js/app.min.js'); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/templates/adminlte-2-3-11/dist/js/demo.js'); ?>"></script>
</body>

</html>