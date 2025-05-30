<?php
include('connexion.php');

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    if (empty($username) || empty($password) || empty($confirm_password)) {
        $error = "Tous les champs sont obligatoires.";
    } elseif ($password !== $confirm_password) {
        $error = "Les mots de passe ne correspondent pas.";
    } else {
        // Vérifier si le nom d'utilisateur existe déjà
        $stmt = $connexion->prepare("SELECT id FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        if ($stmt->fetch()) {
            $error = "Ce nom d'utilisateur est déjà pris.";
        } else {
            // Hasher le mot de passe et insérer dans la base
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $insert = $connexion->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
            if ($insert->execute(['username' => $username, 'password' => $hashed_password])) {
                $success = "Compte créé avec succès ! Vous pouvez maintenant vous connecter.";
            } else {
                $error = "Erreur lors de la création du compte.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Créer un compte</title>
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="stylesheet" href="styles/bootstrap-5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="font-awesome/css/all.css" />
</head>
<body>
<?php include("header.php"); ?>

<section><br>
    <div class="container formul"><br><br>
        <div class="header">
            <p class="head text-center">CRÉER UN COMPTE</p>
        </div><br>

        <?php if ($error): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php elseif ($success): ?>
            <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>

        <form method="POST" action="inscription.php" class="formu">
            <div class="form-control">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" name="username" id="username" required autocomplete="off" placeholder="Entrez votre nom d'utilisateur" value="<?= isset($username) ? htmlspecialchars($username) : '' ?>" />
            </div>
            <div class="form-control">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" required autocomplete="off" placeholder="Entrez un mot de passe sécurisé" />
            </div>
            <div class="form-control">
                <label for="confirm_password">Confirmer le mot de passe</label>
                <input type="password" name="confirm_password" id="confirm_password" required autocomplete="off" placeholder="Confirmez votre mot de passe" />
            </div><br><br>
            <div class="row">
                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-sm ">
                        <i class="fas fa-user-plus"></i> <span class="text-start">Créer un compte</span>
                    </button><br><br><br>
                </div>
            </div>
        </form>

    </div><br><br>
    <!-- <div class="container">
        <div class="row">
            <div class="col offset-1">
                <a href="index.php">
                    <button type="button" class="btn btn-secondary"><i class="fa-solid fa-house"></i> Accueil</button>
                </a>
            </div>
            <div class="col offset-5">
                <a href="connexion.php">
                    <button type="button" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Se connecter</button>
                </a>
            </div>
        </div>
    </div><br> -->
</section>

<?php include("footer.php"); ?>
<script src="Script/index.js"></script>
</body>
</html>
