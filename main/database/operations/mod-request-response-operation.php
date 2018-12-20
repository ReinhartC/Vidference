<?php
	if(isset($_POST['acceptrequest'])){
	  include "database/connect.php";

	  $query_acceptrequest = "CALL mod_accept_request('$_POST[request_user]', '$_SESSION[room_name]')";
	  $sql_acceptrequest = mysqli_query($db, $query_acceptrequest);

	  $row_acceptrequest = mysqli_fetch_array($sql_acceptrequest);
      if($row_acceptrequest[0] == 0){
          echo '<meta http-equiv="refresh" content="0; URL=room.php">';
      }
      echo "<p style='color:maroon' class='text-center'>$row_acceptrequest[1]</p>"; 
      mysqli_close($db);
	}

	if(isset($_POST['declinerequest'])){
	  include "database/connect.php";

	  $query_declinerequest = "CALL mod_decline_request('$_POST[request_user]', '$_SESSION[room_name]')";
	  $sql_declinerequest = mysqli_query($db, $query_declinerequest);

	  $row_declinerequest = mysqli_fetch_array($sql_declinerequest);
      if($row_declinerequest[0] == 0){
          echo '<meta http-equiv="refresh" content="0; URL=room.php">';
      }
      echo "<p style='color:maroon' class='text-center'>$row_declinerequest[1]</p>"; 
      mysqli_close($db);
	}
?>