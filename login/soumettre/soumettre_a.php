<?php
	header("Content-type: text/html; charset=utf-8");
	session_start();
    // traitement du formulaire d'authentification
	if($_SESSION['USER']['statut'] == 'admin' || $_SESSION['USER']['statut'] == 'chercheur') {
		include_once("../DBPDO.class.php");
		// Récupère la chaîne de format correspondant à l'heure actuelle：2020-05-28 13:00:00
		$datetime = date('Y-m-d H:i:s', time());
		$depositaire=$_SESSION['USER']['idUser'];
		$arr_temp = array('dateDepot'=>$datetime,'depositaire'=>$depositaire);
		$arr = array_merge($_POST,$arr_temp);
		$result = $pdo->insert_a($arr);
		if($result){
			echo "<script>alert('Insertion réussie');window.location='../user/index.php'</script>";
		}else{
			echo "<script>alert('Insertion échouée');window.history.back()</script>";
		}
    } else {
        // redirection vers le formulaire d'authentification
        echo "Désolé, vous n’êtes pas autorisé à y accéder. Passer automatiquement à la page d'accueil après 3 s";
        echo '<meta http-equiv="refresh" content="3;url=../user/index.php">';
    }
	