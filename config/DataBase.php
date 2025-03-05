<?php
$host = 'localhost'; 
$dbname = 'librairie'; // Mets le bon nom de ta base de données
$username = 'root'; // Par défaut sous XAMPP
$password = ''; // Pas de mot de passe sous XAMPP

try {
    $PDO = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC 
    ]);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
