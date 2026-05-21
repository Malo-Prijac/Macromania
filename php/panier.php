

<?php
  session_start();
  include('../bdd/macromaniadata.php');
  include('header.php');
?>


<body id="pagepanier">

  <?php
    if(isset($_SESSION['id'])){
      $connexionSQL=connexion();
      if($connexionSQL){
        $req='SELECT * FROM Panier WHERE nomPanier="'.$_SESSION['id'].'"';
        $res=mysqli_query($connexionSQL,$req);
        if (mysqli_num_rows($res)){
          ?>
          <div class="achat">
            <h1 class="positiontitre">Votre panier actuel:</h1>
          </div>
          <?php
        }  else {
        ?>
        <div class="achat">
          <h1 class="positiontitre">Votre panier est vide !</h1>
        </div>
        <?php
        }
      }
      $connexionSQL=deconnexion($connexionSQL);
    } else {
      header('Location: login.php');
    	exit;
    }
  ?>



  <div class="listePanier">
  <?php
    if(isset($_SESSION['id'])){
      $prixtotal=0;
      $connexionSQL=connexion();
      if($connexionSQL){
        $panier=listePanierClient($connexionSQL);
        while ($article=mysqli_fetch_row($panier)){
          echo "<p class='panierArticle'>";
          echo "Article : ".$article[3];
          echo " | Quantité : ".$article[4];
          echo " | Prix : ".$article[4]*$article[5]."$";?>
          <img class="poubelle" src="../images/poubelle.png" alt="imagePoubelle" onclick="window.location.replace('<?php echo 'suppArticle.php?article=' . $article[2]; ?>')">
          <?php echo "</p>";
          $prixtotal=$prixtotal+$article[4]*$article[5];
        }
      }
    }
  ?>
  </div>

  <?php
  if(isset($_SESSION['id'])){
    $connexionSQL=connexion();
    $req='SELECT * FROM Panier WHERE nomPanier="'.$_SESSION['id'].'"';
    $res=mysqli_query($connexionSQL,$req);
    if (mysqli_num_rows($res)){
    ?>
    <div class="payer">
      <div class="posButton">
        <a href="paiement.php"><input type="button" class="button" value="Payer les articles"></a>
      </div>
    </div>

    <div class="balance">
      <h1>Montant à payer : <?php echo $prixtotal ?>$</h1>
    </div>
    <?php
    }
  }
  ?>

<script type="text/javascript" src="../js/commande.js"></script>
</body>

<?php
  include('footerbis.php');
?>

</html>

