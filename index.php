<?php

    session_start();

    if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
    {
        header('Location: komunikator.php');
        exit();
    }

?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
    <title>Gadaczek</title>
</head>

<body>
    <section class="center" style="height: 450px;">
        <div class="container">
            <div class="col-sm-7">
                <h1>Gadaczek </h1>
                <form action="zaloguj.php" method="post">
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" class="form-control" id="Email" placeholder="Email" name="login">
                    </div>
                    <div class="form-group">
                        <label for="Password">Hasło</label>
                        <input type="password" class="form-control" id="Password" placeholder="Hasło" name="haslo">
                    </div>
                    <button type="submit" class="btn btn-primary">Zaloguj</button>
                </form>
            </div>
            <div class="col-sm-5">
                <h1>Nie masz konta? Załóż je już teraz!</h1>
                <div style="margin-top: 35px; margin-left: 25%;"><a href="rejestracja.php"><button class="btn btn-lg btn-primary">Zarejestruj się</button></a>
            </div>
            <?php
                if(isset($_SESSION['blad']))    echo $_SESSION['blad'];
            ?>
        </div>
    </section>
    <footer style="bottom: 0px; position: fixed; width: 100%; padding-bottom: 15px; background-color: #222; margin-top: 80px;">
        <div class="container text-center">
            <hr />
            <script type="text/javascript">
               var d = new Date();
               var n = d.getFullYear();
               document.write("All rights reserved Gadaczek &copy;" +n)
            </script>
        </div>
   </footer>
</body>
</html>
