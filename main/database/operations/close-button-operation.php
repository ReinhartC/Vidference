<?php
	include "database/operations/close-room-operation.php";
	if($_SESSION['user_name']==$row_roomdetails['room_owner'])
		echo"
  		<div class='col-sm-12'>
      		<form role='form' action='#' method='post'>
	        	<input type='hidden' name='room_name' value='$row_roomdetails[room_name]' required=''>
	        	<input class='btn btn-md btn-danger btn-block' type='submit' name='closeroom' id='closeroom' value='Close Room'/>
	        	<br>
	        </form>
      	</div>
		";
?>