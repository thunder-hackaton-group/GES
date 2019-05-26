<?php
    session_start();

    $connexion = FALSE;
    $identifiant = "";

    require("connexionBD.php");

    // ========================= Connexion par identifiant =========================
    $requeteLoginEtudiant = $bdd->query('SELECT nom_identifiant_etudiant, mdp_identifiant_etudiant
                                         FROM identifiant_etudiant');

    while ($donneesLogin = $requeteLoginEtudiant->fetch())
    {
        if (($donneesLogin['nom_identifiant_etudiant'] == htmlspecialchars($_POST['mail'])) && ($donneesLogin['mdp_identifiant_etudiant'] == htmlspecialchars($_POST['password'])))
        {
            $connexion = TRUE;
            $identifiant = "etudiant";
        }
    }

    $requeteLoginProfesseur = $bdd->query('SELECT nom_identifiant_professeur, mdp_identifiant_professeur
                                           FROM identifiant_professeur');

    while ($donneesLogin = $requeteLoginProfesseur->fetch())
    {
        if (($donneesLogin['nom_identifiant_professeur'] == htmlspecialchars($_POST['mail'])) && ($donneesLogin['mdp_identifiant_professeur'] == htmlspecialchars($_POST['password'])))
        {
            $connexion = TRUE;
            $identifiant = "professeur";
        }
    }

    $requeteLoginEtudiant->closeCursor();
    $requeteLoginProfesseur->closeCursor();
    
    // ========================= Connexion par adresse email =========================
    $requeteLoginEtudiant = $bdd->query('SELECT id_etudiant, email_etudiant FROM etudiant');

    while ($donneesLogin = $requeteLoginEtudiant->fetch())
    {
        if ($donneesLogin['1'] == htmlspecialchars($_POST['mail']))
        {
            $requeteEmailEtudiant = $bdd->query('SELECT id_etudiant, mdp_identifiant_etudiant FROM identifiant_etudiant');
            while ($donneesEmail = $requeteEmailEtudiant->fetch())
            {
                if ($donneesLogin['0'] == $donneesEmail['0'])
                {
                    if ($donneesEmail['1'] == htmlspecialchars($_POST['password']))
                    {
                        $connexion = TRUE;
                        $identifiant = "etudiant";
                    }
                }
            }
            $requeteEmailEtudiant->closeCursor();
        }
    }

    $requeteLoginProfesseur = $bdd->query('SELECT id_professeur, email_professeur FROM professeur');

    while ($donneesLogin = $requeteLoginProfesseur->fetch())
    {
        if ($donneesLogin['1'] == htmlspecialchars($_POST['mail']))
        {
            $requeteEmailProfesseur = $bdd->query('SELECT id_professeur, mdp_identifiant_professeur FROM identifiant_professeur');
            while ($donneesEmail = $requeteEmailProfesseur->fetch())
            {
                if ($donneesLogin['0'] == $donneesEmail['0'])
                {
                    if ($donneesEmail['1'] == htmlspecialchars($_POST['password']))
                    {
                        $connexion = TRUE;
                        $identifiant = "professeur";
                    }
                }
            }
            $requeteEmailProfesseur->closeCursor();
        }
    }

    $requeteLoginEtablissement = $bdd->query('SELECT id_etablissement, email_etablissement, password_etablissement FROM etablissement');

    while ($donneesLogin = $requeteLoginEtablissement->fetch())
    {
        if ($donneesLogin['1'] == htmlspecialchars($_POST['mail']))
        {
            if ($donneesLogin['2'] == htmlspecialchars($_POST['password']))
            {
                $connexion = TRUE;
                $identifiant = "etablissement";
            }
        }
    }

    $requeteLoginEtudiant->closeCursor();
    $requeteLoginProfesseur->closeCursor();
    $requeteLoginEtablissement->closeCursor();

    // ========================= Etat de la connexion =========================
    if ($connexion)
    {
        if ($identifiant == 'etudiant')
        {
            
        }
        elseif ($identifiant == 'professeur')
        {
            $controlProfesseur = FALSE;
            // ========== Vérification à partir de l'adresse email ==========
                $requeteLoginSession = $bdd->query('SELECT * FROM professeur
                                                    WHERE email_professeur = \'' . htmlspecialchars($_POST['mail']) . '\'');

                if ($donneesLogin = $requeteLoginSession->fetch())
                {
                    if ($donneesLogin['email_professeur'] == $_POST['mail'])
                    {
                        $controlProfesseur = TRUE;
                    }
                }
                $requeteLoginSession->closeCursor();

            // ========== Vérification à partir de l'identifiant ==========
                if ($controlProfesseur == FALSE)
                {
                    $requeteLoginSession = $bdd->query('SELECT *
                                                        FROM identifiant_professeur
                                                        WHERE nom_identifiant_professeur = \'' . htmlspecialchars($_POST['mail']) . '\'');
                    
                    if ($donneesLogin = $requeteLoginSession->fetch())
                    {
                        $controlProfesseur = TRUE;
                    }
                    $requeteLoginSession->closeCursor();
                }
                
            // ========== Assignation des cookies ==========
            if ($controlProfesseur == TRUE)
            {
                $requeteLoginSession = $bdd->query('SELECT * FROM professeur
                                                    WHERE email_professeur = \'' . htmlspecialchars($_POST['mail']) . '\'');
                
                if ($donneesLogin = $requeteLoginSession->fetch())
                {
                    setcookie('id_connecter', $donneesLogin['id_professeur'] , time() + 1*24*3600, '/', null, false, true);
                    setcookie('nom_connecter', $donneesLogin['nom_professeur'] , time() + 1*24*3600, '/', null, false, true);
                    setcookie('prenom_connecter', $donneesLogin['prenom_professeur'] , time() + 1*24*3600, '/', null, false, true);
                    setcookie('email_connecter', $donneesLogin['email_professeur'] , time() + 1*24*3600, '/', null, false, true);
                    setcookie('ville_connecter', $donneesLogin['ville_professeur'] , time() + 1*24*3600, '/', null, false, true);
                    setcookie('adresse_connecter', $donneesLogin['adresse_professeur'] , time() + 1*24*3600, '/', null, false, true);
                    setcookie('contact_connecter', $donneesLogin['contact_professeur'] , time() + 1*24*3600, '/', null, false, true);
                    setcookie('sexe_connecter', $donneesLogin['sexe_professeur'] , time() + 1*24*3600, '/', null, false, true);
                    setcookie('naissance_connecter', $donneesLogin['naissance_professeur'] , time() + 1*24*3600, '/', null, false, true);
                    setcookie('session_connecter', $donneesLogin['session_professeur'] , time() + 1*24*3600, '/', null, false, true);
                    //setcookie('date_ajout_connecter', $donneesLogin['date_ajout_professeur'] , time() + 1*24*3600, '/', null, false, true);
                }
                $requeteLoginSession->closeCursor();
            }

            header('location: ../../cote-professeur/view/accueilProfesseur.php');
        }
        else
        {
            $requeteLoginSession = $bdd->query('SELECT * FROM etablissement
                                                WHERE email_etablissement = \'' . htmlspecialchars($_POST['mail']) . '\'');

            if ($donneesLogin = $requeteLoginSession->fetch())
            {
                setcookie('id_connecter', $donneesLogin['id_etablissement'] , time() + 1*24*3600, '/', null, false, true);
                setcookie('nom_connecter', $donneesLogin['nom_etablissement'] , time() + 1*24*3600, '/', null, false, true);
                setcookie('email_connecter', $donneesLogin['email_etablissement'] , time() + 1*24*3600, '/', null, false, true);
                setcookie('adresse_connecter', $donneesLogin['adresse_etablissement'] , time() + 1*24*3600, '/', null, false, true);
                setcookie('contact_connecter', $donneesLogin['contact_etablissement'] , time() + 1*24*3600, '/', null, false, true);
                setcookie('slogan_connecter', $donneesLogin['slogan_etablissement'] , time() + 1*24*3600, '/', null, false, true);
                setcookie('date_ajout_connecter', $donneesLogin['date_ajout_etablissement'] , time() + 1*24*3600, '/', null, false, true);
            }
            
            $requeteLoginSession->closeCursor();

            header('location: ../../admin-etab/view/accueilEtablissement.php');
        }
    }
    else
    {
        echo("Veuillez vérifier toutes les informations");
    }

    if ($identifiant != "")
    {
        setcookie('type', $identifiant , time() + 1*24*3600, '/', null, false, true);
    }
?>