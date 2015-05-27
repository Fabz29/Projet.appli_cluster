<?php 
session_start(); 
require('include/fct.inc.php'); // fonctions de base 
require('include/pdo.class.php'); // classe d'accès à la base de donnée
include('vues/v_entete.php');
$pdo = PdoGsb::getPdoGsb();
$connexion = estConnecte(); // fonction qui vérifie si l'utilisateur est connecté
if(!isset($_GET['url']) || !$connexion){
	$_GET['url'] = 'connexion';
}
$url = $_GET['url'];
switch ($url) {
	case 'connexion':
	include('controle/c_connexion.php');
	break;
	case 'cluster':
	include('controle/c_cluster.php');
	break;
	case 'informations':
	include('controle/c_informations.php');
	break;
	default:
	include('controle/c_connexion.php');
	break;
}
include('vues/v_pied.php');
?>