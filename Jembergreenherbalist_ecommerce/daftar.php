<?php
include 'koneksi/koneksi.php';
include 'daftar_proses.php';
if(isset($_POST['register'])){
  if (daftar($_POST) > 0) {
      echo '<div class="alert alert-info">
                <center><strong>Berhasil!</strong> Akun baru berhasil ditambahkan.</center>
              </div>';
      // header('location:login.php');
  } else {
    echo mysqli_error($koneksi);
  }

}
// else{
//   echo "<script>
//           alert('Akun Gagal ditambahkan');
//           </script>";
// }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Jember Green Herbalist</title>
	<meta charset="utf-8">
	<meta main="viewport" content="width=decive-width, initial-scale=1">
   <!-- Favicons -->
  <link href="assets/img/polijelogo.png" rel="icon" class="logo">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
	<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style_daftar.css">
  <script src="https://kit.fontawesome.com/2aca802f76.js" crossorigin="anonymous"></script>
<!--   <style type="text/css">
    body{
      background-color: #98fb98;
    }
  </style> -->
</head>
<!-- Awal Body -->
<body>

<div class="container">
  <p class="login-box-msg"><center>DAFTAR AKUN BARU</center></p>
  <form action="" method="post">
  	<hr>
    <div class="form-group">
         <input type="text" class="form-control" id="nama_depan" placeholder="Nama Depan" name="nama_depan" required pattern="[a-zA-Z -]{1,}" title="Masukkan berupa huruf" autofocus>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="nama_belakang" placeholder="Nama Belakang" name="nama_belakang" required pattern="[a-zA-Z -]{1,}" title="Masukkan berupa huruf" autofocus>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="username" placeholder="Username" name="username" required pattern="[a-zA-Z -]{1,}" title="Masukkan berupa huruf" autofocus>
    </div>
     <div class="form-group">
      <input type="email" class="form-control" id="email" placeholder="Email" name="email" aria-describedby="emailHelp" required>
    </div>
    <div class="form-group">
      <input type="password" class="form-control" id="password" placeholder="Password"  name="password" aria-describedby="passwordHelp" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,32}" title="Demi keamanan diharapkan mengandung huruf Kapital dan Angka dengan minimal 8 Karakter">
    </div>
    <div class="form-group">
      <input type="password" class="form-control" id="repassword" placeholder="Konfirmasi Password" name="repassword" aria-describedby="passwordHelp" required title="Masukkan Password yang sama persis dengan password yang anda masukkan diatas">
    </div>
    <hr>
      
    <div class="form-group text-right">
    <button type="submit" class="btn btn-success" name="register"><i class="fas fa-sign-in-alt"></i> Daftar</button>
    </div>
  </form>

  <div class="form-group text-right">
    <label><a href="login.php">Sudah punya akun?</a></label>
    </div>

</div>
<script type="text/javascript" src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
<!-- Akhir Body -->
</html>