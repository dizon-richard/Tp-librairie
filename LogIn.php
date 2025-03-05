<?php
require_once 'config/DataBase.php';
include 'partials/header.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (!empty($email) && !empty($password)) {
        // Vérifier si l'utilisateur existe
        $query = $PDO->prepare("SELECT * FROM users WHERE email = :email");
        $query->execute(['email' => $email]);
        $user = $query->fetch();

        // Vérifier le mot de passe
        if ($user && password_verify($password, $user['password'])) {
            // Connexion réussie, on crée une session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['name'] = $user['name'];
            header("Location: dashboard.php"); // Redirige vers la page principale
            exit();
        } else {
            echo "Email ou mot de passe incorrect.";
        }
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href = "style.css">
    <script defer src="app.js"></script>
</head>
<body>
<form class="user" method="POST">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <button type="submit">Se connecter</button>
</form>

<p>Vous n'avez pas de compte ? <a href="SignIn.php">Inscrivez-vous</a></p>

</body>
</html>

<?php
include 'partials/footer.php';
?>



