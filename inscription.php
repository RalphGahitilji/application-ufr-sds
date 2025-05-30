<?php
include('connexion.php');

$modification = false;
$etudiant = [
    'Nom' => '',
    'Prenoms' => '',
    'Naissance' => '',
    'Genre' => '',
    'Entree' => '',
    'Besoin' => ''
];

if (isset($_GET['id'])) {
    $modification = true;
    $id = $_GET['id'];
    $stmt = $connexion->prepare("SELECT * FROM etudiant WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $etudiant = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/bootstrap-5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="font-awesome/css/all.css">
    <title>Inscription Étudiant</title>
</head>
<body>
<?php include("header.php");?>
<section><br>
    <div class="container formul"><br><br>
        <div class="header">
            <p class="head" align="center"><?= $modification ? "MODIFICATION DE L'ÉTUDIANT" : "FORMULAIRE D'INSCRIPTION" ?></p>
        </div><br>
        <form method="POST" action="enregistrement.php" class="formu">
            <?php if ($modification): ?>
                <input type="hidden" name="id" value="<?= $etudiant['id'] ?>">
            <?php endif; ?>
            <div class="form-control">
                <label for="">Nom</label>
                <input type="text" name="nom" value="<?= htmlspecialchars($etudiant['Nom']) ?>" required autocomplete="off">
            </div>
            <div class="form-control">
                <label for="">Prénom(s)</label>
                <input type="text" name="prenom" value="<?= htmlspecialchars($etudiant['Prenoms']) ?>" required autocomplete="off">
            </div>
            <div class="form-control">
                <label for="">Date de naissance</label>
                <input type="date" name="birth" value="<?= htmlspecialchars($etudiant['Naissance']) ?>" required>
            </div>
            <div class="form-control">
                <label for="">Genre</label>
                <select name="genre" class="genre" required>
                    <option value="">Genre</option>
                    <option value="Masculin" <?= $etudiant['Genre'] == 'Masculin' ? 'selected' : '' ?>>Masculin</option>
                    <option value="Feminin" <?= $etudiant['Genre'] == 'Feminin' ? 'selected' : '' ?>>Feminin</option>
                </select> 
            </div>
            <div class="form-control">
                <label for="">Date d'entrée à l'UFR</label>
                <input type="date" name="entry" value="<?= htmlspecialchars($etudiant['Entree']) ?>" required>
            </div>
            <div class="form-control">
                <label for="">Contact en cas de besoin</label>
                <input type="tel" name="urgence" value="<?= htmlspecialchars($etudiant['Besoin']) ?>" placeholder="00 00 00 00" required autocomplete="off">
            </div><br><br>
            <div class="row">
                <div align="center">
                    <button type="submit">
                        <i class="fas fa-save"></i> <?= $modification ? 'MODIFIER' : 'ENREGISTRER' ?>
                    </button><br><br><br>
                </div>
            </div>
        </form>
    </div><br><br>
    <div class="container">
        <div class="row">
            <div class="col offset-1">
                <a href="index.php">
                    <button type="button"><i class="fa-solid fa-house"></i> Accueil</button>
                </a>
            </div>
            <div class="col offset-5">
                <a href="lister.php">
                    <button type="button"><i class="fa-solid fa-list"></i> Liste</button>
                </a>
            </div>
        </div>
    </div><br>
</section>
<?php include("footer.php");?>
<script src="Script/index.js"></script>
</body>
</html>
