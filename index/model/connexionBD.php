<?php
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=GES;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }
    catch(Exception $e)
    {
        die('Erreur lors de la connexion à la base de données : ' . $e->getMessage());
    }
?>