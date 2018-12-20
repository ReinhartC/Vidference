<?php
    include 'database/connect.php';
    $query_modrequestlist = "CALL mod_request_list('$_SESSION[room_name]')";
    $sql_modrequestlist = mysqli_query($db, $query_modrequestlist) or die("Query fail : ".mysqli_error($db));
    $roomArray = array();
    while($row_modrequestlist = mysqli_fetch_assoc($sql_modrequestlist)){
       	echo "
            <a class='btn btn-app' data-toggle='modal' data-target='#mod-request-details-modal' data-requestuser='$row_modrequestlist[request_user]'> <i class='fa fa-user'></i> <span>$row_modrequestlist[request_user]</span>
                </a>
        ";
    }
?>