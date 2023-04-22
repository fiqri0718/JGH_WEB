<?php
include '../koneksi/koneksi.php';
$data = mysqli_query($koneksi, "SELECT * FROM tb_produk INNER JOIN tb_kategori ON tb_produk.kategori = tb_kategori.id_kategori WHERE id_produk='$_GET[id]'");
$row = mysqli_fetch_assoc($data);
?>
           <!-- Area Chart -->
           <div class="col-xl-12 col-lg-7">
             <div class="card shadow mb-4 mt-3">
              <!-- Card Header Dropdown -->
               <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                 <h6 class="m-0 font-weight-bold text-success">Ubah Data Produk</h6>
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
                   <div class="form-group col-md-6">
                    <label>Nama Produk</label>
                     <input type="text" class="form-control form-control-user" name="nama_produk" value="<?php echo $row['nama_produk'];?>" required>
                   </div>


                   <div class="form-group col-md-3">
                    <label>Kategori</label>
                    <select class="form-control" name="kategori">
                       <option value="<?php echo $row['id_kategori']; ?>"><?php echo $row['nama']; ?></option>
                       <?php
                        $ambil = mysqli_query($koneksi, "SELECT * FROM tb_kategori");
                        while($ketKategori = mysqli_fetch_assoc($ambil)){
                        ?>
                        <option value="<?php echo $ketKategori['id_kategori'] ?>">
                          <?php echo $ketKategori['nama']?> 
                        </option>
                      <?php } ?>
                  </select>
                   </div>
                   

                    <div class="form-group col-md-3">
                      <label>Stok</label>
                     <input type="number" class="form-control form-control-user" name="stok" value="<?php echo $row['stok'];?>" required>
                   </div>
                   </div> <!-- Akhir form row -->


                   <div class="form-row"><!-- Awal Form Row -->
                   <div class="form-group col-md-6">
                    <label>Berat atau Isi Produk</label>
                     <input type="text" class="form-control form-control-user" name="beratisi_produk" value="<?php echo $row['beratisi_produk'];?>" required>
                   </div>

                    <div class="form-group col-md-6">
                      <label>Harga Produk</label>
                     <input type="number" class="form-control form-control-user" name="harga_produk" value="<?php echo $row['harga_produk'];?>" required>
                   </div>
                   </div>  <!-- Ahir Form Row -->

                   <div class="form-row"><!-- Awal Form Row -->
                   <div class="form-group col-md-6">
                    <label>Foto Produk</label><br>
                    <img src="../foto_produk/<?php echo $row['foto_produk'];?>" width="63%"><br><br>
                     <input type="file" class="form-control " name="foto_produk" size="32">
                   </div>

                   <div class="form-group col-md-6">
                    <label>Informasi Produk</label>
                     <textarea class="form-control" name="info_produk" required><?php echo $row['info_produk'];?></textarea>

                     <br>
                     <label>Nutrisi</label>
                     <textarea class="form-control" name="nutrisi_manfaat" required><?php echo $row['nutrisi_manfaat'];?></textarea>

                     <br>
                     <label>Manfaat</label>
                     <textarea class="form-control" name="cara_penyimpanan" required><?php echo $row['cara_penyimpanan'];?></textarea>

                   </div>
                   </div><!-- Ahir Form Row -->


                   <button type="submit" class="btn btn-success" name="ubah">Simpan Perubahan</button>
                  
                   <hr>
                   
                 </form>

                 <p>&nbsp;</p>
               </div>

             </div>
           </div>

             <!-- Aksi Edit -->
              <?php
              if (isset($_POST['ubah'])) {
                $namafoto = $_FILES['foto_produk']['name'];
                $lokasifoto = $_FILES['foto_produk']['tmp_name'];

                if (!empty($lokasifoto)) {
                  move_uploaded_file($lokasifoto, "../foto_produk/$namafoto");

                   $koneksi -> query("UPDATE tb_produk SET nama_produk='$_POST[nama_produk]',kategori='$_POST[kategori]',stok='$_POST[stok]',beratisi_produk='$_POST[beratisi_produk]',harga_produk='$_POST[harga_produk]',foto_produk='$namafoto',info_produk='$_POST[info_produk]',nutrisi_manfaat='$_POST[nutrisi_manfaat]',cara_penyimpanan='$_POST[cara_penyimpanan]' WHERE id_produk='$_GET[id]'");


                } else{
                   $koneksi -> query("UPDATE tb_produk SET nama_produk='$_POST[nama_produk]',kategori='$_POST[kategori]',stok='$_POST[stok]',beratisi_produk='$_POST[beratisi_produk]',harga_produk='$_POST[harga_produk]',info_produk='$_POST[info_produk]',nutrisi_manfaat='$_POST[nutrisi_manfaat]',cara_penyimpanan='$_POST[cara_penyimpanan]' WHERE id_produk='$_GET[id]'");

                } 
                echo "<script>alert('Data telah diubah');</script>";
                echo "<script>location='index.php?halaman=data_produk';</script>";
              }
              ?>