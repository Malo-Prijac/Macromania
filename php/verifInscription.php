<?php
  session_start();
  include('../bdd/bdd.php');
  include('header.php');
?>

<body>
<?php
	$id=$_POST['identifiant'];
	$mdp=$_POST['mdp'];
    $mail=$_POST['mail'];
	$memeId = 0;
    $memeMail = 0;

    $connexionSQL=connexion();
    if($connexionSQL){
        $result=listeInscrit($connexionSQL);
        while (($client=mysqli_fetch_row($result))&&($memeId==0)){
            if (strcmp($client[0],$id)==0){
                $memeId=1;
            } else if (strcmp($client[1],$mail)==0){
                $memeMail=1;
            }
        }
    ?>
    <div id="messageInscription">
        <?php
            if ($memeId == 1) {
                $_SESSION['memeId']=1;
                echo "<script>window.location.replace('inscription.php')</script>";
            } else if ($memeMail == 1) {
                $_SESSION['memeMail']=1;
                echo "<script>window.location.replace('inscription.php')</script>";
            } else if(!filter_var($_POST["mail"],FILTER_VALIDATE_EMAIL)){ 
                $_SESSION['erreurMail']=1;
                echo "<script>window.location.replace('inscription.php')</script>";
            } else {
                inscrireClient($connexionSQL,$mail,$id,$mdp);
            }
        ?>
        <br>
        <br>
        <input type="button" class="Bouton" name="retourAccueil" value="Retour à l'accueil" onclick="window.location.replace('../index.php?cat=Accueil')">
        <input type="button" class="Bouton" name="retourConnexion" value="Retour à la connexion" onclick="window.location.replace('login.php')">
    </div>
    <?php
    $connexionSQL=deconnexion($connexionSQL);
    }
    ?>
</body>
<?php
  include('footerbis.php');
?>
</html>