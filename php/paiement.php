<?php
  session_start();
  include('../bdd/bdd.php');
  include('header.php');
?>

<body>
    
    <script type="text/javascript">
        function commander(mdpEntre){
            xhr = new XMLHttpRequest();
            xhr.onreadystatechange=function(){
                if (this.readyState == 4 && this.status == 200) { 
                    if (this.responseText == "Retour panier") {
                        window.location.href="panier.php";
                    } else if (this.responseText == "Panier vide"){
                        alert("Paiement validé, merci d'avoir choisi Macromania !");
                        document.location.href="../index.php";
                    }
                }
            }
            xhr.open("POST","videPanier.php",true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("mdpEntre="+mdpEntre);          
        }
    </script>

        

        <?php 
            $connexionSQL=connexion();
            if($connexionSQL){
                $user=selectionnerMDP($connexionSQL);
                while ($client=mysqli_fetch_row($user)){
                    $mdp=$client[2];
                }
                $connexionSQL=deconnexion($connexionSQL);
            }
        ?>
    <script>
        mdpClient = "<?php echo $mdp; ?>";
        mdpEntre=prompt('Entrez votre mot de passe pour finaliser la transaction :');
        while ((mdpEntre != mdpClient) && (mdpEntre != null)) {
            mdpEntre=prompt("Mot de passe incorrect !\nEntrez votre mot de passe pour finaliser la transaction :");
        }
        commander(mdpEntre);
    </script>
    <?php
    
    ?>
</body>

