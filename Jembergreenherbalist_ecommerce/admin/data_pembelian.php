           <!-- Area Chart -->
           <div class="col-xl-12 col-lg-7">
             <div class="card shadow mb-4 mt-3">
           

               <!-- Card Body -->
               <div class="card-body">
                 <form method="post">
                  <h5 class="m-0 font-weight-bold text-success">Data Pembelian</h5><hr>

                  <a href="print-pembelian.php" target="_blank" class="btn btn-success"><i class="fas fa-print"></i></a><br /><br />
                  
                    <div class="table-responsive">
                    <table class="table datatables table-striped table-hover table-bordered nowrap">
                      <thead>
                        <tr align="center">
                          <th>No</th>
                          <th>Nama Pelanggan</th>
                          <th>Tanggal</th>
                          <th>Status Pembelian</th>
                          <th>Total</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php 
                        include '../koneksi/koneksi.php';
                        $no = '1';
                        $data = mysqli_query($koneksi, "SELECT * FROM tb_pembelian JOIN tb_user ON tb_pembelian.id_user=tb_user.id_user");
                        while($row = mysqli_fetch_array($data)){ ?>

                          <tr align="center">
                          <td><?php echo $no++; ?></td>
                           <td><?php echo $row['nama_depan'] . ' '. $row['nama_belakang'];?></td>
                           <td><?php echo $row['tanggal_pembelian'] ?></td>
                           <td><?php echo $row['status_pembelian'] ?></td>
                           <td>Rp. <?php echo number_format($row['total_pembelian']); ?></td>
                           <td>
                              <a href="index.php?halaman=detail_pembelian&id=<?php echo $row['id_pembelian']; ?>" class="btn btn-primary"><i class="fas fa-info-circle"></i></a>

                             <?php if ($row['status_pembelian']!=="pending" AND $row['status_pembelian']!=="Pesanan Dibatalkan"): ?>
                             <a href="index.php?halaman=data_pembayaran&id=<?php echo $row['id_pembelian'] ?>" class="btn btn-info"><i class="fas fa-file-invoice-dollar"></i></a><br>

                              
                           

                             <?php endif ?>
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