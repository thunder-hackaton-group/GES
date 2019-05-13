<?php
    session_start();

    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=GES;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }

    $requeteLogin = $bdd->query('SELECT nom_identifiant_etudiant, mdp_identifiant_etudiant
                                 FROM identifiant_etudiant');

    if ($donneesLogin = $requeteLogin->fetch())
    {
        if (($donneesLogin['nom_identifiant_etudiant'] == $_POST['identifiant']) && ($donneesLogin['mdp_identifiant_etudiant'] == $_POST['mot_de_passe']))
        {
            echo("La connexion est réussie avec succès");
        }
    }

    $requeteLogin->closeCursor();
?>