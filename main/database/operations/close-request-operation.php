<?php
	if(isset($_POST['closerequest'])){
	  include "database/connect.php";

	  $query_closerequest = "CALL close_request('$_SESSION[user_name]', '$_POST[room_name]')";
	  $sql_closerequest = mysqli_query($db, $query_closerequest);

	  $row_closerequest = mysqli_fetch_array($sql_closerequest);
      if($row_closerequest[0] == 0){
        $_SESSION['room_name']=$_POST['room_name'];
	  	echo '<meta http-equiv="refresh" content="0; URL=index.php">';
      }
      echo "<p style='color:maroon' class='text-center'>$row_closerequest[1]</p>"; 
      mysqli_close($db);
	}
?>