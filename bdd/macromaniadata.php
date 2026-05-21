
<?php
    session_start();
    include('bdd.php');
    $connexionSQL=connexion();
    $req="SELECT * FROM Jeu";
    $res=mysqli_query($connexionSQL,$req);
    if (!mysqli_num_rows($res)){
        $fichierjson = file_get_contents("articles.json");
        $parsed_json=json_decode($fichierjson, true);
        $connexionSQL=connexion();
        $jsonIterator = new RecursiveIteratorIterator(
        new RecursiveArrayIterator(json_decode($fichierjson, TRUE)),
        RecursiveIteratorIterator::SELF_FIRST);
        foreach ($jsonIterator as $key => $val) {
            if(is_array($val)) {
                $categorie=$key;
                if(($categorie=="FPS")||($categorie=="RPG")||($categorie=="RTS")||($categorie=="Sports")||($categorie=="Xbox")||($categorie=="Playstation")||($categorie=="Switch")||($categorie=="PC")||($categorie=="T-shirts")||($categorie=="Goodies")||($categorie=="Hoodies")||($categorie=="Chapeaux")){
                    $_SESSION["$categorie"]=$parsed_json["$categorie"];
                    foreach ($_SESSION[$categorie] as $value){
                        $name=$value['nom'];
                        $newName=str_replace(' ','',$name);
                        $sql = 'INSERT INTO Jeu(nom,nomAffichage,categorie,nomImage,prix,stock,stockApresPanier,note) VALUES ("'.$newName.'","'.$value['nom'].'","'.$categorie.'","'.$value['img'].'","'.$value['prix'].'","'.$value['quantite'].'","'.$value['quantite'].'","'.$value['note'].'")';
                        $result=mysqli_query($connexionSQL,$sql) or die ("ERROR: Impossible de faire la requete $sql. " . mysqli_error($connexionSQL));
                    }
                } else if ($categorie=="Accueil"){
                    $_SESSION["$categorie"]=$parsed_json["$categorie"];
                    foreach ($_SESSION[$categorie] as $value){
                        $name=$value['nom'];
                        $newName=str_replace(' ','',$name);
                        $sql = 'INSERT INTO Accueil(nom) VALUES ("'.$newName.'")';
                        $result=mysqli_query($connexionSQL,$sql) or die ("ERROR: Impossible de faire la requete $sql. " . mysqli_error($connexionSQL));
                    }
                }
            }
        }
        $connexionSQL=deconnexion($connexionSQL);
        $_SESSION['import']=1;
    }
?>