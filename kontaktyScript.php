<?php
  require('connect.php');
  $baza = connect_db();

  $id_test_user = 3;
  $wynik = @$baza->query(sprintf(
      "SELECT IMIE FROM USER
      WHERE ID_USER IN
        (SELECT za.ID_USER
        FROM ZNAJOMI za
        WHERE za.ID_ZNAJOMY = '%d')
      OR ID_USER IN
	      (SELECT zb.ID_ZNAJOMY
        FROM ZNAJOMI zb
        WHERE zb.ID_USER = '%d')",
        $id_test_user, $id_test_user
    ));

  $ilu_userow = $wynik->num_rows;
  while($ilu_userow>0){
    $friend = mysqli_fetch_assoc($wynik);
    echo "$friend";
  }
 ?>
