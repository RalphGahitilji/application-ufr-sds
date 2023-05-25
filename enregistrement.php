

<?php
// Connexion à la base de données avec PDO
$dsn = "mysql:host=localhost;dbname=ufr_sds;charset=utf8mb4";
$username = "root";
$password = "";
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_EMULATE_PREPARES => false];

// Récupération des données du formulaire
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$naissance=$_POST['birth'];
$genre=$_POST['genre'];
$entry=$_POST['entry'];
$urgence=$_POST['urgence'];

try {
  $connexion = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
  die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Préparation de la requête avec des paramètres
$sql = $connexion->prepare("INSERT INTO `etudiant` (`Nom`, `Prenoms`, `Naissance`, `Genre`, `Entree`, `Besoin`) VALUES ('$nom','$prenom','$naissance','$genre','$entry','$urgence')");


// Exécution de la requête préparée
try {
  $sql->execute();
    header ("Location: index.php");
} catch (PDOException $e) {
  echo "Erreur lors de l'enregistrement : " . $e->getMessage();
}

// Fermeture de la requête et de la connexion à la base de données
$sql->closeCursor();
$connexion = null;
?>
