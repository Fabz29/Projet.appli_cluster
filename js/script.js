/** 
 * Les données rentré par l'utilisateur sont stockés dans 
 * localStorage de son navigateur
 * afin de les sauvegarders pour les affichers
 * malgrès la fermture du navigateur ou la déconnexion du client
*/

 $(function(){
    $("#envoyer").click(function(){ // instruction lors du click sur le bouton envoyer
    // enregistre les informations du formulaire
    localStorage.setItem('email', $('#mail').val());
    localStorage.setItem('logiciel', $('#logiciel').val());
    localStorage.setItem('Machines', $('#nbMachine').val());
    localStorage.setItem('Coeurs', $('#nbCore').val());
    localStorage.setItem('Temps', $('#nbTime').val());
});

// fontion d'affichage des données
function AfficheDonnee(){
    var key = "";
    var NomValeur = '<hr> <ul class="nav">';
    var i=0;
    for (i=0; i <= localStorage.length-1; i++){
        key = localStorage.key(i);
        NomValeur += "<li><strong>" + key + "</strong> : " + localStorage.getItem(key) + "</li>";
    }
    NomValeur += "</ul>"
    $("#donnee").html(NomValeur); // replace la div donnee par le contenu de NomValeur
}
AfficheDonnee();
});

$(function(){ // instruction lors du clic sur le bouton stop
    $("#stop").click(function(){
        localStorage.clear(); // efface toutes les données
    });
});

