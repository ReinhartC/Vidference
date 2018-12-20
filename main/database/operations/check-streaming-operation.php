<?php
	include "database/operations/user-stream-check-operation.php";
	$_SESSION['stream_room']=$row_streamcheck['stream_room'];
	$_SESSION['streaming']=$row_streamcheck['streaming'];
?>