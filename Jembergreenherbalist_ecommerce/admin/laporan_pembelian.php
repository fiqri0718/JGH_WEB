<?php 
include '../koneksi/koneksi.php';
$semuadata=array();
$tgl_mulai='-';
$tgl_selesai='-';
// $status= "";
if (isset($_POST['kirim'])) 
{
  $tgl_mulai = $_POST['tglm'];
  $tgl_selesai = $_POST['tgls'];
  // $status = $_POST['status'];
  $data = mysqli_query($koneksi, "SELECT * FROM tb_pembelian LEFT JOIN tb_user ON tb_pembelian.id_user=tb_user.id_user WHERE tanggal_pembelian BETWEEN '$tgl_mulai' AND '$tgl_selesai'");
  while ($row = mysqli_fetch_assoc($data)) 
  {
    $semuadata[] =$row;
  }
}
?>
           <!-- Area Chart -->
           <div class="col-xl-12 col-lg-7">
             <div class="card shadow mb-4 mt-3">
           

               <!-- Card Body -->
               <div class="card-body">
                 <form method="post">
                  <h5 class="m-0 font-weight-bold text-success">Laporan Pembelian (<?php echo $tgl_mulai ?> - <?php echo $tgl_selesai ?>)</h5><hr>
                  <!-- <pre><?php //print_r($semuadata); ?></pre> -->

                  <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                          <label>Tanggal Mulai</label>
                          <input type="date" name="tglm" class="form-control" value="<?php echo $tgl_mulai ?>">
                        </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Tanggal Selesai</label>
                        <input type="date" name="tgls" class="form-control" value="<?php echo $tgl_selesai ?>">
                      </div>
                    </div>

                    <!-- <div class="col-md-3">
                      <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                          <option>Pilih Status</option>
                          <option value="Belum Dibayar">Belum Dibayar</option>
                          <option value="Sudah Mengirim Pembayaran">Sudah Mengirim Pembayaran</option>
                          <option value="Dibatalkan">Dibatalkan</option>
                          <option value="Barang Sudah Sampai">Barang Sudah Sampai</option>
                          <option value="Barang Dikirim">Barang Dikirim</option>
                          <option value="LUNAS">LUNAS</option>
                        </select> 
                      </div>
                    </div> -->

                    <div class="col-md-2">
                      <label>&nbsp;</label><br>
                      <button class="btn btn-success" name="kirim">Lihat</button>
                      </div>
                  </div>
                                      
                 </form>

                 <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered nowrap">
                      <thead>
                        <tr align="center">
                          <th>No</th>
                          <th>Nama Pelanggan</th>
                          <th>Tanggal</th>
                          <th>Jumlah</th>
                          <th>Status</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php 
                        $total=0;
                        ?>
                        <?php
                        include '../koneksi/koneksi.php';
                        foreach ($semuadata as $key => $value) : ?>
                          <?php $total+=$value['total_pembelian']; ?>
                          <tr align="center">
                            <td><?php echo $key+1; ?></td>
                            <td><?php echo $value['nama_depan'] . ' ' . $value['nama_belakang']; ?></td>
                            <td><?php echo $value['tanggal_pembelian']; ?></td>
                            <td>Rp. <?php echo number_format($value['total_pembelian']); ?></td>
                            <td><?php echo $value['status_pembelian']; ?></td>
                          </tr>
                        <?php endforeach ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th colspan="3" >Total</th>
                          <th style="text-align: center;">Rp. <?php echo number_format($total) ?> </th>
                          <th></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>

               </div>

             </div>
           </div>