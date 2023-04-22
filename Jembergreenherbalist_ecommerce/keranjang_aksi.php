<?php
session_start();
include 'koneksi/koneksi.php';
$id_produk = $_GET['id'];
//Jika sdh ada produk itu di keranjang maka produk itu jumlahnya di +1
if (isset($_SESSION['keranjang'][$id_produk])) {
	$_SESSION['keranjang'][$id_produk] += 1;
}

// selain itu blm ad d krnjgn, maka produk itu dianggap beli 1
else {
	$_SESSION['keranjang'][$id_produk] = 1;
}

//larikan ke keranjang
echo "<script>location='keranjang.php?pesan=tambahkeranjang';</script>";
?>