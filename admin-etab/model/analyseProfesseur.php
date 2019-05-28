<?php
    session_start();

    $contact_professeur = (int) htmlspecialchars($_POST['contact_professeur']);

    // =============== Entrer les informations saisies dans des sessions ===============
    $_SESSION['nom_professeur'] = htmlspecialchars($_POST['nom_professeur']);
    $_SESSION['prenom_professeur'] = htmlspecialchars($_POST['prenom_professeur']);
    $_SESSION['email_professeur'] = htmlspecialchars($_POST['email_professeur']);
    $_SESSION['ville_professeur'] = htmlspecialchars($_POST['ville_professeur']);
    $_SESSION['adresse_professeur'] = htmlspecialchars($_POST['adresse_professeur']);
    $_SESSION['contact_professeur'] = $contact_professeur;
    $_SESSION['sexe_professeur'] = htmlspecialchars($_POST['sexe_professeur']);
    $_SESSION['naissance_professeur'] = htmlspecialchars($_POST['naissance_professeur']);
    $_SESSION['session_professeur'] = htmlspecialchars($_POST['session_professeur']);
    // ================================================================================

    $redondanceNom = FALSE;
    $redondanceContact = FALSE;
    $redondanceEmail = FALSE;
    $error = "";

    require("connexionBD.php");

    // =============== Vérification de redondance (nom-prenom, contact, email) ===============
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
    // =======================================================================================

    // =============== Si le numéro de téléphone n'est pas bon ===============
    if ($contact_professeur == 0)
    {
        echo("Veuillez entrer un bon numéro de téléphone");
    }
    // =======================================================================
    
    // =============== Envoye de message si au moins une redondance existe ===============
    elseif (($redondanceContact) || ($redondanceNom || $redondanceEmail)) {
        if ($redondanceNom)
        {
            echo("Oups! Il se peut que ce professeur a déjà un profil sur ce site"); ?> <br/> <?php
            $error = $error . 'nom';
        }
        
        if ($redondanceContact)
        {
            echo("Désolé mais le numéro de téléphone est déjà assignée avec une autre personne"); ?> <br/> <?php
            $error = $error . 'contact';
        }

        if ($redondanceEmail)
        {
            echo("Pardon mais l'adresse email est déjà prise par un autre utilisateur"); ?> <br/> <?php
            $error = $error . 'mail';
        }
        header("location: ../view/ajoutProfesseur.php?error=$error");
    }
    // ==================================================================================

    else
    {
        include("../view/loginProfesseur.php");
    }
?>
<p>Pour revenir vers la page précédente, <a href="../view/ajoutProfesseur.php">Cliquez ici</a></p>