<?php
	include "database/operations/user-stream-check-operation.php";
	$_SESSION['streaming']=$row_streamcheck['streaming'];
?>