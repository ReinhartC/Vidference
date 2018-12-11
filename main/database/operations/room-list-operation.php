<?php
    include 'database/connect.php';
    $query_roomlist = "CALL room_list()";
    $sql_roomlist = mysqli_query($db, $query_roomlist) or die("Query fail : ".mysqli_error($db));
    $roomArray = array();
    while($row_roomlist = mysqli_fetch_assoc($sql_roomlist)){
        if($row_roomlist['room_type']=='Public')
            echo"
            	<button class='btn btn-app' type='submit' name='joinroom' id='joinroom' value='$row_roomlist[room_name]'>
    	        	<i class='fa fa-users'></i> $row_roomlist[room_name]
    	        </button>	
            ";
        else if ($row_roomlist['room_type']=='Private')
            echo"
                <a class='btn btn-app' data-toggle='modal' data-target='#room-password-modal' data-roomname='$row_roomlist[room_name]'>
                    <i class='fa fa-users'></i> <span>$row_roomlist[room_name] <i class='fa fa-lock'></i></span>
                </a>
            ";
    }
?>