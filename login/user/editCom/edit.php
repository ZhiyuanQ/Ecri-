<?php session_start(); ?>
<html>
    <head>
		<!-- lien avec la feuille de style CSS -->
		<link
		  href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap"
		  rel="stylesheet"
		/>
		<link rel="stylesheet" href="../../user/style.css" />
		<link rel="preconnect" href="https://fonts.gstatic.com" />
		<style>a{TEXT-DECORATION:none}.page{text-align: right}.cards,.status{margin-top: -12%;}.info{margin-inline: 20%;}.infoautre{color: 32CD99;margin-top: -3%;margin-bottom: -4%;}</style>
		<!-- indication au navigateur sur l'encodage à utiliser -->
		<meta charset="UTF-8">
		<!-- titre de la fenêtre -->
        <title>Test édition</title>
		<!-- Chargement de la bibliothèque JQUERY -->
		<script type="text/javascript" src="jquery-3.3.1.js"></script>
		<script src="../../js/docheck.js" type="text/javascript" charset="utf-8"></script>
		<!-- Fonctions JQuery -->
		<script>
			// variables globales
			let posDeb = 0; // position de début de sléection
			let posFin = 0; // position de fin de sélection
			let texte = ""; // texte sélectionné
			
			function selection(el) {		
				posDeb = el.selectionStart;
				posFin = el.selectionEnd;
				texte = el.value.substring(posDeb,posFin);
			}
		</script>
    </head>

    <body>
	<main>
		
		<section class="glass">
		  <div class="dashboard">
		    <div class="user">
		      <img src="../../user/images/avatar.png" alt="" />
		      <h3> <?php echo ucfirst($_SESSION['USER']['prenom']).' '.ucfirst($_SESSION['USER']['nom']); ?></h3>
		      <p> <?php echo ucfirst($_SESSION['USER']['statut']); ?></p>
		    </div>
		    <div class="links">
		      <div class="link">
						<img src="../../user/images/insertion.svg" width="50px" height="50px" alt="">
		        <a href="../../soumettre/insertionExtrait.php"><h2>Insertion</h2></a>
		      </div>
		      <div class="link">
					  <img src="../../user/images/affichage.svg" width="50px" height="50px" alt="">
		        <a href="../../affichage/affichage1.php"><h2>Affichage</h2></a>
		      </div>
		      <div class="link">
					  <img src="../../user/images/historique.svg" width="50px" height="50px" alt="">
		        <a href="../../user/index.php"><h2>Historiques</h2></a>
		      </div>
			 <div class="link">
					 <img src="../images/historique.svg" width="50px" height="50px" alt="">
			    <a href=""><h2>Vos&nbsp;Commentaires</h2></a>
			  </div>
		      <div class="link">
					  <img src="../../user/images/deconnexion.svg" width="50px" height="50px" alt="">
		        <a href="../../deconnexion.php"><h2>Deconnexion</h2></a>
		      </div>
		    </div>
		    <div class="pro">
		      <h2>Évaluer Former Certifier</h2>
		      <img src="../../user/images/book.svg" width="42%" height="110%" alt="" />
		    </div>
		  </div>

		
		<!-- main affichage-->
		<div class="games">
		  <div class="status">
		    <h1>Vos Commentaires</h1>
		  </div>
		  
		 <?php
		 include("../../DBPDO.class.php");
		 include "../../affichage/Page.class.php";
		 
		 ?>
		 
		  <div class="cards">
			  
			<?php
				$page = new Page($pdo->total1("SELECT count(*) FROM COMMENTAIRE WHERE redacteur = {$_SESSION['USER']['idUser']}"));
				$resComm=$pdo -> selectAll1("SELECT * FROM COMMENTAIRE WHERE redacteur = {$_SESSION['USER']['idUser']} LIMIT {$page->limit()}" );
				// var_dump($resComm);
				if($resComm){
					foreach($resComm as $rowComm){
						$posDeb = $rowComm['posDebut'];
						$posNum = $rowComm['posFin'] - $rowComm['posDebut'];
						$res=$pdo -> selectAll1("SELECT * FROM EXTRAIT WHERE idExtrait = {$rowComm["idExtrait"]}" );
						
						foreach($res as $row){
			?>
			
			<div class="card">
		      <p class="infoautre"> 
					<?php
						$str = $row['contenu'];
						$textSelected = substr($str,$posDeb,$posNum);
						echo $row['niveau']."</br></br>";
						echo $row['filiere']."</br></br>";
						echo $row['genre']."</br></br>";

					?>
			  </p>
			  
		      <div class="card-info">
		        <p class="info">
					<?php 
						$out = strlen($row['contenu']) > 150 ? substr($row['contenu'],0,150)." ..." : $row['contenu']; 
						echo $out."</br></br>";
						echo "TypeDys : <span style='color:#00009C;'> {$textSelected}</span> ===> <span style='color: #FF7F00;'>{$rowComm['typeDys']} </span></br>";
					?>
				</p>
		      </div>
				<a href="doEdit.php?idComm=<?php echo $rowComm['idComm']; ?>"><h2 class="percentage">Détail</h2></a>
		      
		    </div>
				<?php
							}
						}
					}else{
						echo "Aucun commentaire déposé";
					}
				?>
			
		  </div>

		  <p class="page"><?php echo $page->showPage(); ?></p>
		</div>

		</section>
	
	</main>
	<div class="circle1"></div>
	<div class="circle2"></div>
    </body>
</html>
