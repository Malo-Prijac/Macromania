<!DOCTYPE html "-//W3C//DTD XHTML 1.0 Strict //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1−strict.dtd">
<html>

<head>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8">
  <title>Macromania</title>
  <link rel="stylesheet" type="text/css" href="css/accueil.css">
  <link rel="shortcut icon" href="images/M.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<header>
  <div class="header">   
    <div class="inner_header">
      <div class="logo_container">
        <a href="index.php?cat=Accueil"><h1>Macro<span>Mania</span></h1></a>
      </div>
      <ul class="navigation">
        <a href="index.php?cat=Accueil"><li>Accueil</li></a>
        <a href="php/panier.php"><li>Mon Panier</li></a>
        <?php 
        if(isset($_SESSION["id"])){
          echo "<a href='php/deconnexion.php'><li class='disconnect'> Se déconnecter </li></a>";
          echo "<a href='php/changerMdp.php'><li class='connect'> &#11044; Connecté </li></a>";
        } else {
          echo "<a href='php/login.php'><li>Connexion</li></a>";
        }
        ?>
      </ul>

      <div id="searchbar" method="post">
        <form action="php/recherche.php" class="formulaire" method="post">
          <div id="blocRecherche">
            <input type="search" id="search" name="search" autocomplete="off" placeholder="Rechercher un article" required>
          </div>
          <input type="image" id="RechercherStat" name="RechercherStat" src='images/rechercher.png'>
        </form>
      </div>
    </div>
  </div>

  <nav>
    <ul>
      <li  class="navbarJeu"><a href="#">Jeux</a>
        <ul class="submenu">
          <li><a href="php/categorie.php?cat=FPS">FPS</a></li>
          <li><a href="php/categorie.php?cat=RPG">RPG</a></li>
          <li><a href="php/categorie.php?cat=RTS">RTS</a></li>
          <li><a href="php/categorie.php?cat=Sports">Sports</a></li>
        </ul>
      </li>
      <li  class="navbarConsole"><a href="#">Consoles & Accessoires</a>
        <ul class="submenu">
          <li><a href="php/categorie.php?cat=Xbox">Xbox</a></li>
          <li><a href="php/categorie.php?cat=Playstation">PlayStation</a></li>
          <li><a href="php/categorie.php?cat=Switch">Switch</a></li>
          <li><a href="php/categorie.php?cat=PC">PC</a></li>
        </ul>
      </li>
      <li  class="navbarProduit"><a href="#">Produits dérivés</a>
        <ul class="submenu">
          <li><a href="php/categorie.php?cat=T-shirts">T-shirts</a></li>
          <li><a href="php/categorie.php?cat=Hoodies">Hoodies</a></li>
          <li><a href="php/categorie.php?cat=Goodies">Goodies</a></li>
          <li><a href="php/categorie.php?cat=Chapeaux">Chapeaux</a></li>
        </ul>
      </li>
    </ul>
  </nav>
</header>