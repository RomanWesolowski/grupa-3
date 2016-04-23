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
                      <?php
                        require('kontaktyScript.php');
                        wyswietl_znajomych($_SESSION['id_user']);
                       ?>
                </table>
            </div>
        </div>
    </div>
</aside>
