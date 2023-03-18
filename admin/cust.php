<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin2 </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/typicons/typicons.css">
  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css">
</head>
<?php
session_start();
$nama_petugas = $_SESSION['nama_petugas'];
$level = $_SESSION['level'];


?>

<body>
  <div class="container-scroller">

    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="index.html">
            <h1><b>BP</b></h1>
          </a>
          <a class="navbar-brand brand-logo-mini" href="index.html">
            <img src="images/logo-mini.svg" alt="logo" />
          </a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top">
        <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text">Good Morning, <span class="text-black fw-bold"><?php echo $_SESSION['nama_petugas']; ?></span></h1>
            <h3 class="welcome-sub-text">have a great day!! </h3>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">

          <li class="nav-item d-none d-lg-block">
            <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
              <span class="input-group-addon input-group-prepend border-right">
                <span class="icon-calendar input-group-text calendar-icon"></span>
              </span>
              <input type="text" class="form-control">
            </div>
          </li>
          <li class="nav-item">
            <form class="search-form" action="#">
              <i class="icon-search"></i>
              <input type="search" class="form-control" placeholder="Search Here" title="Search here">
            </form>
          </li>


          <li class="nav-item dropdown d-none d-lg-block user-dropdown">
            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <img class="img-xs rounded-circle" src="images/f.jpg" alt="Profile image"> </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
                <img class="img-md rounded-circle" src="images/f.jpg" alt="Profile image">
                <p class="mb-1 mt-3 font-weight-semibold"><?php echo $_SESSION['nama_petugas']; ?></p>
                
              </div>
              <a href="logout.php" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme">
            <div class="img-ss rounded-circle bg-light border me-3"></div>Light
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border me-3"></div>Dark
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>

      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="mdi mdi-airplay menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="cust.php">
              <i class="menu-icon mdi mdi-account-tie"></i>
              <span class="menu-title">Manajemen Customer</span>
            </a>
          </li>




        </ul>
      </nav>

      <?php
      $host = "localhost";
      $user = "root";
      $pass = "";
      $db   = "tiket_konser";

      $koneksi = mysqli_connect($host, $user, $pass, $db);
      if (!$koneksi) {
        die("Gagal Koneksi");
      }
      $nama           = "";
      $tanggal_lahir  = "";
      $jenis_tiket    = "";
      $harga_tiket    = "";
      $jumlah_tiket   = "";
      $total_harga    = "";
      $sukses         = "";
      $error          = "";



      ?>
      <div class="content-wrapper">
        <h3>Manajemen Data Customer</h3>
        <a href="cust-baru.php" class="btn btn-warning btn-sm"><span class="menu-icon mdi mdi-account-plus">Tambah Data</a>
        <hr>
        <table id="example" class="table table-striped" style="width:100%">
          <thead>
            <tr>

              <th scope="col">Nama</th>
              <th scope="col">Tanggal Lahir</th>
              <th scope="col">jenis Tiket</th>
              <th scope="col">Harga Tiket</th>
              <th scope="col">Jumlah Tiket</th>
              <th scope="col">Total Harga</th>
              <th scope="col">Jumlah Tiket</th>
              <th scope="col">Total Harga</th>

            </tr>
          </thead>
          <tbody>
            <?php

            $sql2   = "select * from tiket order by id desc";
            $q2     = mysqli_query($koneksi, $sql2);
            $urut   = 1;
            while ($data = mysqli_fetch_array($q2)) {
              $id             = $data['id'];
              $nama           = $data['nama'];
              $tanggal_lahir  = $data['tanggal_lahir'];
              $jenis_tiket    = $data['jenis_tiket'];
              $harga_tiket    = $data['harga_tiket'];
              $jumlah_tiket   = $data['jumlah_tiket'];
              $total_harga    = $data['total_harga'];

            ?>
              <tr>

                <td scope="row"><?php echo $nama ?></td>
                <td scope="row"><?php echo $tanggal_lahir ?></td>
                <td scope="row"><?php echo $jenis_tiket ?></td>
                <td scope="row"><?php echo $harga_tiket ?></td>
                <td scope="row"><?php echo $jumlah_tiket ?></td>
                <td scope="row"><?php echo $total_harga ?></td>
                <td>
                  <a href="edit-petugas.php?id=<?= $data['id_petugas'] ?>" class='btn btn-info btn-sm'> <i class="menu-icon mdi mdi-account-edit"> </i>EDIT</a>
                </td>
                <td>
                  <a onClick="return confirm('Apakah anda yakin ingin menghapus data ini ?')" href="hapus-cust.php?id=<?= $data['id'] ?>" class='btn btn-warning btn-sm'><i class="menu-icon mdi mdi-trash-can"></i>HAPUS</a>
                </td>
              </tr>
            <?php

            }
            ?>
          </tbody>
          <tfoot>
            <tr class="fw-bold">
              <th scope="col">Nama</th>
              <th scope="col">Tanggal Lahir</th>
              <th scope="col">jenis Tiket</th>
              <th scope="col">Harga Tiket</th>
              <th scope="col">Jumlah Tiket</th>
              <th scope="col">Total Harga</th>
              <td>Edit</td>
              <td>Hapus</td>
            </tr>
          </tfoot>
        </table>
      </div>

</body>

</html>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<footer class="footer">
  <div class="d-sm-flex justify-content-center justify-content-sm-between">

    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2023. Ai Wawat Nurjanah-Aplikasi SPP</span>
  </div>
</footer>
<!-- plugins:js -->
<script src="vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="vendors/chart.js/Chart.min.js"></script>
<script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="vendors/progressbar.js/progressbar.min.js"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="js/off-canvas.js"></script>
<script src="js/hoverable-collapse.js"></script>
<script src="js/template.js"></script>
<script src="js/settings.js"></script>
<script src="js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="js/jquery.cookie.js" type="text/javascript"></script>
<script src="js/dashboard.js"></script>
<script src="js/Chart.roundedBarCharts.js"></script>
<!-- End custom js for this page-->

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>
<script>
  $(document).ready(function() {
    $('#example').DataTable();
  });
</script>
</body>

</html>