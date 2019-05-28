<?php
    if (isset($_COOKIE['id_connecter']))
    {
        if ($_COOKIE['type'] == "etablissement")
        {
            header('location: admin-etab/view/accueilEtablissement.php');
        }
        
        if ($_COOKIE['type'] == "professeur")
        {
            header('location: cote-professeur/view/accueilProfesseur.php');
        }

        if ($_COOKIE['type'] == "etudiant")
        {
            header('location: cote-etudiant/view/accueilEtudiant.php');
        }
    }
    else
    {
        header('location: index/view/accueilSansLogin.php');
    }
?>