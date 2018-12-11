<?php
	$time=strtotime($row_streamdetails['stream_start_time']);
	$stream_start_time = date('l, j-M-Y h:i A',$time);
	if($row_streamdetails[0] == NULL){
		echo "
			<iframe width='100%' height='360' allowtransparency='true' src='elements/iframe.php' frameborder='0'></iframe>
		";
		if($_SESSION['streaming']==1){
			echo "<p>&#8203;</p><strong>Unable to enter </strong>(You are already on a teleconference stream)<p></p>";
		}
		else{
			//JOIN STREAM BUTTON
			echo "
				<p><i>Stream space is currently empty</i></p>
		    	<form role='form' action='#' method='post'>
		        	<input type='hidden' name='stream_space' value='$strm' required=''>
		        	<input class='btn btn-md btn-primary btn-block' type='submit' name='startstream' id='startstream' value='Join'/>
		        </form>
			";
		}
	}
	else{
		//STREAM EMBED
		echo "
			<iframe width='100%' height='360' src='$row_streamdetails[user_stream_link]?autoplay=1' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
		";
		if($_SESSION['user_name']==$row_roomdetails['room_owner'] || $_SESSION['user_name']==$row_streamdetails['stream_owner']){
			//END STREAM BUTTON
			echo"
				<p><strong>Streaming since: </strong>$stream_start_time</p>
				<form role='form' action='#' method='post'>
					<input type='hidden' name='stream_owner' value='$row_streamdetails[stream_owner]' required=''>
		        	<input type='hidden' name='stream_id' value='$row_streamdetails[stream_id]' required=''>
		        	<input class='btn btn-md btn-danger btn-block' type='submit' name='endstream' id='endstream' value='End stream'/>
		        </form>
			";
		}
		else{
			echo"<p>&#8203;</p><p>Streaming since <strong>";
			echo $stream_start_time;
			echo"</strong></p>";
		}
	}
	mysqli_close($db);
?>