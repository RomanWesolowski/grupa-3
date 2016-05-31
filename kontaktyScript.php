<?php
session_start();

if($_SESSION['zalogowany']){
  kontakty($_SESSION['ID_USER']);
}

function kontakty($id_user)
{
  require_once('connect.php');
  $zapytanie =
      "SELECT * FROM USER
      WHERE ID_USER IN
        (SELECT za.ID_USER
        FROM ZNAJOMI za
        WHERE za.ID_USER2 = '".$id_user."')".
      "OR ID_USER IN
  	    (SELECT zb.ID_USER2
        FROM ZNAJOMI zb
        WHERE zb.ID_USER ='".$id_user."');";


  $baza = connect_db();
  $wynik = $baza->query($zapytanie);

  while($friend = mysqli_fetch_assoc($wynik)){
    if($friend['FLAGA']==1){
      echo '<tr>';
      echo '<td style="font-weight: bold;">'.$friend['IMIE'].' '.$friend['NAZWISKO'].'</td>';
      echo '</tr>';
    }
    else {
      echo '<tr>';
      echo '<td style="color : red;">'.$friend['IMIE'].' '.$friend['NAZWISKO'].'</td>';
      echo '</tr>';
    }
  }
}
?>
