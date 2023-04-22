<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Jember Green Herbalist</title>
  <link rel="stylesheet" href="assets/css/login.css" />
  <script src="https://kit.fontawesome.com/a81368914c.js"></script>

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  <div class="form-group">
    <?php
    if (isset($_GET['pesan'])) {
      $pesan = $_GET['pesan'];
      if ($pesan == "gagal") {
    ?>
        <div class="alert alert-danger">
          <center><strong>Gagal!</strong> Periksa Kembali Akun Anda </center>
        </div>
    <?php
      }
    }
    ?>
  </div>
  <div class="container">
    <div class="img">
      <img src="gambar/login/1.svg" />
    </div>
    <div class="login-container">
      <form action="login_proses_nyoba.php" method="post">
        <img class="avator" src="gambar/login/3.svg" />
        <h2>Login</h2>

        <div class="input-div" one>
          <div class="i">
            <i class="fas fa-user"></i>
          </div>
          <div>
            <h5>Username</h5>
            <label for="username"></label>
            <input type="text" class="input" id="username" name="username" required>
          </div>
        </div>
        <div class="input-div" two>
          <div class="i">
            <i class="fas fa-lock"></i>
          </div>
          <div>
            <h5>Password</h5>
            <input type="password" class="input" id="password" name="password" required>
          </div>
        </div>
        <button type="submit" class="btn text-white" name="login">Login</button>

        <div class="link login-link text-center">Not yet a member? <a href="daftar.php">Signup now</a></div>
      </form>
    </div>
  </div>

  <script type="text/javascript" src="assets/js/login.js"></script>
</body>

</html>