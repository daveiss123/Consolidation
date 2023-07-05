<?php
require('cnx.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $pass = $_POST["mot_de_passe"];

    // Vérification de l'email et du mot de passe
    $sql = "SELECT * FROM utilisateur WHERE email = '$email'";
    $result = $cnp->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hash_pass = $row["mot_de_passe"];
    
        if (password_verify($pass, $hash_pass)) {
            $verification_success = true;
        }
    }
    
    if ($verification_success) {
        header("Location: succes.php");
        exit();
    } else {
        header("Location: erreur.php");
        exit();
    }
}
?>
