<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue ! ! !</title>
</head>

<body>
    <div>
        <?php

<?php
require('cnx.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $pass = $_POST["mot_de_passe"];

    // Vérifier si l'utilisateur existe dans la base de données
    $sql = "SELECT nom FROM utilisateur WHERE email = '$email'";
    $result = $cnp->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPass = $row["mot_de_passe"];

        // Vérifier si le mot de passe correspond
        if (password_verify($pass, $hashedPass)) {
            $nom = $row["nom"];
            echo "Bonjour, $nom!";
        } else {
            echo "Mot de passe incorrect.";
        }
    } else {
        echo "Utilisateur non trouvé.";
    }
}
?>

    </div>
    
</body>
</html>