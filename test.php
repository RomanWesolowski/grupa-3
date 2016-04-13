<!DOCTYPE html>
<html>
<head>
  <title>testowa</title>
</head>
<body>

  <?php
    include("db_connection.php");
    $zapytanie = 'SELECT * FROM USER';

    $wynik = db_connection($zapytanie);

    while($wiersz = mysql_fetch_array($wynik)){
      echo $wiersz['IMIE'] . " " . $wiersz['NAZWISKO'];
      echo 'petla';
    }
  ?>

</body>
</html>
