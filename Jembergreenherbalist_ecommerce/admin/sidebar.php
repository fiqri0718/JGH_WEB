<?php
if ($_SESSION['id_level']=="") {
    echo "<script>
    alert('Silahkan Login terlebih dahulu');
    location='../index.php';
    </script>";
}
?>
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #2BD474">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    
                </div>
                <div class="sidebar-brand-text mx-2"> Jember Green Herbalist</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Master
            </div>

            <!-- id_level = 1 -> Admin
                 id_level = 3 -> Super admin -->
            <!-- Nav Item - Pages Collapse Menu -->
            <?php if ($_SESSION['id_level']=="3"): ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Master</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pendataan :</h6>
                        <a class="collapse-item" href="index.php?halaman=data_produk">Data Produk</a>
                        <a class="collapse-item" href="index.php?halaman=data_pembelian">Data Pembelian</a>

                        <h6 class="collapse-header">Tambah Data :</h6>
                        <a class="collapse-item" href="index.php?halaman=tambah_kategori">Kategori</a>
                        <a class="collapse-item" href="index.php?halaman=data_tarif_pengiriman">Tarif Pengiriman</a>
                        
                        <h6 class="collapse-header">Akun :</h6>
                        <a class="collapse-item" href="index.php?halaman=data_user">Data Pelanggan</a>
                        <a class="collapse-item" href="index.php?halaman=data_admin">Data Admin</a>
                        
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#laporan"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Laporan</span>
                </a>
                <div id="laporan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Laporan:</h6>
                        <a class="collapse-item" href="index.php?halaman=laporan_pembelian">Laporan Pembelian</a>
                        
                        
                        
                    </div>
                </div>
            </li>

            <?php elseif ($_SESSION['id_level'] == "1") : ?>
            <!-- Nav Item - Master Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                   <i class="fas fa-fw fa-folder"></i>
                    <span>Master</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="index.php?halaman=data_produk">Data Produk</a>
                        <a class="collapse-item" href="index.php?halaman=data_pembelian">Data Pembelian</a>
                </div>
            </li>
             <?php endif ?>

           

            <?php if ($_SESSION['id_level']=="3"): ?>
             <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Kelola
            </div>
             
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Pengaturan</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Rekening:</h6>
                        <a class="collapse-item" href="index.php?halaman=rekening">Rekening</a>
                        
                </div>
            </li>
            <?php endif ?>

          

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->