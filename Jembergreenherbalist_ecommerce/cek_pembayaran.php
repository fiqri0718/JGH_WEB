  <?php
  session_start();
  include 'koneksi/koneksi.php';
  $id_pembelian = $_GET['id'];

  $data = mysqli_query($koneksi, "SELECT * FROM tb_pembayaran LEFT JOIN tb_pembelian ON tb_pembayaran.id_pembelian=tb_pembelian.id_pembelian WHERE tb_pembelian.id_pembelian='$id_pembelian'");
  $row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Jember Green Herbalist</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->

  <link href="assets/img/tanpaNO.png" rel="icon" class="logo">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/2aca802f76.js" crossorigin="anonymous"></script>
  
  <!-- Template Main CSS File -->
  <link href="assets/css/style1.css" rel="stylesheet">

</head>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-between">

      <!-- logo -->
       <a href="index.php" class="logo"><img src="assets/img/g6760.png" alt="" class="img-fluid"></a>


      <nav class="nav-menu d-none d-lg-block">
        <ul>
        <li class="active"><a href="index.php">Beranda</a></li>
          <li><a href="#team">Katalog</a></li>
          <?php if (!isset($_SESSION['id_level'])): ?>
          <li><a href="login.php">Login</a></li>
          <li><a href="daftar.php">Daftar</a></li>

          <?php elseif ($_SESSION['id_level']=="2"): ?>
            <li class="drop-down"><a href="">@<?php echo $_SESSION['pelanggan']['username']; ?></a>
             <ul>
               <li><a class="dropdown-item" href="profil_user.php"> <i class="fas fa-user"></i>  Profile </a></li><hr class="sidebar-divider my-0">
              <li><a class="dropdown-item" href="riwayat.php"> <i class="fas fa-fw fa-folder"></i> Riwayat Belanja </a></li><hr class="sidebar-divider my-0">
              <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"> <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout  </a></li>
            </ul></li>

          <?php endif ?>
          <li><a href="keranjang.php"><i class="fa fa-shopping-cart"></i></a></li>
        </ul>
      </nav><!-- .nav-menu -->

      <!-- <a href="#about" class="get-started-btn scrollto">Get Started</a> -->

    </div>
  </header><!-- End Header -->

  <?php 
  //jika blm ada data pembayaran
  if (empty($row)) {
    echo "<script>alert('Belum ada data pembayaran')</script>";
    echo "<script>location.href=\"riwayat.php\"; </script>";
    exit();
  }

  //jika data user yg bayar tidak sesuai dngn yang login
  if ($_SESSION['pelanggan']['id_user']!==$row['id_user']) {
    echo "<script>alert('Anda Tidak Berhak Mengakses Halaman Ini !!')</script>";
    echo "<script>location.href=\"riwayat.php\"; </script>";
  }
  ?>

    <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="container">
      <div class="section-tittle">
        <h4><i class="fas fa-file-invoice-dollar"> Data Pembayaran Anda</i></h4><br>
      </div>

      <div class="row">
      
          <div class="col-md-6">
          <table class="table">
             <tr>
             <td>Nama</td>
             <td><?php echo $row['nama']; ?></td>
           </tr>

           <tr>
             <td>Bank</td>
             <td><?php echo $row['bank']; ?></td>
           </tr>

           <tr>
             <td>Tanggal</td>
             <td><?php echo $row['tgl_pembayaran']; ?></td>
           </tr>

           <tr>
             <td>Jumlah</td>
             <td>Rp. <?php echo number_format($row['jumlah']); ?></td>
           </tr>
          </table>
   
         <br>
         <br>
          <div class="mt-3">
             <a href="riwayat.php" class="btn-get-quote" onclick="window.history.go(-1)" >Kembali</a>
          </div>
        </div>

          <div class="col-md-6">
            <img src="gambar/foto_bukti_bayar/<?php echo $row['bukti_pembayaran']; ?>" width="300" class="img-responsive">

          </div>

    </div>

  </section><!-- End Hero -->
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anda Yakin Keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" jika anda yakin untuk keluar.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout_user.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>