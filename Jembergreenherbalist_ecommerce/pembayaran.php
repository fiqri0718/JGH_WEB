 <?php
  session_start();
  // cek apakah user sudah login.
  include 'koneksi/koneksi.php';

  if ($_SESSION['id_level'] == "") {
    echo "<script type='text/javascript'>alert('Silahkan <b>Login<b> terlebih dahulu'); </script>";
    header('location:keranjang.php?pesan=gagal');
  }

  //mendapatkan id_pembelian dari url
  $id_pbl = $_GET['id'];
  $data = mysqli_query($koneksi, "SELECT * FROM tb_pembelian WHERE id_pembelian = '$id_pbl'");
  $det_pbl = mysqli_fetch_assoc($data);

  //mendapatkan id_user yg beli
  $id_user_beli = $det_pbl['id_user'];

  //mendapatkan id_user yang login
  $id_user_login = $_SESSION['pelanggan']['id_user'];

  if ($id_user_beli !== $id_user_login) {
    echo "<script>alert('Anda tidak berhak mengakses halaman ini');</script>";
    echo "<script>location.href=\"riwayat.php\";</script>";
  }
  ?>

 <!DOCTYPE html>
 <html>

 <head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">

   <title>Jember Green Herbalist </title>
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
           <?php if (!isset($_SESSION['id_level'])) : ?>
             <li><a href="login.php">Login</a></li>
             <li><a href="daftar.php">Daftar</a></li>

           <?php elseif ($_SESSION['id_level'] == "2") : ?>
             <li class="drop-down"><a href="">@<?php echo $_SESSION['pelanggan']['username']; ?></a>
               <ul>
                 <li><a class="dropdown-item" href="profil_user.php"> <i class="fas fa-user"></i> Profile </a></li>
                 <hr class="sidebar-divider my-0">
                 <li><a class="dropdown-item" href="riwayat.php"> <i class="fas fa-fw fa-folder"></i> Riwayat Belanja </a></li>
                 <hr class="sidebar-divider my-0">
                 <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"> <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout </a></li>
               </ul>
             </li>

           <?php endif ?>
           <li><a href="keranjang.php"><i class="fa fa-shopping-cart"></i></a></li>
         </ul>
       </nav><!-- .nav-menu -->

     </div>
   </header><!-- End Header -->

   <!-- ======= Hero Section ======= -->
   <section id="hero">
     <div class="container">


       <!-- Area Chart -->
       <div class="col-xl-12 col-lg-7">
         <div class="card shadow mb-4 mt-3">

           <!-- Card Body -->
           <div class="card-body">

             <h5 class="m-0 font-weight-bold text-success">Konfirmasi Pembayaran</h5><br>
             <p>Kirim bukti pembayaran disini</p>
             <div class="alert alert-info">Total Tagihan anda <strong>Rp. <?php echo number_format($det_pbl['total_pembelian']); ?>,-</strong><br>
               Nb. Apabila sudah melakukan pembayaran, pesanan tidak dapat dibatalkan</div>

             <form method="post" enctype="multipart/form-data">
               <div class="form-group">
                 <label>Nama Pengirim</label>
                 <input type="text" name="nama" class="form-control" required>
               </div>
               <div class="form-group">
                 <label>Bank</label>
                 <input type="text" name="bank" class="form-control" required>
               </div>
               <div class="form-group">
                 <label>Jumlah</label>
                 <input type="number" name="jumlah" class="form-control" min="<?php $det_pbl['total_pembelian']; ?>" required>
               </div>
               <div class="form-group">
                 <label>Foto Bukti Pembayaran</label>
                 <input type="File" name="bukti_pembayaran" required>
               </div>

               <button class="btn btn-primary" name="kirim">Kirim</button>
             </form>

             <?php
              if (isset($_POST['kirim'])) {

                //upload foto bukti
                $namabukti = $_FILES['bukti_pembayaran']['name'];
                $lokasibukti = $_FILES['bukti_pembayaran']['tmp_name'];
                $namafiks = date("YmdHis") . $namabukti;
                move_uploaded_file($lokasibukti, 'gambar/foto_bukti_bayar/' . $namafiks);

                $nama = $_POST['nama'];
                $bank = $_POST['bank'];
                $jumlah = $_POST['jumlah'];
                $tanggal = date('Y-m-d');

                if ($jumlah !== $det_pbl['total_pembelian']) {
                  echo "<script>alert('Transfer berdasarkan dengan jumlah total pembelian');</script>";
                  return false;
                }
                //simpan pembayaran
                $koneksi->query("INSERT INTO tb_pembayaran(id_pembelian, nama, bank, jumlah, tgl_pembayaran, bukti_pembayaran)
                  VALUES ('$id_pbl','$nama','$bank','$jumlah','$tanggal','$namafiks')");

                //update data pembelian (status) pending -> sudah kirm pembayaran

                $koneksi->query("UPDATE tb_pembelian SET status_pembelian='Sudah Kirim Pembayaran' WHERE id_pembelian='$id_pbl'");

                echo "<script>location.href=\"riwayat.php?pesan=berhasilbayar\";</script>";
              }
              ?>

             <p>&nbsp;</p>
           </div>

         </div>
       </div>
     </div>


   </section><!-- End Hero -->


   <!-- Logout Modal-->
   <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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