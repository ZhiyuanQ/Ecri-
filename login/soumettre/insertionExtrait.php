<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	 <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.min.js"></script>
	 <script src="../js/docheck.js" type="text/javascript" charset="utf-8"></script>
	 

	<title>Écrit +</title>
	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">
	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="./css/bootstrap.min.css" />
	<!-- Owl Carousel -->
	<link type="text/css" rel="stylesheet" href="./css/owl.carousel.css" />
	<link type="text/css" rel="stylesheet" href="./css/owl.theme.default.css" />
	<!-- Magnific Popup -->
	<link type="text/css" rel="stylesheet" href="./css/magnific-popup.css" />
	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="./css/font-awesome.min.css">
	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="./css/style.css" />
</head>
<body>
	<center>
		<?php include("../affichage/menu.php");?>
		<h3>insertion d'extrait</h3>
	</center>
	<!-- soumettre form -->
	<div class="col-md-8 col-md-offset-2">
		<form id="form" class="contact-form" action="soumettre_a.php" method="post">
			<input list="niveau" maxlength="7" type="text" class="input" name="niveau" placeholder="Niveau d'étude" autocomplete="off" />
			<datalist id="niveau">
				<option value="L1" />
				<option value="L2" />
				<option value="L3" />
				<option value="Master" />
				<option value="M1" />
				<option value="M2" />
				<option value="Doctorat" />
				<option value="BTS" />
				<option value="Autre" />
			</datalist>
			<input type="text" maxlength="17" class="input" name="filiere" placeholder="Filière" autocomplete="off"/>
			<input type="text" maxlength="17" class="input" name="genre" placeholder="Genre(ex. dissertation, mémoire, devoir d'analyse type CRPE etc.)" autocomplete="off" />
			<input list="langueMat" maxlength="17" type="text" class="input" name="langueMat" placeholder="Langue maternelle" autocomplete="off" />
			<datalist id="langueMat">
				<option value="Français" />
				<option value="Autre" />
				<option value="Inconnue" />
			</datalist>
			<input type="text" class="input" name="complement" placeholder="Complément contextet" autocomplete="off" />
			<input type="text" maxlength="4" name="anneeCreation" placeholder="Année de création du texte" autocomplete="off" />
			<textarea class="input" name="contenu" placeholder="Contenu"></textarea>
			<button type = "submit" class="main-btn" name="submit" onclick="docheck(php);">ENVOYER</button>
		</form>
	</div>
	<!-- /soumettre form -->
	<script>
		let php = './soumettre_a.php';
	</script>
</body>

</html>
