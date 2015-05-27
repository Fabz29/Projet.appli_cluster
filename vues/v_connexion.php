<div class="container"> <!-- début du formulaire de connexion -->
    <div class="row">
        <div class="col-md-offset-4 col-md-4">
            <form action="index.php?url=connexion&action=valideConnexion" method="post">
                <div id="information">
                    <h4 class="text-center login-title">Authentification</h4>
                </div>
                <input autofocus type="text" id="login" name="login" class="form-control" placeholder="identifiant">
                <br>
                <input type="password" id="mdp" name="mdp" class="form-control" placeholder="mot de passe">
                <br>
                <input class="btn btn-lg btn-primary btn-block" type="submit" value="Valider" name="valider">
            </form>
        </div>
    </div>
</div> <!-- fin du formulaire de connexion -->