<?php session_start(); ?>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Interface utilisateur</title>
	<style>a{TEXT-DECORATION:none}.page{text-align: right}.cards,.status{margin-top: -12%;}.info{margin-inline: 20%;}.infoautre{color: coral;margin-top: -3%;margin-bottom: -4%;}</style> 
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <main>
      <section class="glass">
        <div class="dashboard">
          <div class="user">
            <img src="./images/avatar.png" alt="" />
            <h3> <?php echo ucfirst($_SESSION['USER']['prenom']).' '.ucfirst($_SESSION['USER']['nom']); ?></h3>
            <p> <?php echo ucfirst($_SESSION['USER']['statut']); ?></p>
          </div>
          <div class="links">
            <div class="link">
				<img src="./images/insertion.svg" width="50px" height="50px" alt="">
              <a href="../soumettre/insertionExtrait.php"><h2>Insertion</h2></a>
            </div>
            <div class="link">
			  <img src="./images/affichage.svg" width="50px" height="50px" alt="">
              <a href="../affichage/affichage1.php"><h2>Affichage</h2></a>
            </div>
            <div class="link">
			  <img src="./images/historique.svg" width="50px" height="50px" alt="">
              <a href=""><h2>Historiques</h2></a>
            </div>
			<div class="link">
			  <img src="./images/historique.svg" width="50px" height="50px" alt="">
			  <a href="./editCom/edit.php"><h2>Vos&nbsp;Commentaires</h2></a>
			</div>
            <div class="link">
			  <img src="./images/deconnexion.svg" width="50px" height="50px" alt="">
              <a href="../deconnexion.php"><h2>Deconnexion</h2></a>
            </div>
          </div>
          <div class="pro">
            <h2>Évaluer Former Certifier</h2>
            <img src="./images/book.svg" width="42%" height="110%" alt="" />
          </div>
        </div>

		<!-- main affichage-->
        <div class="games">
          <div class="status">
            <h2>Historiques d'insertions des extraits</h2>
          </div>
		  
         <?php
         include "../affichage/Page.class.php";
         include "../DBPDO.class.php";
         $page = new Page($pdo->total1("SELECT count(*) FROM USER LEFT JOIN EXTRAIT ON USER.idUser = EXTRAIT.depositaire WHERE idUser = {$_SESSION['USER']['idUser']}"));
         ?>
		 
		  <div class="cards">
			  
			<?php
				$res=$pdo-> selectAll1("SELECT * FROM USER LEFT JOIN EXTRAIT ON USER.idUser = EXTRAIT.depositaire WHERE idUser = {$_SESSION['USER']['idUser']} LIMIT {$page->limit()};");
				// var_dump($res);
				if($res[0]["idExtrait"]){
				foreach($res as $row){
			?>
			
			<div class="card">
              <p class="infoautre"> 
					<?php
						echo $row['niveau']."</br></br>";
						echo $row['filiere']."</br></br>";
						echo $row['genre']."</br></br>";
					?>
			  </p>
			  
              <div class="card-info">
                <p class="info">
					<?php 
						$out = strlen($row['contenu']) > 150 ? substr($row['contenu'],0,150)." ..." : $row['contenu']; 
						echo $out;
					?>
				</p>
              </div>
			  <a href="../affichage/commenter/commenter.php?idExtrait=<?php echo $row['idExtrait']; ?>"><h2 class="percentage">Détail</h2></a>
              
            </div>
				<?php 
				}
					}else{
						echo "Aucune insertion d'extrait.";
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
