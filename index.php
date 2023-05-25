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
<body class="index-body">
    <div class="container survol">
        <?php include("header.php");?><br><br><br>
        <section>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center"><br><br><br><br>
                    <p class="ps-5 slid">
                        Bienvenue à SupSDS le logiciel des etudiants de l'UFR
                    </p>
                </div>
            </div>
        </div><br><br><br>
        </section>
        <section>
            <div class="container">
                <div class="row justify-content-around">
                    <div class="col-3 offset-1 text-center">
                        <a href="inscription.php">
                            <button type="button"><i class="fa-solid fa-registered"></i> INSCRIPTION</button>
                        </a>
                    </div>
                    <div class="col-3 text-center offset-1">
                        <a href="lister.php">
                            <button type="button"><i class="fa-solid fa-list"></i> LISTER</button>
                        </a>
                    </div>
                </div><br><br><br>
            </div>
        </section>
        <?php include("footer.php");?>
    </div>


    <script src="Script/index.js"></script>
    <script src="styles/bootstrap-5.2/js/bootstrap.min.js"></script>
</body>
</html>