<?php
include '../koneksi/koneksi.php';
$data = mysqli_query($koneksi, "SELECT * FROM tb_pembelian JOIN tb_user ON tb_pembelian.id_user=tb_user.id_user WHERE tb_pembelian.id_pembelian='$_GET[id]'");
$row = mysqli_fetch_assoc($data);
?>
<!-- <pre><?php //print_r($row); ?></pre>  -->
           <!-- Area Chart -->
           <div class="col-xl-12 col-lg-7">
             <div class="card shadow mb-4 mt-3">
           

               <!-- Card Body -->
               <div class="card-body">
                 <form method="post">
                  <h5 class="m-0 font-weight-bold text-success">Data Detail Pembelian</h5><hr>

                    <div class="form-row">
                      <div class="col-md-4" style="text-align: justify;">
                        <h4>Pembelian</h4><hr>
                        Tanggal: <?php echo $row['tanggal_pembelian']; ?><br>
                        Total: Rp. <?php echo number_format($row['total_pembelian']); ?><br>
                        Status: <?php echo $row['status_pembelian'] ?>

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
                            <td style="text-align: center;">Rp. <?php echo number_format($subproduk); ?>,- </td>
                          </tr>

                          <tr>
                            <td colspan="5">Pengiriman</td>
                            <td style="text-align: center;">Rp. <?php echo number_format($row['tarif']); ?></td>
                          </tr>

                        <tr>
                          <th colspan="5" >Total</th>
                          <th style="text-align: center;">Rp. <?php echo number_format($row['total_pembelian']); ?> </th>
                        </tr>
                      </tfoot>
                    </table>
                    
            
                   <hr>
                   
                 </form>

                 <p>&nbsp;</p>
               </div>

             </div>
           </div>