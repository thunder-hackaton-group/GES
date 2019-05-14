<?php
    session_start();

    $contact_professeur = (int) $_POST['contact_professeur'];

    $_SESSION['nom_professeur'] = $_POST['nom_professeur'];
    $_SESSION['prenom_professeur'] = $_POST['prenom_professeur'];
    $_SESSION['email_professeur'] = $_POST['email_professeur'];
    $_SESSION['ville_professeur'] = $_POST['ville_professeur'];
    $_SESSION['adresse_professeur'] = $_POST['adresse_professeur'];
    $_SESSION['contact_professeur'] = $contact_professeur;
    $_SESSION['sexe_professeur'] = $_POST['sexe_professeur'];
    $_SESSION['naissance_professeur'] = $_POST['naissance_professeur'];
    $_SESSION['session_professeur'] = $_POST['session_professeur'];

    $redondanceNom = FALSE;
    $redondanceContact = FALSE;
    $redondanceEmail = FALSE;

    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=GES;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }

    $requeteVerificationProfesseur = $bdd->query('SELECT * FROM professeur');
    while ($donneeVerification = $requeteVerificationProfesseur->fetch())
    {
        $nom_professeur = $donneeVerification['nom_professeur'];
        $prenom_professeur = $donneeVerification['prenom_professeur'];
        
        if (($nom_professeur == $_SESSION['nom_professeur']) && ($prenom_professeur == $_SESSION['prenom_professeur']))
        {
            $redondanceNom = TRUE;
        }
        
        if ($donneeVerification['contact_professeur'] == $contact_professeur)
        {
            $redondanceContact = TRUE;
        }

        if ($donneeVerification['email_professeur'] == $_SESSION['email_professeur'])
        {
            $redondanceEmail = TRUE;
        }
    }
    $requeteVerificationProfesseur->closeCursor();

    $requeteVerificationEtudiant = $bdd->query('SELECT * FROM etudiant');
    while ($donneeVerification = $requeteVerificationEtudiant->fetch())
    {
        if ($donneeVerification['contact_etudiant'] == $contact_professeur)
        {
            $redondanceContact = TRUE;
        }

        if ($donneeVerification['email_etudiant'] == $_SESSION['email_professeur'])
        {
            $redondanceEmail = TRUE;
        }
    }
    $requeteVerificationEtudiant->closeCursor();

    if ($contact_professeur == 0)
    {
        echo("Veuillez entrer un bon numéro de téléphone");
    }
    elseif (($redondanceContact) || ($redondanceNom)) {
        if ($redondanceNom)
        {
            echo("Oups! Il se peut que ce professeur a déjà un profil sur ce site"); ?> <br/> <?php
        }
        
        if ($redondanceContact)
        {
            echo("Désolé mais le numéro de téléphone est déjà assignée avec une autre personne"); ?> <br/> <?php
        }

        if ($redondanceEmail)
        {
            echo("Pardon mais l'adresse email est déjà prise par un autre utilisateur"); ?> <br/> <?php
        }
    }
    else
    {
        ?>
            <form method="post" action="connexionProfesseur.php">
                <p>
                    <label for="nom_identifiant_professeur">Identifiant : </label>
                    <input type="text" name="nom_identifiant_professeur" placeholder="Ex : esti003" id="nom_identifiant_professeur" required />
                </p>

                <p>
                    <label for="mdp_identifiant_professeur">Mot de passe : </label>
                    <input type="password" name="mdp_identifiant_professeur" id="mdp_identifiant_professeur" required />
                </p>

                <input type="submit" value="Valider" />
            </form>
        <?php
    }
?>
<p>Pour revenir vers la page précédente, <a href="ajoutProfesseur.php">Cliquez ici</a></p>