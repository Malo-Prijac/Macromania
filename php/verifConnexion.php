<?php
  session_start();
  include('../bdd/bdd.php');
  include('header.php');
?>

<body>
<?php

	$id=$_POST['identifiant'];
	$mdp=$_POST['mdp'];
	$verifok = 0;
	$connexionSQL=connexion();
    if($connexionSQL){
        $result=listeInscrit($connexionSQL);
        while (($client=mysqli_fetch_row($result))&&($verifok==0)){
            if ((strcmp($client[0],$id)==0)&&(strcmp($client[2],$mdp)==0)){
                $verifok=1;
            }
        }
		$connexionSQL=deconnexion($connexionSQL);
	}


	if ($verifok == 1) {
		$_SESSION['id'] = $id;
		$connexionSQL=connexion();
		if($connexionSQL){
			$result=verifAdmin($connexionSQL,$_SESSION['id']);
			while ($article=mysqli_fetch_row($result)){
				if($article[3]==1){
					$_SESSION["admin"]=1;
				}
			}
			$connexionSQL=deconnexion($connexionSQL);
		}
		echo "<script>window.location.replace('../index.php')</script>"; //Si c'est le cas, alors on renvoie à la page de l'accueil
	} else {
		$_SESSION['echec'] = 1;
		echo "<script>window.location.replace('login.php')</script>"; //Sinon on revoie sur la page de connexion
	}
?>
</body>
<?php
  include('footerbis.php');
?>
</html>