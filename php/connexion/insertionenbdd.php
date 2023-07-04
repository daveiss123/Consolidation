<?php 
require('cnx.php');

// Vérifier si le formulaire a été soumis et récupérer les entrées du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $birthday = $_POST["date_de_naissance"];
    $sexe = $_POST["sexe"];
    $email = $_POST["email"];
    $pass = $_POST["mot_de_passe"];
    $hash_pass = password_hash($pass,PASSWORD_DEFAULT);

        $sql = "INSERT INTO utilisateur(nom, prenom, date_de_naissance, sexe, email, mot_de_passe)
                VALUES('$nom', '$prenom', '$birthday', '$sexe', '$email', '$hash_pass')";

        if ($cnp->query($sql) === TRUE) {
            header("Location: connexion.php");
            exit();
            echo "Inscription réussie.";
        } 
        
    }

?>


