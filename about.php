<?php
include "partials/header.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>À Propos - Librairie</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 3px solid;
            border-radius: 5px
        }
        </style>
</head>
<body>
    <div class="container">
        <h1>À Propos du Projet</h1>
        <p>Ce projet est une librairie en ligne qui utilise l'<strong>API Google Books</strong> pour rechercher des livres et permettre aux utilisateurs de les ajouter à leurs favoris.</p>
        <h2>Fonctionnalités</h2>
        <ul>
            <li>Recherche de livres via Google Books API</li>
            <li>Ajout/suppression de livres en favoris</li>
            <li>Gestion des utilisateurs avec connexion et espace personnel</li>
        </ul>
        <p>Pour en savoir plus sur l'API utilisée, consultez la documentation officielle : <a href="https://developers.google.com/books" target="_blank">Google Books API</a></p>
        <p>Projet réalisé dans le cadre d'un TP pour apprendre à manipuler une API en JavaScript et PHP.</p>
    </div>
</body>
</html>
