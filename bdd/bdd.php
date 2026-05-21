<?php 
    session_start();
    function connexion(){
        include('bddData.php');
        $connexionSQL=mysqli_connect($host, $user, $pass, $bdd) or die("ERROR: Impossible de se connecter. " . mysqli_connect_error());
        return($connexionSQL);
    }

    function deconnexion($connexionSQL){ 
        mysqli_close($connexionSQL);
        return($connexionSQL);
    }

    function rechercheArticleCategorie($connexionSQL,String $categorie){
        $req='SELECT * FROM Jeu WHERE categorie="'.$categorie.'"';
        $result=mysqli_query($connexionSQL,$req) or die ("ERROR: Impossible de faire la requete $req. " . mysqli_error($connexionSQL));
        return($result);
    }

    function rechercheArticle($connexionSQL,String $nom){
        $req='SELECT * FROM Jeu WHERE nom="'.$nom.'"';
        $result=mysqli_query($connexionSQL,$req) or die ("ERROR: Impossible de faire la requete $req. " . mysqli_error($connexionSQL));
        return($result);
    }

    function rechercheNomArticle($connexionSQL,String $recherche){
        $req='SELECT * FROM Jeu WHERE nom LIKE "%'.$recherche.'%"';
        $result=mysqli_query($connexionSQL,$req) or die ("ERROR: Impossible de faire la requete $req. " . mysqli_error($connexionSQL));
        return($result);
    }

    function listeArticle($connexionSQL){
        $req='SELECT * FROM Jeu';
        $result=mysqli_query($connexionSQL,$req) or die ("ERROR: Impossible de faire la requete $req. " . mysqli_error($connexionSQL));
        return($result);
    }

    function listeNomAccueil($connexionSQL){
        $req='SELECT * FROM Accueil';
        $result=mysqli_query($connexionSQL,$req) or die ("ERROR: Impossible de faire la requete $req. " . mysqli_error($connexionSQL));
        return($result);
    }

    function listeInscrit($connexionSQL){
        $req='SELECT * FROM Client';
        $result=mysqli_query($connexionSQL,$req) or die ("ERROR: Impossible de faire la requete $req. " . mysqli_error($connexionSQL));
        return($result);
    }

    function inscrireClient($connexionSQL,String $mail,String $id,String $mdp){
        $sql = 'INSERT INTO Client(nom,mail,mdp,administrateur) VALUES ("'.$id.'","'.$mail.'","'.$mdp.'","2")';
        if(mysqli_query($connexionSQL, $sql)){
            echo "Compte créé avec succès !";
        } else{
            echo "ERROR: Impossible de faire la requete $sql. " . mysqli_error($connexionSQL);
        }
    }

    function changerMDP($connexionSQL,String $mdp){
        $sql = 'UPDATE Client SET mdp="'.$mdp.'" WHERE nom="'.$_SESSION['id'].'"';
        if(mysqli_query($connexionSQL, $sql)){
            echo "Mot de passe changé avec succès !";
        } else{
            echo "ERROR: Impossible de faire la requete $sql. " . mysqli_error($connexionSQL);
        }
    }

    function selectionnerMDP($connexionSQL){
        $req='SELECT * FROM Client WHERE nom="'.$_SESSION['id'].'"';
        $result=mysqli_query($connexionSQL,$req) or die ("ERROR: Impossible de faire la requete $req. " . mysqli_error($connexionSQL));
        return($result);
    }

    function verifAdmin($connexionSQL,String $nom){
        $req='SELECT * FROM Client WHERE nom="'.$nom.'"';
        $result=mysqli_query($connexionSQL,$req) or die ("ERROR: Impossible de faire la requete $req. " . mysqli_error($connexionSQL));
        return($result);
    }

    function listePanierClient($connexionSQL){
        $req='SELECT * FROM Panier WHERE nomPanier="'.$_SESSION['id'].'"';
        $result=mysqli_query($connexionSQL,$req) or die ("ERROR: Impossible de faire la requete $req. " . mysqli_error($connexionSQL));
        return($result);
    }

    function ajoutArticle($nom,$nomAffichage,$quantite,$prix){
        $connexionSQL=connexion();
        if($connexionSQL){
            $panier=listePanierClient($connexionSQL);
            $ajout=0;
            while ($articlePanier=mysqli_fetch_row($panier)){
                if(($articlePanier[2]==$nom)&&($ajout==0)){
                $total=$articlePanier[4]+$quantite;
                $req='UPDATE Panier SET quantite='.$total.' WHERE nomArticle="'.$nom.'" AND nomPanier="'.$_SESSION['id'].'"';
                $result=mysqli_query($connexionSQL,$req) or die ("ERROR: Impossible de faire la requete $req. " . mysqli_error($connexionSQL));
                $ajout=1;
                }
            }
            if ($ajout==0){
                $req='INSERT INTO Panier(nomPanier,nomArticle,nomAffichage,quantite,prixUnit) VALUES ("'.$_SESSION['id'].'","'.$nom.'","'.$nomAffichage.'","'.$quantite.'","'.$prix.'")';
                $result=mysqli_query($connexionSQL,$req) or die ("ERROR: Impossible de faire la requete $req. " . mysqli_error($connexionSQL));
            }
            $jeu=rechercheArticle($connexionSQL,$nom);
            $articlePanier=mysqli_fetch_row($jeu);
            $total = $articlePanier[6]-$_POST["quantite"];
            $req='UPDATE Jeu SET stockApresPanier='.$total.' WHERE nom="'.$nom.'"';
            $result=mysqli_query($connexionSQL,$req) or die ("ERROR: Impossible de faire la requete $req. " . mysqli_error($connexionSQL));
            $connexionSQL=deconnexion($connexionSQL);
        }
    }

    function supprimerArticle($articleSupp){
        $connexionSQL=connexion();
		if($connexionSQL){
			$panier=listePanierClient($connexionSQL);
        	while ($article=mysqli_fetch_row($panier)){
				if($article[2]==$articleSupp){
					$quantite=$article[4];
				}
			}
			$jeu=rechercheArticle($connexionSQL,$articleSupp);
            $articleRestock=mysqli_fetch_row($jeu);
			$total = $articleRestock[6]+$quantite;
			$req='UPDATE Jeu SET stockApresPanier='.$total.' WHERE nom="'.$articleSupp.'"';
			$result=mysqli_query($connexionSQL,$req) or die ("ERROR: Impossible de faire la requete $req. " . mysqli_error($connexionSQL));
			$req='DELETE FROM Panier WHERE nomArticle="'.$articleSupp.'"AND nomPanier="'.$_SESSION['id'].'"';
			$result=mysqli_query($connexionSQL,$req) or die ("ERROR: Impossible de faire la requete $req. " . mysqli_error($connexionSQL));
			$connexionSQL=deconnexion($connexionSQL);
		}
    }

    function commanderArticle($connexionSQL,$article){
        $req='DELETE FROM Panier WHERE nomArticle="'.$article[2].'"AND nomPanier="'.$_SESSION['id'].'"';
        $result=mysqli_query($connexionSQL,$req) or die ("ERROR: Impossible de faire la requete $req. " . mysqli_error($connexionSQL));
    }

    function modifierAccueil($article){
        $test=0;
        $connexionSQL=connexion();
		if($connexionSQL){
            $listeAccueil=listeNomAccueil($connexionSQL);
            while ($item=mysqli_fetch_row($listeAccueil)){
                if($article==$item[0]){
                    $test=1;
                }   
            }
            if ($test==1){
                $req='DELETE FROM Accueil WHERE nom="'.$article.'"';    
            } else {
                $req ='INSERT INTO Accueil(nom) VALUES ("'.$article.'")';
            }
            $result=mysqli_query($connexionSQL,$req) or die ("ERROR: Impossible de faire la requete $req. " . mysqli_error($connexionSQL));
            $connexionSQL=deconnexion($connexionSQL);
        }
    }
?>