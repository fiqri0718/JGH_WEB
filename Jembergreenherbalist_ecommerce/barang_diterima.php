<?php
session_start();
include 'koneksi/koneksi.php';
$id_pbl = $_GET['id'];
$koneksi->query("UPDATE tb_pembelian SET status_pembelian='SELESAI' WHERE id_pembelian='$id_pbl'");
echo "<script type='text/javascript'>location.href=\"riwayat.php?pesan=barangditerima\"; </script>";
?>
