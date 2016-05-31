<aside class="col-sm-12 col-md-offset-1 col-md-3">
  <div class="panel panel-primary">
      <div class="panel-heading">
          <div class="row">
          <div class="col-xs-4 col-sm-3 col-md-2 col-lg-3"><h4>Kontakty</h4></div>
          <div class="col-xs-offset-1 col-xs-7  col-sm-offset-5 col-sm-3 col-md-offset-2 col-md-5 col-lg-offset-2 col-lg-5">
          </div>
          </div>

          <div class="row" style="color:black">
            <!-- Button trigger modal -->
            <button type="button" class="btn" data-toggle="modal" data-target="#modalDodawanieZnajomego">
              Dodaj
            </button>

            <!-- Modal -->
            <div class="modal fade" id="modalDodawanieZnajomego" tabindex="-1" role="dialog" aria-labelledby="modalDodawanieZnajomegoLabel" aria-hidden="true">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modalDodawanieZnajomegoLabel">Dodawanie znajomego</h4>
                  </div>
                  <div class="modal-body">
                    <form role="form">
                      <div class="form-group">
                        <label for="email">Email znajomego:</label>
                        <input type="email" class="form-control" id="emailZnajomego" placeholder="Enter email">
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button id="#btnDodajZnajomego" type="button" onclick='dz()' class="btn btn-primary btn-sm">Dodaj</button>
                    <button type="button" class="closeBtn" onclick='' data-dismiss="modal">Zamknij</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Button trigger modal -->
            <button type="button" class="btn" data-toggle="modal" data-target="#modalUsuwanieZnajomego">
              Usun
            </button>

            <!-- Modal -->
            <div class="modal fade" id="modalUsuwanieZnajomego" tabindex="-1" role="dialog" aria-labelledby="modalUsuwanieZnajomegoLabel" aria-hidden="true">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modalUsuwanieZnajomegoLabel">Usuwanie znajomego</h4>
                  </div>
                  <div class="modal-body">

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btnUsunZnajomego" onclick=''>Usun</button>
                    <button type="button" class="closeBtn" onclick='' data-dismiss="modal">Zamknij</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>

      <div class="panel-body over">
          <div class="table-responsive">
              <table id="friends-list" class="table table-hover">
                  <!-- Przykład, obok imienia będą wyświetlały się ilość wiadomości nieprzeczytanych -->

              </table>
          </div>
      </div>
  </div>
</aside>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script>
  $(document).ready(
    setInterval(function(){
      $("#friends-list").load("kontaktyScript.php");
    }
    ,1000)
  );

function dz(){
  var email = $("#emailZnajomego").val();

  $.ajax({
    type: "POST",
    url: "kontaktyScript.php",
    data: { email1 : email },
    cache: false,
    success: function(result){
      alert(email);
    }
  });
};
</script>
