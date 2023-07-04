<?php
    $server = "localhost";
    $user = "root";
    $password = "";

    try{
        $cnp=new PDO ("mysql:host=$server;dbname=consolidation",$user,$password);
        $cnp->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo("Connexion à la base de donnée réussie");
    }
    catch(PDOException $error){
        echo "Echec de connexion à la base de données: " .$error->getMessage();
    
    }

?>