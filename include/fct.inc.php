<?php
/** 
 * Fonctions pour l'application du cluster de calcul LEM3
 
 * @author Fabien ZANETTI
 * @version    1.0
 */
 /**
 * Teste si un quelconque visiteur est connecté
 * @return vrai ou faux 
 */
 function estConnecte(){
 	return isset($_SESSION['idUtilisateur']);
 }
/**
 * Enregistre dans une variable session les infos d'un utilisateur
 
 * @param $id 
 */
function connecter($id, $mdp){
	$_SESSION['idUtilisateur']= $id; 
	$_SESSION['mdpUtilisateur']= $mdp;
}

/**
* Fonction de déconnexion qui détruit la session

*/
function deconnexion(){
	session_destroy();
}

/**
 * Ajoute le libellé d'une erreur au tableau des erreurs 
 
 * @param $msg : le libellé de l'erreur 
 */
function ajouterErreur($msg){
	if (! isset($_GET['erreurs'])){
		$_GET['erreurs']=array();
	} 
	$_GET['erreurs'][]=$msg;
}
/**
 * Retoune le nombre de lignes du tableau des erreurs 
 
 * @return le nombre d'erreurs
 */
function nbErreurs(){
	if (!isset($_REQUEST['erreurs'])){
		return 0;
	}
	else{
		return count($_REQUEST['erreurs']);
	}
}

?>