<?php
    session_start();

    $_SESSION['nom_identifiant'] = htmlspecialchars($_POST['nom_identifiant_professeur']);
    $_SESSION['mdp_identifiant'] = htmlspecialchars($_POST['mdp_identifiant_professeur']);

    (int) $id_professeur = 0;
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
        echo("Veuillez entrer un autre identifiant pour ce professeur");
    }
    else
    {
        require("infoProfesseur.php");
        
        $requeteSecondaire = $bdd->query('SELECT id_professeur
                                          FROM professeur
                                          WHERE nom_professeur = \'' . $_SESSION['nom_professeur'] . '\'
                                          AND prenom_professeur = \'' . $_SESSION['prenom_professeur'] . '\'');

        if ($donneeSecondaire = $requeteSecondaire->fetch())
        {  
            $id_professeur = $donneeSecondaire['id_professeur'];
        }
        $requeteSecondaire->closeCursor();
        
        $bdd->exec('INSERT INTO identifiant_professeur (nom_identifiant_professeur, mdp_identifiant_professeur, id_professeur)
                    VALUES (\'' . $_SESSION['nom_identifiant'] . '\', \'' . $_SESSION['mdp_identifiant'] . '\', '. $id_professeur .')');
        session_destroy();
        echo("L'ajout du professeur est terminé avec succès");
    }
?>
<p>Pour revenir vers la page d'ajout, <a href="../view/ajoutProfesseur.php">Cliquez ici</a></p>