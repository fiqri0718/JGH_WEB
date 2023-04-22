<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
             <div class="card shadow mb-4 mt-3">
           

               <!-- Card Body -->
               <div class="card-body">
                 <form method="post">
                  <h5 class="m-0 font-weight-bold text-success">Data Admin</h5><hr>

                  <a  href="index.php?halaman=tambah_admin" class="btn btn-success"><i class="fas fa-plus-circle"></i> Tambah Admin</a> <a href="print-admin.php" target="_blank" class="btn btn-success"><i class="fas fa-print"></i></a> <br><br>

                  <div class="table-responsive">
                    <table class="table datatables table-striped table-hover table-bordered nowrap">
                      <thead>
                        <tr align="center">
                          <th>No</th>
                          <th>Foto</th>
                          <th>Email</th>
                          <th>Username</th>
                          <th>Nama admin</th>
                          <th>Alamat</th>
                          <th>Kontak</th>
                          <th>Tanggal Buat</th>
                          <th>Opsi</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php 
                        include '../koneksi/koneksi.php';
                        $no = '1';
                        $data = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE id_level=1");
                        while($row = mysqli_fetch_array($data)){ ?>

                          <tr>
                            <td><?php echo $no++; ?></td>
                             <td><img src="gambar/profil_admin/<?php echo $row['foto_admin']; ?>" height='30px' width='30px'></td>
                             <td><?php echo $row['email']; ?></td>
                             <td><?php echo $row['username']; ?></td>
                             <td><?php echo $row['nama_depan'] . ' ' . $row['nama_belakang']; ?></td>
                            <td><?php echo $row['alamat']; ?></td>
                             <td><?php echo $row['info_kontak']; ?></td>
                             <td><?php echo $row['tgl_buat']; ?></td>
                                                         
                             <td>
                            
                              <a href="index.php?halaman=ubah_admin&id=<?php echo $row['id_admin']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                              <a href="index.php?halaman=hapus_admin&id=<?php echo $row['id_admin']; ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                           </td>
                          </tr>
                        <?php } ?>
                        <!-- <pre><?php //print_r($_SESSION) ?></pre> -->
                      </tbody>
                    </table>
                   
                  </div>
                   
                 </form>
               </div>

             </div>
           </div>