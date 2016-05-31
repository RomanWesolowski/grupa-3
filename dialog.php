<article class="col-sm-12 col-md-8">
    <div class="panel panel-primary">
        <div id="imie-rozmowcy" class="panel-heading">Imię rozmówcy</div>
        <div class="panel-body over" id="okno_czatu">
            <!-- Rozmowa Przykład -->
            <div style="text-align: justify;">
                <table class="table message_box">
                    <tbody>
                        <?php echo $_SESSION["dialog"] ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel-footer">
            <form class="form-horizontal" method="post">
                <div class="form-group">
                    <div class="col-xs-12 col-sm-10" style="float:left">
                        <textarea class="form-control" name="inputmsg" id="inputmsg" rows="3"  placeholder="Wiadomość" required></textarea>
                    </div>
                        <button type="submit" id="submit2" class="btn btn-primary btn-lg">Wyślij</button>
                </div>
            </form>
        </div>
    </div>
</article>
