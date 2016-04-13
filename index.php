<?php//<Roman> 
    if($_POST['zalogowany']){
        session_start();
        $_SESSION["zalogowany"] = true;
    } elseif($_POST['wylogowany']){
        $_SESSION["zalogowany"] = false;
        $_SESSION["wylogowany"] = true;
    }
    
    include('msgScript.php');//</Roman>
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Gadaczek</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
</head>
    <body>
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
   
                        <?php /*Roman*/ include('registerModal.php'); ?>
                        
                        <!-- Button to log in -->
                        <button type="button" class="btn btn-primary navbar-btn" data-toggle="modal" data-target="#login">Zaloguj</button>

                        <?php /*Roman*/ include('loginModal.php'); ?>
                        
                        <section class="hide">
                            <!-- Button do profilu użytkownika -->
                            <button type="button" class="btn btn-primary navbar-btn" data-toggle="modal" data-target="#login">Zaloguj</button>
                            
                            <?php /*Roman*/ include('profilModal.php'); ?>
                            
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
                
                <?php /*Roman*/ include('dialog.php'); ?>
                
                <!-- Kontakty Kontakty Kontakty Kontakty Kontakty Kontakty Kontakty Kontakty Kontakty Kontakty Kontakty Kontakty Kontakty Kontakty -->
                <aside class="col-sm-12 col-md-offset-1 col-md-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                            <div class="col-xs-4 col-sm-3 col-md-2 col-lg-3"><h4>Kontakty</h4></div>
                            <div class="col-xs-offset-1 col-xs-7  col-sm-offset-5 col-sm-3 col-md-offset-2 col-md-5 col-lg-offset-2 col-lg-5">
                            <form class="form-inline hidden">
                                <div class="form-group">
                                    <input type="search" class="form-control" id="search" placeholder="Szukaj znajomego">
                                </div>
                            </form>
                            </div>
                            </div>
                        </div>
                        <div class="panel-body over">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <!-- Przykład, obok imienia będą wyświetlały się ilość wiadomości nieprzeczytanych -->
                                        <tr>
                                            <td>Andrzej</td>
                                        </tr>
                                        <tr>
                                            <td>Krystian</td>
                                        </tr>
                                        <tr>
                                            <td>Michał</td>
                                        </tr>
                                        <tr>
                                            <td>Roman</td>
                                        </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </aside>
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
