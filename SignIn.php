<?php
require_once 'config/DataBase.php';
include 'partials/header.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (!empty($name) && !empty($email) && !empty($password)) {
        // Hasher le mot de passe pour la sécurité
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insérer dans la base de données
        $query = $PDO->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
        try {
            $query->execute([
                'name' => $name,
                'email' => $email,
                'password' => $hashedPassword
            ]);
            echo "Utilisateur enregistré avec succès !";
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    } else {
        echo "Tous les champs sont requis.";
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
    <input type="text" name="name" placeholder="Nom" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <button type="submit">S'inscrire</button>
</form>

<p>Vous avez déjà un compte ? <a href="Login.php">Connectez-vous</a></p>
</body>
</html>

<?php

include 'partials/footer.php';

?>
