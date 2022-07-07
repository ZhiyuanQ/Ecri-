<?php
	header("Content-type: text/html; charset=utf-8");

/**
	@DB Operates For PDO
	@author:Yanghe
	@date:2021-04-08 22:40:32
**/


// Définir les informations de la base de données
define('DB_HOST', 'localhost');
define('DB_USER', 'qiuz');
define('DB_PWD', '5NaMepZQzu');
define('DB_NAME', 'qiuz');


class DBPDO {
    public $dbh;
    public $dsn;

    // initialisation
    function __construct() {
		$this->dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8';
		$this->connect();
    }


	// Se connecter à la base de données
	public function connect() {
		try {
			$this->dbh = new PDO($this->dsn, DB_USER, DB_PWD);
			// echo "La base est ouverte !<br/>\n";
		} catch (PDOException $e) {
			die('Erreur :'.$e->getMessage());
			echo "Accès impossible à la base ! <br/>\n";
		}
	}
	
    /**
     * connexion d'utilisateur
     *
     * @param String $login  login d'utilisateur
     * @param String $passwd mdp d'utilisateur
     * @return String statut d'utilisateur
     */
	public function selectLogin($login,$passwd){
		// interroger la bd avec login si vrai => pwd
		$sql = "SELECT * FROM USER WHERE login= '$login'";
		// préparation de la requête
		if ($stmt = $this->dbh->prepare($sql)) {
		    if ($stmt -> execute()) { // exécuter la requête
		        // la requête a bien été exécutée
		        if($result = $stmt -> fetch()){
		            //le login existe
		            if($result['mdp']==$passwd){
		                //mdp ok
						// print_r($result);
		                echo "Authentification réussie ! <br/> Bienvenue, vous avez le statut ".$result['statut'].'<br/>'.'<a href="../user/index.php">Connexion réussie, cliquez ici pour continuer</a>';;
		            } else{
		                echo "Mot de passe incorrect ! <br/>".'<a href="./index.html"> Veuillez réessayer...</a>';
		            }
		        } else {
		            echo "Le login $login n'existe pas!<br/>" . '<a href="./index.html"> Veuillez contacter l\'admin </a>';
		        }
		    } else {
		        echo "Erreur d'exécution".'<a href="./index.html"> Veuillez réessayer...</a>';
		    }
		} else {
		    echo "Erreur de BD".'<a href="./index.html"> Veuillez réessayer...</a>';
		}
		return $result;
	}
	
	
	
	/**
	 * insertion d'extrait
	 *
	 * @param Array $array
	 * @return ID
	 */
	
	public function insert_a($array){
		$sql = "INSERT INTO 
		`EXTRAIT` (contenu, niveau, filiere, genre, langueMat, complement, anneeCreation, dateDepot, depositaire) 
		VALUES (:contenu, :niveau, :filiere, :genre, :langueMat, :complement, :anneeCreation, :dateDepot, :depositaire)";
		try {
	       // Préparer les déclarations de prétraitement
	        $stmt = $this->dbh->prepare($sql);
	        // 执行语句
	        $stmt->execute($array);
	        return $this->dbh->lastInsertId();  // Renvoie l'ID correspondant à l'enregistrement inséré
		} catch (PDOException $e) {
			printf("Erreur d'insertion: %s\n", $e->getMessage());
		}
	}
	
	
	/**
	 * insertion de commentaire
	 *
	 * @param Array $array
	 * @return ID
	 */
	
	public function insert_c($array){
		$sql = "INSERT INTO
		`COMMENTAIRE` (posDebut, posFin, redacteur, typeDys,  dateSaisie, dateModif, analyse, idExtrait) 
		VALUES (:posDebut, :posFin, :redacteur, :typeDys, :dateSaisie, :dateModif, :analyse, :idExtrait)";
		try {
	       // Préparer les déclarations de prétraitement
	        $stmt = $this->dbh->prepare($sql);
	        // Exécuter l'instruction
	        $stmt->execute($array);
	        return $this->dbh->lastInsertId();  // Renvoie l'ID correspondant à l'enregistrement inséré
		} catch (PDOException $e) {
			printf("Erreur d'insertion: %s\n", $e->getMessage());
		}
	}
	
