<?php 
  include "database/verify.php";   
  include "database/operations/check-streaming-operation.php";
?>
<!DOCTYPE html>
<html>

<?php include "includes/css.php"; ?>

<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">
  <?php include "elements/header.php"; ?>
  <!-- Left side column. contains the logo and sidebar -->

  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">NAVIGATIONS</li>
        <li class="active"><a href="index.php"><i class="fa fa-home"></i> <span>Home</span></a></li>
        <li><a data-toggle="modal" data-target="#join-room-modal"><i class="fa fa-users"></i> <span>Teleconferences</span></a></li>  
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- MAIN CONTENT -->
    <section class="content">
  
      <div class="alert bg-primary">
        <h2>Welcome to <b>Vid</b>Ference</h2>
        <p>A video stream teleconference platform</p><br>
      </div>      

      <div class="col-sm-4">
        <div class="box">
          <div class="box-body text-center">
            <h4>Join an existing teleconference room</h4>
            <a class="btn btn-app" data-toggle="modal" data-target="#join-room-modal">
              <i class="fa fa-arrow-circle-right"></i> Join
            </a>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="box">
          <div class="box-body text-center">
            <h4>Create a teleconference room</h4>
            <a class="btn btn-app" data-toggle="modal" data-target="#create-room-modal">
              <i class="fa fa-plus-circle"></i> Create
            </a>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="box">
          <div class="box-body text-center">
            <h4>Your room password requests</h4>
            <a class="btn btn-app" data-toggle="modal" data-target="#request-password-modal">
              <i class="fa fa-key"></i> Request
            </a>
          </div>
        </div>
      </div>

      <?php 
        include "modals/join-room-modal.php";
        include "modals/create-room-modal.php"; 
        include "modals/request-password-modal.php";
        include "modals/room-password-modal.php"; 
        include "modals/request-password-waiting-modal.php"; 
        include "modals/request-password-accepted-modal.php";
        include "modals/request-password-declined-modal.php";
      ?>

      
    
    </section>
    <!-- /.CONTENT -->
  </div>
  <!-- /.content-wrapper -->
  <?php include "elements/footer.php"; ?>
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<?php include "includes/js.php"; ?>
</body>
</html>
