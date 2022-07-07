<?php
	header("Content-type: text/html; charset=utf-8");
	session_start();
    // traitement du formulaire d'authentification
	if($_SESSION['USER']['statut'] == 'admin') {
		include_once("../DBPDO.class.php");
		$contenu=$_POST['contenu'];
		$niveau=$_POST['niveau'];
		$filiere=$_POST['filiere'];
		$genre=$_POST['genre'];
		$langueMat=$_POST['langueMat'];
		$complement=$_POST['complement'];
		$anneeCreation=$_POST['anneeCreation'];
		$anneeCreation = intval($anneeCreation);
		// var_dump($anneeCreation,$niveau);
		// var_dump($niveau, $filiere, $genre, $langueMat, $complement, $anneeCreation, date('Y-m-d H:i:s', time()), $contenu);
		$result = $pdo->insert($contenu, $niveau, $filiere, $genre, $langueMat, $complement, $anneeCreation);
		if($result == true){
			echo '<a href="../index.php">Soumettez avec succès, cliquez pour sauter</a>';
		}else{
			echo '<a href="./insertionExtrait.html">Les données soumises sont incorrectes, veuillez soumettre à nouveau</a>';
		}
    } else {
        // redirection vers le formulaire d'authentification
        echo "Désolé, vous n'avez pas le droit de visiter la page d'accueil après 3s";
        echo '<meta http-equiv="refresh" content="3;url=./index.html">';
    }
	