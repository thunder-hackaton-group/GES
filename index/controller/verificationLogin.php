<?php
    if (!isset($_COOKIE['incr']))
    {
        header('location: ./login.php');
        setcookie('incr', '1' , time() + 1*24*3600, null, null, false, true);
    }
    else
    {
        setcookie('incr', NULL , -1);
        if (isset($_COOKIE['id_connecter']))
        {
            if ($_COOKIE['type'] == "etablissement")
            {
                header('location: ../../admin-etab/view/accueilEtablissement.php');
            }
            
            if ($_COOKIE['type'] == "professeur")
            {
                header('location: ../../cote-professeur/view/accueilProfesseur.php');
            }

            if ($_COOKIE['type'] == "etudiant")
            {
                header('location: ../../cote-etudiant/view/accueilEtudiant.php');
            }
        }
    }
?>