<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Gadaczek</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <script>
        function setScrollBottom()
        {
            var scrolledDiv = document.getElementById('okno_czatu');
            scrolledDiv.scrollTop = scrolledDiv.scrollHeight;
        }
    </script>
</head>

<?php
    //Sprawdzanie czy uzytkownik ma nazwiazana sesje
    require('php/session.php');
?>

    <body onload="setScrollBottom();">

        <nav class="navbar navbar-inverse">
            <!--- zmiana testowaa -->
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Gadaczek</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <div class="nav navbar-nav navbar-right">
                        <!-- Przy zalogowanym użytkowniku będzie widać tylko nazwa i wyloguj w postaci button'ów -->

                        <!-- Button to register -->
                        <button type="button" class="btn btn-default navbar-btn" data-toggle="modal" data-target="#reg">Zarejestruj</button>

                        <?php /*Roman*/ include('php/registerModal.php'); ?>

                        <!-- Button to log in -->
                        <button type="button" class="btn btn-primary navbar-btn" data-toggle="modal" data-target="#login">Zaloguj</button>

                        <?php /*Roman*/ include('php/loginModal.php'); ?>

                        <section class="hide">
                            <!-- Button do profilu użytkownika -->
                            <button type="button" class="btn btn-primary navbar-btn" data-toggle="modal" data-target="#login">Zaloguj</button>

                            <?php /*Roman*/ include('php/profilModal.php'); ?>

                            <!-- Button to logout -->
                            <button type="button" class="btn btn-primary navbar-btn">Wyloguj</button>
                        </section>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Rozmowa Rozmowa Rozmowa Rozmowa Rozmowa Rozmowa Rozmowa Rozmowa Rozmowa Rozmowa Rozmowa Rozmowa Rozmowa Rozmowa -->
        <div class="container">
            <section class="row">

                <?php /*Roman*/ include('php/dialog.php'); ?>

                <!-- Kontakty Kontakty Kontakty Kontakty Kontakty Kontakty Kontakty Kontakty Kontakty Kontakty Kontakty Kontakty Kontakty Kontakty -->
                <?php /*Roman*/ include('php/kontakty.php'); ?>

                <footer class="col-md-12">
            <div class="container text-center" style="color: #FFF">
                <hr>
                <script type="text/javascript">
                    var d = new Date();
                    var n = d.getFullYear();
                    document.write("All rights reserved Gadaczek &copy; "+n);
                </script>
            </div>
            <div><br /></div>
        </footer>
            </section>
        </div>



        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <script>
            document.getElementById('bmone2n-1276.1.1.1').id = "reklama";
            document.getElementById('bmone2t-1276.1.1.1').id = "reklama";
        </script>

    </body>
</html>
