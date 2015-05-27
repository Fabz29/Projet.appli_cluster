#!/bin/bash
# Fabien, remplis ici le chemin du repertoire de travail
Workdir="~/01-Recherche/03-Thomas/"

ssh 10.1.0.101 "cd $Workdir && qsub pbs.sh"



