<?php
	if(isset($_SESSION['user_name'])){
	    include "database/connect.php";
	    $query_userdetails = "CALL account_details('$_SESSION[user_name]')";
	    $sql_userdetails = mysqli_query($db, $query_userdetails);
	    $row_userdetails = mysqli_fetch_array($sql_userdetails);
	}
?>