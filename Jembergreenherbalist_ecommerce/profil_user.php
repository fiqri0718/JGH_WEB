<?php
include 'koneksi/koneksi.php';
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$data = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_user='$_GET[id]'");
$row = mysqli_fetch_assoc($data);
?>
           <!-- Area Chart -->
           <div class="col-xl-12 col-lg-7">
             <div class="card shadow mb-4 mt-3">
           

               <!-- Card Body -->
               <div class="card-body">
                 <form method="post">
                  <h5 class="m-0 font-weight-bold text-success">Ubah Data User</h5><hr>
               
               <!-- Card Body -->
               <div class="card-body">
                 <form method="post" enctype="multipart/form-data">
                  <!-- Awal form row -->
                  <div class="form-row">
                   <div class="form-group col-md-5">
                    <center><label style="background-color: #FFFFFF; ">Foto User</label></center><br>
                    <center><img src="gambar/foto_user/<?php echo $row['foto_user'];?>" width="63%"></center><br><br>
                    <center><input type="file" class="form-control" name="foto_user" size="18"></center>
                   </div>


                   <div class="form-group col-md-7">
                     <table class="table">
                    <tr>
                      <td>Email</td>
                      <td><input type="email" class="form-control form-control-user" name="email" value="<?php echo $row['email'];?>" required></td>
                    </tr>

                    <tr>
                      <td>Username</td>
                      <td><input type="text" class="form-control form-control-user" name="username" value="<?php echo $row['username'];?>" required></td>
                    </tr>

                    <tr>
                      <td>Nama Depan</td>
                      <td><input type="text" class="form-control form-control-user" name="nama_depan" value="<?php echo $row['nama_depan'];?>" required></td>
                    </tr>

                     <tr>
                      <td>Nama Belakang</td>
                      <td><input type="text" class="form-control form-control-user" name="nama_belakang" value="<?php echo $row['nama_belakang'];?>" required></td>
                    </tr>

                    <tr>
                      <td>Info Kontak</td>
                      <td><input type="number" class="form-control form-control-user" name="info_kontak" value="<?php echo $row['info_kontak'];?>" required></td>

                   <tr>
                      <td>Alamat</td>
                      <td> <textarea class="form-control" name="alamat" required><?php echo $row['alamat'];?></textarea></td>

                    </tr>

                 
                  </table>

                   </div>
                   </div> <!-- Akhir form row -->
                   <hr>
                    <a  href="produk.php" class="btn btn-success"> <span class="glyphicon glyphicon-plus" aria-hidden="true"> <i class="fas fa-hand-point-left"></i></span></a> 
                     <button type="submit" class="btn btn-success" name="ubah"><i class="fas fa-save"></i> Simpan Perubahan</button>

                 </form>

                 <p>&nbsp;</p>
               </div>

             </div>
           </div>

        <!-- Aksi Edit -->
              <?php
              if (isset($_POST['ubah'])) {
                $namafoto = $_FILES['foto_user']['name'];
                $lokasifoto = $_FILES['foto_user']['tmp_name'];
                $namafiks = date('YmdHis').$namafoto;
                $tanggal = date("Y-m-d H:i:s");

                if (!empty($lokasifoto)) {
                  move_uploaded_file($lokasifoto, "gambar/foto_user/$namafiks");

                   $koneksi -> query("UPDATE tb_user SET email='$_POST[email]',username='$_POST[username]',password='$_POST[password]',nama_depan='$_POST[nama_depan]',nama_belakang='$_POST[nama_belakang]',alamat='$_POST[alamat]',info_kontak='$_POST[info_kontak]',foto_user='$namafiks',tgl_buat='$tanggal',id_level='2' WHERE id_user='$_GET[id]'");


                } else{
                   $koneksi -> query("UPDATE tb_user SET email='$_POST[email]',username='$_POST[username]',password='$_POST[password]',nama_depan='$_POST[nama_depan]',nama_belakang='$_POST[nama_belakang]',alamat='$_POST[alamat]',info_kontak='$_POST[info_kontak]',tgl_buat='$tanggal',id_level='2' WHERE id_user='$_GET[id]'");


                } 
                echo "<script>alert('Data telah diubah');</script>";
                echo "<script>location='profil_user.php';</script>";
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

    <link href="assets/img/tanpaNO.png" rel="icon" class="logo">
     <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Custom fonts for this template-->
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link  href="admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">

    <link href="DataTables/datatables.min.css" rel="stylesheet" type="text/css">
              </head>
              <body>

                  <!-- Bootstrap core JavaScript-->
    <script src="admin/vendor/jquery/jquery.min.js"></script>
    <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="admin/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="admin/js/demo/chart-area-demo.js"></script>
    <script src="admin/js/demo/chart-pie-demo.js"></script>


    <script type="text/javascript" src="DataTables/datatables.min.js"> </script>
  <script>
    $(document).ready(function(){
      $('.datatables').DataTable();
    })
  </script>
                
              </body>
              </html>