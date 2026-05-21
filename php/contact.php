<head>
  <link rel="stylesheet" type="text/css" href="../css/contact.css">
</head>

<?php
  session_start();
  include('header.php');
?>


<body id="pagecontact">


<h1 id="contact">Contact</h1>
    <br>
	<br>
    <form name="formContact" action="verif.php" method="post" class="form">
        <label class="CentrerBloc" for="dateContact">Date du contact</label>
        <input type="date" id="dateContact" name="dateContact" required><br><br>

		<?php
			if(isset($_SESSION['erreurNom'])){
				echo "<div id='afficherErreur'>";
				echo $_SESSION['erreurNom'];
				echo "</div>";
				echo "<br>";
				unset($_SESSION['erreurNom']);
			}
		?>
		<label class="CentrerBloc" for="nom">Nom</label>
		<input type="text" id="nom" name="nom" value="<?php echo $_SESSION['nom'];?>" required><br><br>

		<?php
			if(isset($_SESSION['erreurPrenom'])){
				echo "<div id='afficherErreur'>";
				echo $_SESSION['erreurPrenom'];
				echo "</div>";
				echo "<br>";
				unset($_SESSION['erreurPrenom']);
			}
		?>
		<label class="CentrerBloc" for="prenom">Prénom</label>
		<input type="text" id="prenom" name="prenom" value="<?php echo $_SESSION['prenom'];?>" required><br><br>

		<label class="CentrerBloc" for="sexe">Sexe</label>
		<input type="radio" id="homme" name="sexe" value="homme" checked>
		<label for="homme">Homme</label>
		<input type="radio" id="femme" name="sexe" value="femme">	
		<label for="femme">Femme</label>
		<input type="radio" id="neutre" name="sexe" value="neutre" >		
		<label for="neutre">Neutre</label><br><br>			

		<label class="CentrerBloc" for="naissance">Date de naissance</label>
		<input type="date" id="naissance" name="naissance" required><br><br>

		<label class="CentrerBloc" for="profession">Profession</label>
		<input type="text" id="profession" name="profession" value="<?php echo $_SESSION['profession'];?>"required><br><br>
		
		<?php
			if(isset($_SESSION['erreurMail'])){
				echo "<div id='afficherErreur'>";
				echo $_SESSION['erreurMail'];
				echo "</div>";
				echo "<br>";
				unset($_SESSION['erreurMail']);
			}
		?>
		<label class="CentrerBloc" for="mail">Adresse mail</label>
		<input type="text" id="mail" name="mail" value="<?php echo $_SESSION['mail'];?>"required><br><br>
		
		<?php
			if(isset($_SESSION['erreurSujet'])){
				echo "<div id='afficherErreur'>";
				echo $_SESSION['erreurSujet'];
				echo "</div>";
				echo "<br>";
				unset($_SESSION['erreurSujet']);
			}
		?>
		<label class="CentrerBloc" for="sujet">Sujet</label>
		<input type="text" id="sujet" name="sujet" value="<?php echo $_SESSION['sujet'];?>"required><br><br>

		<?php
			if(isset($_SESSION['erreurContenu'])){
				echo "<div id='afficherErreur'>";
				echo $_SESSION['erreurContenu'];
				echo "</div>";
				echo "<br>";
				unset($_SESSION['erreurContenu']);
			}
		?>
		<label class="CentrerBloc" for="contenu">Contenu</label>
		<input type="text" id="contenu" name="contenu" value="<?php echo $_SESSION['contenu'];?>"required><br><br>

		<input type="submit" class="Bouton" value="Envoyer" id="BoutonEnvoi" onclick="verif()">
        <br><br>
	</form>
	<input type="button" class="Bouton" name="retourAccueil" value="Retour à l'accueil" onclick="window.location.replace('../index.php')">
    <br>


</body>

<?php
  include('footer.php');
?>

<script type="text/javascript" src="../js/contact.js"></script>

</html>

