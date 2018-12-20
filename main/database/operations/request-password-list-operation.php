<?php
    include 'database/connect.php';
    $query_requestlist = "CALL request_password_list('$_SESSION[user_name]')";
    $sql_requestlist = mysqli_query($db, $query_requestlist) or die("Query fail : ".mysqli_error($db));
    $roomArray = array();
    while($row_requestlist = mysqli_fetch_assoc($sql_requestlist)){
        if($row_requestlist['request_status']==0)
        	echo "
                <a class='btn btn-app' data-toggle='modal' data-target='#request-password-waiting-modal' data-requestroom='$row_requestlist[request_room]'> <i class='fa fa-clock-o'></i> 
            ";
        else if($row_requestlist['request_status']==1){
            $roompass=hex2bin($row_requestlist['request_password']);
        	echo "
                <a class='btn btn-app' data-toggle='modal' data-target='#request-password-accepted-modal' data-requestroom='$row_requestlist[request_room]' data-roompassword='$roompass'> <i class='fa fa-check' style='color:green;'></i> 
            ";
        }
        else if($row_requestlist['request_status']==2)
        	echo "
                <a class='btn btn-app' data-toggle='modal' data-target='#request-password-declined-modal' data-requestroom='$row_requestlist[request_room]'> <i class='fa fa-times' style='color:maroon;'></i>
            ";
        echo"
        		  <span>$row_requestlist[request_room]</span>
                </a>
        ";
    }
?>