<?php include "database/logged.php"; ?>
<!DOCTYPE html>
<html>

<?php include "includes/css.php"; ?>

<body class="hold-transition register-page">
<div class="login-box">
  <div class="login-logo">
    <a><i class="fa fa-video-camera"></i> <b>Vid</b>Ference</a>
  </div>
  <!-- /.register-logo -->
  <div class="register-box-body">
    <p class="login-box-msg">Register to join the VidFerence teleconference platform</p>

    <?php include "database/operations/register-operation.php"; ?>

    <form role="form" action="#" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="user_name" required="" autofocus="">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" required="">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Stream embed link" name="stream_link" required="">
        <span class="glyphicon glyphicon-link form-control-feedback"></span>
        <p></p>
        <div class="alert alert-info alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-info"></i> Note</h4>
          <strong>Only insert the embed link.</strong> (E.g. <i>https://www.youtube.com/embed/xxxxxx</i> or <i>https://www.dailymotion.com/embed/video/xxxxxx</i>)
        </div>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12 text-center">
          <input class="btn btn-md btn-primary btn-block btn-flat" type="submit" name="register" id="register" value="Register"/>
          <p></p>
          <p>- OR -</p>
          <a href="login.php" class="btn btn-primary btn-block btn-flat">Login</a>
          <p>If you already have an account</p>
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
