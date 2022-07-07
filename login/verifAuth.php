<?php
	/* Report all errors except E_NOTICE */
	error_reporting(E_ALL ^ E_NOTICE);
	header("Content-type: text/html; charset=utf-8");
	session_start();
    // traitement du formulaire d'authentification
    if (isset($_POST['login']) && isset($_POST['pwd'])) {
        $login = $_POST['login'];
        $passwd = $_POST['pwd'];
		include_once("./DBPDO.class.php");
		$res = $pdo->selectLogin($login,$passwd);
		$_SESSION['USER']['statut'] = $res['statut'];
		$_SESSION['USER']['idUser'] = $res['idUser'];
		$_SESSION['USER']['prenom'] = $res['prenom'];
		$_SESSION['USER']['nom'] = $res['nom'];
		
    } else {
        // redirection vers le formulaire d'authentification
        header("Location: ./index.html",TRUE,301);
    }