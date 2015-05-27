<div class="col-sm-7 col-sm-offset-1">
    <div align="center">
        <div class="text">Calcul en cours...</div>
        <br>
        <br>
        <br>
        <div class="spinner">
            <div class="wBall" id="wBall_1">
                <div class="wInnerBall">
                </div>
            </div>
            <div class="wBall" id="wBall_2">
                <div class="wInnerBall">
                </div>
            </div>
            <div class="wBall" id="wBall_3">
                <div class="wInnerBall">
                </div>
            </div>
            <div class="wBall" id="wBall_4">
                <div class="wInnerBall">
                </div>
            </div>
            <div class="wBall" id="wBall_5">
                <div class="wInnerBall">
                </div>
            </div>
        </div>
        <br>
        <br>
        <div id="information">
            <div id="donnee"></div> <!-- cette div sera remplacer par les données rentrer dans le formulaire (voir script.js) -->
        </div>
        <br>
        <button class="btn btn-danger" data-toggle="modal" data-target="#annulation">
            <i class="glyphicon glyphicon-remove"></i></i> Stop
        </button>
        <a href="index.php?url=cluster&action=finCalcul"  type="button" class="btn btn-primary">
            <i class="glyphicon glyphicon-remove"></i></i> Simuler la fin du calcul
        </a>
        <div class="modal" id="annulation"> <!-- pop-up de confirmation -->
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><strong>Attention !</strong></h4>
                    </div>
                    <div class="modal-body">
                        Est-vous sûr de vouloir arréter votre calcul ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Retour</button>
                        <a href="index.php?url=cluster&action=annulCalcul" type="button" class="btn btn-danger" id="stop" name="stop">Confirmer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>