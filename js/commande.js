
let cacher = document.getElementById("cacher");
var stock = document.getElementsByClassName("stock");
var affStock = document.getElementsByClassName("affStock");
function cacherTexte(){
    for (i = 0; i < stock.length; i++) {
        if(getComputedStyle(stock[i]).visibility != "hidden"){
            stock[i].style.visibility = "hidden";
            cacher.innerHTML="Afficher les stocks";
        } else {
            stock[i].style.visibility = "visible";
            cacher.innerHTML="Cacher les stocks";
        }
    }
    for (i = 0; i < affStock.length; i++) {
        if(getComputedStyle(affStock[i]).visibility != "hidden"){
            affStock[i].style.visibility = "hidden";
        } else {
            affStock[i].style.visibility = "visible";
        }
    }
};
cacher.onclick = cacherTexte;

function augmenterCommande(i){
    if (compteur[i]<stock[i].innerHTML){
        compteur[i]++;
        document.getElementsByClassName("commande")[i].innerHTML=compteur[i];
        document.getElementsByClassName("commande")[i].value=compteur[i];
        console.log(document.getElementsByClassName("commande")[i].value);
        document.getElementsByClassName('quantite')[i].value=document.getElementsByClassName("commande")[i].value;
        console.log(document.getElementsByClassName('quantite')[i].value);
    }
}

function diminuerCommande(i){
    if (compteur[i]>0){
        compteur[i]--;
        document.getElementsByClassName("commande")[i].innerHTML=compteur[i];
        document.getElementsByClassName("commande")[i].value=compteur[i];
        console.log(document.getElementsByClassName("commande")[i].value);
        document.getElementsByClassName('quantite')[i].value=document.getElementsByClassName("commande")[i].value;
        console.log(document.getElementsByClassName('quantite')[i].value);
    }
}

function retournerQuantite(i){
    return compteur[i];
}

let moins = document.getElementsByClassName("moins");
let plus = document.getElementsByClassName("plus");

var compteur = new Array();
function initCompteur(taille){
    for (i = 0; i < taille; i++){
        compteur[i]=0;
    }
}
initCompteur(moins.length);



