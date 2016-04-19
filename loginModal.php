<!-- Log in -->
<section class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="log">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <header class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="log">Logowanie</h4>
            </header>
            <div class="modal-body">
                <form method="post">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="l_email" name="l_email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Hasło</label>
                        <input type="password" class="form-control" id="l_password" name="l_password" required>
                        <button type="submit" id="submit" class="btn btn-primary">Zaloguj</button> 
                        <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
                        <?php
                            if(isset($_SESSION['blad'])) echo $_SESSION['blad'];
                        ?>  
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

