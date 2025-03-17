<?php
include 'partials/header_deco.php';
include 'config/DataBase.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Utilisateur</title>
    <style>
        .profile-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
            margin-top: 2rem;
        }

        .avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }

        input {
            padding: 0.5rem;
            border-radius: 0.5rem;
            border: 1px solid #ccc;
        }

        button {
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            border: none;
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }
        </style>
</head>
<body>
    <div class="profile-container">
        <h2>Profil</h2>
        <img id="avatar" class="avatar" src="default-avatar.png" alt="Avatar">
        <input type="text" id="name" placeholder="Nom">
        <input type="email" id="email" placeholder="Email">
        <button onclick="saveProfile()">Enregistrer</button>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
  // Charger les données enregistrées
  document.getElementById("name").value = localStorage.getItem("name") || "";
  document.getElementById("email").value = localStorage.getItem("email") || "";
  document.getElementById("avatar").src =
    localStorage.getItem("avatar") || "default-avatar.png";
});

  document.getElementById("avatarInput")
  document.addEventListener("change", function (event) {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        document.getElementById("avatar").src = e.target.result;
        localStorage.setItem("avatar", e.target.result);
      };
      reader.readAsDataURL(file);
    }
  });

function saveProfile() {
  localStorage.setItem("name", document.getElementById("name").value);
  localStorage.setItem("email", document.getElementById("email").value);
  alert("Profil mis à jour avec succès !");
}

</script>
</body>
</html>
