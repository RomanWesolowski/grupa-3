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
                        session_start();
                        if($_SESSION['zalogowany'])
                          kontakty($_SESSION['id_user'], $dbxx);
                       ?>
                </table>
            </div>
        </div>
    </div>
</aside>

<?php
function kontakty($id_user, $baza)
{
  $zapytanie =
      "SELECT * FROM USER
      WHERE ID_USER IN
        (SELECT za.ID_USER
        FROM ZNAJOMI za
        WHERE za.ID_ZNAJOMY = '".$id_user."')".
      "OR ID_USER IN
  	    (SELECT zb.ID_ZNAJOMY
        FROM ZNAJOMI zb
        WHERE zb.ID_USER ='".$id_user."');";

  $wynik = $baza->query($zapytanie);

  while($friend = mysqli_fetch_assoc($wynik)){
    if($friend['FLAGA']==1){
      echo '<tr>';
      echo '<td style="font-weight: bold;">'.$friend['IMIE'].' '.$friend['NAZWISKO'].'</td>';
      echo '</tr>';
    }
    else {
      echo '<tr>';
      echo '<td style="color : red;">'.$friend['IMIE'].' '.$friend['NAZWISKO'].'</td>';
      echo '</tr>';
    }
  }
}
 ?>
