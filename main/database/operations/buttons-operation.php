<?php
	include "database/operations/close-room-operation.php";
	include "database/operations/add-room-slot-operation.php";	
	if($_SESSION['user_name']==$row_roomdetails['room_owner']){
		echo "<div class='align-items-center'>";
		if($row_roomdetails['room_slot']<8)
			echo"
		  		<div class='col-sm-4'>
		      		<form role='form' action='#' method='post'>
			        	<input type='hidden' name='room_name' value='$row_roomdetails[room_name]' required=''>
			        	<input class='btn btn-md btn-warning btn-block' type='submit' name='addslot' id='addslot' value='Add a slot'/>
			        	<br>
			        </form>
		      	</div>
	      	";
		if($row_roomdetails['room_type']=='Private')
		    echo"
		  		<div class='col-sm-4'>
			        <a class='btn btn-md btn-primary btn-block' data-toggle='modal' data-target='#mod-request-modal'> Password requests</a>
			        <br>
		      	</div>
			";
		else
			echo"
		  		<div class='col-sm-4'>
			        <br>
		      	</div>
			";
      	echo"
	  		<div class='col-sm-4'>
	      		<form role='form' action='#' method='post'>
		        	<input type='hidden' name='room_name' value='$row_roomdetails[room_name]' required=''>
		        	<input class='btn btn-md btn-danger btn-block' type='submit' name='closeroom' id='closeroom' value='Close Room'/>
		        	<br>
		        </form>
	      	</div>
		";
		echo "</div>";
	}
?>