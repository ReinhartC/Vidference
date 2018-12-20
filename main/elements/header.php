<header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><i class="fa fa-video-camera"></i></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><i class="fa fa-video-camera"></i><b> Vid</b>Ference</span> 
    </a>
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li>
            <a href="#"><i class="fa fa-play-circle"></i> &nbsp;
              <?php
                if($_SESSION['stream_room']==NULL){
                      echo "<i>Not Streaming</i>";                  
                }
                echo "<i>$_SESSION[stream_room]</i>"; 
              ?>
            </a>
          </li>
          <li>
            <a href="#"><i class="fa fa-user"></i> <span class="hidden-xs">&nbsp;<?php echo "$_SESSION[user_name]"; ?></span></a>
          </li>
          <li>
            <a href="#" data-toggle="modal" data-target="#stream-link-modal"><i class="fa fa-chain"></i> <span class="hidden-xs">&nbsp;Stream Link</span></a>
          </li>
          <li>
            <a href="database/logout.php"><i class="fa fa-sign-out"></i> <span class="hidden-xs">&nbsp;Logout</span></a>
          </li>
        </ul>
      </div>
  </nav>	
</header>
<?php include "modals/stream-link-modal.php"; ?>
