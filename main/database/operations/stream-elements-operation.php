<?php
	//var_dump($row_streamdetails);
	if($row_streamdetails[0] == NULL){
		echo "
			<iframe width='100%' height='360' allowtransparency='true' style='background: #505050;' frameborder='0'></iframe>
		";
		if($_SESSION['streaming']==1){
			echo "Unable to enter<br><i>(You are already on a teleconference stream)</i>";
		}
		else{
			//JOIN STREAM BUTTON
			echo "
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
				<form role='form' action='#' method='post'>
					<input type='hidden' name='stream_owner' value='$row_streamdetails[stream_owner]' required=''>
		        	<input type='hidden' name='stream_id' value='$row_streamdetails[stream_id]' required=''>
		        	<input class='btn btn-md btn-danger btn-block' type='submit' name='endstream' id='endstream' value='End stream'/>
		        </form>
			";
		}
	}
	mysqli_close($db);
?>