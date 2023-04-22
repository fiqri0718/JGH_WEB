<?php
include 'koneksi/koneksi.php';
session_start(); //memulai session
if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	//fungsi login
	$q = mysqli_query($koneksi, "SELECT * FROM tb_admin where username = '$username' AND password = '$password' AND id_level = '1'");
	

	$q2 = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '$username' AND password = '$password' AND id_level= '2'");
	

	$q3 = mysqli_query($koneksi, "SELECT * FROM tb_admin where username = '$username' AND password = '$password' AND id_level = '3'");


	if (mysqli_num_rows($q) == 1) { //apabila  data tidak kosong dan isi data cocok maka akan menjalankan 
		//mysqli_fetch_array : pengambilan data MySql
			$akunadmin = mysqli_fetch_array($q);
			$_SESSION['admin'] = $akunadmin;
			$_SESSION['id_admin'] = $akunadmin['id_admin'];
			$_SESSION['username'] = $akunadmin['username'];
			$_SESSION['status'] = "Login";
			$_SESSION['id_level'] = "1";
			header('location:admin/index.php?pesan=adminberhasil');
			echo "<script type='text/javascript'>alert('Selamat Datang $username'); location.href=\"admin/index.php\"; </script>";

			//user atau pelanggan
	} elseif (mysqli_num_rows($q2) == 1) {
			$akun = mysqli_fetch_array($q2);
			$_SESSION['pelanggan'] = $akun;
			$_SESSION['id_user'] = $akun['id_user'];
			$_SESSION['username'] = $akun['username'];
			$_SESSION['status'] = "Login";
			$_SESSION['id_level'] = "2";
			echo "<script type='text/javascript'>alert('Selamat Datang $username'); </script>";
			header('location:produk.php?pesan=berhasil');

			//superadmin
	} elseif (mysqli_num_rows($q3) == 1) {
			$akunsuper = mysqli_fetch_array($q3);
			$_SESSION['superadmin'] = $akunsuper;
			$_SESSION['id_admin'] = $akunsuper['id_admin'];
			$_SESSION['username'] = $akunsuper['username'];
			$_SESSION['status'] = "Login";
			$_SESSION['id_level'] = "3";
			header('location:admin/index.php?pesan=berhasil');
			

		} else {
		echo "<script type='text/javascript'>location.href=\"login.php?pesan=gagal\"; </script>";


	}
} else {
	echo "<script type='text/javascript'>alert('Silahkan login terlebih dahulu'); location.href=\"login.php\"; </script>";

}
?>