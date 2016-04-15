<?php
session_start();

if($_SESSION['zalogowany']){
    $imie = $_SESSION['imie'];
    $password = $_SESSION['password'];
    
    /* ustawienie flagi */
    $query = @$dbxx->query(sprintf("UPDATE USER SET FLAGA=1 WHERE IMIE='%s' AND PASSWORD='%s'", 
            mysqli_real_escape_string($dbxx, $imie),
            mysqli_real_escape_string($dbxx, $password)));
    
    if(!empty($_POST['inputmsg'])){
        $godzina = date('H:i:s');
        $wiadomosc = $_POST['inputmsg'];

        $_SESSION["dialog"] .= "<tr>"
            . "<td><h5>$imie<br /><small>$godzina</small></h5></td><td>$wiadomosc</td>"
            . "</tr>";
    }
}else if($_SESSION["wylogowany"]){
    unset($_REQUEST);
    session_destroy();
}

