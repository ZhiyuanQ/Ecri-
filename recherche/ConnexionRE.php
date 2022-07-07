<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .st{
            color:white;
            font-size: 16px;

        }
		.element{
			color:white;
		}
        table{
            border-right: 1px solid whitesmoke;
            border-bottom: 1px solid whitesmoke;
            white-space:nowrap;
            width: 90%;
            text-align: center;
        }
        th{
            border-collapse: collapse;
            border-spacing: 0;
            background-color:skyblue;
            color: whitesmoke;
            font-size: 18px;
            white-space: normal;
            text-align: center;


        }
        td{
            color: whitesmoke;
            font-size: 14px;
            border-left: 1px solid whitesmoke;
            border-top: 1px solid whitesmoke;
            white-space: normal;
            text-align: center;

        }
        button{
            background-color:skyblue;
            color: whitesmoke;
            font-size: large;
            white-space:nowrap;

        }
	</style>
	<title> Recherche </title>
</head>
<body background= "img/background.png">

    <center>
        <?php
        //Définir l'encodage d'exécution du fichier pour éviter le code brouillé
        header("Content-type: text/html; charset=utf-8");

        //Se connecter à la base de données : 
        //1. adresse de la base de données 2. nom d'utilisateur de la base de données 
        //3. mot de passe de la base de données 4. nom de la base de données
        $link = new mysqli('localhost','qiuz','5NaMepZQzu','qiuz');

        //Définit l'encodage pour la lecture de la base de données. Empêcher la lecture de données déformées.
        $link->set_charset("utf8");

        //Lorsqu'une connexion à une base de données échoue
        if($link->connect_error){
            die("Une connexion à une base de données échoue：".$link->connect_error);
        }
        //
        $a = $_POST["type"];
        ?>

        <h1 class = "element">Affichage d'extraits</h1>
		<table >
		<tr>
			<th classe = "element">ID</th>
			<th classe = "element">Contenu</th>
            <th classe = "element">Type de dysfonctionnement</th>
            <th classe = "element">Analyse</th>
			<th classe = "element">Niveau</th>
			<th classe = "element">Filière</th>
			<th classe = "element">Genre</th>
			<th classe = "element">Langue Maternelle</th>
			<th classe = "element">Complément</th>
			<th classe = "element">Date de Dépôt</th>
			<th classe = "element">Année Création</th>
			<th classe = "element">Dépositaire</th>
		</tr>

        <?php
        //Obtenez les résultats de données de la table EXTRAIT de la base de données via query()
        switch($a){
            case 'Lexique':
                $sql = "SELECT * FROM `COMMENTAIRE` INNER JOIN EXTRAIT WHERE COMMENTAIRE.idExtrait=EXTRAIT.idExtrait";
                $res = $link->query($sql);
                $data = $res->fetch_all();
                foreach($data as $v){
                    if ($v[4]=='Lexique'){
                        echo"<tr>";
                        echo "<td>{$v[9]}</td>";
                        echo "<td>{$v[10]}</td>";
                        echo "<td>{$v[4]}</td>";
                        echo "<td>{$v[7]}</td>";
                        echo "<td>{$v[11]}</td>";
                        echo "<td>{$v[12]}</td>";
                        echo "<td>{$v[13]}</td>";
                        echo "<td>{$v[14]}</td>";
                        echo "<td>{$v[15]}</td>";
                        echo "<td>{$v[16]}</td>";
                        echo "<td>{$v[17]}</td>";
                        echo "<td>{$v[18]}</td>";
                        echo "</tr>";
                    }
                }
                break;
            case 'Orthographe':
                $sql = "SELECT * FROM `COMMENTAIRE` INNER JOIN EXTRAIT WHERE COMMENTAIRE.idExtrait=EXTRAIT.idExtrait";
                $res = $link->query($sql);
                $data = $res->fetch_all();
                foreach($data as $v){
                    if ($v[4]=='Orthographe'){
                        echo"<tr>";
                        echo "<td>{$v[9]}</td>";
                        echo "<td>{$v[10]}</td>";
                        echo "<td>{$v[4]}</td>";
                        echo "<td>{$v[7]}</td>";
                        echo "<td>{$v[11]}</td>";
                        echo "<td>{$v[12]}</td>";
                        echo "<td>{$v[13]}</td>";
                        echo "<td>{$v[14]}</td>";
                        echo "<td>{$v[15]}</td>";
                        echo "<td>{$v[16]}</td>";
                        echo "<td>{$v[17]}</td>";
                        echo "<td>{$v[18]}</td>";
                        echo "</tr>";
                    }
                }
                break;
            case 'Ponctuation':
                $sql = "SELECT * FROM `COMMENTAIRE` INNER JOIN EXTRAIT WHERE COMMENTAIRE.idExtrait=EXTRAIT.idExtrait";
                $res = $link->query($sql);
                $data = $res->fetch_all();
                foreach($data as $v){
                    if ($v[4]=='Ponctuation'){
                        echo"<tr>";
                        echo "<td>{$v[9]}</td>";
                        echo "<td>{$v[10]}</td>";
                        echo "<td>{$v[4]}</td>";
                        echo "<td>{$v[7]}</td>";
                        echo "<td>{$v[11]}</td>";
                        echo "<td>{$v[12]}</td>";
                        echo "<td>{$v[13]}</td>";
                        echo "<td>{$v[14]}</td>";
                        echo "<td>{$v[15]}</td>";
                        echo "<td>{$v[16]}</td>";
                        echo "<td>{$v[17]}</td>";
                        echo "<td>{$v[18]}</td>";
                        echo "</tr>";
                    }
                }
                break;
            case 'Syntaxe / Construction des phrases': 
                $sql = "SELECT * FROM `COMMENTAIRE` INNER JOIN EXTRAIT WHERE COMMENTAIRE.idExtrait=EXTRAIT.idExtrait";
                $res = $link->query($sql);
                $data = $res->fetch_all();
                foreach($data as $v){
                    if ($v[4]=='Syntaxe / Construction des phrases'){
                        echo"<tr>";
                        echo "<td>{$v[9]}</td>";
                        echo "<td>{$v[10]}</td>";
                        echo "<td>{$v[4]}</td>";
                        echo "<td>{$v[7]}</td>";
                        echo "<td>{$v[11]}</td>";
                        echo "<td>{$v[12]}</td>";
                        echo "<td>{$v[13]}</td>";
                        echo "<td>{$v[14]}</td>";
                        echo "<td>{$v[15]}</td>";
                        echo "<td>{$v[16]}</td>";
                        echo "<td>{$v[17]}</td>";
                        echo "<td>{$v[18]}</td>";
                        echo "</tr>";
                    }
                }
                break;
            case 'Cohérence / cohésion / argumentation':
                $sql = "SELECT * FROM `COMMENTAIRE` INNER JOIN EXTRAIT WHERE COMMENTAIRE.idExtrait=EXTRAIT.idExtrait";
                $res = $link->query($sql);
                $data = $res->fetch_all();
                foreach($data as $v){
                    if ($v[4]=='Cohérence / cohésion / argumentation'){
                        echo"<tr>";
                        echo "<td>{$v[9]}</td>";
                        echo "<td>{$v[10]}</td>";
                        echo "<td>{$v[4]}</td>";
                        echo "<td>{$v[7]}</td>";
                        echo "<td>{$v[11]}</td>";
                        echo "<td>{$v[12]}</td>";
                        echo "<td>{$v[13]}</td>";
                        echo "<td>{$v[14]}</td>";
                        echo "<td>{$v[15]}</td>";
                        echo "<td>{$v[16]}</td>";
                        echo "<td>{$v[17]}</td>";
                        echo "<td>{$v[18]}</td>";
                        echo "</tr>";
                    }
                }
                break;
            case 'Discours rapporté / Citation/ Sources':
                $sql = "SELECT * FROM `COMMENTAIRE` INNER JOIN EXTRAIT WHERE COMMENTAIRE.idExtrait=EXTRAIT.idExtrait";
                $res = $link->query($sql);
                $data = $res->fetch_all();
                foreach($data as $v){
                    if ($v[4]=='Discours rapporté / Citation/ Sources'){
                        echo"<tr>";
                        echo "<td>{$v[9]}</td>";
                        echo "<td>{$v[10]}</td>";
                        echo "<td>{$v[4]}</td>";
                        echo "<td>{$v[7]}</td>";
                        echo "<td>{$v[11]}</td>";
                        echo "<td>{$v[12]}</td>";
                        echo "<td>{$v[13]}</td>";
                        echo "<td>{$v[14]}</td>";
                        echo "<td>{$v[15]}</td>";
                        echo "<td>{$v[16]}</td>";
                        echo "<td>{$v[17]}</td>";
                        echo "<td>{$v[18]}</td>";
                        echo "</tr>";
                    }
                }
                break;
            case 'Autres':
                $sql = "SELECT * FROM `COMMENTAIRE` INNER JOIN EXTRAIT WHERE COMMENTAIRE.idExtrait=EXTRAIT.idExtrait";
                $res = $link->query($sql);
                $data = $res->fetch_all();
                foreach($data as $v){
                    if ($v[4]=='Autres'){
                        echo"<tr>";
                        echo "<td>{$v[9]}</td>";
                        echo "<td>{$v[10]}</td>";
                        echo "<td>{$v[4]}</td>";
                        echo "<td>{$v[7]}</td>";
                        echo "<td>{$v[11]}</td>";
                        echo "<td>{$v[12]}</td>";
                        echo "<td>{$v[13]}</td>";
                        echo "<td>{$v[14]}</td>";
                        echo "<td>{$v[15]}</td>";
                        echo "<td>{$v[16]}</td>";
                        echo "<td>{$v[17]}</td>";
                        echo "<td>{$v[18]}</td>";
                        echo "</tr>";
                    }
                }
                break;
            default:
                echo '<a href="rechercheExtrait.html" class="st">Mauvais choix,cliquez pour retour</a>';
        }

        ?>
        </table>

        <h1 class = "element">Statistique</h1>
        <table>
		<tr>
			<th classe = "element">Type de dysfonctionnement</th>
			<th classe = "element">Nombre</th>
		</tr>
        <?php
        //Recherche d'occurrences dans le tableau(typeDys)
        $sql = "SELECT typeDys as 'Type de dysfonctionnement', COUNT(*) as 'Nombre' FROM COMMENTAIRE GROUP BY typeDys"; 
        $result = $link->query($sql);
        $data2 = $result->fetch_all();
        foreach($data2 as $a){
            echo"<tr>";
            echo "<td>{$a[0]}</td>";
            echo "<td>{$a[1]}</td>";
            echo"<tr>";
        }
        ?>
        </table>

        <!--niveau-->
        <table>
		<tr>
			<th classe = "element">Type de dysfonctionnement </th>
			<th classe = "element">Niveau</th>
		</tr>
        <?php
        //Recherche d'occurrences dans le tableau(niveau & typeDys)
        $sql = "SELECT COMMENTAIRE.typeDys, niveau FROM COMMENTAIRE,EXTRAIT WHERE COMMENTAIRE.idExtrait = EXTRAIT.idExtrait"; 
         
        $result = $link->query($sql);
        $data2 = $result->fetch_all();
        foreach($data2 as $a){
            echo"<tr>";
            echo "<td>{$a[0]}</td>";
            echo "<td>{$a[1]}</td>";
            echo"<tr>";
        }
        ?>
        </table>


	</center>
    <p></td></p>
    <a href="./rechercheExtrait.html"> 
        <center><button type = "button" class="main-btn" name="Retoure">Retoure</button></center>
    </a>
    </div>
</body>
</html>