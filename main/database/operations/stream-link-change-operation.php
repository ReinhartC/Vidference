<?php
  if(isset($_POST['linkchange'])){
      include "database/connect.php";
      $query_linkchange = "CALL change_stream_link('$_SESSION[user_name]','$_POST[embed_link]')";
      $sql_linkchange = mysqli_query($db, $query_linkchange);
      $row_linkchange = mysqli_fetch_array($sql_linkchange);
      header("Location:index.php");
      mysqli_close($db);
  }
?>