<?php

$koneksi->query("DELETE FROM tb_kategori WHERE id_kategori='$_GET[id]'");
echo "<script>alert('Data terhapus');</script>";
echo "<script>location='index.php?halaman=tambah_kategori';</script>";
?>