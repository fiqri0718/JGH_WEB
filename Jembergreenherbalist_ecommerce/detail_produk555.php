  <?php
  session_start();

  $id_produk = $_GET['id'];
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

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-between">

      <!-- logo -->
       <a href="index.php" class="logo"><img src="assets/img/g6760.png" alt="" class="img-fluid"></a>

<!--       <h1 class="logo"><a href="index.php">fgdfgfyrtuAPK</a></h1> -->

      

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
    </div>
  </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="container">
      <div class="section-tittle">
      <?php
      include 'koneksi/koneksi.php';
      $data = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE id_produk='$_GET[id]'");
      $row = mysqli_fetch_assoc($data);
      ?>
           <!-- Area Chart -->
           <div class="col-xl-12 col-lg-7 ">
             <div class="card shadow mb-4 mt-3">
           

               <!-- Card Body -->
               <div class="card-body">
                 <form method="post">
                  <h5 class="m-0 font-weight-bold text-success">Data Detail Produk</h5><hr>

                  <a  href="index.php#team" class="btn btn-light"> <span class="glyphicon glyphicon-plus" aria-hidden="true"> <i class="fas fa-hand-point-left"></i></span></a> <br /><br />

                 
                                 <!-- Card Body -->
               <div class="card-body">
                 <form method="post">
                  <!-- Awal form row -->
                  <div class="form-row">
                   <div class="form-group col-md-5">
                    <center><label style="background-color: #FFFFFF ; ">Foto Produk</label></center><br>
                    <center><img src="foto_produk/<?php echo $row['foto_produk'];?>" width="63%"></center><br><br>
                   
                   </div>


                   <div class="form-group col-md-7">
                     <table class="table">
                    <tr>
                      <?php if ($row['stok']==0): ?>
                          <div class="alert alert-warning"> Stok Habis</div>
                        <?php endif ?>
                      <td colspan="2"><h4><b><?php echo $row['nama_produk'];?></b></h4></td>
                    </tr>

                    <tr>
                      <td colspan="2" style="text-align: justify;"><p><?php echo $row['info_produk'];?></p></td>

                    </tr>

                    <tr>
                      <td>Stok</td>
                      <td><?php echo $row['stok'];?></td>
                    </tr>

                    <tr>
                      <td>Berat Isi Produk</td>
                      <td><?php echo $row['beratisi_produk'];?> Kg</td>
                    </tr>

                     <tr>
                      <td>Harga Produk</td>
                      <td><?php echo $row['harga_produk'];?></td>
                    </tr>
                  
                  <?php if ($row['stok']!=0): ?>
                   
                    <tr>
                      <td>Jumlah Pembelian</td>
                        <td><input class="form-control form-control-sm" type="number" name="jumlah" value="1" min="1" max="<?php echo $row['stok']; ?>"></td> 
                        
                    </tr>
                    <tr>
                      <td colspan="" style="text-align: right;">
                     
                      <button class="btn btn-primary" name="beli"> <i class="fa fa-shopping-cart"></i> Tambah Keranjang</button>
                    </td>
                    </tr>

                    <?php endif ?>
                  </table>

                   </div>
                   </div> <!-- Akhir form row -->


                   <div class="form-row"><!-- Awal Form Row -->
                    <div class="form-group col-md-12">
                    <table class="table">
                      <h3>Informasi Tambahan</h3>
                      <tr>
                        <td>Nutrisi</td>
                      </tr>
                      <tr>
                        <td><i class="fas fa-plus"></i> <?php echo $row['nutrisi_manfaat'];?></td>
                      </tr>

                      <tr>
                        <td>Manfaat</td>
                      </tr>
                      <tr>
                        <td><i class="fas fa-plus"></i> <?php echo $row['cara_penyimpanan'];?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                   </div><!-- Ahir Form Row -->
                  
                   
                 </form>


                 <?php
                 //jika ada tombol beli
                 if (isset($_POST['beli'])) 
                 {
                   //mendaptkan jumlah yg diinpurkna
                   $jumlah = $_POST['jumlah'];

                  //masukkan di keranjang belanja
                   $_SESSION['keranjang'][$id_produk] = $jumlah;
                  echo "<script>location='keranjang.php?pesan=tambahkeranjang';</script>";
                 }

                 ?>

               </div>

             </div>
           </div>
      </div>


  </section><!-- End Hero -->
</body>
</html>