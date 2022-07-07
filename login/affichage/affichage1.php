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
    <link rel="stylesheet" href="../user/style.css" />
  </head>
  <body>
    <main>
      <section class="glass">
        <div class="dashboard">
          <div class="user">
            <img src="../user/images/avatar.png" alt="" />
            <h3> <?php echo ucfirst($_SESSION['USER']['prenom']).' '.ucfirst($_SESSION['USER']['nom']); ?></h3>
            <p> <?php echo ucfirst($_SESSION['USER']['statut']); ?></p>
          </div>
          <div class="links">
            <div class="link">
				<img src="../user/images/insertion.svg" width="50px" height="50px" alt="">
              <a href="../soumettre/insertionExtrait.php"><h2>Insertion</h2></a>
            </div>
            <div class="link">
			  <img src="../user/images/affichage.svg" width="50px" height="50px" alt="">
              <a href=""><h2>Affichage</h2></a>
            </div>
            <div class="link">
			  <img src="../user/images/historique.svg" width="50px" height="50px" alt="">
              <a href="../user/index.php"><h2>Historiques</h2></a>
            </div>
            <div class="link">
			  <img src="../user/images/deconnexion.svg" width="50px" height="50px" alt="">
              <a href="../deconnexion.php"><h2>Deconnexion</h2></a>
            </div>
          </div>
          <div class="pro">
            <h2>Évaluer Former Certifier</h2>
            <img src="../user/images/book.svg" width="42%" height="110%" alt="" />
          </div>
        </div>

		<!-- main affichage-->
        <div class="games">
          <div class="status">
            <h1>Affichage</h1>
          </div>
		  
         <?php
         include "./Page.class.php";
         include "../DBPDO.class.php";
         $page = new Page($pdo->total('EXTRAIT'));
         ?>
		 
		  <div class="cards">
			  
			<?php
				$res=$pdo-> selectAll1("SELECT * FROM EXTRAIT ORDER BY idExtrait ASC LIMIT {$page->limit()};");
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
			  <a href="./commenter/commenter.php?idExtrait=<?php echo $row['idExtrait']; ?>"><h2 class="percentage">Détail</h2></a>
              
            </div>
				<?php } ?>
			
          </div>
		  
		  <p class="page"><?php echo $page->showPage(); ?></p>
		  
        </div>
      </section>
    </main>
    <div class="circle1"></div>
    <div class="circle2"></div>
  </body>
</html>
