           <!-- Area Chart -->
           <div class="col-xl-12 col-lg-7">
             <div class="card shadow mb-4 mt-3">


               <!-- Card Body -->
               <div class="card-body">
                 <form method="post">
                   <h5 class="m-0 font-weight-bold text-success">Data Produk</h5>
                   <hr>

                   <a href="index.php?halaman=tambah_produk" class="btn btn-success pull-right"><i class="fas fa-plus-circle"></i> Tambah Data</a> <a href="print-produk.php" target="_blank" class="btn btn-success "><i class="fas fa-print"></i></a><br /><br />

                   <?php
                    $periksa = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE stok <= 3 ");
                    while ($s = mysqli_fetch_array($periksa)) {
                      if ($s['stok'] <= 3) {
                    ?>
                       <script>
                         $(document).ready(function() {
                           $('#pesan_sedia').css("color", "red");
                           $('#pesan_sedia').append("<span class='glyphicon glyphicon-asterisk'></span>");
                         });
                       </script>
                   <?php
                        echo "<div style='padding:5px' class='alert alert-warning'><span class='glyphicon glyphicon-info-sign'></span> Stok <a style='color:red'>" . $s['nama_produk'] . "</a> yang tersisa kurang dari 3. Silahkan cek dan tambah stok lagi </div>";
                      }
                    }
                    ?>

                   <!-- berhasil nambah belim bisa digunakan, karena "pesan" bertabrakan dengan "halaman"-->
                   <!-- <?php
                        // if (isset($_GET['pesan'])) {
                        // $pesan = $_GET['pesan'];

                        // if ($pesan == "tambahberhasil"){
                        // 
                        ?>
                      <div class="alert alert-success">
                        <strong>Success!</strong> Berhasil menambahkan produk baru.
                       </div>
                      <?php


                      // }
                      // }
                      // 
                      ?> -->

                   <div class="table-responsive">
                     <table class="table datatables table-striped table-hover table-bordered nowrap">
                       <thead>
                         <tr>
                           <th>No</th>
                           <th>Nama Produk</th>
                           <th>Kategori Produk</th>
                           <th>Stok</th>
                           <th>Berat Produk</th>
                           <th>Harga Produk</th>
                           <th>Foto Produk</th>
                           <th>Opsi</th>
                         </tr>
                       </thead>

                       <tbody>
                         <?php
                          include '../koneksi/koneksi.php';
                          $no = '1';

                          $data = mysqli_query($koneksi, "SELECT * FROM tb_produk INNER JOIN tb_kategori ON tb_produk.kategori = tb_kategori.id_kategori;");
                          while ($row = mysqli_fetch_array($data)) { ?>

                           <tr align="center">
                             <td><?php echo $no++; ?></td>
                             <td><?php echo $row['nama_produk']; ?></td>
                             <td><?php echo $row['nama']; ?></td>
                             <td><?php echo $row['stok']; ?></td>
                             <td><?php echo $row['beratisi_produk']; ?> Kg</td>
                             <td>Rp.<?php echo number_format($row['harga_produk']) ?>,-</td>
                             <td><img src="../foto_produk/<?php echo $row['foto_produk']; ?>" height='30px' width='30px'></td>
                             </td>

                             <td>
                               <a href="index.php?halaman=detail_produk_admin&id=<?php echo $row['id_produk']; ?>" class="btn btn-primary btn-xs"><i class="fas fa-info-circle"></i></a>
                               <a href="index.php?halaman=edit_produk&id=<?php echo $row['id_produk']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                               <a href="index.php?halaman=hapus_produk&id=<?php echo $row['id_produk']; ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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
           <!-- <pre><?php //print_r($_SESSION) 
                      ?></pre> -->