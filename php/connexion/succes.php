<?php
session_start();

if (isset($_SESSION['util_id'])) {
    $util_id = $_SESSION['util_id'];
    
    if (isset($_SESSION['nom'])) {
        $nom = $_SESSION['nom'];
        echo "Bienvenue, " . $nom;
    } else {
        echo "Veuillez vous connecter";
    }
} else {
    echo "Non connecté";
}
?>
