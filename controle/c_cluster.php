<?php

/**
 * Contrôleur principales du site
 * gère l'affichage des formulaires,
 * des données et l'envoit du script au cluster

 * @author Fabien ZANETTI
 * @version    1.0
 */
$idUtilisateur = $_SESSION['idUtilisateur']; // On récupére le login de l'utilisateur
$mdpUtilisateur = $_SESSION['mdpUtilisateur'];
define('DOSSIER', "upload/$idUtilisateur"); // On définit le répertoire où seront stockés les fichiers
$calculEnCours = $pdo->getCalcul($idUtilisateur); // on vérifie si il a un calcul en cours
include('vues/v_menu.php'); // affichage du menu
// éxecution selon l'action
switch ($_GET['action']) {
    case 'validerCalcul': { // l'utilisateur a renseigné le formulaire
            if (!empty($_POST['mail'])) { // Seule ce champs besoin d'être renseigné par défaut
                // on récupère toutes les données du formulaire
                $logiciel = $_POST['logiciel'];
                $nbMachine = $_POST['nbMachine'];
                $nbCore = $_POST['nbCore'];
                $nbTime = $_POST['nbTime'];

                if (!file_exists(DOSSIER)) {
                    mkdir(DOSSIER, 0777, true); // créer un dossier avec le login 
                }

                $monFichier = fopen(DOSSIER . "/pbs.sh", 'a+'); // créer le fichier script

                switch ($logiciel) {
                    case 'Abaqus - 6.7':
                        $texte = '	#PBS -S /bin/bash
							#PBS -j oe
							#PBS -o cluster.lem3.fr:${PBS_O_WORKDIR}/job.${PBS_JOBID}.log
							#PBS -q batch
							#PBS -l nodes=' . $nbMachine . ':ppn=' . $nbCore . ',walltime=' . $nbTime . ':00:00 
			NCPU="wc -l < $PBS_NODEFILE"
			echo ------------------------------------------------------
			echo "This job allocates " ${NCPU} " cpu(s)"
			echo "This job runs on the following node(s) : "
			cat $PBS_NODEFILE
			echo ------------------------------------------------------
			echo "PBS : qsub runs on : " $PBS_O_HOST
			echo "PBS : init queue : " $PBS_O_QUEUE
			echo "PBS : executing queue : " $PBS_QUEUE
			echo "PBS : working directory : " $PBS_O_WORKDIR
			echo "PBS : job id : " $PBS_JOBID
			echo "PBS : job name : " $PBS_JOBNAME
			echo "PBS : node file : " $PBS_NODEFILE
			echo "PBS : home directory : " $PBS_O_HOME
							#echo "PBS : PATH : " $PBS_O_PATH
			echo
			echo ------------------------------------------------------
			echo -n "job executed on : "
			hostname
			echo -n "started on : "
			date
			echo ------------------------------------------------------
			cd $PBS_O_WORKDIR
			/opt/Abaqus/Commands/abq671 job=xxx cpus=$NCPU int
			echo "Calcul sur $NCPU coeurs"
			echo
			echo ------------------------------------------------------
							#result in file netpipe.o$PBS_JOBID
			echo -n "ended on : "
			date
			echo ------------------------------------------------------
			';
                        break;
                    case 'Abaqus - 6.10':
                        $texte = '	#PBS -S /bin/bash
							#PBS -j oe
							#PBS -o cluster.lem3.fr:${PBS_O_WORKDIR}/job.${PBS_JOBID}.log
							#PBS -q batch
							#PBS -l nodes=' . $nbMachine . ':ppn=' . $nbCore . ',walltime=' . $nbTime . ':00:00 
			NCPU="wc -l < $PBS_NODEFILE"
			echo ------------------------------------------------------
			echo "This job allocates " ${NCPU} " cpu(s)"
			echo "This job runs on the following node(s) : "
			cat $PBS_NODEFILE
			echo ------------------------------------------------------
			echo "PBS : qsub runs on : " $PBS_O_HOST
			echo "PBS : init queue : " $PBS_O_QUEUE
			echo "PBS : executing queue : " $PBS_QUEUE
			echo "PBS : working directory : " $PBS_O_WORKDIR
			echo "PBS : job id : " $PBS_JOBID
			echo "PBS : job name : " $PBS_JOBNAME
			echo "PBS : node file : " $PBS_NODEFILE
			echo "PBS : home directory : " $PBS_O_HOME
							#echo "PBS : PATH : " $PBS_O_PATH
			echo
			echo ------------------------------------------------------
			echo -n "job executed on : "
			hostname
			echo -n "started on : "
			date
			echo ------------------------------------------------------
			cd $PBS_O_WORKDIR
			/opt/Abaqus/Commands/abq6102 job=xxx cpus=$NCPU int
			echo "Calcul sur $NCPU coeurs"
			echo
			echo ------------------------------------------------------
							#result in file netpipe.o$PBS_JOBID
			echo -n "ended on : "
			date
			echo ------------------------------------------------------
			';
                        break;
                    case 'Abaqus - 6.11':
                        $texte = '	#PBS -S /bin/bash
							#PBS -j oe
							#PBS -o cluster.lem3.fr:${PBS_O_WORKDIR}/job.${PBS_JOBID}.log
							#PBS -q batch
							#PBS -l nodes=' . $nbMachine . ':ppn=' . $nbCore . ',walltime=' . $nbTime . ':00:00 
			NCPU="wc -l < $PBS_NODEFILE"
			echo ------------------------------------------------------
			echo "This job allocates " ${NCPU} " cpu(s)"
			echo "This job runs on the following node(s) : "
			cat $PBS_NODEFILE
			echo ------------------------------------------------------
			echo "PBS : qsub runs on : " $PBS_O_HOST
			echo "PBS : init queue : " $PBS_O_QUEUE
			echo "PBS : executing queue : " $PBS_QUEUE
			echo "PBS : working directory : " $PBS_O_WORKDIR
			echo "PBS : job id : " $PBS_JOBID
			echo "PBS : job name : " $PBS_JOBNAME
			echo "PBS : node file : " $PBS_NODEFILE
			echo "PBS : home directory : " $PBS_O_HOME
							#echo "PBS : PATH : " $PBS_O_PATH
			echo
			echo ------------------------------------------------------
			echo -n "job executed on : "
			hostname
			echo -n "started on : "
			date
			echo ------------------------------------------------------
			cd $PBS_O_WORKDIR
			/opt/Abaqus/Commands/abq6112 job=xxx cpus=$NCPU int
			echo "Calcul sur $NCPU coeurs"
			echo
			echo ------------------------------------------------------
							#result in file netpipe.o$PBS_JOBID
			echo -n "ended on : "
			date
			echo ------------------------------------------------------
			';
                        break;
                    case 'Matlab':
                        $texte = '	#PBS -S /bin/bash 
							#PBS -j oe 
							#PBS -o cluster.lem3.fr:${PBS_O_WORKDIR}/job.${PBS_JOBID}.log
							#PBS -q batch 
							#PBS -l nodes=' . $nbMachine . ':ppn=' . $nbCore . ',walltime=' . $nbTime . ':00:00 
			NCPU="wc -l < $PBS_NODEFILE"
			echo ------------------------------------------------------
			echo "This job allocates " ${NCPU} "" cpu(s)"
			echo "This job runs on the following node(s) : "
			cat $PBS_NODEFILE
			echo ------------------------------------------------------
			echo "PBS : qsub runs on : " $PBS_O_HOST
			echo "PBS : init queue : " $PBS_O_QUEUE
			echo "PBS : executing queue : " $PBS_QUEUE
			echo "PBS : working directory : " $PBS_O_WORKDIR
			echo "PBS : job id : " $PBS_JOBID
			echo "PBS : job name : " $PBS_JOBNAME
			echo "PBS : node file : " $PBS_NODEFILE
			echo "PBS : home directory : " $PBS_O_HOME
							#echo "PBS : PATH : " $PBS_O_PATH
			echo
			echo ------------------------------------------------------
			echo -n "job executed on : "
			hostname
			echo -n "started on : "
			date
			echo ------------------------------------------------------
			cd $PBS_O_WORKDIR
							#matlab -nojvm -display=null -r NOMDUFICHIER
							#/opt/Abaqus/Commands/abq671 job=xxx cpus=$NCPU int
							#/opt/Abaqus/Commands/abq6102 job=xxx cpus=$NCPU int
							#/opt/Abaqus/Commands/abq6112 job=calcul3 user=subroutine.o cpus=$NCPU int
							#/opt/Abaqus/Commands/abq6112 job=calcul3 cpus=$NCPU int
							#./execution
			echo "Calcul sur $NCPU coeurs"
			echo
			echo ------------------------------------------------------
							#result in file netpipe.o$PBS_JOBID
			echo -n "ended on : "
			date
			echo ------------------------------------------------------

			';
                        break;
                    case 'Executable':
                        // en cours de définition
                        break;
                    default:
                        include('controle/c_connexion.php');
                        break;
                }

                fputs($monFichier, $texte); // écrit le script 

                $connexionSCP = ssh2_connect('10.1.0.101', 22);

                if (!$connexionSCP) {
                    ajouterErreur('Connexion au serveur du cluster impossible.');
                    include('vues/v_erreurs.php');
                    include('vues/v_cluster.php');
                } else if (!ssh2_auth_password($connexionSCP, $idUtilisateur, $mdpUtilisateur)) {
                    ajouterErreur('Un problème est survenu avec vos identifiants lors de la connexion au serveur du cluster');
                    include('vues/v_erreurs.php');
                    include('vues/v_cluster.php');
                } else if (!ssh2_scp_send($connexionSCP, DOSSIER . '/pbs.sh', "/home/ciram2/chercheurs/lem3/$idUtilisateur/Cluster/pbs.sh")) {
                    ajouterErreur('Erreur lors de la création du dossier, ou lors du trasnfert du fichier sur le serveur du cluster');
                    include('vues/v_erreurs.php');
                    include('vues/v_cluster.php');
                } else if (!ssh2_scp_send($connexionSCP, DOSSIER . '/calcul.inp', "/home/ciram2/chercheurs/lem3/$idUtilisateur/Cluster/calcul.inp")) {
                    ajouterErreur('Erreur lors de la création du dossier, ou lors du trasnfert du fichier sur le serveur du cluster');
                    include('vues/v_erreurs.php');
                    include('vues/v_cluster.php');
                } else {
                    $calculEnCours = $pdo->setCalcul($idUtilisateur); // on renseigne la bdd que l'utilisateur a un calcul en cours
                    include('vues/v_calcul.php');
                }


                fclose($monFichier); // ferme le fichier script 
                unlink(DOSSIER . '/pbs.sh'); // on suprime le script temporaire
                unlink(DOSSIER . '/calcul.inp'); // on suprime le fichier temporaire
            } else {
                ajouterErreur('Tous les champs ne sont pas valide !');
                include('vues/v_erreurs.php');
                include('vues/v_cluster.php');
            }
            break;
        }
    case 'calculEnCours': { // l'utilisateur demande l'affichage de son calcul
            if ($calculEnCours == 1) {
                include('vues/v_calcul.php');
            } else {
                include('vues/v_aucunCalcul.php');
            }
            break;
        }
    case 'annulCalcul': { // l'utilisateur annule son calcul
            $calculEnCours = $pdo->unsetCalcul($idUtilisateur);
            $_SESSION['upload'] = false;
            include('vues/v_aucunCalcul.php');
        }
        break;

    case 'retourCalcul' : {
            $_SESSION['upload'] = false;
            include('vues/v_upload.php');
        }
        break;

    case 'finCalcul' : {
            $calculEnCours = $pdo->unsetCalcul($idUtilisateur);
            $_SESSION['upload'] = false;
            $connexionSCP = ssh2_connect('10.1.0.101', 22);

            if (!$connexionSCP) {
                ajouterErreur('Connexion au serveur du cluster impossible.');
                include('vues/v_erreurs.php');
                include('vues/v_cluster.php');
            } else if (!ssh2_auth_password($connexionSCP, $idUtilisateur, $mdpUtilisateur)) {
                ajouterErreur('Un problème est survenu avec vos identifiants lors de la connexion au serveur du cluster');
                include('vues/v_erreurs.php');
                include('vues/v_cluster.php');
            } else if (!ssh2_scp_recv($connexionSCP, "/home/ciram2/chercheurs/lem3/$idUtilisateur/Cluster/resultat.inp", DOSSIER . '/resultat.inp')) {
                ajouterErreur('Impossible de récupérer le fichier de résultat du calcul');
                include('vues/v_erreurs.php');
                include('vues/v_cluster.php');
            } else {
                include('vues/v_finCalcul.php');
            }
        }
        break;

    case 'upload': { // l'utilisateur envoit directement son script
            if (isset($_POST['upload'])) { // si formulaire soumis
                if (!file_exists(DOSSIER)) {
                    mkdir(DOSSIER, 0777, true); // créer un dossier avec le login 
                }

                $nbErreur = 0;
                $maxsize = 1073741824; // taille maximum autorisé 1go
                $extensions_valides = array('inp'); // définit les extensions autorisées
                $extension_upload = strtolower(substr(strrchr($_FILES['fichier']['name'], '.'), 1));
                //1. strrchr renvoie l'extension avec le point (« . »).
                //2. substr(chaine,1) ignore le premier caractère de chaine.
                //3. strtolower met l'extension en minuscules.

                if ($_FILES['fichier']['error']) {
                    $nbErreur ++;
                    switch ($_FILES['fichier']['error']) {
                        case 1:
                            ajouterErreur('le fichier dépasse la limite autorisé par le serveur (php.ini)');
                            break;
                        case 2:
                            ajouterErreur('Le fichier dépasse la limite autorisé par le formulaire');
                            break;
                        case 3:
                            ajouterErreur('Envoit du fichier interrompu lors du transfert');
                            break;
                        case 1:
                            ajouterErreur('Le fichier a une taille nulle');
                            break;
                    }
                    ajouterErreur('Erreur lors du transfert');
                } else if ($_FILES['fichier']['size'] > $maxsize) {
                    $nbErreur ++;
                    ajouterErreur('Le fichier dépasse la limite autorisé !');
                } else if (!in_array($extension_upload, $extensions_valides)) {
                    $nbErreur ++;
                    ajouterErreur('Type de fichier incorrect');
                } else if (!move_uploaded_file($_FILES['fichier']['tmp_name'], DOSSIER . $_FILES['fichier']['name'])) {
                    $nbErreur ++;
                    ajouterErreur('Erreur serveur : impossible de sauvegarder le fichier');
                }
            } else {
                $nbErreur ++;
                ajouterErreur('Aucun fichier séléctionner');
            }
            if ($nbErreur > 0) {
                include('vues/v_upload.php');
                include('vues/v_erreurs.php');
            } else {
                rename(DOSSIER . $_FILES['fichier']['name'], DOSSIER . '/calcul.inp');
                $_SESSION['upload'] = true;
                include('vues/v_cluster.php');
            }
        }

        break;
    default:
        if ($calculEnCours == 0) {
            if ($_SESSION['upload'] == true) {
                include('vues/v_cluster.php');
            } else {
                include('vues/v_upload.php');
            }
        } else {
            ajouterErreur('Vous avez déjà un calcul en cours');
            ajouterErreur('Vous ne pouvez avoir deux calculs en même temps');
            include('vues/v_erreurs.php');
        }
        break;
}
?>