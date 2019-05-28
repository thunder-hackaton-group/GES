<?php
    session_start();

    $contact_etudiant = (int) htmlspecialchars($_POST['contact_etudiant']);

    // =============== Entrer les informations saisies dans des sessions ===============
    $_SESSION['nom_etudiant'] = htmlspecialchars($_POST['nom_etudiant']);
    $_SESSION['prenom_etudiant'] = htmlspecialchars($_POST['prenom_etudiant']);
    $_SESSION['email_etudiant'] = htmlspecialchars($_POST['email_etudiant']);
    $_SESSION['ville_etudiant'] = htmlspecialchars($_POST['ville_etudiant']);
    $_SESSION['adresse_etudiant'] = htmlspecialchars($_POST['adresse_etudiant']);
    $_SESSION['contact_etudiant'] = $contact_etudiant;
    $_SESSION['sexe_etudiant'] = htmlspecialchars($_POST['sexe_etudiant']);
    $_SESSION['naissance_etudiant'] = htmlspecialchars($_POST['naissance_etudiant']);
    $_SESSION['categorie_etudiant'] = htmlspecialchars($_POST['categorie_etudiant']);
    $_SESSION['classe_etudiant'] = htmlspecialchars($_POST['classe_etudiant']);
    $_SESSION['numero_etudiant'] = htmlspecialchars($_POST['numero_etudiant']);
    $_SESSION['session_etudiant'] = htmlspecialchars($_POST['session_etudiant']);
    // ================================================================================

    $redondanceNom = FALSE;
    $redondanceContact = FALSE;
    $redondanceEmail = FALSE;
    $error = "";
    
    require("connexionBD.php");

    // =============== Vérification de redondance (nom-prenom, contact, email) ===============
    $requeteVerificationEtudiant = $bdd->query('SELECT * FROM etudiant');
    while ($donneeVerification = $requeteVerificationEtudiant->fetch())
    {
        $nom_etudiant = $donneeVerification['nom_etudiant'];
        $prenom_etudiant = $donneeVerification['prenom_etudiant'];
        
        if (($nom_etudiant == $_SESSION['nom_etudiant']) && ($prenom_etudiant == $_SESSION['prenom_etudiant']))
        {
            $redondanceNom = TRUE;
        }
        
        if ($donneeVerification['contact_etudiant'] == $contact_etudiant)
        {
            $redondanceContact = TRUE;
        }

        if ($_SESSION['email_etudiant'] != "")
        {
            if ($donneeVerification['email_etudiant'] == $_SESSION['email_etudiant'])
            {
                $redondanceEmail = TRUE;
            }
        }
    }
    $requeteVerificationEtudiant->closeCursor();

    $requeteVerificationProfesseur = $bdd->query('SELECT * FROM professeur');
    while ($donneeVerification = $requeteVerificationProfesseur->fetch())
    {
        if ($donneeVerification['contact_professeur'] == $contact_etudiant)
        {
            $redondanceContact = TRUE;
        }

        if ($_SESSION['email_etudiant'] != "")
        {
            if ($donneeVerification['email_professeur'] == $_SESSION['email_etudiant'])
            {
                $redondanceEmail = TRUE;
            }
        }
    }
    $requeteVerificationProfesseur->closeCursor();
    // =======================================================================================

    // =============== Vérification si l'étudiant a un email ===============
    if ($_SESSION['email_etudiant'] == "")
    {
        $_SESSION['email_etudiant'] = "NULL";
    }
    // =====================================================================

    if ($contact_etudiant == 0)
    {
        echo("Veuillez entrer un bon numéro de téléphone");
    }

    // =============== Envoye de message si au moins une redondance existe ===============
    elseif (($redondanceContact) || ($redondanceNom || $redondanceEmail)) {
        if ($redondanceNom)
        {
            echo("Oups! Il se peut que cet étudiant a déjà un profil sur ce site"); ?> <br/> <?php
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
        header("location: ../view/ajoutEtudiant.php?error=$error");
    }
    // ==================================================================================

    else
    {
        // =============== Si l'étudiant est encore dans une école primaire, il n'a pas besoin de login ===============
        if (htmlspecialchars($_POST['categorie_etudiant']) == 'Primaire')
        {
            // =============== On entre tout de suite ses données ===============
            include("infoEtudiant.php");
            echo('L\'ajout de l\'étudiant est terminé avec succès');
            session_destroy();
        }
        // ============================================================================================================
        else
        {
            include("../view/loginEtudiant.php");
        }
    }
?>
<p>Pour revenir vers la page précédente, <a href="../view/ajoutEtudiant.php">Cliquez ici</a></p>