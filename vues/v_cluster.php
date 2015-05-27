<form method="post" action="index.php?url=cluster&action=validerCalcul">
    <div class="col-sm-5"> <!-- début du fomulaire taille : 5 -->
        <div class="panel panel-default">
            <div class="panel-body form-horizontal">
                <legend>Formulaire à remplir</legend>
                <div class="form-group" data-toggle="tooltip" data-placement="right" title="Indiquer votre email pour être contacter lors de la fin du calcul">
                    <label class="col-sm-4 control-label">Email</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="mail" name="mail" required>
                    </div>
                </div>
                <div class="form-group" data-toggle="tooltip" data-placement="right" title="Determine sur quel logiciels le calcul sera produit">
                    <label class="col-sm-4 control-label">Logiciels</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="logiciel" name="logiciel">
                            <option>Abaqus - 6.7</option>
                            <option>Abaqus - 6.10</option>
                            <option>Abaqus - 6.11</option>
                            <option>Matlab</option>
                            <option>Executable</option>
                        </select>
                    </div>
                </div>
                <div class="form-group" data-toggle="tooltip" data-placement="right" title="Détermine la puissance totale">
                    <label class="col-sm-4 control-label">Nombre de machines</label>
                    <div class="col-sm-8">
                        <div class="range range-primary">
                            <input type="range" name="nbMachine" id="nbMachine" min="1" max="8" value="1" onchange="rangePrimary.value=value">
                            <output id="rangePrimary">1</output>
                        </div>
                    </div>
                </div>
                <div class="form-group" data-toggle="tooltip" data-placement="right" title="Détermine la puissance par machines">
                    <label class="col-sm-4 control-label">Nombre de coeurs</label>
                    <div class="col-sm-8">
                        <div class="range range-primary">
                            <input type="range" name="nbCore" id="nbCore" min="1" max="8" value="1" onchange="rangePrimary2.value=value">
                            <output id="rangePrimary2">1</output>
                            <!-- <input type="checkbox" id="12coeur" name="12coeur" value="12" onchange="rangePrimary2.value=value"> 12 coeurs -->
                        </div>
                    </div>
                </div>
                <div class="form-group" data-toggle="tooltip" data-placement="right" title="Indiquer le nombre d'heure où le calcul se stopera">
                    <label class="col-sm-4 control-label">Temps de calcul (en heure)</label>
                    <div class="col-sm-8">
                        <input type="number" name="nbTime" id="nbTime" min="1" max="20000" step="5" value="1">
                        <p class="help-block">Indiquer un nombre entier</p>
                    </div>
                </div>  
                <div class="pull-right">
                    <button type="submit" name="envoyer" id="envoyer" class="btn btn-success">
                        <i class="glyphicon glyphicon-ok"></i> Valider
                    </button>
                    <a href="index.php?url=cluster&action=retourCalcul" type="button" name="annuler" id="annuler" value="Annuler" class="btn btn-default">
                        <i class="glyphicon glyphicon-repeat"></i> Annuler
                    </a>
                </div>
            </div>
        </div>
    </div> <!-- fin du formulaire -->
</form>
<div class="col-sm-5">
    <div id="information">
        <div class="blockquote-box blockquote-success clearfix">
            <div class="square pull-left">
                <span class="glyphicon glyphicon-flag glyphicon-lg"/>
            </div>
            <h4>Etape 2</h4>
            <p>
             Votre fichier est bien enregistré !<br>
             Renseigner ce formulaire pour terminer votre envoit de calcul au cluster.
         </p>
     </div>
     <div class="blockquote-box blockquote-warning clearfix">
        <div class="square pull-left">
            <span class="glyphicon glyphicon-warning-sign glyphicon-lg"></span>
        </div>
        <h4>Attention</h4>
        <p>
            Terminer de remplir ce formulaire avant de vous déconnecter. Dans le cas contraire, vous devrez reprendre tout à zéro.
        </p>
    </div>
</div>
</div>