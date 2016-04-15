<?php

/*
w logowaniu 
 * nawiazanie polaczenia z BD: 
 * $dbxx
 * 
 * w POST: 
 * $imie
 * $password
 * 
 * $_SESSION["zalogowany"]
 *  */

if($_SESSION["zalogowany"]){
    /* ustawienie flagi */
    $query = @$dbxx->query(sprintf("UPDATE USER SET FLAGA=1 WHERE IMIE='%s' AND PASSWORD='%s'", 
            mysqli_real_escape_string($dbxx, $imie),
            mysqli_real_escape_string($dbxx, $password)));
    
    $godzina = date('H:i');
    $wiadomosc = $_POST["inputmsg"];
    $_SESSION["dialog"] .= "<tr>"
            . "<td><h5>$imie <br /><small>$godzina</small></h5></td><td>$wiadomosc</td>"
            . "</tr>";
        
}elseif($_SESSION["wylogowany"]){
    unset($imie, $nazwisko, $password, $message);
    session_destroy();
}

