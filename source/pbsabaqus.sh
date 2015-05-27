### Fichier : pbs.sh
##
## Fichier de lancement de calcul OpenPBS
## 
## Revision 23/04/2012
##


## Options générales
#
#PBS -S /bin/bash
#PBS -j oe


## Fichier de log
#
# Vérifiez ici que vous pouvez vous connecter à "ssh cluster.lem3.fr" sans mot de passe
#
#PBS -o cluster.lem3.fr:${PBS_O_WORKDIR}/job.${PBS_JOBID}.log


## Choix de la queue
#
#PBS -q batch


## Options de calcul
#
# nodes : le nombre de machines qui calculeront
# ppn   : le nombre de coeurs sur chaque machine
#
# walltime : la durée estimée. le calcul sera tué en cas de dépassement mais une petite valeur peut faire passer ce calcul avant d'autres
#
#PBS -l nodes=2:ppn=4,walltime=100:00:00 


## Affichage des info sur le fichier de log
#
NCPU=`wc -l < $PBS_NODEFILE`
echo ------------------------------------------------------
echo 'This job allocates ' ${NCPU} ' cpu(s)'
echo 'This job runs on the following node(s) : '
cat $PBS_NODEFILE
echo ------------------------------------------------------
echo 'PBS : qsub runs on : ' $PBS_O_HOST
echo 'PBS : init queue : ' $PBS_O_QUEUE
echo 'PBS : executing queue : ' $PBS_QUEUE
echo 'PBS : working directory : ' $PBS_O_WORKDIR
echo 'PBS : job id : ' $PBS_JOBID
echo 'PBS : job name : ' $PBS_JOBNAME
echo 'PBS : node file : ' $PBS_NODEFILE
echo 'PBS : home directory : ' $PBS_O_HOME
#echo 'PBS : PATH : ' $PBS_O_PATH
echo
echo ------------------------------------------------------
echo -n 'job executed on : '
hostname
echo -n 'started on : '
date
echo ------------------------------------------------------
cd $PBS_O_WORKDIR
#
##########



###################################
#type here the command to execute #
###################################
#
#
## Abaqus, décommentez la ligne suivante en enlevant #
/opt/Abaqus/Commands/abq6112 job=file2 cpus=$NCPU int
#/opt/Abaqus/Commands/abq671 job=xxx cpus=$NCPU int
#/opt/Abaqus/Commands/abq6102 job=xxx cpus=$NCPU int
#
## Si vous utilisez MPI merci d'utiliser la syntaxe suivante, en enlevant le # et 
## En remplaçant la fin de la ligne par le nom de votre exécutable
#/usr/local/bin/mpiexec -launcher ssh -launcher-exec /usr/bin/ssh -n $NCPU -machinefile $PBS_NODEFILE ./L_EXECUTABLE_DU_PROGRAMME

echo "Calcul sur $NCPU coeurs"

##
##
###################################


##########
#
## Fin d'affichage
#
echo
echo ------------------------------------------------------
#result in file netpipe.o$PBS_JOBID
echo -n 'ended on : '
date
echo ------------------------------------------------------
#
##########
