<?php
  require('connect.php');
  $dbxx = connect_db();

  $sql = @$dbxx->query(sprintf(
      "SELECT IMIE FROM USER
      WHERE ID_USER IN
        (SELECT za.ID_USER
        FROM ZNAJOMI za
        WHERE za.ID_ZNAJOMY = '3')
      OR ID_USER IN
	      (SELECT zb.ID_ZNAJOMY
        FROM ZNAJOMI zb
        WHERE zb.ID_USER = '3')"//,
    //  mysqli_real_escape_string($dbxx, $_SESSION["id_user"]),
    //  mysqli_real_escape_string($dbxx, $_SESSION["id_user"])
    ));

      $ilu_userow = $sql->num_rows;
      while($ilu_userow>0){
              $friend = mysqli_fetch_assoc($sql);
              echo "$friend";
      }
 ?>
