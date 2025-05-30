<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Connexion</title>
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="stylesheet" href="styles/bootstrap-5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="font-awesome/css/all.css" />
</head>
<body>
<?php include("header.php"); ?>

<section><br>
    <div class="container formul"><br><br>
        <div class="header">
            <p class="head text-center">FORMULAIRE DE CONNEXION</p>
        </div><br>
        <form method="POST" action="login_process.php" class="formu">
            <div class="form-control">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" name="username" id="username" placeholder="Entrer votre nom d'utilisateur" required autocomplete="off" />
            </div>
            <div class="form-control">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" placeholder="Entrer votre mot de passe" required autocomplete="off" />
            </div><br><br>
            <div class="row">
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fas fa-sign-in-alt"></i> Se connecter
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
                <a href="inscription.php">
                    <button type="button" class="btn btn-success"><i class="fa-solid fa-user-plus"></i> Inscription</button>
                </a>
            </div>
        </div>
    </div><br> -->
</section>

<?php include("footer.php"); ?>
<script src="Script/index.js"></script>
</body>
</html>
