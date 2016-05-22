<aside class="col-sm-12 col-md-offset-1 col-md-3">
  <div class="panel panel-primary">
      <div class="panel-heading">
          <div class="row">
          <div class="col-xs-4 col-sm-3 col-md-2 col-lg-3"><h4>Kontakty</h4></div>
          <div class="col-xs-offset-1 col-xs-7  col-sm-offset-5 col-sm-3 col-md-offset-2 col-md-5 col-lg-offset-2 col-lg-5">
          </div>
          </div>

          <div class="row">
            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-default navbar-btn btn-sm" data-toggle="modal" data-target="#modalDodajZnajomy">Dodaj</button>

            <!-- Modal -->
            <div id="modalDodajZnajomy" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                  </div>
                  <div class="modal-body">
                    <p>Some text in the modal.</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>

              </div>
            </div>

            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-default navbar-btn btn-sm" data-toggle="modal" data-target="#modalUsunZnajomy">Usun</button>

            <!-- Modal -->
            <div id="modalUsunZnajomy" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                  </div>
                  <div class="modal-body">
                    <p>Some text in the modal.</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
</script>
