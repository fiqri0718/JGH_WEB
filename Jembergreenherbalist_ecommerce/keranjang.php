  <?php
  session_start();
  include 'koneksi/koneksi.php';
  if (empty($_SESSION['keranjang'])) {
    echo "<script>alert('Silahkan tambahkan produk terlebih dahulu');
location.href=\"produk.php#team\"; 
   </script>";
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
        <div class="section-tittle">
          <h4><i class="fas fa-cart-plus"> Keranjang Belanja</i></h4><br>
        </div>



        <?php
        if (isset($_GET['pesan'])) {
          $pesan = $_GET['pesan'];
          if ($pesan == "gagal") {
        ?>
            <div class="alert alert-warning">
              <strong>Informasi!</strong> Mohon melakukan login terlebih dahulu
            </div>
          <?php
          } elseif ($pesan == "hapuskeranjangnya") {
          ?>
            <div class="alert alert-info">
              Produk Berhasil <strong>dihapus</strong>
            </div>
          <?php
          } elseif ($pesan == "tambahkeranjang") {
          ?>
            <div class="alert alert-primary">
              Produk Berhasil <strong>ditambahkan</strong>
            </div>
        <?php
          }
        }
        ?>
        <div class="row">
          <div class="col-lg-12 justify-content-center">
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr align="center">
                    <th>No</th>
                    <th>Aksi</th>
                    <th>Foto Produk</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Berat Isi Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                  $no = 1;
                  $subproduk = 0;
                  ?>
                  <?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) : ?>
                    <!-- menampilkan produk  -->

                    <?php
                    $ambil = mysqli_query($koneksi, "SELECT * FROM tb_produk INNER JOIN tb_kategori ON tb_produk.kategori = tb_kategori.id_kategori WHERE id_produk = '$id_produk'");
                    $pecah = $ambil->fetch_assoc();
                    $subotal = $pecah['harga_produk'] * $jumlah;

                    //subtotal semua produk

                    $subproduk += $subotal;
                    ?>

                    <tr align="center">
                      <td><?php echo $no++; ?></td>
                      <td><a href="hapuskeranjang.php?id=<?php echo $id_produk ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
                      <td><img src="foto_produk/<?php echo $pecah['foto_produk']; ?>" height='30px' width='30px'></td>
                      <td><?php echo $pecah['nama_produk']; ?></td>
                      <td><?php echo $pecah['nama']; ?></td>
                      <td><?php echo $pecah['beratisi_produk']; ?> Kg</td>
                      <td><?php echo $jumlah; ?></td>
                      <td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
                      <td>Rp. <?php echo number_format($subotal) ?></td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
                <tfoot>
                  <tr align="center">
                    <th colspan="8" style="text-align: left;">Total Harga Produk</th>
                    <th>Rp. <?php echo number_format($subproduk); ?>,- </th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <br>
            <br>
            <div class="mt-3">
              <a href="produk.php#team" class="btn-get-quote">Lanjutkan Belanja</a>
              <a href="checkout.php" class="btn-get-started scrollto">Checkout</a>
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