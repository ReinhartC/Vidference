<?php include "database/verify.php"; ?>
<!DOCTYPE html>
<html>

<?php include "includes/css.php"; ?>

<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">
  <?php include "elements/header.php"; ?>
  <aside class="main-sidebar">
	<section class="sidebar">
	  <ul class="sidebar-menu" data-widget="tree">
	    <li class="header">NAVIGATIONS</li>
	    <li><a href="index.php"><i class="fa fa-home"></i> <span>Home</span></a></li>
	    <li class="active"><a data-toggle="modal" data-target="#join-room-modal"><i class="fa fa-users"></i> <span>Teleconferences</span></a></li>
	  </ul>
	</section>
   </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- MAIN CONTENT -->
    <section class="content">
  	  <?php include "database/operations/room-details-operation.php"; ?>
      <div class="callout callout-success">
        <h4>
          <?php 
            echo "$row_roomdetails[room_name]&nbsp;"; 
            if($row_roomdetails['room_type']=='Private')
              echo " <i class='fa fa-lock'></i>";
          ?>
        </h4>
        <i>Created by <?php echo "$row_roomdetails[room_owner]"; ?></i><br>	
      </div>
      <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fa fa-info"></i> &nbsp;Choose one of the empty stream space below to join the teleconference in this room
      </div>

      <div class="row">
      		
	      	<!-- STREAMS -->
	      	<?php
	      		include "modals/join-room-modal.php";
            include "modals/room-password-modal.php"; 
	      		include "database/operations/close-button-operation.php";
	      		include "database/operations/start-stream-operation.php";
		        include "database/operations/end-stream-operation.php";
		        include "database/operations/stream-loops-operation.php";
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
