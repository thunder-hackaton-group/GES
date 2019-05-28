<?php
    session_start();

    $_SESSION['nom_identifiant'] = htmlspecialchars($_POST['nom_identifiant_etudiant']);
    $_SESSION['mdp_identifiant'] = htmlspecialchars($_POST['mdp_identifiant_etudiant']);

    (int) $id_etudiant = 0;
    $redondanceIdentifiant = FALSE;

    require("connexionBD.php");

    $requeteVerificationEtudiant = $bdd->query('SELECT nom_identifiant_etudiant FROM identifiant_etudiant');
    while ($donneeVerification = $requeteVerificationEtudiant->fetch())
    {
        if ($donneeVerification['0'] == $_SESSION['nom_identifiant'])
        {
            $redondanceIdentifiant = TRUE;
        }
    }
    $requeteVerificationEtudiant->closeCursor();

    $requeteVerificationProfesseur = $bdd->query('SELECT nom_identifiant_professeur FROM identifiant_professeur');
    while ($donneeVerification = $requeteVerificationProfesseur->fetch())
    {
        if ($donneeVerification['0'] == $_SESSION['nom_identifiant'])
        {
            $redondanceIdentifiant = TRUE;
        }
    }
    $requeteVerificationProfesseur->closeCursor();

    if ($redondanceIdentifiant)
    {
        echo("Veuillez entrer un autre identifiant pour cet étudiant");
    }
    else
    {
        require("infoEtudiant.php");
        
        $requeteSecondaire = $bdd->query('SELECT id_etudiant
                                          FROM etudiant
                                          WHERE nom_etudiant = \'' . $_SESSION['nom_etudiant'] . '\'
                                          AND prenom_etudiant = \'' . $_SESSION['prenom_etudiant'] . '\'');

        if ($donneeSecondaire = $requeteSecondaire->fetch())
        {  
            $id_etudiant = $donneeSecondaire['id_etudiant'];
        }
        $requeteSecondaire->closeCursor();
        
        $bdd->exec('INSERT INTO identifiant_etudiant (nom_identifiant_etudiant, mdp_identifiant_etudiant, id_etudiant)
                    VALUES (\'' . $_SESSION['nom_identifiant'] . '\', \'' . $_SESSION['mdp_identifiant'] . '\', '. $id_etudiant .')');
        session_destroy();
        echo("L'ajout de l'étudiant est terminé avec succès");
    }
?>
<p>Pour revenir vers la page d'ajout, <a href="../view/ajoutEtudiant.php">Cliquez ici</a></p>