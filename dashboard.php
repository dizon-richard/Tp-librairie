<?php
// session_start();

// if (!isset($_SESSION['user_id'])) {
//     header("Location: SignIn.php");
//     exit();
// }

// include "partials/header.php";
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: SignIn.php");
    exit();
}

include "partials/header.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Riri's librairie</title>
    <script defer src="app.js"></script>
    <link rel="stylesheet" href="style.css">
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

<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script defer src="app.js"></script>
    <link rel = "stylesheet" href = "style.css">
</head>
<body>
    <h1>La Riri's librairie</h1>

    <h2>Bienvenue, <?= htmlspecialchars($_SESSION['name']) ?> !</h2>
    <input type="text" id="searchInput" placeholder="Rechercher un livre">
    <button class="boutton" onclick="searchBooks()">Rechercher</button>
    <div id="results"></div>
    <div id="favorites-container"></div>
    <button onclick="addToFavorites('12345', 'Titre du Livre', 'Auteur 1, Auteur 2', 'https : //lien-vers-thumbnail.jpg')">
    Ajouter aux favoris
</button>

</body>
</html> -->
