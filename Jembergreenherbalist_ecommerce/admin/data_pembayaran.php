<?php
//mendapatkan id_pembelian dari url
$id_pembelian = $_GET['id'];

include '../koneksi/koneksi.php';

$datastatus = mysqli_query($koneksi, "SELECT * FROM tb_pembelian WHERE id_pembelian=$id_pembelian");
$rowstatus = mysqli_fetch_array($datastatus);

// data pembayaran
$data = mysqli_query($koneksi, "SELECT * FROM tb_pembayaran WHERE id_pembelian='$id_pembelian'");
$row = mysqli_fetch_assoc($data);
?>
           <!-- Area Chart -->
           <div class="col-xl-12 col-lg-7">
             <div class="card shadow mb-4 mt-3">
           

               <!-- Card Body -->
               <div class="card-body">
                 <form method="post">
                  <h5 class="m-0 font-weight-bold text-success">Data Pembayaran</h5><hr>
               
               <!-- Card Body -->
               <div class="card-body">
                 <!-- Awal form row -->
                  <div class="form-row">
                      <!-- <?php// print_r($row) ?>  -->
                   <div class="form-group col-md-6">
                      <table class="table">
                        <tr>
                          <th>Nama</th>
                          <td><?php echo $row['nama']; ?></td>
                        </tr>

                        <tr>
                          <th>Bank</th>
                          <td><?php echo $row['bank']; ?></td>
                        </tr>

                        <tr>
                          <th>Jumlah</th>
                          <td>Rp. <?php echo number_format($row['jumlah']); ?>.-</td>
                        </tr>

                        <tr>
                          <th>Tanggal</th>
                          <td><?php echo $row['tgl_pembayaran']; ?></td>
                        </tr>

                        <tr>
                          <th>Status</th>
                          <td><b style="background-color: #FAEBD7;"><?php echo $rowstatus['status_pembelian']; ?></b></td>
                        </tr>

                      </table>
                   </div>


                   <div class="form-group col-md-6">
                      <img src="../gambar/foto_bukti_bayar/<?php echo $row['bukti_pembayaran'] ?>" height="250" width="auto" class="img-responsive">
                   </div>

                   </div> <!-- Akhir form row -->
                    
                    
                     <form method="post">
                      <!-- atur berdasarkan status -->
                      <?php if ($rowstatus['status_pembelian']=="Sudah Kirim Pembayaran"): ?>
                        <div class="form-group">
                           <label>No. Resi Pengiriman</label>   
                            <input type="text" name="resi" class="form-control">                      
                        </div>
                        <div class="form-group">
                          <select class="form-control" name="status">
                            <option value="">Pilih Status</option>
                            <option value="Lunas">Lunas</option>
                            <option value="Barang Dikirim">Barang Dikirim</option>
                          </select><hr>
                        </div>
                         <button class="btn btn-primary" name="proses">Proses</button>

                         <?php elseif ($rowstatus['status_pembelian']=="Barang Dikirim") : ?>
                          <div class="form-group">
                            <label>No. Resi Pengiriman</label>   
                            <input type="text" name="resi" class="form-control" readonly value="<?php echo $rowstatus['resi_pengiriman']; ?>">
                            </div>
                          <?php endif ?>

                        </form>

               </div>
                <!-- <pre><?php //print_r($row) ?></pre> -->
                <!-- <pre><?php// print_r($rowstatus) ?></pre> -->
             </div>
           </div>

        <!-- Aksi Edit -->
              <?php
              if (isset($_POST['proses'])) {
              $resi = $_POST['resi'];
              $status = $_POST['status'];

              $koneksi->query("UPDATE tb_pembelian SET resi_pengiriman='$resi', status_pembelian='$status' WHERE id_pembelian = '$id_pembelian'");
              echo "<script>alert('Data Pembelian Terupdate');</script>";
              echo "<script>location='index.php?halaman=data_pembelian'</script>";
              }
              ?>