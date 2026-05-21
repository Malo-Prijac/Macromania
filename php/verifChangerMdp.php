<?php
  session_start();
  include('../bdd/bdd.php');
  include('header.php');
?>

<body>
    <?php

        $ancien=$_POST['ancien'];
        $nouveau=$_POST['nouveau'];
        $verifok = 0;
        $connexionSQL=connexion();
        if($connexionSQL){
            $result=listeInscrit($connexionSQL);
            while (($client=mysqli_fetch_row($result))&&($verifok==0)){
                if ((strcmp($client[0],$_SESSION['id'])==0)&&(strcmp($client[2],$ancien)==0)){
                    $verifok=1;
                }
            }
    ?>
            <div id="messageInscription">
    <?php
                if ($verifok == 1) {
                    changerMDP($connexionSQL,$nouveau);
                } else {
                    $_SESSION['echec'] = 1;
                    echo "<script>window.location.replace('changerMdp.php')</script>"; //Sinon on revoie sur la page de connexion
                }
                $connexionSQL=deconnexion($connexionSQL);
        }
    ?>
                <br>
                <br>
                <input type="button" class="Bouton" name="retourAccueil" value="Retour à l'accueil" onclick="window.location.replace('../index.php?cat=Accueil')">
            </div>
</body>
<?php
  include('footerbis.php');
?>
</html>