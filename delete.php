<?php
include('connexion.php');

// Vérifier que l'id est bien passé en GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Préparation de la requête de suppression
    $del = $connexion->prepare("DELETE FROM etudiant WHERE id = ? LIMIT 1");

    // Exécution de la requête avec le paramètre id
    try {
        $del->execute([$id]);
        // Redirection vers la liste après suppression
        header("Location: lister.php");
        exit;
    } catch (PDOException $e) {
        echo "Erreur lors de la suppression : " . $e->getMessage();
    }
} else {
    echo "Aucun ID fourni pour la suppression.";
}
?>
