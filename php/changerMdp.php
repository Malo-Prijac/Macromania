<?php
  session_start();
  include('header.php');
?>

<body id="pagelogin"> 


     <div class="loginbox">
         <img src="../images/avatar.jpg" class="avatar">
         <h1>Changer Mot de Passe</h1>
         <form action="verifChangerMdp.php" method="post">
             <p>Ancien Mot de Passe</p>
             <input type="password" name="ancien" placeholder="Entrez votre ancien mdp" required>
             <p>Nouveau Mot de Passe</p>
             <input type="password" name="nouveau" placeholder="Entrez votre nouveau mdp" required>
             <input type="submit" value="Valider">
          </form>
          <br>
          <br>
          <a href="contact.php">Nous contacter</a>
    </div>
    <?php
    if (isset($_SESSION['echec'])) {
      ?>
      <p id="erreurConnexion">Ancien mot de passe incorrect !</p>
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

