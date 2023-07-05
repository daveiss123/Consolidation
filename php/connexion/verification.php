<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $pass = $_POST['mot_de_passe'];

    // Connexion à la base de données en utilisant PDO
    $server = "localhost";
    $user = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$server;dbname=consolidation", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM utilisateur WHERE email=:email AND mot_de_passe=:mot_de_passe";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':mot_de_passe', $pass);
        $stmt->execute();
        $util = $stmt->fetch();

        if ($util) {
            $_SESSION['util_id'] = $util['id'];
            header("Location: succes.php");
            exit();
        } else {
            echo "Informations d'authentification incorrectes.";
        }

        $conn = null;
    } catch (PDOException $e) {
        echo "Echec de connexion à la base de données: " . $e->getMessage();
    }
}
?>
