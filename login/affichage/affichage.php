<?php session_start(); ?>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Gestion d'users</title>
</head>
<body>
	<center>
		<?php 
		include "menu.php";
		include "./Page.class.php";
		include "../DBPDO.class.php";
		$page = new Page($pdo->total('EXTRAIT'));
		?>
		<h3>Affichage d'extraits</h3>
		<table width="1000" border="1.5">
		<tr>
			<th>ID</th>
			<th>contenu</th>
			<th>niveau</th>
			<th>filière</th>
			<th>genre</th>
			<th>langueMat</th>
			<th>complement</th>
			<th>dateDepot</th>
			<th>annéeCreation</th>
			<th>depositaire</th>
			<th>manipulation</th>
		</tr>
		
		<?php
			include_once("../DBPDO.class.php");
			$res=$pdo-> selectAll1("SELECT * FROM EXTRAIT ORDER BY idExtrait ASC LIMIT {$page->limit()};");
			// var_dump($res);
			foreach($res as $row){
				echo "<tr>";
					echo "<td>{$row['idExtrait']}</td>";
					echo "<td>{$row['contenu']}</td>";
					echo "<td>{$row['niveau']}</td>";
					echo "<td>{$row['filiere']}</td>";
					echo "<td>{$row['genre']}</td>";
					echo "<td>{$row['langueMat']}</td>";
					echo "<td>{$row['complement']}</td>";
					echo "<td>{$row['dateDepot']}</td>";
					echo "<td>{$row['anneeCreation']}</td>";
					echo "<td>{$row['depositaire']}</td>";
					echo "<td>
						<a href='./commenter/commenter.php?id={$row['idExtrait']}'>Commenter</a>
					</td>";
				echo "</tr>";
			}
			echo '<tr>';
				echo '<td colspan="12" align="right">'.$page->showPage().'</td>';
			echo '</tr>';
		?>
		</table>
	</center>
</body>
</html>