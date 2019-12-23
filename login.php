<?php
include('inc/db.php');
session_start();
if(isset($_SESSION['user'])) {
  header('Location: index.php?login=1');
  exit();
}

if (!empty($_POST['user']) && !empty($_POST['password'])) {
  $sql = 'SELECT COUNT(*) FROM users WHERE user = ?';
  $req = $bdd->prepare($sql);
  $req->execute(array($_POST['user']));

  while($row = $req->fetchColumn()) {
    $nb = $row;
  }

  if($nb == 0) header('Location: login.php?error=1');
  else {
    $req = $bdd->prepare('SELECT * FROM users WHERE user = ?');
    $req->execute(array($_POST['user']));

    while($row = $req->fetch()) {
      if(password_verify($_POST['password'], $row['password'])) {
        session_start();
        $_SESSION['user'] = $row['user'];
        header('Location: index.php?login=1');
        exit();
      } else {
        header('Location: login.php?error=1');
      }
    }
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>OnSet Roleplay Web Login Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
      <img src="../../dist/img/onset.jpg"
           alt="AdminLTE Logo"
           class="brand-image img-circle "
           style="opacity: .8" height="130" width="130">
      <h1>OnSet WebMin</h1>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="UserName" name="user">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user-alt"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
            </div>
          </div>
          <!-- /.col -->
          <button type="submit" class="btn btn-primary btn-block">Login</button>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>

</body>
</html>
