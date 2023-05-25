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
    <section ><br>
        <div class="container formul"><br><br>
            <div class="header">
                <p class="head" align="center">FORMULAIRE D'INSCRIPTION</p>
            </div><br>
            <form method="POST" action="enregistrement.php" class="formu">
                <div class="form-control">
                    <label for="">Nom</label>
                    <input type="text" name="nom" id="username" placeholder="Entrer votre nom" required autocomplete="off">
                </div>
                <div class="form-control ">
                    <label for="">Prénom(s)</label>
                    <input type="text" name="prenom" id="username" placeholder="Entrer votre Prénom.s" required autocomplete="off">
                </div>
                <div class="form-control ">
                    <label for="">Date de naissance</label>
                    <input type="date" name="birth" id="birth" required>
                </div>
                <div class="form-control ">
                    <label for="">Genre</label>
                    <select name="genre" id="genre" class="genre" required>
                        <option>Genre</option>
                        <option>Masculin</option>
                        <option>Feminin</option>
                    </select> 
                </div>
                <div class="form-control ">
                    <label for="">Date d'entrée à l'UFR</label>
                    <input type="date" name="entry" id="entry" required>
                </div>
                <div class="form-control ">
                    <label for="">Contact en cas de besoin</label>
                    <input type="tel" name="urgence" id="urgence_person" placeholder="00 00 00 00" required autocomplete="off">
                </div><br><br>
                <div class="row">
                    <div align="center">
                        <button type="submit"><i class="fas fa-save"></i>ENREGISTRER</button><br><br><br>
                    </div>
                </div>
            </form>
        </div><br><br>
        <div class="container">
            <div class="row">
                <div class="col offset-1">
                    <a href="index.php">
                        <button type="button"><i class="fa-solid fa-house"></i>Acceuil</button>
                    </a>
                </div>
                <div class="col offset-5">
                    <a href="lister.php">
                        <button type="button"><i class="fa-solid fa-list"></i>Liste</button>
                    </a>
                </div>
            </div>
        </div><br>
    </section>
    <?php include("footer.php");?>
    <script src="Script/index.js"></script>
</body>
</html>