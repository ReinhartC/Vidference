<?php
	if(isset($_POST['createroom'])){
	  include "database/connect.php";

	  $query_createroom = "CALL create_room('$_POST[room_name]','$_SESSION[user_name]','$_POST[room_password]','$_POST[room_slot]')";
	  $sql_createroom = mysqli_query($db, $query_createroom);

	  $row_createroom = mysqli_fetch_array($sql_createroom);
	      if($row_createroom[0] == 0){
	          $_SESSION['room_name']=$_POST['room_name'];
	          echo '<meta http-equiv="refresh" content="0; URL=room.php">';
	      }
	          echo "<p style='color:maroon' class='text-center'>$row_createroom[1]</p>"; 
	          mysqli_close($db);
	}
?>