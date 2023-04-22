           <!-- Area Chart -->
           <div class="col-xl-12 col-lg-7">
             <div class="card shadow mb-4 mt-3">
              <!-- Card Header Dropdown -->
               <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                 <h6 class="m-0 font-weight-bold text-primary">Tambah Data Admin</h6>
                 <div class="dropdown no-arrow">
                   <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                   </a>
                 </div>
               </div>

               <!-- Card Body -->
               <div class="card-body">
                 <form method="post" enctype="multipart/form-data">
                  <!-- Awal form row -->
                  <div class="form-row">
                   <div class="form-group col-md-4">
                    <label>Email</label>
                     <input type="email" class="form-control" name="email" required>
                   </div>

                   <div class="form-group col-md-4">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" required>
                   </div>

                    <div class="form-group col-md-4">
                      <label>Password</label>
                     <input type="password" class="form-control form-control-user" name="password" aria-describedby="passwordHelp" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,32}" title="Demi keamanan diharapkan mengandung huruf Kapital dan Angka dengan minimal 8 Karakter" required>
                   </div>
                   </div> <!-- Akhir form row -->

                   <div class="form-row"><!-- Awal Form Row -->
                   <div class="form-group col-md-4">
                    <label>Nama Depan</label>
                     <input type="text" class="form-control" name="nama_depan" required>
                   </div>

                    <div class="form-group col-md-4">
                      <label>Nama Belakang</label>
                     <input type="text" class="form-control" name="nama_belakang" required>
                   </div>

                   <div class="form-group col-md-4">
                     <label>Info Kontak</label>
                     <input type="number" class="form-control" name="info_kontak" required>
                   
                   </div>
                   </div>  <!-- Ahir Form Row -->

                   <div class="form-row"><!-- Awal Form Row -->
                   <div class="form-group col-md-4">
                     <label>Foto</label><br>
                    <input type="file" name="foto_admin" class="form-control form-control-user">
                  
                   </div>

                   
                   <div class="form-group col-md-8">
                     <label>Alamat</label>
                     <textarea class="form-control" name="alamat" required></textarea>
                   </div>
                   </div>  <!-- Ahir Form Row -->



                   <button type="submit" class="btn btn-success" name="save"><i class="fas fa-save"></i> Simpan</button>
                   <hr>
                   
                 </form>
                 <p>&nbsp;</p>
               </div>

             </div>
           </div>

<?php
if (isset($_POST['save'])) {
  $tanggal = date("Y-m-d H:i:s");
  $nama = $_FILES['foto_admin']['name'];
  $lokasi = $_FILES['foto_admin']['tmp_name'];
  $namafiks = date("YmdHis").$nama;
  move_uploaded_file($lokasi, 'gambar/profil_admin/'.$namafiks);
  $koneksi -> query("INSERT INTO tb_admin (email, username, password, nama_depan, nama_belakang, alamat, info_kontak, foto_admin, tgl_buat, id_level)VALUES('$_POST[email]','$_POST[username]','$_POST[password]','$_POST[nama_depan]','$_POST[nama_belakang]','$_POST[alamat]','$_POST[info_kontak]','$namafiks','$tanggal','1')");
  echo "<script><div class='alert alert-info'>Data Tersimpan</div></script>";
echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=data_admin'>";
}
?>