<?php
  require('connect.php');
  $baza = connect_db();

  $id_test_user = 3;
  $zapytanie =
      "SELECT IMIE, NAZWISKO FROM USER
      WHERE ID_USER IN
        (SELECT za.ID_USER
        FROM ZNAJOMI za
        WHERE za.ID_ZNAJOMY = '".$id_test_user."')".
      "OR ID_USER IN
  	    (SELECT zb.ID_ZNAJOMY
        FROM ZNAJOMI zb
        WHERE zb.ID_USER ='".$id_test_user."');";

  $wynik = $baza->query($zapytanie);

  $ilu_znajomych = $wynik->num_rows;

  while($friend = mysqli_fetch_assoc($wynik)){
      echo '<tr>';
      echo '<td>'.$friend['IMIE'].'</td>';
      echo '</tr>';
  }
 ?>
