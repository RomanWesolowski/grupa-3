<?php
session_start();

if($_SESSION['zalogowany']){
    /* ustawienie flagi */
    if($query = @$dbxx->query(sprintf("UPDATE USER SET FLAGA=true WHERE EMAIL='%s' AND PASSWORD='%s'",
            mysqli_real_escape_string($dbxx, $email),
            mysqli_real_escape_string($dbxx, $password)))){
    }else{
    }

    if(!empty($_POST['inputmsg'])){
        $godzina = date('H:i:s');
        $wiadomosc = $_POST['inputmsg'];
        $imie = $_SESSION['imie'];

        $_SESSION["dialog"] .= "<tr>"
            . "<td><h5>$imie<br /><small>$godzina</small></h5></td><td>$wiadomosc</td>"
            . "</tr>";
        header("Location:komunikator.php"); 
    }
}else if($_SESSION["wylogowany"]){
    unset($_REQUEST);
    session_destroy();
}
