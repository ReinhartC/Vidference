<?php
	if(isset($_POST['joinprivate'])){
	  include "database/connect.php";

	  $query_joinprivate = "CALL join_private('$_POST[room_name]', '$_POST[room_password]')";
	  $sql_joinprivate = mysqli_query($db, $query_joinprivate);

	  $row_joinprivate = mysqli_fetch_array($sql_joinprivate);
      if($row_joinprivate[0] == 0){
        $_SESSION['room_name']=$_POST['room_name'];
	  	echo '<meta http-equiv="refresh" content="0; URL=room.php">';
      }
      echo "<p style='color:maroon' class='text-center'>$row_joinprivate[1]</p>"; 
      mysqli_close($db);
	}
?>