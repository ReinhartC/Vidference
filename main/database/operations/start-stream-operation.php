<?php
	if(isset($_POST['startstream'])){
	  include "database/connect.php";

	  $query_startstream = "CALL start_stream('$_SESSION[room_name]','$_SESSION[user_name]','$_POST[stream_space]')";
	  $sql_startstream = mysqli_query($db, $query_startstream);

	  $row_startstream = mysqli_fetch_array($sql_startstream);
      if($row_startstream[0] == 0){
      	  $_SESSION['streaming']=1;
          echo '<meta http-equiv="refresh" content="0; URL=room.php">';
      }
      echo "<p style='color:maroon' class='text-center'>$row_startstream[1]</p>"; 
      mysqli_close($db);
	}
?>