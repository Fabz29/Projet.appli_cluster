<?php
/** 
 * Classe d'accès aux données. 
 * Utilise les services de la classe PDO
 * pour l'interface web du cluster
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO 
 * $monPdoGsb qui contiendra l'unique instance de la classe
 * @package default
 * @author 	Fabien Zanetti
 * @version    1.0
 */

class PdoGsb{   		
	private static $serveur='mysql:host=localhost';
	private static $bdd='dbname=cluster';   		
	private static $user='root' ;    		
	private static $mdp='' ;	
	private static $monPdo;
	private static $monPdoGsb=null;

	/**
	 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
	 * pour toutes les méthodes de la classe
	 */				
	private function __construct(){
		PdoGsb::$monPdo = new PDO(PdoGsb::$serveur.';'.PdoGsb::$bdd, PdoGsb::$user, PdoGsb::$mdp); 
		PdoGsb::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		PdoGsb::$monPdo = null;
	}

	/**
	 * Fonction statique qui crée l'unique instance de la classe
	 * Appel : $instancePdoGsb = PdoGsb::getPdoGsb();
	 
	 * @return l'unique objet de la classe PdoGsb
	 */
	public  static function getPdoGsb(){
		if(PdoGsb::$monPdoGsb==null){
			PdoGsb::$monPdoGsb= new PdoGsb();
		}
		return PdoGsb::$monPdoGsb;  
	}

	/**
	 * Enregistre les informations d'un visiteur lors de sa connexion
	 * $calul est à false par défaut tant qu'un calcul n'est pas lancé
	 
	 * @param $login 
	 * @param $mdp
	 * @param $calcul 
	*/
	public function setInfosUtilisateur($login, $mdp){
		$req = "INSERT INTO utilisateur  (id, login, calculEnCours) VALUES (NULL, :login, 0)";
		$query = PdoGsb::$monPdo->prepare($req);
		$query->execute(array(':login' => $login));
	}

	/**
	* Vérifie si l'utilisateur existe déjà dans la base
	* si Oui return true
	* si Non return false

	* @param $login
	* @return bool 
	*/
	public function estEnregistrer($login){
		$req = "SELECT COUNT(*) AS nbInfo FROM utilisateur WHERE login = :login";
		$query = PdoGsb::$monPdo->prepare($req);
		$query->execute(array(':login' => $login));
		$LaLigne = $query->fetch();
		if($LaLigne['nbInfo'] >= 1){
			$res = true;
		}
		else{
			$res = false;
		}
		return $res;
	}

	/**
	 * Met à jour l'information que le calcul de l'utilisateur est en cours ou non
	 
	 * @param $login
	 * @return $calcul
	*/
	public function setCalcul($login){
		$req = "UPDATE utilisateur SET calculEnCours = 1 WHERE login = :login";	
		$res = PdoGsb::$monPdo->prepare($req);
		$res->execute(array(':login' => $login));
	}

	public function unsetCalcul($login){
		$req = "UPDATE utilisateur SET calculEnCours = 0 WHERE login = :login";
		$res = PdoGsb::$monPdo->prepare($req);
		$res->execute(array(':login' => $login));
	}

	/**
	 * Met à jour l'information que le calcul de l'utilisateur est terminé
	 
	 * @param $login
	 * @return $calcul
	*/
	public function setFinCalcul($login){
		$req = "UPDATE utilisateur SET finCalcul = 1 WHERE login = :login";	
		$res = PdoGsb::$monPdo->prepare($req);
		$res->execute(array(':login' => $login));
	}

	public function unsetFinCalcul($login){
		$req = "UPDATE utilisateur SET finCalcul = 0 WHERE login = :login";
		$res = PdoGsb::$monPdo->prepare($req);
		$res->execute(array(':login' => $login));
	}

	/**
	 * Met à jour le jobID du calcul de l'utilisateur
	 
	 * @param $login, $jobID
	 * @return $calcul
	*/
	public function setJobID($login, $jobID){
		$req = "UPDATE utilisateur SET jobID = :jobID WHERE login = :login";	
		$res = PdoGsb::$monPdo->prepare($req);
		$res->execute(array(':jobID' => $jobID, ':login' => $login));
	}

	public function unsetJobID($login){
		$req = "UPDATE utilisateur SET jobID = NULL WHERE login = :login";	
		$res = PdoGsb::$monPdo->prepare($req);
		$res->execute(array(':jobID' => $jobID, ':login' => $login));
	}


	/**
	 * Retourne l'information si le calcul de l'utilisateur est en cours ou non
	 
	 * @param $login
	 * @return $calculEnCours
	*/
	public function getCalcul($login){
		$req = "SELECT calculEnCours FROM utilisateur WHERE login = :login";	
		$res = PdoGsb::$monPdo->prepare($req);
		$res->execute(array(':login' => $login));
		$laLigne = $res->fetch();
		return $laLigne['calculEnCours'];
	}

	/**
	 * Retourne l'information si l'utilisateur a finit son calcul ou non
	 
	 * @param $login
	 * @return $calculEnCours
	*/
	public function getFinCalcul($login){
		$req = "SELECT finCalcul FROM utilisateur WHERE login = :login";	
		$res = PdoGsb::$monPdo->prepare($req);
		$res->execute(array(':login' => $login));
		$laLigne = $res->fetch();
		return $laLigne['finCalcul'];
	}

	/**
	 * Retourne le jobID du calcul de l'utilisateur
	 
	 * @param $login
	 * @return $calculEnCours
	*/
	public function getJobID($login){
		$req = "SELECT jobID FROM utilisateur WHERE login = :login";	
		$res = PdoGsb::$monPdo->prepare($req);
		$res->execute(array(':login' => $login));
		$laLigne = $res->fetch();
		return $laLigne['jobID'];
	}

}
?>