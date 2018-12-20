<?php
	if(isset($_POST['addslot'])){
	  include "database/connect.php";

	  $query_addslot = "CALL add_room_slot('$_POST[room_name]')";
	  $sql_addslot = mysqli_query($db, $query_addslot);

	  $row_addslot = mysqli_fetch_array($sql_addslot);
      if($row_addslot[0] == 0){
          echo '<meta http-equiv="refresh" content="0; URL=room.php">';
      }
      echo "<p style='color:maroon' class='text-center'>$row_addslot[1]</p>"; 
      mysqli_close($db);
	}
?>