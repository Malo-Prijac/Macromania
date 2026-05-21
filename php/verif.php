<head>
  <link rel="stylesheet" type="text/css" href="../css/contact.css">
</head>

<?php
  session_start();
  include('header.php');
?>


<body id="verif">

<?php
    $_SESSION["nom"]=$_POST["nom"];
    $_SESSION["prenom"]=$_POST["prenom"];
    $_SESSION["profession"]=$_POST["profession"];
    $_SESSION["mail"]=$_POST["mail"];
    $_SESSION["sujet"]=$_POST["sujet"];
    $_SESSION["contenu"]=$_POST["contenu"];
    $verification = true;

    if(empty($_POST["nom"]) && $verification){
        $_SESSION["erreurNom"]="Erreur concernant le nom. Ne pas laisser vide";
        $verification=false;
    }

    if(empty($_POST["prenom"]) && $verification){
        $_SESSION["erreurPrenom"]="Erreur concernant le prenom. Ne pas laisser vide";
        $verification=false;
    }

    if(!filter_var($_POST["mail"],FILTER_VALIDATE_EMAIL)){
        $_SESSION["erreurMail"]="Erreur concernant le mail. Format : exemple@truc.com";
        $verification=false;
    }

    if(empty($_POST["sujet"]) && $verification){
        $_SESSION["erreurSujet"]="Erreur concernant le sujet. Ne pas laisser vide";
        $verification=false;
    }

    if(empty($_POST["contenu"]) && $verification){
        $_SESSION["erreurContenu"]="Erreur concernant le contenu. Ne pas laisser vide";
        $verification=false;
    }

    if($verification){
        require_once '../vendor/autoload.php';
        $transport = (new Swift_SmtpTransport('smtp.gmail.com',465,'ssl'))
        ->setUsername('mallol1010@gmail.com')
        ->setPassword('ewen200333');
        $mailer=new Swift_Mailer($transport);
        $message=(new Swift_Message($_POST["sujet"]))
        ->setFrom([$_POST["mail"] => $_POST["prenom"] ." ". $_POST["nom"]])
        ->setTo(['mallol1010@gmail.com' => 'Malo'])
        ->setBody($_POST["contenu"]);
        $result=$mailer->send($message);
        echo "Message envoyé !";
        unset($_SESSION["nom"]);
        unset($_SESSION["prenom"]);
        unset($_SESSION["profession"]);
        unset($_SESSION["mail"]);
        unset($_SESSION["sujet"]);
        unset($_SESSION["contenu"]);
    } else {
        echo "<script type=\"text/javascript\">window.location.replace('contact.php');</script>";
    }
?>

</body>

<?php
  include('footerbis.php');
?>


</html>