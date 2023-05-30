<?php
session_start();

include_once('db/koneksi.php');

$email = isset($_POST["email"]) ? $_POST["email"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";

if (isset($_POST["email"]) && isset($_POST["password"])) {
  $sql = "SELECT * FROM tbluser WHERE emailUser = '$email'";
  $result = mysqli_query($mysqli, $sql);
  $hasil = $result->fetch_assoc();

  if (mysqli_num_rows($result) == 1) {
    if (password_verify($password, $hasil['passwordUser'])) {
      $_SESSION['iduser'] = $hasil['idUser'];
      $_SESSION['nama'] = $hasil['namaUser'];
      $_SESSION['email'] = $email;
      $_SESSION['role'] = $hasil['roleUser'];
      header("Location: index.php");
    } else {
      $error = "Password Salah !";
    }
  } else {
    $error = "Email Tidak Ditemukan !";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log In</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <?php if (isset($error)) : ?>
        <div id="myalert" class="alert alert-danger" role="alert">
            <?php echo $error; ?>
        </div>
        <?php endif; ?>
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1">Gudang<b>Boy</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="login.php" method="post">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Masukkan Email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Masukkan Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <script>
    var alert = document.getElementById('myalert');
    setTimeout(function() {
        alert.style.display = 'none';
    }, 1500);
    </script>
</body>

</html>