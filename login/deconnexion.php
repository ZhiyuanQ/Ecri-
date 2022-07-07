<?php 
	header("Content-type: text/html; charset=utf-8");
	session_start(); 
	$_SESSION=array(); // vide le tableau
	setcookie(session_name(),null,time()-1,'/');// invalide sessionid
	session_destroy(); // supprime la session
	echo '<script>alert("Deconnexion");location="./lr/index.html"</script>'; // renvoie vers la page d'authentification
?>