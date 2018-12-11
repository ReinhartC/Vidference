<?php
	if(isset($_POST['closeroom'])){
	  include "database/connect.php";

	  $query_closeroom = "CALL close_room('$_POST[room_name]')";
	  $sql_closeroom = mysqli_query($db, $query_closeroom);

	  $row_closeroom = mysqli_fetch_array($sql_closeroom);
      if($row_closeroom[0] == 0){
          echo '<meta http-equiv="refresh" content="0; URL=index.php">';
      }
      echo "<p style='color:maroon' class='text-center'>$row_closeroom[1]</p>"; 
      mysqli_close($db);
	}
?>