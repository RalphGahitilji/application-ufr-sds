<?php
include('connexion.php');
// ID de l'enregistrement à modifier
$id = 1;

// Nouvelles valeurs des champs à mettre à jour
$newnom = "Nouveau nom";
$newprenom = "Nouveau prénom";
$newnaissance = "2022-05-25";
$newgenre = "Masculin";
$newentry = "2023-05-25";
$newurgence = "70662501";

// Préparation de la requête de mise à jour
$sql = $connexion->prepare("UPDATE `etudiant` SET `Nom`=:nom, `Prenoms`=:prenom, `Naissance`=:naissance, `Genre`=:genre, `Entree`=:entree, `Besoin`=:besoin WHERE id = :id");

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
  header("Location: lister.php");
} catch (PDOException $e) {
  echo "Erreur lors de la mise à jour : " . $e->getMessage();
}

// Fermeture de la requête et de la connexion à la base de données
$sql->closeCursor();
$connexion = null;
?>
