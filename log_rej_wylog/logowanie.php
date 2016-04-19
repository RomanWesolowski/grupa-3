<?php

if(!empty($_POST['l_password']) && !empty($_POST['l_email'])){

    $email = $_POST['l_email'];
    $password = $_POST['l_password'];

    $email = htmlentities($email, ENT_QUOTES, "UTF-8");
    $password = htmlentities($password, ENT_QUOTES, "UTF-8");
    
    if (empty($_SESSION) && $sql = @$dbxx->query(sprintf("SELECT * FROM USER WHERE EMAIL='%s' AND PASSWORD='%s'",
        mysqli_real_escape_string($dbxx, $email ),
        mysqli_real_escape_string($dbxx, md5($password) )))){
        $ilu_userow = $sql->num_rows;
        if($ilu_userow>0){
            
            session_start(); 
            $sid = session_id();
            
            $_SESSION['zalogowany'] = true;
            
            $person = mysqli_fetch_assoc($sql);
                $id_user = $person['ID_USER'];
                $imie = $person['IMIE'];
                $nazwisko = $person['NAZWISKO'];
                
                $_SESSION['imie'] = $imie;
                $_SESSION['nazwisko'] = $nazwisko;
                $_SESSION['id_user'] = $id_user;
        }
    }
    if($_POST['wylogowany']){
        $_SESSION["zalogowany"] = false;
        $_SESSION["wylogowany"] = true;
    }
}
