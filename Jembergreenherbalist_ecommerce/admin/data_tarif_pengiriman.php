<?php
$data = mysqli_query($koneksi, "SELECT * FROM tb_ongkir");
$row = mysqli_fetch_array($data); 
?>
           <!-- Area Chart -->
           <div class="col-xl-12 col-lg-7">
             <div class="card shadow mb-4 mt-3">
           

               <!-- Card Body -->
               <div class="card-body">
                 <form method="post" action="">
                  <h5 class="m-0 font-weight-bold text-success">Data Tarif Pengiriman</h5> <hr>
                  <div class="row">
                    <div class="form-group col-md-3">
                        <input type="text" name="nama_kota" class="form-control" placeholder="Masukkan Nama Kota" required>
                    </div>
                    <div class="form-group col-md-3">
                        <input type="text" name="tarif" class="form-control" placeholder="Masukkan Tarif" required>
                    </div>
                    <div class="form">
                      <button type="submit" name="tambah" class="btn btn-success pull-right"><i class="fas fa-plus-circle"></i> Tambah Data</button>
                    </div>
                  </div>
                  
                </form>
                
                  <br />
                  <form method="post" action="">
                  <div class="table-responsive">
                    <table class="table datatables table-striped table-hover table-bordered nowrap">
                      <thead>
                        <tr align="center">
                          <th>No</th>
                          <th>Kota / Kabupaten</th>
                          <th>Tarif</th>
                          <th>Tanggal Input</th>
                          <th>Opsi</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php 
                        include '../koneksi/koneksi.php';
                        $no = '1';
                        $data = mysqli_query($koneksi, "SELECT * FROM tb_ongkir");
                        while($row = mysqli_fetch_array($data)){ ?>

                          <tr align="center">
                            <td><?php echo $no++; ?></td>
                             <td><?php echo $row['nama_kota']; ?></td>
                             <td>Rp. <?php echo number_format($row['tarif']); ?></td>
                             <td><?php echo $row['tgl_input']; ?></td>
                             <td>
                              <a href="index.php?halaman=hapus_tarif&id=<?php echo $row['id_ongkir']; ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                           </td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                   
                 </form>
               </div>

             </div>
           </div>
<?php
if (isset($_POST['tambah'])) {
  
$nama_kota = $_POST['nama_kota'];
$tarif = $_POST['tarif'];
$tanggal = date("Y-m-d H:i:s");

    mysqli_query($koneksi, "INSERT INTO tb_ongkir VALUES('', '$nama_kota','$tarif','$tanggal')");

  echo "<script>alert(Data Tersimpan);</script>";
echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=data_tarif_pengiriman'>";
}

?>