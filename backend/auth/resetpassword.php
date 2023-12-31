<?php session_start(); ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/app-certificate/backend/auth/auth.php" ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/app-certificate/vendor/autoload.php"; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/app-certificate/function/function.php"; ?>
<?php

use App\Model\Mangement;

$mangeObj = new Mangement;
date_default_timezone_set('Asia/Bangkok');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Science-Certificate</title>

  <!-- link -->
  <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/app-certificate/backend/component/link.php");   ?>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <?php
    if (isset($_POST['change'])) {
      // print_r($_POST);
      if ($_POST['u_password'] == $_POST['confirm']) {
        $data['u_email'] = $_SESSION['u_email'];
        $data['u_password'] = $_POST['u_password'];
        $ck = $mangeObj->ChangePass($data);
        if ($ck) {
          $msg = "Change password success";
          echo "<script>";
          echo "alertSuccess('{$msg}','index.php')";
          echo "</script>";
        } else {
          $msg = "Not success !";
          echo "<script>";
          echo "alertError('{$msg}','resetpassword.php')";
          echo "</script>";
        }
      } else {
        $msg = "รหัสไม่ถูกต้อง";
        echo "<script>";
        echo "alertError('{$msg}','resetpassword.php')";
        echo "</script>";
      }
    }
    ?>
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="/app-certificate/" class="h1"><b>Science App</b></a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Change password</p>
        <form action="" method="post">
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="u_password" autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Confirm Password" name="confirm">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block" name="change">Change password</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <p class="mt-3 mb-1">
          <a href="index.php">Login</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- script -->
  <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/app-certificate/backend/component/script.php");   ?>
</body>

</html>