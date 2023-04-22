<?php
include 'koneksi/koneksi.php';
$id_pbl = $_GET['id'];

//tambil tabel pembelian produk
$data = mysqli_query($koneksi, "SELECT * FROM tb_pembelian_produk WHERE id_pembelian = $id_pbl");
$row = mysqli_fetch_array($data);
$id_produk = $row['id_produk'];
$jumlah = $row['jumlah'];

//tampil tabel produk
$data_produk = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE id_produk = '$id_produk'");
$baris_produk = mysqli_fetch_array($data_produk);
$stok = $baris_produk['stok'];

//kembalikan stok
$kembalikanstok = $jumlah + $stok;

//update status
$update = "UPDATE tb_pembelian SET status_pembelian='Pesanan Dibatalkan' WHERE id_pembelian='$id_pbl'";
$query = $koneksi->query($update);

if ($query == true) {
	$update2 = "UPDATE tb_produk SET stok = '$kembalikanstok' WHERE id_produk = '$id_produk'";
	$query = $koneksi->query($update2);
	if ($query == true) {
		echo "<script type='text/javascript'>location.href=\"riwayat.php?pesan=dibatalkan\"; </script>";
	}
}
echo "<script type='text/javascript'>alert('Pesanan Dibatalkan'); location.href=\"riwayat.php\"; </script>";
?>