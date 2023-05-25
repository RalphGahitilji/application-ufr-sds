<?php
    $servername = "localhost";  // Nom du serveur MySQL
    $username = "root";  // Nom d'utilisateur MySQL
    $password = "";  // Mot de passe MySQL
    $dbname = "ufr_sds";  // Nom de la base de données

    $dsn = "mysql:host=localhost;dbname=ufr_sds;charset=utf8mb4";
    $utilisateur = "root";
    $motDePasse = "";
    $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_EMULATE_PREPARES => false];
    try {
        $connexion = new PDO($dsn, $utilisateur, $motDePasse, $options);
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
      }




    // try {
    //     $connexion = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    //     // Configuration de PDO pour afficher les erreurs SQL
    //     $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     echo "Connexion à la base de données réussie";
    // } catch(PDOException $e) {
    //     echo "Erreur de connexion à la base de données : " . $e->getMessage();
    // }
?>

