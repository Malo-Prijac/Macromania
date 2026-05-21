<?php
	session_start();
	include('../bdd/macromaniadata.php');
	if (isset($_GET['article'])) {
		$articleSupp=$_GET['article'];
		supprimerArticle($articleSupp);
	} else {
		header('Location: ../index.php');
    	exit;
	}
	header('Location: panier.php');
?>