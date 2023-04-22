<?php
$data = $koneksi -> query("SELECT * FROM tb_user WHERE id_user='$_GET[id]'");
$row = $data->fetch_assoc();
$foto_user = $row['foto_user'];
if (file_exists("foto_user/$foto_user")) 
{
	unlink("foto_user/$foto_user");
}
$koneksi->query("DELETE FROM tb_user WHERE id_user='$_GET[id]'");
echo "<script>alert('Data terhapus');</script>";
echo "<script>location='index.php?halaman=data_user';</script>";
?>