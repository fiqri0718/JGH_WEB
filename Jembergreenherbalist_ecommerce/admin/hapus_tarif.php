<?php

$koneksi->query("DELETE FROM tb_ongkir WHERE id_ongkir='$_GET[id]'");
echo "<script>alert('Data terhapus');</script>";
echo "<script>location='index.php?halaman=data_tarif_pengiriman';</script>";
?>