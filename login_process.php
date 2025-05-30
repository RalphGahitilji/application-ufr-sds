<?php
session_start();
include('index.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Récupérer l'utilisateur dans la base
    $stmt = $connexion->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Vérifier le mot de passe (hashé)
        if (password_verify($password, $user['password'])) {
            // Authentification réussie
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header('Location: dashboard.php'); // ou une autre page après connexion
            exit;
        } else {
            $error = "Mot de passe incorrect.";
        }
    } else {
        $error = "Nom d'utilisateur introuvable.";
    }
} else {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head><meta charset="UTF-8" /><title>Connexion - Erreur</title></head>
<body>
<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
<a href="index.php">Retour à la connexion</a>
</body>
</html>
