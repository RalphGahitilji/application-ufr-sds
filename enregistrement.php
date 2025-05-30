<?php
// Connexion à la base de données avec PDO
$dsn = "mysql:host=localhost;dbname=ufr_sds;charset=utf8mb4";
$username = "root";
$password = "";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
];

// Récupération des données du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$naissance = $_POST['birth'];
$genre = $_POST['genre'];
$entry = $_POST['entry'];
$urgence = $_POST['urgence'];

// Connexion à la base de données
try {
    $connexion = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Vérifie si c'est une modification ou un ajout
if (isset($_POST['id']) && !empty($_POST['id'])) {
    // MODIFICATION
    $id = $_POST['id'];
    $sql = $connexion->prepare("UPDATE etudiant SET 
        Nom = :nom,
        Prenoms = :prenom,
        Naissance = :naissance,
        Genre = :genre,
        Entree = :entree,
        Besoin = :urgence
        WHERE id = :id");

    $params = [
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':naissance' => $naissance,
        ':genre' => $genre,
        ':entree' => $entry,
        ':urgence' => $urgence,
        ':id' => $id
    ];
} else {
    // AJOUT
    $sql = $connexion->prepare("INSERT INTO etudiant 
        (Nom, Prenoms, Naissance, Genre, Entree, Besoin) 
        VALUES (:nom, :prenom, :naissance, :genre, :entree, :urgence)");

    $params = [
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':naissance' => $naissance,
        ':genre' => $genre,
        ':entree' => $entry,
        ':urgence' => $urgence
    ];
}

// Exécution de la requête
try {
    $sql->execute($params);
    header("Location: index.php");
    exit();
} catch (PDOException $e) {
    echo "Erreur lors de l'enregistrement : " . $e->getMessage();
}

// Fermeture
$sql->closeCursor();
$connexion = null;
?>
