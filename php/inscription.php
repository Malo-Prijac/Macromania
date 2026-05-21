<?php
	session_start();
    include('header.php');
?>
	
<body id="pagelogin">
    <div class="loginbox">
        <img src="../images/avatar.jpg" class="avatar">
        <h1>Inscription</h1>
        <form action="verifInscription.php" method="post">
            <p>Identifiant</p>
            <input type="text" name="identifiant" placeholder="Entrez votre identifiant" required>
            <p>Mot de Passe</p>
            <input type="password" name="mdp" placeholder="Entrez votre mot de passe" required>
            <p>Mail</p>
            <input type="text" name="mail" placeholder="Entrez votre adresse mail" required>
            
            <input type="submit" value="S'inscrire">
        </form>
        <a href="login.php">Retour connexion</a>
    </div>
	<?php
	if (isset($_SESSION['memeId'])) {
        ?>
        <p id="erreurInscription">Pseudo déjà existant, veuillez recommencer l'inscription</p>
        <?php
		unset($_SESSION['memeId']);
	} else if (isset($_SESSION['memeMail'])) {
        ?>
        <p id="erreurInscription">Adresse mail déjà utilisée, veuillez recommencer l'inscription</p>
        <?php
		unset($_SESSION['memeMail']); 
    } else if (isset($_SESSION['erreurMail'])) {
        ?>
        <p id="erreurInscription">Erreur concernant le mail. Format : exemple@truc.com</p>
        <?php
		unset($_SESSION['erreurMail']);
	}?>
	<br>
</body>
<?php
  include('footerbis.php');
?>
</html>