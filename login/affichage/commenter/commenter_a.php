<?php
	header("Content-type: text/html; charset=utf-8");
	session_start();
    // traitement du formulaire de commentaire
	if($_SESSION['USER']['statut'] == 'admin' || $_SESSION['USER']['statut'] == 'chercheur') {
		include("../../DBPDO.class.php");
		// Récupère la chaîne de format correspondant à l'heure actuelle：2020-05-28 13:00:00
		$dateModif = date('Y-m-d H:i:s', time());
		$dateSaisie = date('Y-m-d H:i:s', time());
		$redacteur=$_SESSION['USER']['idUser'];
		$arr_temp = array('dateSaisie'=>$dateSaisie,'redacteur'=>$redacteur,'dateModif'=>$dateModif);
		$arr = array_merge($_POST,$arr_temp);
 
		if($pdo->insert_c($arr)){
			echo "<script>alert('Insertion réussie');window.location.reload();</script>";
		}else{
			echo "<script>alert('Insertion échouée');window.location.reload();</script>";
		}
    } else {
        // redirection vers le formulaire de commentaire
        echo "Désolé, vous n’êtes pas autorisé à y accéder. Passer automatiquement à la page d'accueil après 3 s";
        echo '<meta http-equiv="refresh" content="3;url=../affichage1.php">';
    }
	