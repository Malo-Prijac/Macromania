<?php
  session_start();
  include('../bdd/bdd.php');

    if (!isset($_POST['mdpEntre'])) {
        header('Location: panier.php');
        exit();
    } else if ($_POST['mdpEntre'] == "null") {
        echo "Retour panier";
    } else {
        $connexionSQL=connexion();
        if($connexionSQL){
            $panier=listePanierClient($connexionSQL);
            while ($article=mysqli_fetch_row($panier)){
                commanderArticle($connexionSQL,$article);
            }
            $connexionSQL=deconnexion($connexionSQL);
        }
        echo "Panier vide";    
    }
?>