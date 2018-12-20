<?php
	if(isset($_POST['requestpassword'])){
	  include "database/connect.php";

	  $query_requestpassword = "CALL request_password('$_SESSION[user_name]', '$_POST[room_name]')";
	  $sql_requestpassword = mysqli_query($db, $query_requestpassword);

	  $row_requestpassword = mysqli_fetch_array($sql_requestpassword);
      if($row_requestpassword[0] == 0){
        $_SESSION['room_name']=$_POST['room_name'];
	  	echo '<meta http-equiv="refresh" content="0; URL=index.php">';
      }
      echo "<p style='color:maroon' class='text-center'>$row_requestpassword[1]</p>"; 
      mysqli_close($db);
	}
?>