<?php
	if(isset($_POST['endstream'])){
	  include "database/connect.php";

	  $query_endstream = "CALL end_stream('$_POST[stream_id]', '$_POST[stream_owner]')";
	  $sql_endstream = mysqli_query($db, $query_endstream);

	  $row_endstream = mysqli_fetch_array($sql_endstream);
      if($row_endstream[0] == 0){
      	  $_SESSION['streaming']=0;
          echo '<meta http-equiv="refresh" content="0; URL=room.php">';
      }
      echo "<p style='color:maroon' class='text-center'>$row_endstream[1]</p>"; 
      mysqli_close($db);
	}
?>