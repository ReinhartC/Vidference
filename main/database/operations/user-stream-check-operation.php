<?php
	include "database/connect.php";
	$query_streamcheck = "CALL user_stream_check('$_SESSION[user_name]')";
	$sql_streamcheck = mysqli_query($db, $query_streamcheck);
	$row_streamcheck = mysqli_fetch_array($sql_streamcheck);
	mysqli_close($db);
?>