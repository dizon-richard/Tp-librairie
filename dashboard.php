<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: SignIn.php");
    exit();
}

include "partials/header_deco.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Riri's librairie</title>
    <script defer src="app.js"></script>
    <link rel="stylesheet" href="style.css">
    <style>
        #favorites-container {
  display: flex;
  gap: 2rem;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  margin-top: 20px;
}

input[type="text"] {
  padding: 10px;
  margin: 10px;
  width: 444px;
  border: 1px solid;
  border-radius: 10px;
}

</style>
</head>
<body>
    <h1>La Riri's librairie</h1>

    <h2>Bienvenue, <?= htmlspecialchars($_SESSION['name']) ?> !</h2>
    
    <input type="text" id="searchInput" placeholder="Rechercher un livre">
    <button class="boutton" onclick="searchBooks()">Rechercher</button>

    <h3>Résultats de la recherche</h3>
    <div id="results"></div>

    <h3>Vos Favoris</h3>
    <div id="favorites-container"></div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            displayFavorites(); // Charger les favoris au chargement de la page
        });
    </script>
</body>
</html>

<?php
include "partials/footer.php";
?>