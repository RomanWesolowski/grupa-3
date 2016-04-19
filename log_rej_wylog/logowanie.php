<?php

if(!empty($_POST['l_password']) && !empty($_POST['l_email'])){

    $email = $_POST['l_email'];
    $password = $_POST['l_password'];

    $email = htmlentities($email, ENT_QUOTES, "UTF-8");
    $password = htmlentities($password, ENT_QUOTES, "UTF-8");
    
    if (empty($_SESSION) && $sql = @$dbxx->query(sprintf("SELECT * FROM USER WHERE EMAIL='%s' AND PASSWORD='%s'",
        mysqli_real_escape_string($dbxx, $email),
        mysqli_real_escape_string($dbxx, $password)))){
        $ilu_userow = $sql->num_rows;
        if($ilu_userow>0){
            
            session_start(); 
            $sid = session_id();
            
            $_SESSION['zalogowany'] = true;
            
            $person = mysqli_fetch_assoc($sql);
                $id_user = $person['ID_USER'];
                $imie = $person['IMIE'];
                $nazwisko = $person['NAZWISKO'];
                $email = $person['email'];
                $password = $person['password'];
                
                $_SESSION['imie'] = $imie;
                $_SESSION['nazwisko'] = $nazwisko;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $_SESSION['id_user'] = $id_user;
                
                /* z SESSION mamy:
                 * zalogowany
                 * id_user
                 * imie
                 * nazwisko
                 * email
                 * dialog - tu jest cala rozmowa
                 */
            
                /* z POST mamy:
                 * l_email
                 * l_password
                 */
            
                 /* zmienne:
                  * $sid - tu jest id sesji
                  */
            
        }
    }
    if($_POST['wylogowany']){
        $_SESSION["zalogowany"] = false;
        $_SESSION["wylogowany"] = true;
    }
}
