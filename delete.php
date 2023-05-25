<?php
include('connexion.php');
// ID de l'enregistrement à supprimer
$id =$_GET['id'];
$supp = $_GET["supp"];
$del=$connexion->prepare("DELETE FROM etudiant WHERE id =? limit 1");
$del->execute(array($id));
$tab[$i]["id"];



// // Préparation de la requête de suppression
// $sql = $connexion->prepare("DELETE FROM etudiant WHERE id =? limit 1");

// // Attribution de la valeur au paramètre de la requête
// $sql->bindParam(':id', $id);

// // Exécution de la requête préparée
// try {
//   $sql->execute();
//   header("Location: lister.php");
// } catch (PDOException $e) {
//   echo "Erreur lors de la suppression : " . $e->getMessage();
// }

// // Fermeture de la requête et de la connexion à la base de données
// $sql->closeCursor();
// $connexion = null;
?>
