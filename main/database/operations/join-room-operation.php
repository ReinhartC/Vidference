<?php
	if(isset($_POST['joinroom'])){
	  $_SESSION['room_name']=$_POST['joinroom'];
	  echo '<meta http-equiv="refresh" content="0; URL=room.php">';
	}
?>