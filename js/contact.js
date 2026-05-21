function verif() {


    if(document.getElementById('dateContact').value.length==0){
        alert("Pas de date de contact");
        document.getElementById('dateContact').style.border="2px solid red";
        return false;
    } else {
        document.getElementById('dateContact').style.border="";
    }

    if(document.getElementById('nom').value.length==0){
        alert("Pas de nom");
        document.getElementById('nom').style.border="2px solid red";
        return false;
    } else {
        document.getElementById('nom').style.border="";
    }

    if(document.getElementById('prenom').value.length==0){
        alert("Pas de prenom");
        document.getElementById('prenom').style.border="2px solid red";
        return false;
    } else {
        document.getElementById('prenom').style.border="";
    }

    if(document.getElementById('naissance').value.length==0){
        alert("Pas de date de naissance");
        document.getElementById('naissance').style.border="2px solid red";
        return false;
    } else {
        document.getElementById('naissance').style.border="";
    }

    if(document.getElementById('profession').value.length==0){
        alert("Pas de profession");
        document.getElementById('profession').style.border="2px solid red";
        return false;
    } else {
        document.getElementById('profession').style.border="";
    }

    if(document.getElementById('adresse').value.length==0){
        alert("Pas d'adresse");
        document.getElementById('adresse').style.border="2px solid red";
        return false;
    } else {
        document.getElementById('adresse').style.border="";
    }

    if(document.getElementById('sujet').value.length==0){
        alert("Pas de sujet");
        document.getElementById('sujet').style.border="2px solid red";
        return false;
    } else {
        document.getElementById('sujet').style.border="";
    }

    if(document.getElementById('contenu').value.length==0){
        alert("Pas de contenu");
        document.getElementById('contenu').style.border="2px solid red";
        return false;
    } else {
        document.getElementById('contenu').style.border="";
    }

    window.location.replace('contact.html');
}
