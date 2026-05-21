<?php
  session_start();
  include('header.php');
?>

<body id="pagelogin"> 


     <div class="loginbox">
         <img src="../images/avatar.jpg" class="avatar">
         <h1>Se connecter</h1>
         <form action="verifConnexion.php" method="post">
             <p>Identifiant</p>
             <input type="text" name="identifiant" placeholder="Entrez votre identifiant" required>
             <p>Mot de Passe</p>
             <input type="password" name="mdp" placeholder="Entrez votre mot de passe" required>
             <input type="submit" value="se connecter">
          </form>
          <a href="inscription.php">Vous n'avez pas de compte ?</a>
          <br>
          <br>
          <a href="contact.php">Nous contacter</a>
    </div>
    <?php
    if (isset($_SESSION['echec'])) {
      ?>
      <p id="erreurConnexion">Identifiant ou mot de passe incorrect</p>
      <?php
      unset($_SESSION['echec']);
    }
    ?>
	}


</body>

<?php
  include('footerbis.php');
?>

</html>

