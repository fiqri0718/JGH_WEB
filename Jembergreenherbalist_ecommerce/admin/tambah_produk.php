           <!-- Area Chart -->
           <div class="col-xl-12 col-lg-7">
             <div class="card shadow mb-4 mt-3">
              <!-- Card Header Dropdown -->
               <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                 <h6 class="m-0 font-weight-bold text-success">Tambah Data Produk</h6>
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
                     <input type="text" class="form-control form-control-user" name="nama_produk" required>
                   </div>

                   <div class="form-group col-md-3">
                    <label>Kategori</label>
                      <select class="form-control" name="kategori">
                        <option value="">Pilih Kategori Produk</option>
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
                     <input type="number" class="form-control form-control-user" name="stok" required>
                   </div>
                   </div> <!-- Akhir form row -->

                   <div class="form-row"><!-- Awal Form Row -->
                   <div class="form-group col-md-4">
                    <label>Berat atau Isi Produk</label>
                     <input type="text" class="form-control form-control-user" name="beratisi_produk" placeholder="Satuan (Kg)" required>
                   </div>

                    <div class="form-group col-md-4">
                      <label>Harga Produk</label>
                     <input type="number" class="form-control form-control-user" name="harga_produk" required>
                   </div>

                    <div class="form-group col-md-4">
                    <label>Foto Produk</label>
                     <input type="file" class="form-control form-control-user" name="foto_produk" placeholder="Foto Produk" required>
                   </div>
                   </div>  <!-- Ahir Form Row -->

                   <div class="form-row"><!-- Awal Form Row -->
                   <div class="form-group col-md-4">
                    <label>Informasi Produk</label>
                     <textarea class="form-control" name="info_produk" required></textarea>
                   </div>

                   <div class="form-group col-md-4">
                    <label>Nutrisi</label>
                     <textarea class="form-control" name="nutrisi_manfaat" required></textarea>
                   </div>

                   <div class="form-group col-md-4">
                    <label>Manfaat</label>
                     <textarea class="form-control" name="cara_penyimpanan" required></textarea>
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
  $nama = $_FILES['foto_produk']['name'];
  $lokasi = $_FILES['foto_produk']['tmp_name'];
  $namafiks = date("YmdHis").$nama;
  move_uploaded_file($lokasi, "../foto_produk/".$namafiks);
  $koneksi -> query("INSERT INTO tb_produk (nama_produk,kategori,stok,beratisi_produk,harga_produk,foto_produk,info_produk,nutrisi_manfaat,cara_penyimpanan)VALUES('$_POST[nama_produk]','$_POST[kategori]','$_POST[stok]','$_POST[beratisi_produk]','$_POST[harga_produk]','$namafiks','$_POST[info_produk]','$_POST[nutrisi_manfaat]','$_POST[cara_penyimpanan]')");
  echo "<script><div class='alert alert-info'>Data Tersimpan</div></script>";
echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=data_produk'>";

}
?>