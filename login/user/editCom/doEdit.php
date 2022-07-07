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
			    <a href="edit.php"><h2>Vos&nbsp;Commentaires</h2></a>
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
		  
		<?php 
			include("../../DBPDO.class.php");
			$resComm=$pdo -> selectAll1("SELECT * FROM COMMENTAIRE WHERE idComm = {$_GET['idComm']}" );
			// $res=$pdo -> selectAll1("SELECT * FROM extrait WHERE idExtrait = {$resComm[idExtrait]}" );
			// $res=$pdo -> selectAll1("SELECT * FROM commentaire INNER JOIN extrait WHERE commentaire.idExtrait = extrait.idExtrait and extrait.idExtrait = {$_GET['idExtrait']}" );
			// var_dump($resComm);
		?>
		
		<div class="games">
			<div class="cards" style="margin-left: -30px;">

				
				<div class="card">
					<div class="comp1">
						<?php
							if($resComm){
								// var_dump($rowComm);
								$res=$pdo -> selectAll1("SELECT * FROM EXTRAIT WHERE idExtrait = {$resComm[0]["idExtrait"]}" );
								// var_dump($res);
								foreach($res as $row){
									$espace = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
									echo "<span style='font-size:13px;'>ID de l'extrait:</span> <span style='color:32CD99;font-size:13px;'>{$row['idExtrait']}</span>{$espace}";
									echo "<span style='font-size:13px;'>ID du dépositaire:</span> <span style='color:32CD99;font-size:13px;'>{$row['depositaire']}</span></br>";
									echo "<span style='font-size:13px;'>niveau d'étude: <span style='color:32CD99;font-size:13px;'>{$row['niveau']}</span>{$espace}";
									echo "<span style='font-size:13px;'>filière:</span> <span style='color:32CD99;font-size:13px;'>{$row['filiere']}</span></br>";
									echo "<span style='font-size:13px;'>genre:</span> <span style='color:32CD99;font-size:13px;'>{$row['genre']}</span>{$espace}";
									echo "<span style='font-size:13px;'>langue maternelle:</span> <span style='color:32CD99;font-size:13px;'>{$row['langueMat']}</span></br>";
									echo "<span style='font-size:13px;'>date de dépôt:</span> <span style='color:32CD99;font-size:13px;'>{$row['dateDepot']}</span>{$espace}";
									echo "<span style='font-size:13px;'>année de création du texte:</span> <span style='color:32CD99;font-size:13px;'>{$row['anneeCreation']}</span></br>";
									echo "<hr/>";
									echo "<span style='font-size:18px;'>Contenu:</span> <span style='color:#00009C;font-size:18px;'>{$row['contenu']}</span></br>";
									echo "complément contexte: <span style='color:#3299CC;'>{$row['complement']}</span>";
								}
							}
							else{
								echo "Aucun commentaire portant sur cette extrait.";
							}
						?>
					</div>
				</div>
				
				<div class="card">
					<div class="comp1">
						<?php
						if($resComm){
							$espace = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
							echo "Votre commentaire précédent portant sur l'extrait.";
							echo "<hr/>";
							$str = $res[0]['contenu'];
							foreach($resComm as $rowComm){
								$posDeb = $rowComm['posDebut'];
								$posNum = $rowComm['posFin'] - $posDeb;
								$textSelected = substr($str,$posDeb,$posNum);
								echo "<span style='font-size:13px;'>date de saisie:</span> <span style='color:#32CD99;font-size:13px;'>{$rowComm['dateSaisie']}</span>{$espace}";
								echo "<span style='font-size:13px;'>date de dernière modif:</span> <span style='color:#32CD99;font-size:13px;'>{$rowComm['dateModif']}</span></br>";
								echo "TypeDys: <span style='color:#00009C;'> {$textSelected}</span> ===> <span style='color: #FF7F00;'>{$rowComm['typeDys']} </span></br>";
								echo "analyse: <span style='color:#FF7F00;'>{$rowComm['analyse']}</span></br>";
							}
						}
						else{
							echo "Aucun commentaire portant sur cette extrait.";
						}
						?>
					</div>
				
				</div>
				<div class="card">				
					<section>
						<article>
							<h4 style="white-space:nowrap;">Veuillez sélectionner l'extrait et cliquer sur le bouton pour commenter.</h4>
							<textarea style="border: 0;font-family: inherit;font-size: large; width: 38.75rem; height: 7rem;" id="edition" readonly><?php echo $res[0]['contenu'] ?></textarea>
							<input type="button" value="Commenter" id="ok"/>
						</article>
					</section>
				</div>
				<form id="form" action="edit_a.php">
					<input type="hidden" name="idComm" value="<?php echo $_GET['idComm']; ?>">
					<input type="hidden" name="idExtrait" value="<?php echo $resComm[0]["idExtrait"]; ?>">
					<input type="hidden" name="dateSaisie" value="<?php echo $rowComm['dateSaisie']; ?>">
					<input id="posDebut" type="hidden" name="posDebut" value="<?php echo $posDeb; ?>">
					<input id="posFin" type="hidden" name="posFin" value="<?php echo $rowComm['posFin']; ?>">
					<div class="card">
						<article>
							<h3 style="white-space:nowrap;">Après sélection, modifiez votre commentaire précédent ici.</h3>
							<input list="typeDys" maxlength="20" type="text" class="input" name="typeDys" value="<?php echo $rowComm['typeDys'];?>" placeholder="Type de dysfonctionnement" autocomplete="off" />
							<datalist id="typeDys">
								<option value="Lexique" />
								<option value="Syntaxe" />
								<option value="Orthographe" />
								<option value="Ponctuation" />
								<option value="Cohérence" />
								<option value="Cohésion" />
								<option value="argumentation" />
								<option value="Sources" />
								<option value="Citation" />
							</datalist>
							<span id="pos"> <?php echo '('.$posDeb.':'.$rowComm['posFin'].')'; ?></span>
							<div id="textSelected"><?php echo $textSelected; ?></div>
							<textarea name="analyse" style="border: 0;font-family: inherit;font-size: large; width: 38.75rem; height: 7rem;" id="comment" placeholder="Entrez votre commentaire ici..."><?php echo $rowComm['analyse']; ?></textarea>
						</article>
					</div>
					<button type = "submit" onclick="docheck(php);">MODIFIER</button>
				</form>
				
			</div>
			

			
		</div>
			
			<script>
				$("#ok").on("click",function(){
					selection(document.getElementById('edition')); // récupérer les informations sur la sélection dans la textarea 
					// Affichages
					$("#pos").html("("+posDeb+":"+posFin+")");
					$("#textSelected").html(texte);
					$("#comment").show();
					document.getElementById('posDebut').value = posDeb;
					document.getElementById('posFin').value = posFin;
				});

				let php = './edit_a.php';
			</script>
			
		</section>
	
	</main>
	<div class="circle1"></div>
	<div class="circle2"></div>
    </body>
</html>
