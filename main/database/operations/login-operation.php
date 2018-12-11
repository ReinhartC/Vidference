<?php
	if(isset($_POST['login'])){
	  include "database/connect.php";

	  $query_login = "CALL login('$_POST[user_name]','$_POST[password]')";
	  $sql_login = mysqli_query($db, $query_login);

	  $row_login = mysqli_fetch_array($sql_login);
      if($row_login[0] == 0){
          $_SESSION['user_name']=$_POST['user_name'];
          header("Location:index.php");
      }
      echo "<p style='color:maroon'>$row_login[1]</p>"; 
      mysqli_close($db);
	}
?>