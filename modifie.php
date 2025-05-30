<?php
include('connexion.php');

// Vérifie si l'ID est présent dans l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Nouvelles valeurs des champs à mettre à jour (ici valeurs de test)
    $newnom = "Nouveau nom";
    $newprenom = "Nouveau prénom";
    $newnaissance = "2022-05-25";
    $newgenre = "Masculin";
    $newentry = "2023-05-25";
    $newurgence = "7000000";

    // Préparation de la requête de mise à jour
    $sql = $connexion->prepare("UPDATE etudiant 
        SET Nom = :nom, Prenoms = :prenom, Naissance = :naissance, Genre = :genre, Entree = :entree, Besoin = :besoin 
        WHERE id = :id");

    // Attribution des valeurs aux paramètres de la requête
    $sql->bindParam(':nom', $newnom);
    $sql->bindParam(':prenom', $newprenom);
    $sql->bindParam(':naissance', $newnaissance);
    $sql->bindParam(':genre', $newgenre);
    $sql->bindParam(':entree', $newentry);
    $sql->bindParam(':besoin', $newurgence);
    $sql->bindParam(':id', $id);

    // Exécution de la requête préparée
    try {
        $sql->execute();
        header("Location: lister.php"); // Redirection après succès
        exit;
    } catch (PDOException $e) {
        echo "Erreur lors de la mise à jour : " . $e->getMessage();
    }

    // Fermeture
    $sql->closeCursor();
    $connexion = null;

} else {
    echo "ID non fourni dans l'URL.";
}
?>
