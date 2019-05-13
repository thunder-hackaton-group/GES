<?php
    session_start();

    $contact_etudiant = (int) $_POST['contact_etudiant'];

    $_SESSION['nom_etudiant'] = $_POST['nom_etudiant'];
    $_SESSION['prenom_etudiant'] = $_POST['prenom_etudiant'];
    $_SESSION['adresse_etudiant'] = $_POST['adresse_etudiant'];
    $_SESSION['contact_etudiant'] = $contact_etudiant;
    $_SESSION['sexe_etudiant'] = $_POST['sexe_etudiant'];
    $_SESSION['naissance_etudiant'] = $_POST['naissance_etudiant'];
    $_SESSION['categorie_etudiant'] = $_POST['categorie_etudiant'];
    $_SESSION['classe_etudiant'] = $_POST['classe_etudiant'];
    $_SESSION['numero_etudiant'] = $_POST['numero_etudiant'];
    $_SESSION['session_etudiant'] = $_POST['session_etudiant'];

    $redondanceNom = FALSE;
    $redondanceContact = FALSE;

    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=GES;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }

    $requeteVerification = $bdd->query('SELECT * FROM etudiant');
    while ($donneeVerification = $requeteVerification->fetch())
    {
        $nom_etudiant = $donneeVerification['nom_etudiant'];
        $prenom_etudiant = $donneeVerification['prenom_etudiant'];
        
        if (($nom_etudiant == $_SESSION['nom_etudiant']) && ($prenom_etudiant == $_SESSION['prenom_etudiant']))
        {
            $redondanceNom = TRUE;
        }
        
        if ($contact_etudiant == $donneeVerification['contact_etudiant'])
        {
            $redondanceContact = TRUE;
        }
    }
    $requeteVerification->closeCursor();

    if ($contact_etudiant == 0)
    {
        echo("Veuillez entrer un bon numéro de téléphone");
    }
    elseif (($redondanceContact) || ($redondanceNom)) {
        if ($redondanceNom)
        {
            echo("Oups! Il se peut que cet étudiant a déjà un profil sur ce site"); ?> <br/> <?php
        }
        
        if ($redondanceContact)
        {
            echo("Désolé mais le numéro de téléphone est déjà assignée avec une autre personne"); ?> <br/> <?php
        }
    }
    else
    {
        if ($_POST['categorie_etudiant'] == 'primaire')
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
            session_destroy();
            $requeteEtudiant->closeCursor();
            echo('L\'ajout de l\'étudiant est terminé avec succès');
        }
        else
        {
        ?>
            <form method="post" action="connexionEtudiant.php">
                <p>
                    <label for="nom_identifiant_etudiant">Identifiant : </label>
                    <input type="text" name="nom_identifiant_etudiant" placeholder="Ex : esti003" id="nom_identifiant_etudiant" required />
                </p>

                <p>
                    <label for="mdp_identifiant_etudiant">Mot de passe : </label>
                    <input type="password" name="mdp_identifiant_etudiant" id="mdp_identifiant_etudiant" required />
                </p>

                <input type="submit" value="Valider" />
            </form>
        <?php
        }
    }
            
?>
<p>Pour revenir vers la page précédente, <a href="ajoutEtudiant.php">Cliquez ici</a></p>