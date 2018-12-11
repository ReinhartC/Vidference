<?php
	if(isset($_POST['register'])){
	  include "database/connect.php";

	  $query_register = "CALL register('$_POST[user_name]','$_POST[password]','$_POST[stream_link]')";
	  $sql_register = mysqli_query($db, $query_register);

	  $row_register = mysqli_fetch_array($sql_register);
	      if($row_register[0] == 0){
	          $_SESSION['user_name']=$_POST['user_name'];
	          header("Location:index.php");
	      }
	          echo "<p style='color:maroon'>$row_register[1]</p>"; 
	          mysqli_close($db);
	}
?>