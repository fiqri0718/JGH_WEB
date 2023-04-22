<?php

	function daftar($data){
	include 'koneksi/koneksi.php';
	$nama_depan = $data['nama_depan'];
	$nama_belakang = $data['nama_belakang'];
	$username = strtolower(stripcslashes($data['username']));
	$email = strtolower(stripcslashes($data['email']));
	$password = mysqli_real_escape_string($koneksi, $data['password']);
	$repassword = mysqli_real_escape_string($koneksi, $data['repassword']);
	$tanggal = date("Y-m-d H:i:s");

	//cek email
	$data_regis = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE email='$email'");
	$sama = mysqli_num_rows($data_regis); 
	if ($sama==1)
	 {
		echo '<div class="alert alert-warning">
                <center><strong>Gagal!</strong> Email sudah digunakan. </center>
              </div>';
		return false;
	}

	//cek konfirmasi password
	if ($password !== $repassword) {
		echo '<div class="alert alert-warning">
                <center><strong>Konfirmasi!</strong> Password tidak sesuai.</center>
              </div>';
		return false;
	}

	//enkripsi password
	//password hash lebij aman dari md5
	//(password apa yg mau di acak line 12, algorimat yg digunkan)

	//tambahkan userbaru ke database
	mysqli_query($koneksi, "INSERT INTO tb_user VALUES('', '$email','$username','$password','$nama_depan','$nama_belakang','','','','$tanggal','2')");

	return mysqli_affected_rows($koneksi);
}


?>