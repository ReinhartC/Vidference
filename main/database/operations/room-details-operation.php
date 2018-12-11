<?php
	if(isset($_SESSION['room_name'])){
	    include "database/connect.php";
	    $query_roomdetails = "CALL room_details('$_SESSION[room_name]')";
	    $sql_roomdetails = mysqli_query($db, $query_roomdetails);
	    $row_roomdetails = mysqli_fetch_array($sql_roomdetails);
	}
?>