    public function update($arr){
		try {
			$sql = "UPDATE COMMENTAIRE SET posDebut=?, posFin=?, redacteur=?, typeDys=?, dateSaisie=?, dateModif=?, analyse=?, idExtrait=? WHERE idComm =?";
			$stmt = $this->dbh->prepare($sql);
			$stmt->execute([$arr['posDebut'], $arr['posFin'], $arr['redacteur'], $arr['typeDys'], $arr['dateSaisie'], $arr['dateModif'], $arr['analyse'],$arr['idExtrait'],$arr['idComm']]);
			return $stmt;
		} catch (PDOException $e) {
			printf("Erreur d'insertion: %s\n", $e->getMessage());
		}
    }


	
	
	
	/**
	 * insertion d'extrait
	 *
	 * @param** fields
	 * @return ID
	 */
	
	public function insert($contenu,$niveau, $filiere, $genre, $langueMat, $complement, $anneeCreation){
		$sql = 'INSERT INTO 
		`EXTRAIT` (contenu, niveau, filiere, genre, langueMat, complement, anneeCreation, dateDepot, depositaire) 
		VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
		try {
           // Préparer les déclarations de prétraitement
            $stmt = $this->dbh->prepare($sql);
            // Récupère la chaîne de format correspondant à l'heure actuelle：2020-05-28 13:00:00
			$datetime = date('Y-m-d H:i:s', time());
			$depositaire=$_SESSION['USER']['idUser'];
			$depositaire = intval($depositaire);
            // Bind valeur de paramètre
            $stmt->bindParam(1, $contenu, PDO::PARAM_STR);
            $stmt->bindParam(2, $niveau, PDO::PARAM_STR);
            $stmt->bindParam(3, $filiere, PDO::PARAM_STR);
            $stmt->bindParam(4, $genre, PDO::PARAM_STR);
            $stmt->bindParam(5, $langueMat, PDO::PARAM_STR);
            $stmt->bindParam(6, $complement, PDO::PARAM_STR);
            $stmt->bindParam(7, $anneeCreation, PDO::PARAM_STR);
			$stmt->bindParam(8, $datetime);
            $stmt->bindParam(9, $depositaire, PDO::PARAM_INT);

            // Exécuter l'instruction
            $stmt->execute();
            return $this->dbh->lastInsertId();  // Renvoie l'ID correspondant à l'enregistrement inséré
		} catch (PDOException $e) {
			printf("Erreur d'insertion: %s\n", $e->getMessage());
		}
	}
	
	
	/**
	 * affichage des extraits
	 *
	 * @param String $table
	 * @return Ensemble de résultats
	 */
	
	
	public function selectAll($table)
	{
		$sql = "SELECT * FROM `$table`";
		try {
			// Préparer les déclarations de prétraitement
			$stmt = $this->dbh->prepare($sql);
			// Exécuter l'instruction
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);  // Retourner tous les ensembles de résultats
		} catch (PDOException $e) {
			printf("Erreur d'affichage: %s\n", $e->getMessage());
		}
	}
	
	public function selectAll1($sql)
	{
		$this->sql = $sql;
		try {
			// Préparer les déclarations de prétraitement
			$stmt = $this->dbh->prepare($sql);
			// Exécuter l'instruction
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);  // Retourner tous les ensembles de résultats
		} catch (PDOException $e) {
			printf("Erreur d'affichage: %s\n", $e->getMessage());
		}
	}
	
	public function total($table){
		$sql = "SELECT count(*) from `$table`";
		try {
			// Préparer les déclarations de prétraitement
			$stmt = $this->dbh->prepare($sql);
			// Exécuter l'instruction
			$stmt->execute();
			$rows = $stmt->fetch();  // Retourner tous les ensembles de résultats
			return $rowCount = $rows[0];
		} catch (PDOException $e) {
			printf("Erreur d'affichage: %s\n", $e->getMessage());
		}
	}
	
	public function total1($sql){
		$this->sql = $sql;
		try {
			// Préparer les déclarations de prétraitement
			$stmt = $this->dbh->prepare($sql);
			// Exécuter l'instruction
			$stmt->execute();
			$rows = $stmt->fetch();  // Retourner tous les ensembles de résultats
			return $rowCount = $rows[0];
		} catch (PDOException $e) {
			printf("Erreur d'affichage: %s\n", $e->getMessage());
		}
	}
	
		/**
		 * destruct Fermer la connexion
		 */
	public function destruct(){
		$this->dbh = null;
	}
}



$pdo = new DBPDO;

?>