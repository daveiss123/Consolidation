<?php 
header("Location:../pages/connexion.php");
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
            echo "Inscription réussie.";
            exit();
            
        } 
        
    }

?>

if (is_array($row)) {
        $hashed_password = $row["mot_de_passe"];
        if (password_verify($mot_de_passe, $hashed_password)) {
            $_SESSION["email"] = $row["email"];
            $_SESSION["nom"] = $row["nom"];
            $_SESSION["prenom"] = $row["prenom"];
            header("Location: succes.php");
            exit();
        } else {
            echo '<script> alert("Mot de passe et/ou email invalide")</script>';
            echo '<script> window.location.href="connexion.php"</script>';
        }
    } else {
        echo '<script> alert("Mot de passe et/ou email invalide")</script>';
        echo '<script> window.location.href="connexion.php"</script>';
    }
}
?>
