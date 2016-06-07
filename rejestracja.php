<?php

    session_start();
    if (isset($_POST['nazwisko']))
    if (isset($_POST['email']))

    {
        //Udana walidacja? Załóżmy, że tak!
        $wszystko_OK=true;
        
        //Sprawdź poprawność  imienia
        
        $nick = $_POST['nick'];
        
        //Sprawdzenie długości imienia
        if ((strlen($nick)<3) || (strlen($nick)>20))
        {
            $wszystko_OK=false;
            $_SESSION['e_nick']="Imię musi posiadać od 3 do 20 znaków!";
        }
        $nazwisko = $_POST['nazwisko'];
        //Sprawdzenie długości nazwiska
        if ((strlen($nazwisko)<3) || (strlen($nazwisko)>20))
        {
            $wszystko_OK=false;
            $_SESSION['e_nazwisko']="Nazwisko musi posiadać od 3 do 20 znaków!";
        }
        
        // Sprawdź poprawność adresu email
        $email = $_POST['email'];
        $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
        
        if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
        {
            $wszystko_OK=false;
            $_SESSION['e_email']="Podaj poprawny adres e-mail!";
        }
        
        //Sprawdź poprawność hasła
        $haslo1 = $_POST['haslo1'];
        $haslo2 = $_POST['haslo2'];
        
        if ((strlen($haslo1)<8) || (strlen($haslo1)>20))
        {
            $wszystko_OK=false;
            $_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków!";
        }
        
        if ($haslo1!=$haslo2)
        {
            $wszystko_OK=false;
            $_SESSION['e_haslo']="Podane hasła nie są identyczne!";
        }   

        $haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);
        
        //Czy zaakceptowano regulamin?
        if (!isset($_POST['regulamin']))
        {
            $wszystko_OK=false;
            $_SESSION['e_regulamin']="Potwierdź akceptację regulaminu!";
        }               
   
        
        //Zapamiętaj wprowadzone dane
     
        $_SESSION['fr_nick'] = $nick;
        $_SESSION['fr_nazwisko'] = $nazwisko;
        $_SESSION['fr_email'] = $email;
        $_SESSION['fr_haslo1'] = $haslo1;
        $_SESSION['fr_haslo2'] = $haslo2;
        if (isset($_POST['regulamin'])) $_SESSION['fr_regulamin'] = true;
        
        include ('connect.php');
        mysqli_report(MYSQLI_REPORT_STRICT);
        
        try 
        {
            $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
            if ($polaczenie->connect_errno!=0)
            {
                throw new Exception(mysqli_connect_errno());
            }
            else
            {
                //Czy email już istnieje?
                $rezultat = $polaczenie->query("SELECT ID_USER FROM USER WHERE EMAIL='$email'");
                
                if (!$rezultat) throw new Exception($polaczenie->error);
                
                $ile_takich_maili = $rezultat->num_rows;
                if($ile_takich_maili>0)
                {
                    $wszystko_OK=false;
                    $_SESSION['e_email']="Istnieje już konto przypisane do tego adresu e-mail!";
                }       

                //Czy nazwisko jest już?
                $rezultat = $polaczenie->query("SELECT ID_USER FROM USER WHERE NAZWISKO='$nazwisko'");
                
                if (!$rezultat) throw new Exception($polaczenie->error);
                
                $ile_takich_nazwisk = $rezultat->num_rows;
                if($ile_takich_nazwisk>0)
                {
                    $wszystko_OK=false;
                    $_SESSION['e_nazwisko']="Istnieje już takie nazwisko.";
                }
                
                if ($wszystko_OK==true)
                {
                    //Hurra, wszystkie testy zaliczone, dodajemy do bazy
                    
                    if ($polaczenie->query("INSERT INTO USER VALUES (NULL, '$nick','$nazwisko','$email','$haslo_hash',NULL)"))
                    {
                        $_SESSION['udanarejestracja']=true;
                        header('Location: witamy.php');
                    }
                    else
                    {
                        throw new Exception($polaczenie->error);
                    }
                    
                }
                
                $polaczenie->close();
            }
            
        }
        catch(Exception $e)
        {
            echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
            echo '<br />Informacja developerska: '.$e;
        }
        
    }
    
    
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Gadaczek rejestracja</title>

    
    <style>
        .error
        {
            color:red;
            margin-top: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    
    <section class="center" style="height: 530px;">
        <div class="container">
        <h1>Rejestracja</h1>    
            <form method="post">
                <div class="form-group">
                    <label for="Imie">Imię</label>
                    <input type="text" class="form-control" id="Imie" placeholder="Imie" value="<?php
                        if (isset($_SESSION['fr_nick']))
                        {
                            echo $_SESSION['fr_nick'];
                            unset($_SESSION['fr_nick']);
                        }
                    ?>" name="nick">
                </div>
                
                <?php
                    if (isset($_SESSION['e_nick']))
                    {
                        echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
                        unset($_SESSION['e_nick']);
                    }
                ?>

                <div class="form-group">
                    <label for="exampleInputEmail1">Nazwisko</label>
                    <input type="text" class="form-control" id="Nazwisko" placeholder="Nazwisko"  value="<?php
                            if (isset($_SESSION['fr_nazwisko']))
                            {
                                echo $_SESSION['fr_nazwisko'];
                                unset($_SESSION['fr_nazwisko']);
                            }
                        ?>" name="nazwisko">
                </div>
                <?php
                    if (isset($_SESSION['e_nazwisko']))
                    {
                        echo '<div class="error">'.$_SESSION['e_nazwisko'].'</div>';
                        unset($_SESSION['e_nazwisko']);
                    }
                ?>
                
            
                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="email" class="form-control" id="Email" placeholder="Email" name="email" value="<?php
                            if (isset($_SESSION['fr_email']))
                            {
                                echo $_SESSION['fr_email'];
                                unset($_SESSION['fr_email']);
                            }
                        ?>" name="email">
                </div>   
                <?php
                    if (isset($_SESSION['e_email']))
                    {
                        echo '<div class="error">'.$_SESSION['e_email'].'</div>';
                        unset($_SESSION['e_email']);
                    }
                ?>
                

                <div class="form-group">
                    <label for="Password1">Hasło</label>
                    <input type="password" class="form-control" id="Password1" placeholder="Hasło" value="<?php
                            if (isset($_SESSION['fr_haslo1']))
                            {
                                echo $_SESSION['fr_haslo1'];
                                unset($_SESSION['fr_haslo1']);
                            }
                        ?>" name="haslo1">
                </div>
                <?php
                    if (isset($_SESSION['e_haslo']))
                    {
                        echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
                        unset($_SESSION['e_haslo']);
                    }
                ?>      
                
                <div class="form-group">
                    <label for="Password2">Powtórz Hasło</label>
                    <input type="password" class="form-control" id="Password2" placeholder="Powtórz Hasło" value="<?php
                            if (isset($_SESSION['fr_haslo2']))
                            {
                                echo $_SESSION['fr_haslo2'];
                                unset($_SESSION['fr_haslo2']);
                            }
                        ?>" name="haslo2" >
                </div>        
                        

                <div class="checkbox">
                <label>
                <input type="checkbox"  name="regulamin" <?php
                        if (isset($_SESSION['fr_regulamin']))
                        {
                            echo "checked";
                            unset($_SESSION['fr_regulamin']);
                        }
                            ?>> Akceptuje regulamin
                </label>
                </div>
                <?php
                    if (isset($_SESSION['e_regulamin']))
                    {
                        echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
                        unset($_SESSION['e_regulamin']);
                    }
                ?>  
                
                <input type="submit" class="btn btn-primary" value="Zarejestruj się" />        
            </form>
        </div>
    </section>


</body>
</html>