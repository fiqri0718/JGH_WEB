
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        
                    </div>
                    <?php
                        if (isset($_GET['pesan'])) {
                          $pesan = $_GET['pesan'];
                          //superadmin
                        if ($pesan == "berhasil"){
                          ?>
                          <div class="alert alert-primary">
                              <strong>Success!</strong> Hai. <b><?php echo ($_SESSION['superadmin']['nama_depan']. ' ' . $_SESSION['superadmin']['nama_belakang']); ?></b>. <br> Anda berhasil login.
                           </div>
                          <?php

                          //admin
                        }elseif ($pesan == 'adminberhasil') {
                          echo '<div class="alert alert-primary">
                            <strong>Success! Anda Berhasil Login</strong>
                          </div>';
                        }
                    }
                    ?>
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <?php 
                                            $data_produk = mysqli_query($koneksi, "SELECT * FROM tb_produk");
                                            $jml_produk = mysqli_num_rows($data_produk);
                                             ?>
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Data Produk</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <!--  isi datanya-->
                                                <?php echo $jml_produk; ?> Produk
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                             <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <?php 
                                            $data_beli = mysqli_query($koneksi, "SELECT * FROM tb_pembelian");
                                            $jml_beli = mysqli_num_rows($data_beli);
                                             ?>
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Pembelian / Pemesanan
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                        <!--  isi datanya-->
                                                        <?php echo $jml_beli; ?> Pemesanan
                                                    </div>
                                                </div>
                                              
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                             <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <?php 
                                            $data_user = mysqli_query($koneksi, "SELECT * FROM tb_user");
                                            $jml_user = mysqli_num_rows($data_user);
                                             ?>
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                JUMLAH PELANGGAN</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <!--  isi datanya-->
                                                <?php echo $jml_user; ?> Pelanggan
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.container-fluid