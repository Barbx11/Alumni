<?php
ob_start();
include '../connect/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Alumni Portal Admin Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page" style="background-image: url('../dist/img/SGback1.jpg');background-repeat: no-repeat;background-size: cover;background-position: 50% 40%">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <p class="h1"><b>PLSP</b></p>
    </div>
    <div class="card-body">
      <p class="login-box-msg">ADMIN DASHBOARD LOGIN</p>

      <form method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="user" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span>@</span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="pass" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8 text-center" style="font-size: 14px; color: red">

            <?php
            
              if(isset($_POST['submit']))
              {
                $user = $_POST['user'];
                $password = $_POST['pass'];

                $check_user = mysqli_query($conn ,"SELECT * FROM admin_acc WHERE username = '$user'");
                $result = mysqli_fetch_assoc($check_user);
                if($result > 0)
                {
                  if($result['password'] == $password)
                  {
                    $_SESSION['user'] = $result['username'];
                    $_SESSION['pass'] = $result['password'];
                    header ("Location: ../adminpage/dashboard.php");
                  }
                  else
                  {
                    echo 'Wrong Password! Pls. try again...';
                  }
                }
                else
                {
                  echo 'This user does not exist!';
                }
              }
              
            ?>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="submit">Sign In</button>
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
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>