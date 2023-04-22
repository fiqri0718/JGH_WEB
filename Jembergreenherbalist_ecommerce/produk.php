<?php
session_start();
include 'koneksi/koneksi.php'; 
if (!empty($_SESSION)) {
$id_user = $_SESSION['pelanggan']['id_user'];
$ambil_data = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_user='$id_user'");
$baris_data = mysqli_fetch_array($ambil_data);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Jember Green Herbalist </title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->

  <link href="assets/img/tanpaNO.png" rel="icon" class="logo">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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

          <li><a href="keranjang.php"><i class="fa fa-shopping-cart"></i> <span class="label label-success cart_count"></span></a></li>
        </ul>
      </nav><!-- .nav-menu -->

      <!-- <a href="#about" class="get-started-btn scrollto">Get Started</a> -->

    </div>
  </header><!-- End Header -->

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

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
       <div class="row">
        <div class="col-lg-6 pt-2 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
           <?php
          if (isset($_GET['pesan'])) {
            $pesan = $_GET['pesan'];
            if ($pesan == "berhasil"){
              ?>
              <div class="alert alert-success">
                <strong>Success!</strong> Hai. <b><?php echo ($_SESSION['pelanggan']['nama_depan']. ' ' . $_SESSION['pelanggan']['nama_belakang']); ?></b>, anda berhasil login. <br>
                Lengkapi data diri anda <b><a href="profil_user.php?id=<?php echo $baris_data['id_user']; ?>">disini</a></b>
              </div>
              <?php
            } elseif ($pesan == 'terimakasih') {
              echo '<div class="alert alert-info">
                <strong>Terimakasih!</strong> Data anda berhasil tersimpan.
              </div>';
            }
            elseif ($pesan == 'tambahprodukdulu') {
              echo '<div class="alert alert-info">
                <strong>Keranjang Kosong.</strong> Silahkan pilih produk terlebih dahulu
              </div>';
            }

            // logout admin/superadmin
            elseif ($pesan == 'logout') {
              echo '<div class="alert alert-info">
                <strong>Terimakasih.</strong> Anda sudah logout
              </div>';
            }
          }
          ?>



           <!-- <pre><?php //print_r($_SESSION) ?></pre>  -->
          <h1><span>Jember</span> Green Herbalist</h1>
          <p>Temukan berbagai ekstrak jamu tradisional yang memiliki banyak manfaat untuk kesehatan kita semua </br>
        </p>
          <div class="mt-3">
            <a href="#team" class="btn-get-started scrollto">Belanja Sekarang</a>
            <a href="daftar.php" class="btn-get-quote">Belum Punya Akun?</a>
          </div>      <!--   <pre><?php //print_r($_SESSION) ?></pre>    -->
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img">
          <img src="assets/img/g93049.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= Catalog Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Katalog</h2>
          <p></p>
        </div>

             <div class="item">
             <div class="row">     
              <?php
              include 'koneksi/koneksi.php';
              $data = mysqli_query($koneksi, "SELECT * FROM tb_produk");
              while($row = mysqli_fetch_array($data)){ ?>

             
               <div class="card mr-4" style="width: 16rem;">

               <div class="card-body bg-white"> 
                  <div class="card-image"> 
                     <?php if ($row['stok']==0): ?>
                     <div class="alert alert-warning" style="text-align: center;">Produk ini habis</div>
                      <?php endif ?>
                     <a href="detail_produk555.php?id=<?php echo $row['id_produk'];?>">
                        <center><img src="foto_produk/<?php echo $row['foto_produk'];?>" class="responsive-img"  width="150"></center>
                     </a>
                  </div> 
              </div>
              <hr>
              

                  <div class="card-action center">

                    
                  <p><center><strong><?php echo $row['nama_produk'];?></strong><br>
                      <?php echo "Rp.";?><?php echo $row['harga_produk'];?>
                      </center></p>
                  
                     <form action="" method="get">
                      <center> 
                        <!-- kondisi tombol beli jika stok habis  -->
                          <?php if ($row['stok']!=0): ?> 
                            <a href="keranjang_aksi.php?id=<?php echo $row['id_produk']; ?>" class="btn btn-primary">Beli</a>
                          <?php endif ?>
                        
                        
                          
                        <a class="btn btn-info" href="detail_produk555.php?id=<?php echo $row['id_produk'];?>">Detail Produk</a>
                        </a>  
                        </center>

                     </form>
                  </div>
               </div>
             
             <?php } ?>
         </div>
      </div>

      </div>

 <!-- Modal Detail Produk-->
<div class="modal fade" tabindex="-1" id="Modal-detail" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Produk</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <?php
        include 'koneksi/koneksi.php';
        $data = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE id_produk");   
        while($row = mysqli_fetch_array($data)){ ?>
        <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-4">
            <img src="foto_produk/<?php echo $row['foto_produk'];?>" width="100" height="200">
            </div>

              <div class="form-group col-md-8">
                <table class="table">
                   <tr>
                      <td>Nama Produk</td>
                      <td><?php echo $row['nama_produk'];?></td>
                    </tr>

                    <tr>
                      <td>Kategori</td>
                      <td><?php echo $row['kategori'];?></td>
                    </tr>

                    <tr>
                      <td>Stok</td>
                      <td><?php echo $row['stok'];?></td>
                    </tr>

                    <tr>
                      <td>Berat atau Isi Produk</td>
                      <td><?php echo $row['beratisi_produk'];?></td>
                    </tr>

                    <tr>
                      <td>Harga Produk</td>
                      <td>Rp.<?php echo number_format($row['harga_produk']) ?>,-</td>
                    </tr>
                    
                </table>
              
              </div>
       
          </div>

          <!-- produk section -->
          <form class="form-inline" id="productForm">
            <div class="form-group">
              <div class="input-group col-sm-5">
                          
                <span class="input-group-btn">
                  <button type="button" id="minus" class="btn btn-default btn-flat btn-lg"><i class="fa fa-minus"></i></button>
                </span>
                <input type="text" name="quantity" id="quantity" class="form-control input-lg" value="1">    
                <span class="input-group-btn">
                  <button type="button" id="add" class="btn btn-default btn-flat btn-lg"><i class="fa fa-plus"></i></button>
                 </span>
                <input type="hidden" value="#" name="id">
              </div>
             <button type="submit" class="btn btn-primary btn-lg btn-flat"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
            </div>
          </form>

          <form action="#" method="POST" enctype="multipart/form-data">
              <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
              </div>
          </form>    
        </div>  
        <?php } ?>
    </div>
  </div>
</div>

   
    </section>


<footer id="footer">   <!-- footer -->
    <div class="container d-md-flex py-4">

      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          &copy; Copyright <strong><span>JGH</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          Designed by JGH
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="https://web.facebook.com/jember.g.herbalist?_rdc=1&_rdr" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="https://www.instagram.com/greenherbalist.jember/?hl=id" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="https://t.me/s/JbrGH?before=137" class="telegram"><i class="bx bxl-telegram"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


  <!-- Whatsapp -->
  <script type="text/javascript">
    (function () {
    var options = {
    whatsapp: "+6282132468686", // WhatsApp number
    greeting_message : "PERMISI",

    call_to_action: "Message Us", // Call to action
    position: "left", // Position may be 'right' or 'left'
    order : "whatsapp, telegram"
            };
    var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
          var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
          s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
          var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
           })();
   </script>
   <!-- /WhatsHelp.io widget -->

  

</body>

</html>