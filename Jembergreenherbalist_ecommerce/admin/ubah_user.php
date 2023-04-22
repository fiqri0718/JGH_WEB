<?php
include '../koneksi/koneksi.php';
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
                    <center><img src="../gambar/foto_user/<?php echo $row['foto_user'];?>" width="63%"></center><br><br>
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
                    <a  href="index.php?halaman=data_user" class="btn btn-success"> <span class="glyphicon glyphicon-plus" aria-hidden="true"> <i class="fas fa-hand-point-left"></i></span></a> 
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
                  move_uploaded_file($lokasifoto, "../gambar/foto_user/$namafiks");

                   $koneksi -> query("UPDATE tb_user SET email='$_POST[email]',username='$_POST[username]',password='$_POST[password]',nama_depan='$_POST[nama_depan]',nama_belakang='$_POST[nama_belakang]',alamat='$_POST[alamat]',info_kontak='$_POST[info_kontak]',foto_user='$namafiks',tgl_buat='$tanggal',id_level='2' WHERE id_user='$_GET[id]'");


                } else{
                   $koneksi -> query("UPDATE tb_user SET email='$_POST[email]',username='$_POST[username]',password='$_POST[password]',nama_depan='$_POST[nama_depan]',nama_belakang='$_POST[nama_belakang]',alamat='$_POST[alamat]',info_kontak='$_POST[info_kontak]',tgl_buat='$tanggal',id_level='2' WHERE id_user='$_GET[id]'");


                } 
                echo "<script>alert('Data telah diubah');</script>";
                echo "<script>location='index.php?halaman=data_user';</script>";
              }
              ?>