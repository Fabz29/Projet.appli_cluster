<div class="col-sm-5"> <!-- début du formulaire d'upload de fichier : taille 5-->
    <div class="panel panel-default">
        <div class="panel-body form-horizontal">
            <form action="index.php?url=cluster&action=upload" method="post" enctype="multipart/form-data">
                <legend>Envoyer votre fichier</legend>
                <input type="hidden" name="MAX_FILE_SIZE" value="1073741824"/>
                <input type="file" name="fichier" id="ficher" class="btn btn-default" required>
                <p class="help-block">Sélectionner un fichier de type .inp</p>
                <div class="pull-right">
                    <button type="submit" name="upload" id="upload" class="btn btn-success">
                        <i class="glyphicon glyphicon-download-alt"></i> Envoyer
                    </button>
                    <button type="reset" name="annuler" id="annuler" value="Annuler" class="btn btn-default">
                        <i class="glyphicon glyphicon-repeat"></i> Annuler
                    </button>
                </div>
            </form>
        </div>
    </div>
</div> <!-- fin du formulaire d'upload de fichier -->
<div class="col-sm-5">
    <div id="information">
        <div class="blockquote-box blockquote-success clearfix">
            <div class="square pull-left">
                <span class="glyphicon glyphicon-flag glyphicon-lg"/>
            </div>
            <h4>Etape 1</h4>
            <p>
             Envoyé votre fichier de calcul .inp<br>
             Ensuite un formulaire devra être renseigné.
         </p>
     </div>
 </div>
</div>