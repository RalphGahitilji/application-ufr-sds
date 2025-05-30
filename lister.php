<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/bootstrap-5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="font-awesome/css/all.css">
    <title>Document</title>
</head>
<body>
    <?php include("header.php");?>
    <br><br> 
    <h1 align="center" class="fw-bold fs-2">LISTE DES ETUDIANTS DE L'UFR</h1><br>
    <div>
        <table class="table table-striped-columns text-white tableau fw-bold " border="1" width="100%"  id="tableau">
            <tr class="fs-3">
                <th>N°</th>
                <th>Nom</th>
                <th>Prénom(s)</th>
                <th>Naissance</th>
                <th>Genre</th>
                <th>Entry</th>
                <th>P.C.B</th>
                <th colspan="2" class="ms-1 ps-2 text-center">Action</th>
            </tr>

            <?php
                $servername = "localhost";  // Nom du serveur MySQL
                $username = "root";  // Nom d'utilisateur MySQL
                $password = "";  // Mot de passe MySQL
                $dbname = "ufr_sds";  // Nom de la base de données
                try {
                    $connexion = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    // Récupération des données de la table
                    $stmt = $connexion->query("SELECT * FROM etudiant");
                    // Parcours des résultats
                    $compteur=1;
                    while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<tr>';
                        echo"<td>".$compteur. "</td>";
                        echo"<td>".$rows['Nom']."</td>";
                        echo"<td>".$rows['Prenoms']."</td>";
                        echo"<td>".$rows['Naissance']."</td>";
                        echo"<td>".$rows['Genre']."</td>";
                        echo"<td>".$rows['Entree']."</td>";
                        echo"<td>".$rows['Besoin']."</td>";
                    // Bouton Modifier avec appel JS
                        echo "<td>
                                <button type='button' class='btn btn-light' onclick='confirmerModification(" . $rows['id'] . ")'>Modifier</button>
                            </td>";
                        
                        // Bouton Supprimer inchangé
                        echo "<td>
                                <a href='delete.php?id=" . $rows['id'] . "'>
                                    <button type='button' class='btn btn-danger'>Supprimer</button>
                                </a>
                            </td>";
                        $compteur++;
                        echo '</tr>';
                    }
                } catch (PDOException $e) {
                    echo "Erreur : " . $e->getMessage();
                }
            ?>
        </table><br>
    </div><br>
    <div class="container">
            <div class="row">
                <div class="col offset-1">
                    <a href="index.php">
                        <button type="button" class="bord-green"><i class="fa-solid fa-house"></i>Acceuil</button>
                    </a>
                </div>
                <div class="col offset-5">
                    <a href="inscription.php">
                        <button type="button" class="bord-green"><i class="fa-solid fa-list"></i>Inscription</button>
                    </a>
                </div>
            </div>
        </div><br>
    <?php include("footer.php");?>
    <script src="style/bootstrap-5.2/js/bootstrap.bundle.min.js"></script>
    <script src="style/bootstrap-5.2/js/bootstrap.bundle.js.map"></script>
    <script src="style/bootstrap-5.2/js/bootstrap.bundle.min.js"></script>
    <script src="Script/index.js"></script>
    <script src="styles/bootstrap-5.2/js/bootstrap.min.js"></script>

</body>
</html>