 <?php
  session_start();
   // cek apakah user sudah login.
 include '../koneksi/koneksi.php';
  if($_SESSION['id_level']==""){
    echo "<script>alert('Silahkan login terlebih dahulu!'); location='../index.php';</script>";
  }
  ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Jember Green Herbalist</title>

     <!-- Favicons -->

    <link href="../assets/img/tanpaNO.png" rel="icon" class="logo">
     <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link  href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <link href="../DataTables/datatables.min.css" rel="stylesheet" type="text/css">
        

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include "./sidebar.php"?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include "./topnavbar.php"?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                     <?php 
                   if (isset($_GET['halaman']))
                   {
                    if ($_GET['halaman']=="index_utama.php")
                    {
                      include 'index_utama.php';
                    }
                    elseif ($_GET['halaman']=="data_profil") {
                      include 'data_profil.php';
                    }
                    elseif ($_GET['halaman']=="data_produk") {
                      include 'data_produk.php';
                    }
                    elseif ($_GET['halaman']=="tambah_produk") {
                      include 'tambah_produk.php';
                    }
                    elseif ($_GET['halaman']=="detail_produk_admin"){
                      include 'detail_produk_admin.php';
                    }
                    elseif ($_GET['halaman']=="hapus_produk"){
                      include 'hapus_produk.php';
                    }
                    elseif ($_GET['halaman']=="logout") {
                      include 'logout.php';
                    }
                    elseif ($_GET['halaman']=="edit_produk") {
                      include 'edit_produk.php';
                    }
                     elseif ($_GET['halaman']=="update_profil_admin") {
                      include 'update_profil_admin.php';
                    }
                    elseif ($_GET['halaman']=="setting") {
                      include 'setting.php';
                    }
                     elseif ($_GET['halaman']=="data_user") {
                      include 'data_user.php';
                    }
                    elseif ($_GET['halaman']=="tambah_user") {
                      include 'tambah_user.php';
                    }
                    elseif ($_GET['halaman']=="hapus_user") {
                      include 'hapus_user.php';
                    }
                    elseif ($_GET['halaman']=="ubah_user") {
                      include 'ubah_user.php';
                    }
                    elseif ($_GET['halaman']=="data_pembelian") {
                      include 'data_pembelian.php';
                    }
                     elseif ($_GET['halaman']=="detail_pembelian") {
                      include 'detail_pembelian.php';
                    }
                    elseif ($_GET['halaman']=="data_pembayaran") {
                      include 'data_pembayaran.php';
                    }
                    elseif ($_GET['halaman']=="laporan_pembelian") {
                      include 'laporan_pembelian.php';
                    }
                    elseif ($_GET['halaman']=="rekening") {
                      include 'rekening.php';
                    }
                    elseif ($_GET['halaman']=="trans_bulanan") {
                      include 'trans_bulanan.php';
                    }
                    elseif ($_GET['halaman']=="data_tarif_pengiriman") {
                      include 'data_tarif_pengiriman.php';
                    }
                    elseif ($_GET['halaman']=="tambah_kategori") {
                      include 'tambah_kategori.php';
                    }
                    elseif ($_GET['halaman']=="tambah_admin") {
                      include 'tambah_admin.php';
                    }
                    elseif ($_GET['halaman']=="data_admin") {
                      include 'data_admin.php';
                    }
                    elseif ($_GET['halaman']=="ubah_admin") {
                      include 'ubah_admin.php';
                    }
                    elseif ($_GET['halaman']=="hapus_admin") {
                      include 'hapus_admin.php';
                    }
                    elseif ($_GET['halaman']=="hapus_kategori") {
                      include 'hapus_kategori.php';
                    }
                    elseif ($_GET['halaman']=="hapus_tarif") {
                      include 'hapus_tarif.php';
                    }

                  }
                    
                    else{
                    include 'index_utama.php';
                   }
                    ?>

                </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Jember Green Herbalist</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

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
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>


    <script type="text/javascript" src="../DataTables/datatables.min.js"> </script>
  <script>
    $(document).ready(function(){
      $('.datatables').DataTable();
    })
  </script>
 

</body>

</html>