<div class="col-sm-2"> <!-- taille 2 colone -->
	<nav class="nav-sidebar"> <!-- début du menu -->
		<h5 class="text-center"><i class="glyphicon glyphicon-user"></i> <?php echo $idUtilisateur ?></h5> <!-- affichage du login -->
		<ul class="nav">
			<li>
				<a href="index.php?url=cluster" data-toggle="tooltip" data-placement="right" title="Revenir à l'accueil">
					<i class="glyphicon glyphicon-home"></i> Accueil
				</a>
			</li>
			<li>
				<a href="index.php?url=cluster&action=calculEnCours" data-toggle="tooltip" data-placement="right" title="Consulter vos calculs en cours">
					<i class="glyphicon glyphicon-dashboard"></i> Mon calcul
				</a>
			</li>
			<li>
				<a href="http://www.lem3.fr/cluster" target="_blank" data-toggle="tooltip" data-placement="right" title="Site du cluster">
					<i class="glyphicon glyphicon-question-sign"></i> A propos
				</a>
			</li>
			<li>
				<a href="http://www.lem3.fr/cluster/#section11" target="_blank" data-toggle="tooltip" data-placement="right" title="Formulaire à remplir en cas de réclamation">
					<i class="glyphicon glyphicon-send"></i> Contact
				</a>
			</li>
			<li>
				<a href="index.php?url=informations" data-toggle="tooltip" data-placement="right" title="Information supplémentaire sur l'interface">
					<i class="glyphicon glyphicon-info-sign"></i> Informations
				</a>
			</li>
			<li class="nav-divider"></li>
			<li>
				<a href="#" data-toggle="modal" data-target="#deconnexion" data-toggle="tooltip" data-placement="right" title="Se déconnecter"> <!-- lien de déconnexion -->
					<i class="glyphicon glyphicon-off"></i> Déconnexion
				</a>
				<div class="modal" id="deconnexion" align="center"> <!-- pop-up de confirmation -->
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel">Confirmation</h4>
							</div>
							<div class="modal-body">
								Vous pourrez toujours revenir consulter l'avancement de vos calculs.
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Retour</button>
								<a href="index.php?url=connexion&action=deconnexion" type="button" class="btn btn-primary">Déconnecter</a>
							</div>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</nav>
</div> <!-- fin du menu -->