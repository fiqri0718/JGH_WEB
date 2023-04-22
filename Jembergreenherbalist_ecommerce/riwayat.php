 <?php
  session_start();
   // cek apakah user sudah login.
include 'koneksi/koneksi.php';

  if($_SESSION['id_level']==""){
    echo "<script type='text/javascript'>alert('Silahkan <b>Login<b> terlebih dahulu'); </script>";
			header('location:keranjang.php?pesan=gagal');

  }
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
  <link href="DataTables/datatables.min.css" rel="stylesheet" type="text/css">

</head>
<body>
  
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-between">

      <!-- logo -->
       <a href="index.php" class="logo"><img src="assets/img/g6760.png" alt="" class="img-fluid"></a>


      <nav class="nav-menu d-none d-lg-block">
        <ul>
        <li class="active"><a href="index.html">Beranda</a></li>
          <li><a href="produk.php">Katalog</a></li>
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

    </div>
  </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="container">

 <!-- <pre><?php //print_r($row); ?></pre>  -->
           <!-- Area Chart -->
            <?php
            if (isset($_GET['pesan'])) {
              $pesan = $_GET['pesan'];
              //pembayaran
            if ($pesan == "berhasilbayar"){
              ?>
              <div class="alert alert-success">
                <strong>Success!</strong> Hai. <b><?php echo ($_SESSION['pelanggan']['nama_depan']. ' ' . $_SESSION['pelanggan']['nama_belakang']); ?></b>. <br>Terimakasih telah mengirimkan bukti pembayaran.
               </div>
              <?php

              //barang diterima
            }elseif ($pesan == 'barangditerima') {
              echo '<div class="alert alert-info">
                <strong>Terimakasih!</strong> Pesanan telah selesai. 
              </div>';
            }

            //dibatalkan
            elseif ($pesan == 'dibatalkan') {
              echo '<div class="alert alert-danger">
                <strong>Pesanan Dibatalkan!</strong>
              </div>';
            }
          }
            ?>
           <div class="col-xl-12 col-lg-7">
             <div class="card shadow mb-4 mt-3">
           
              <!-- <pre><?php // print_r($_SESSION)?></pre> -->
               <!-- Card Body -->
               <div class="card-body">
                 <!-- <form method="post"> -->
                  <h5 class="m-0 font-weight-bold text-success">Riwayat Pembelian</h5><br>
                  An. <?php echo $_SESSION['pelanggan']['nama_depan'] . ' ' . $_SESSION['pelanggan']['nama_belakang']; ?>
                  <hr>

                  <div class="table-responsive">
                  <table class="table datatables table-striped table-hover table-bordered nowrap">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php
                      // mendapatkan id_user yg login dari session
                      $no = 1;
                      $id_user = $_SESSION['pelanggan']['id_user'];
                      $data = mysqli_query($koneksi, "SELECT * FROM tb_pembelian WHERE id_user = '$id_user'");
                        while($row = mysqli_fetch_array($data)){ 
                      ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['tanggal_pembelian']; ?></td>
                        <td>
                          <?php echo $row['status_pembelian']; ?>
                          <br>  
                          <?php if (!empty($row['resi_pengiriman'])): ?>  Resi: <?php echo $row['resi_pengiriman']; ?>                          
                          <?php endif ?>
                        </td>
                        <td>Rp. <?php echo number_format($row['total_pembelian']); ?>,-</td>


                        <td>
                          <a href="nota.php?id=<?php echo $row['id_pembelian']; ?>" class="btn btn-info">Nota</a>

                          <?php if ($row['status_pembelian']=="pending"): ?>
                            <a href="pembayaran.php?id=<?php echo $row['id_pembelian']; ?>" class="btn btn-success">Pembayaran</a>
                            <a href="batalkan2.php?id=<?php echo $row['id_pembelian']; ?>" class="btn btn-danger">Batalkan</a><br>

                            <!-- jika pesanan dibatalkan -->
                            <?php elseif ($row['status_pembelian']=="Pesanan Dibatalkan") : ?>
                            <i> <label style="background-color: #FAEBD7;">Pesanan Dibatalkan</label></i>
                             <!-- jika pesanan dikirim -->
                             <?php elseif ($row['status_pembelian']=="Barang Dikirim") : ?>
                              <a href="cek_pembayaran.php?id=<?php echo $row['id_pembelian']; ?>" class="btn btn-warning text-white">
                                Lihat Pembayaran</a> <hr>
                             <a href="barang_diterima.php?id=<?php echo $row['id_pembelian']; ?>" class="btn btn-primary">Barang Diterima</a>  
                               

                            <?php else: ?>
                              <a href="cek_pembayaran.php?id=<?php echo $row['id_pembelian']; ?>" class="btn btn-warning text-white">
                                Lihat Pembayaran 
                              </a>
                          <?php endif ?>
                          
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
                 <!-- </form> -->

                 <p>&nbsp;</p>
               </div>

             </div>
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

    <script type="text/javascript" src="DataTables/datatables.min.js"> </script>
  <script>
    $(document).ready(function(){
      $('.datatables').DataTable();
    })
  </script>
 
</body>
</html>