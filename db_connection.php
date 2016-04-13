<?php
  function db_connection()
  {
    $adres = 'mysql.cba.pl:3306';
    $login = 'romanwdb';
    $haslo = 'komunikator123';
    $bd = 'romanwesolowski_cba_pl';

    $polaczenie = mysql_connect($adres, $login, $haslo);
      if (!$polaczenie) {
        die('Could not connect: ' . mysql_error());
      }
      //echo 'Connected successfully';

      if(!(mysql_select_db($bd))){
        die('Could not connect to db' . mysql_error());
      }
      //echo 'Connected successfully to db';
      
      $polaczenie->autocommit(TRUE);
      return $polaczenie;
  }
