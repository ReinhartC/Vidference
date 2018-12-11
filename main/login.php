<?php include "database/logged.php"; ?>
<!DOCTYPE html>
<html>

<?php include "includes/css.php"; ?>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a><i class="fa fa-video-camera"></i> <b>Vid</b>Ference</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Login to join the teleconference</p>

    <?php include "database/operations/login-operation.php"; ?>

    <form role="form" action="#" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="user_name" required="" autofocus="">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" required="">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12 text-center">
          <input class="btn btn-md btn-primary btn-block btn-flat" type="submit" name="login" id="login" value="Login"/>
          <p></p>
          <p>- OR -</p>
          <a href="register.php" class="btn btn-primary btn-block btn-flat">Register</a>
          <p>If you don't have an account</p>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<?php include "includes/js.php"; ?>
</body>
</html>
