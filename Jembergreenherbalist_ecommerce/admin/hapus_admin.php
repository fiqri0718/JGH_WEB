<?php
$data = $koneksi -> query("SELECT * FROM tb_admin WHERE id_admin='$_GET[id]'");
$row = $data->fetch_assoc();
$foto_admin = $row['profil_admin'];
if (file_exists("profil_admin/$profil_admin")) 
{
	unlink("profil_admin/$foto_admin");
}
$koneksi->query("DELETE FROM tb_admin WHERE id_admin='$_GET[id]'");
echo "<script>alert('Data terhapus');</script>";
echo "<script>location='index.php?halaman=data_admin';</script>";
?>