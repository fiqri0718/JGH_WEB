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

    <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="container">
<?php
$data = mysqli_query($koneksi, "SELECT * FROM tb_pembelian JOIN tb_user ON tb_pembelian.id_user=tb_user.id_user WHERE tb_pembelian.id_pembelian='$_GET[id]'");
$row = mysqli_fetch_assoc($data);
?>

<!--  <pre><?php //print_r($row); ?></pre>
 <pre><?php //print_r($_SESSION) ?></pre> -->
  
  <!-- Keamanan, jika org yang beli tidak sama dengan orag yang login maka, orang tersebut tidak berhak melihat data2 nya  -->
  <!-- Artian, pelanggan yg beli harus samadengan yang login -->
  <?php
  //ngambil id user yang beli
  $iduserbeli = $row['id_user'];

  //mengambil id user yang login
  $iduserlogin = $_SESSION['pelanggan']['id_user'];

  if ($iduserbeli !== $iduserlogin) {
    echo "<script>alert('Anda tidak berhak mengakses halaman ini');</script>";
    echo "<script>location.href=\"riwayat.php\";</script>";
  }

  ?>

           <!-- Area Chart -->
           <div class="col-xl-12 col-lg-7">
             <div class="card shadow mb-4 mt-3">
           

               <!-- Card Body -->
               <div class="card-body">
                 <form method="post">
                  <h5 class="m-0 font-weight-bold text-success">Nota Pembelian</h5><hr>
                  	<div class="form-row">
                  		<div class="col-md-4" style="text-align: justify;">
                  		  <h4>Pembelian</h4><hr>
                  		  <strong>No. Pembelian: <?php echo $row['id_pembelian']; ?></strong><br>
                  		  Tanggal: <?php echo $row['tanggal_pembelian']; ?><br>
                  		  Total: <label style="background-color: #FAEBD7;">Rp. <?php echo number_format($row['total_pembelian']); ?>,-</label>

                 		</div>

                 		<div class="col-md-4" style="text-align: justify;">
                  		  <h4>Pelanggan</h4><hr>
                  		  <b>An. <?php echo $row['nama_depan'] . ' ' . $row['nama_belakang'] ; ?></b> <br>
                  		  <p>
                  		  	<?php echo $row['info_kontak']; ?><br>
                  		  	<?php echo $row['email']; ?><br>
                  		  </p>
                 		</div>

                 		<div class="col-md-4">
                  		  <h4>Pengiriman</h4><hr>
                  		  <strong><?php echo $row['nama_kota']; ?></strong><br>
                  		  Ongkos Kirim: Rp. <?php echo number_format($row['tarif']); ?><br>
                  		  Alamat: <?php echo $row['alamat_pengiriman']; ?>
                 		</div>
                  	</div>

                  	<!-- tabel rincia -->
                    <div class="table-responsive">
                                          <!-- tabel rincia -->
                    <table class="table table-bordered">
                      <thead>
                        <tr align="center">
                          <th>No</th>
                          <th>Nama Produk</th>
                          <th>Berat Isi Produk</th>
                          <th>Harga</th>
                          <th>Jumlah</th>
                          <th>Subtotal</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        $subproduk = 0;
                        $ambil_data = mysqli_query($koneksi, "SELECT * FROM tb_pembelian_produk JOIN tb_produk ON tb_pembelian_produk.id_produk=tb_produk.id_produk
                        WHERE tb_pembelian_produk.id_pembelian='$_GET[id]' ");
                        while($row_data = mysqli_fetch_array($ambil_data)){ ?>

                        <?php $subtotal = $row_data['harga_produk']*$row_data['jumlah']; ?>

                        
                        <!-- buat sub total produk -->
                        <?php $subproduk += $subtotal; ?>
                        <!-- coding diatas menambhkan tiap2 subtotal produk -->

                        <tr align="center">
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $row_data['nama_produk']; ?></td>
                          <td><?php echo $row_data['beratisi_produk']; ?> kg</td>
                          <td>Rp. <?php echo number_format( $row_data['harga_produk']); ?>,-</td>
                          <td><?php echo $row_data['jumlah']; ?></td>
                          <td> 
                            Rp. <?php echo number_format($subtotal);?>
                          </td>
                        </tr>
                      <?php } ?>
                      </tbody>
                        <tfoot>
                          <tr>
                            <td colspan="5">Subtotal Produk</td>
                            <td align="center">Rp. <?php echo number_format($subproduk); ?>,- </td>
                          </tr>

                          <tr>
                            <td colspan="5">Pengiriman</td>
                            <td align="center">Rp. <?php echo number_format($row['tarif']); ?></td>
                          </tr>

                        <tr align="center">
                          <th colspan="5" style="text-align: left;">Total</th>
                          <th>Rp. <?php echo number_format($row['total_pembelian']); ?> </th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>

                    <!-- rekening bank -->
                    <?php 
                    $data = mysqli_query($koneksi, "SELECT * FROM tb_bank");
                    $rw_bank = mysqli_fetch_array($data);
                    ?>
                  	<div class="row">
                  		<div class="col-md-7">
                  			<div class="alert alert-info">
                  			<p>
                  				Silahkan melakukan pembayaran senilai <b> Rp.<?php echo number_format($row['total_pembelian']) ?>,- </b> ke <br>
                          <!-- menampilkan data berdasarkan data rekening di halaman super admin -->
                  				<strong>BANK <?php echo $rw_bank['nama_bank']; ?> </strong> (<?php echo $rw_bank['no_rek']; ?>)<br>
                           Atas Nama <strong><?php echo $rw_bank['an_bank']; ?></strong><br><hr>
                          
                  			</p>
                  			</div>
                  		</div>

                      <div class="col-md-5">
                        <div class="form" style="text-align: justify;">
                        <p style="text-align: right;">
                         
                           <a href="pembayaran.php?id=<?php echo $row['id_pembelian']; ?>" class="btn btn-info">Bayar Sekarang</a>
                        </p>
                        </div>
                      </div>

                  	</div>
                  	
    				
                   <hr>
                   
                 </form>

                 <p>&nbsp;</p>
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
</body>
</html>