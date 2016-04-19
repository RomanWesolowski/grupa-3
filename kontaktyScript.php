<?php
  include("connection.php");

  $id_test_user = 3;

  $zapytanie =
      "SELECT IMIE FROM USER
      WHERE ID_USER IN
        (SELECT za.ID_USER
        FROM ZNAJOMI za
        WHERE za.ID_ZNAJOMY = '".$id_test_user."')".
      "OR ID_USER IN
  	    (SELECT zb.ID_ZNAJOMY
        FROM ZNAJOMI zb
        WHERE zb.ID_USER ='".$id_test_user."');";

  $wynik = db_connection($zapytanie);

  while($wiersz = mysql_fetch_array($wynik)){
    echo $wiersz['IMIE'];
    echo 'petla';
  }
 ?>
