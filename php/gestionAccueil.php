
<?php
  session_start();
  include('../bdd/macromaniadata.php');
  include('header.php');
?>

<?php
    if (isset($_GET['article'])) {
        modifierAccueil($_GET['article']);
    }
?>

<body id="pagepanier">
<div class="positiontitre">
      <h2>Choix des jeux de la page d'accueil</h2>
</div>
<div class="listePanier">
  <?php
    if(isset($_SESSION['admin'])){
        if($connexionSQL){
            echo "<table>";
            $result=listeArticle($connexionSQL);
            while ($article=mysqli_fetch_row($result)){
                if((($article[2]=="RPG")||($article[2]=="RTS"))||(($article[2]=="FPS")||($article[2]=="Sports"))){
                    echo "<tr>";
                    echo "<td>";
                    echo $article[1];
                    echo "</td>"; 
                    $existe=0;   
                    $listeAccueil=listeNomAccueil($connexionSQL);
                    while ($articleAccueil=mysqli_fetch_row($listeAccueil)){
                        if ($articleAccueil[0]==$article[0]){
                            $existe=1;
                        }
                    }
                    if ($existe==1){
                        echo "<td>";
                    ?>
                        <img class="symbole" src="../images/moins.png" alt="imageMoins" onclick="window.location.replace('<?php echo 'gestionAccueil.php?article=' . $article[0]; ?>')">
                    <?php
                        echo "</td>";
                    } else { 
                        echo "<td>";?>
                        <img class="symbole" src="../images/plus.png" alt="imagePlus" onclick="window.location.replace('<?php echo 'gestionAccueil.php?article=' . $article[0]; ?>')">
                    <?php
                        echo "</td>";
                    }
                    echo "</tr>";
                }
            }       
            echo "</table>";        
            $connexionSQL=deconnexion($connexionSQL);
        }
    }
  ?>
</div>

</body>