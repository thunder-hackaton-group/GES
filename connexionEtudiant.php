<?php
    session_start();

    $_SESSION['nom_identifiant'] = $_POST['nom_identifiant_etudiant'];
    $_SESSION['mdp_identifiant'] = $_POST['mdp_identifiant_etudiant'];

    (int) $id_etudiant = 0;
    $redondanceIdentifiant = FALSE;

    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=GES;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }

    $requeteVerification = $bdd->query('SELECT nom_identifiant_etudiant FROM identifiant_etudiant');
    while ($donneeVerification = $requeteVerification->fetch())
    {
        if ($donneeVerification['0'] == $_SESSION['nom_identifiant'])
        {
            $redondanceIdentifiant = TRUE;
        }
    }
    $requeteVerification->closeCursor();

    if ($redondanceIdentifiant)
    {
        echo("Veuillez entrer un autre identifiant pour cet étudiant");
    }
    else
    {
        $requeteEtudiant = $bdd->prepare('INSERT INTO etudiant (nom_etudiant, prenom_etudiant, adresse_etudiant, contact_etudiant, sexe_etudiant, naissance_etudiant, categorie_etudiant, classe_etudiant, numero_etudiant, session_etudiant)
                                          VALUES (:nom_etudiant, :prenom_etudiant, :adresse_etudiant, :contact_etudiant, :sexe_etudiant, :naissance_etudiant, :categorie_etudiant, :classe_etudiant, :numero_etudiant, :session_etudiant)');
        $requeteEtudiant->execute(array(
            'nom_etudiant' => $_SESSION['nom_etudiant'],
            'prenom_etudiant' => $_SESSION['prenom_etudiant'],
            'adresse_etudiant' => $_SESSION['adresse_etudiant'],
            'contact_etudiant' => $_SESSION['contact_etudiant'],
            'sexe_etudiant' => $_SESSION['sexe_etudiant'],
            'naissance_etudiant' => $_SESSION['naissance_etudiant'],
            'categorie_etudiant' => $_SESSION['categorie_etudiant'],
            'classe_etudiant' => $_SESSION['classe_etudiant'],
            'numero_etudiant' => $_SESSION['numero_etudiant'],
            'session_etudiant' => $_SESSION['session_etudiant']
        ));
        $requeteEtudiant->closeCursor();
        
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
        echo('L\'ajout de l\'étudiant est terminé avec succès');
    }
?>
<p>Pour revenir vers la page d'ajout, <a href="ajoutEtudiant.php">Cliquez ici</a></p>