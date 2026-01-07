<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Masna Beauty | Login Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet"
 href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head> 

<style>
body{
  background: linear-gradient(135deg,#ff5fa2,#ff8fc7);
  height:100vh;
  display:flex;
  align-items:center;
  justify-content:center;
  font-family: 'Segoe UI', sans-serif;
}

/* container utama */
.login-wrapper{
  width:900px;
  height:520px;
  background:#fff;
  border-radius:15px;
  overflow:hidden;
  box-shadow:0 20px 40px rgba(0,0,0,.25);
  display:flex;
}

/* kiri (gambar) */
.login-left{
  width:50%;
  background:url("dist/assets/img/logincos.jpeg") center/cover no-repeat;
}

/* kanan (form) */
.login-right{
  width:50%;
  padding:50px 45px;
}

.login-right h3{
  font-weight:700;
  margin-bottom:30px;
}

.form-control{
  border-radius:30px;
  padding:12px 20px;
}

.btn-login{
  border-radius:30px;
  background:#ff5fa2;
  color:#fff;
  font-weight:600;
}

.btn-login:hover{
  background:#355fe0;
}

.btn-google{
  background:#ea4335;
  color:#fff;
  border-radius:30px;
}

.btn-facebook{
  background:#3b5998;
  color:#fff;
  border-radius:30px;
}

.login-links a{
  font-size:14px;
  text-decoration:none;
}
</style>
</head>

<body>

<div class="login-wrapper">

  <!-- KIRI -->
  <div class="login-left"></div>

  <!-- KANAN -->
  <div class="login-right">
    <h3>Login Untuk Melanjutkan Perjalanan Cantikmu!</h3>

    <form action="proses_login.php" method="post">
      <div class="mb-3">
        <input type="text" name="txtUsername" class="form-control" placeholder="Email Address / Username..">
      </div>

      <div class="mb-3">
        <input type="password" name="txtPassword" class="form-control" placeholder="Password">
      </div>

      <div class="d-grid mb-3">
  <button type ="submit"
    class="btn"
    style="
      background:transparent;
      color:#ff5fa2;
      border:2px solid #ff5fa2;
      border-radius:30px;
      padding:12px;
      font-weight:600;
    ">
    Login
  </button>
</div>
    </form>

    <div class="d-grid mb-3">
  <button
    class="btn"
    style="
      background:#ffe4f1;
      color:#e60073;
      border:1px solid #ff9fcf;
      border-radius:25px;
      padding:12px;
      font-weight:600;">
    <i class="bi bi-google me-2" style="font-size:18px;"></i>Sign in using Google+
  </button>
</div>

    <div class="login-links text-center">
      <a href="#">Forgot Password?</a><br>
      <a href="#">Create an Account</a>
    </div>
  </div>

</div>
</body>
</html>