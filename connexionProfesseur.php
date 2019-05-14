<?php
    session_start();

    $_SESSION['nom_identifiant'] = $_POST['nom_identifiant_professeur'];
    $_SESSION['mdp_identifiant'] = $_POST['mdp_identifiant_professeur'];

    (int) $id_professeur = 0;
    $redondanceIdentifiant = FALSE;

    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=GES;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }

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
        $requeteProfesseur = $bdd->prepare('INSERT INTO professeur (nom_professeur, prenom_professeur, email_professeur, ville_professeur, adresse_professeur, contact_professeur, sexe_professeur, naissance_professeur, session_professeur)
                                            VALUES (:nom_professeur, :prenom_professeur, :email_professeur, :ville_professeur, :adresse_professeur, :contact_professeur, :sexe_professeur, :naissance_professeur, :session_professeur)');
        $requeteProfesseur->execute(array(
            'nom_professeur' => $_SESSION['nom_professeur'],
            'prenom_professeur' => $_SESSION['prenom_professeur'],
            'email_professeur' => $_SESSION['email_professeur'],
            'ville_professeur' => $_SESSION['ville_professeur'],
            'adresse_professeur' => $_SESSION['adresse_professeur'],
            'contact_professeur' => $_SESSION['contact_professeur'],
            'sexe_professeur' => $_SESSION['sexe_professeur'],
            'naissance_professeur' => $_SESSION['naissance_professeur'],
            'session_professeur' => $_SESSION['session_professeur']
        ));
        $requeteProfesseur->closeCursor();
        
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
<p>Pour revenir vers la page d'ajout, <a href="ajoutProfesseur.php">Cliquez ici</a></p>