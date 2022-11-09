<?php
  include('koneksi.php');

  $queryjumlah = mysqli_query($koneksi, "SELECT COUNT(judul) FROM arsip WHERE kategori LIKE 'Pengumuman'");
  $jumlah = mysqli_fetch_assoc($queryjumlah);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Arsip Surat </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <?php include('navbar.php'); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php
    include('sidebar.php');
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Arsip Surat</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><a href="index.php">Arsip Surat</a></li>
              <!-- <li class="breadcrumb-item active">Blank Page</li> -->
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.
            <p>Klik "Lihat" pada kolom aksi untuk menampilkan surat.</p>
          </h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">

        <!-- SidebarSearch Form -->
        <form class="form-group row" method="get" action="">
          <div class="col-sm-11">
            <input type="text" class="form-control" placeholder="Cari surat" name="cari">
          </div>
        </form>
        <div class"h4"">
          <h4>Jumlah Surat : <?php echo $jumlah["COUNT(judul)"]; ?></h4>
        </div>

          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th> Nomor Surat </th>
                <th> Kategori </th>
                <th> Judul </th>
                <th> Waktu Pengarsipan </th>
                <th> Aksi </th>
              </tr>
            </thead>
            <tbody>

            <?php 
                // tampilkan data arsip
                $query = mysqli_query($koneksi, "SELECT * FROM arsip");

                // $query = $pdo->prepare("select * from arsip where nomor_surat = :nomor_surat");
                // $query->execute(array('kategori') => $_POST['kategori']);

                if (isset($_GET['cari'])) {
                  $query = mysqli_query($koneksi, "SELECT * FROM arsip WHERE judul LIKE '%".
                    $_GET['cari']."%'");
                }

                while ($dt = mysqli_fetch_assoc($query)) {
                  ?>

                  <tr>
                    <td><?= $dt['nomor_surat']; ?></td>
                    <td><?= $dt['kategori']; ?></td>
                    <td><?= $dt['judul']; ?></td>
                    <td><?= $dt['waktu_pengarsipan']; ?></td>
                    <td>
                    <a href="hapus_data.php?nomor_surat=<?php echo $dt['nomor_surat'];?>" onclick="return confirm('Apakah Anda yakin ingin menghapus arsip surat ini?');" class="btn btn-danger"> Hapus </a>  
                    <a href="berkas/<?php echo $dt['file'];?> "download="<?php echo $dt['file'];?>" class="btn btn-warning"> Unduh </a>
                    <a href="lihat_data.php?nomor_surat=<?php echo $dt['nomor_surat'] ?>" class="btn btn-primary"> Lihat </a>
                    <a href="edit_data.php?nomor_surat=<?php echo $dt['nomor_surat']; ?>" class="btn btn-danger"> Edit / Ganti File </a>
                    </td>
                  </tr>
 
                <?php
                }
                ?>
              </tbody>
          </table>
          <br>
          <a href="tambah_data.php" class="btn btn-primary"> Arsipkan Surat </a>
        </div>
        <!-- /.card-body -->
        <!-- <div class="card-footer">
          Footer
        </div> -->
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0-rc
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
