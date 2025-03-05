<?php
require_once 'config/DataBase.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    $query = $PDO->prepare("INSERT INTO favorites (user_id, book_id, title, author, thumbnail) VALUES (?, ?, ?, ?, ?)");
    $query->execute([$_SESSION['user_id'], $data['bookId'], $data['title'], $data['author'], $data['thumbnail']]);
    echo "Ajouté aux favoris !";
}
?>