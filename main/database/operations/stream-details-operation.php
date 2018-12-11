<?php
	include "database/connect.php";
	$query_streamdetails = "CALL stream_details('$_SESSION[room_name]','$strm')";
	$sql_streamdetails = mysqli_query($db, $query_streamdetails);
	$row_streamdetails = mysqli_fetch_array($sql_streamdetails);
?>