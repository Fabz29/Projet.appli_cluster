<?php
/** 
 * Contrôleur de connexion au site
 * gére l'affichage du formulaire de calcul
 * la redirection en cas de connexion valide
 * l'enregistrement de la session et dans la bdd
 
 * @author Fabien ZANETTI
 * @version    1.0
 */
if(!isset($_GET['action'])){ // par défaut on renvoit la page de login
	$_GET['action'] = 'demandeConnexion';
}
$action = $_GET['action'];
switch($action){
	case 'demandeConnexion':{
		include("vues/v_connexion.php");
		break;
	}
	case 'valideConnexion':{ // l'utilisateur a renseigné son login et mdp
		if(isset($_POST['login']) || isset($_POST['mdp']))
		{
			$login = htmlspecialchars($_POST['login']);
			$mdp = htmlspecialchars($_POST['mdp']);

			if(empty($login) || empty($mdp)){
				ajouterErreur("Login ou mot de passe incomplet <br />");
				include("vues/v_erreurs.php");
				include("vues/v_connexion.php");
			}
			else{
				$login = strtolower($login); // changer tous les caractères du login en minuscule
				sleep(1); // attends 1 sec afin de ralentir les attaques brute force
			// information de  connexion au serveur ldap
				$serverLDAP = '10.0.0.51';
				$portLDAP = '389';
				$dn = 'cn='.$login.',cn=lem3,ou=recherche,dc=lpmm,dc=fr';
			// connection au LDAP
				$connexionLDAP = ldap_connect($serverLDAP, $portLDAP);
				ldap_set_option($connexionLDAP, LDAP_OPT_PROTOCOL_VERSION, 3); // on paramètre le LDAP avec la version 3
			// Vérification champs renseignés
				if($connexionLDAP){ // Connexion effectuée
					if(@ldap_bind($connexionLDAP, $dn, $mdp)){ // Recherche de l'utilisateur
						connecter($login, $mdp); // enregistre la session avec son login
						$estEnregistrer = $pdo->estEnregistrer($login); // on vérifie que l'utilisateur est enregistré
						if (!$estEnregistrer){ // l'utilisateur n'est pas enregistré
							$pdo->setInfosUtilisateur($login, $mdp); // on enregistre l'utilisateur
						}
						?><script>document.location.href="index.php?url=cluster"</script><?php // on fait une redirection vers la page principale
					}
					else{
						ajouterErreur("Identifiant ou mot de passe invalide");
						ajouterErreur("Veillez à être enregistré au-près de votre service informatique");
						include("vues/v_erreurs.php");
						include("vues/v_connexion.php");
					}
				}
				else{
					ajouterErreur("Impossible de se connecter au serveur LDAP");
					ajouterErreur("Contacter votre service informatique");
					include("vues/v_erreurs.php");
					include("vues/v_connexion.php");
				}
				ldap_close($connexionLDAP); // on ferme la connexion au LDAP
			}
		}
		break;
	}
	case 'deconnexion':{
		deconnexion();
		include ('vues/v_connexion.php');
		break;
	}
	default :{
		include("vues/v_connexion.php");
		break;
	}
}
?>