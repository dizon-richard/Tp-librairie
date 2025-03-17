<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: SignIn.php");
    exit();
}

include "partials/header.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script defer src="app.js"></script>
    <link rel = "stylesheet" href = "style.css">
    <style>
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

    <h2>Bienvenue!</h2>
    <input type="text" id="searchInput" placeholder="Rechercher un livre">
    <button onclick="searchBooks()">Rechercher</button>
    <div id="results"></div>
</body>
</html>




<?php

include "partials/footer.php";

?>