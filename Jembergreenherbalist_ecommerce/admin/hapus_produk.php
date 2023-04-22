<?php
$data = $koneksi -> query("SELECT * FROM tb_produk WHERE id_produk='$_GET[id]'");
$row = $data->fetch_assoc();
$fotoproduk = $row['foto_produk'];
if (file_exists("foto_produk/$fotoproduk")) 
{
	unlink("foto_produk/$fotoproduk");
}
$koneksi->query("DELETE FROM tb_produk WHERE id_produk='$_GET[id]'");
echo "<script>alert('Data terhapus');</script>";
echo "<script>location='index.php?halaman=data_produk';</script>";
?>