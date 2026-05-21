
<?php
  session_start();
  include('../bdd/bdd.php');
  include('header.php');
  $search=$_POST['search'];
?>

<body id="pageaccueil">    
  <div id="BlocMenu">
    <div class="positiontitre">
      <?php
        echo"<h2>Résultats pour \"".$search."\" : </h2>";
        if (isset($_SESSION['admin'])){
            echo "<button id='cacher'>Afficher les stocks</button>";
        } else {
          echo "<input id=cacher type=hidden></input>";
        }
      ?>
    </div>
    <?php
      if(isset($_POST['ajouterPanier'])||(isset($_POST['acheter']))){
        if(!isset($_SESSION['id'])){
          header('Location: login.php');
			    exit();
        }
        if($_POST["quantite"]!=0){
          ajoutArticle($_POST["nom"],$_POST['nomAffichage'],$_POST["quantite"],$_POST["prix"]);
          if(isset($_POST['acheter'])){
            echo "<script>window.location.replace('panier.php')</script>";
          }
        }
      }
    ?>
    <div class="row">      
      <?php
        $i=0;
        $connexionSQL=connexion();
        if($connexionSQL){
          $result=rechercheNomArticle($connexionSQL,$search);
          while ($article=mysqli_fetch_row($result)){
            ?>
            <div class='column'>
              <img src="<?php echo $article[3] ?>"/>
              <div class='PosTitle'>
                <p><?php echo $article[1]?></p>
                <div class='tailleEtoiles'>
                  <?php
                  $compteur=0;
                  while($compteur<5){
                    if($compteur<$article[7]){
                      echo"<span class='fa fa-star checked'></span>";
                    } else {
                      echo"<span class='fa fa-star'></span>";
                    }
                    $compteur++;
                  }
                  ?>
                </div>
              </div>
              <div class='Price'>
                <p><?php echo $article[4],"$"?></p>
                <div class='affichageStock'>
                  <span style="visibility:hidden" class='affStock'>Stock:</span>
                  <span style="visibility:hidden" class='stock'><?php echo $article[6]?></span>
                </div>
                <div class='blocCommande'>
                  <button class='moins' onclick='diminuerCommande(<?php echo $i?>)'>-</button>
                  <span class='commande' id="commande" value="0">0</span>
                  <button class='plus' onclick='augmenterCommande(<?php echo $i?>)'>+</button>
                </div>
              </div>
              <form action="recherche.php" method="post">
                <div class='posButton'>
                  <input type="hidden" name="search" value="<?php echo $search; ?>"/>
                  <input type="hidden" name="nom" value="<?php echo $article[0]; ?>"/>
                  <input type="hidden" name="nomAffichage" value="<?php echo $article[1]; ?>"/>
                  <input type="hidden" name="quantite" class="quantite" value="0"/>
                  <input type="hidden" name="prix" value="<?php echo $article[4]; ?>"/>
                  <a><input type='submit' class='button' name="acheter" id="boutonAcheter" value='Acheter'></a>
                  <a><input type='submit' class='button' name="ajouterPanier" id="boutonPanier" value='Placer dans mon panier'></a>
                </div>
              </form>
              <?php 
              if(($i%2)==1){
                ?>
                <br>
                </br>
                <br>
                </br>
                <?php
              }
              ?>
            </div>
            <?php
            $i++;
          }
          $connexionSQL=deconnexion($connexionSQL);
        }
      ?>
    </div>
  </div>
</body>

<?php
  include('footer.php');
?>

<script type="text/javascript" src="../js/commande.js"></script>
</html>