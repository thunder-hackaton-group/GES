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
            $controlEtudiant = FALSE;
            $controlEtudiantMail = FALSE;
            // ========== Vérification à partir de l'adresse email ==========
                $requeteLoginSession = $bdd->query('SELECT * FROM etudiant
                                                    WHERE email_etudiant = \'' . htmlspecialchars($_POST['mail']) . '\'');

                if ($donneesLogin = $requeteLoginSession->fetch())
                {
                    if ($donneesLogin['email_etudiant'] == $_POST['mail'])
                    {
                        $requeteLoginSession = $bdd->query('SELECT * FROM etudiant
                                                            WHERE email_etudiant = \'' . htmlspecialchars($_POST['mail']) . '\'');

                        if ($donneesLogin = $requeteLoginSession->fetch())
                        {
                            setcookie('id_connecter', $donneesLogin['id_etudiant'] , time() + 1*24*3600, '/', null, false, true);
                            setcookie('nom_connecter', $donneesLogin['nom_etudiant'] , time() + 1*24*3600, '/', null, false, true);
                            setcookie('prenom_connecter', $donneesLogin['prenom_etudiant'] , time() + 1*24*3600, '/', null, false, true);
                            setcookie('email_connecter', $donneesLogin['email_etudiant'] , time() + 1*24*3600, '/', null, false, true);
                            setcookie('ville_connecter', $donneesLogin['ville_etudiant'] , time() + 1*24*3600, '/', null, false, true);
                            setcookie('adresse_connecter', $donneesLogin['adresse_etudiant'] , time() + 1*24*3600, '/', null, false, true);
                            setcookie('contact_connecter', $donneesLogin['contact_etudiant'] , time() + 1*24*3600, '/', null, false, true);
                            setcookie('sexe_connecter', $donneesLogin['sexe_etudiant'] , time() + 1*24*3600, '/', null, false, true);
                            setcookie('naissance_connecter', $donneesLogin['naissance_etudiant'] , time() + 1*24*3600, '/', null, false, true);
                            setcookie('categorie_connecter', $donneesLogin['categorie_etudiant'] , time() + 1*24*3600, '/', null, false, true);
                            setcookie('classe_connecter', $donneesLogin['classe_etudiant'] , time() + 1*24*3600, '/', null, false, true);
                            setcookie('numero_connecter', $donneesLogin['numero_etudiant'] , time() + 1*24*3600, '/', null, false, true);
                            setcookie('session_connecter', $donneesLogin['session_etudiant'] , time() + 1*24*3600, '/', null, false, true);
                            setcookie('date_ajout_connecter', $donneesLogin['date_ajout_etudiant'] , time() + 1*24*3600, '/', null, false, true);
                            setcookie('id_etab_connecter', $donneesLogin['id_etablissement'] , time() + 1*24*3600, '/', null, false, true);
                        }
                        $requeteLoginSession->closeCursor();
                        $controlEtudiantMail = TRUE;
                        $controlEtudiant = TRUE;
                    }
                }
                $requeteLoginSession->closeCursor();

            // ========== Vérification à partir de l'identifiant ==========
                if ($controlEtudiant == FALSE)
                {
                    $requeteLoginSession = $bdd->query('SELECT *
                                                        FROM identifiant_etudiant
                                                        WHERE nom_identifiant_etudiant = \'' . htmlspecialchars($_POST['mail']) . '\'');

                    if ($donneesLogin = $requeteLoginSession->fetch())
                    {
                        $controlEtudiant = TRUE;
                    }
                    $requeteLoginSession->closeCursor();
                }

            // ========== Assignation des cookies ==========
            if (($controlEtudiant == TRUE) && ($controlEtudiantMail == FALSE))
            {
                $requeteLoginSession = $bdd->query('SELECT * FROM etudiant, identifiant_etudiant
                                                    WHERE identifiant_etudiant.nom_identifiant_etudiant = \'' . htmlspecialchars($_POST['mail']) . '\'');

                if ($donneesLogin = $requeteLoginSession->fetch())
                {
                    setcookie('id_connecter', $donneesLogin['id_etudiant'] , time() + 1*24*3600, '/', null, false, true);
                            setcookie('nom_connecter', $donneesLogin['nom_etudiant'] , time() + 1*24*3600, '/', null, false, true);
                            setcookie('prenom_connecter', $donneesLogin['prenom_etudiant'] , time() + 1*24*3600, '/', null, false, true);
                            setcookie('email_connecter', $donneesLogin['email_etudiant'] , time() + 1*24*3600, '/', null, false, true);
                            setcookie('ville_connecter', $donneesLogin['ville_etudiant'] , time() + 1*24*3600, '/', null, false, true);
                            setcookie('adresse_connecter', $donneesLogin['adresse_etudiant'] , time() + 1*24*3600, '/', null, false, true);
                            setcookie('contact_connecter', $donneesLogin['contact_etudiant'] , time() + 1*24*3600, '/', null, false, true);
                            setcookie('sexe_connecter', $donneesLogin['sexe_etudiant'] , time() + 1*24*3600, '/', null, false, true);
                            setcookie('naissance_connecter', $donneesLogin['naissance_etudiant'] , time() + 1*24*3600, '/', null, false, true);
                            setcookie('categorie_connecter', $donneesLogin['categorie_etudiant'] , time() + 1*24*3600, '/', null, false, true);
                            setcookie('classe_connecter', $donneesLogin['classe_etudiant'] , time() + 1*24*3600, '/', null, false, true);
                            setcookie('numero_connecter', $donneesLogin['numero_etudiant'] , time() + 1*24*3600, '/', null, false, true);
                            setcookie('session_connecter', $donneesLogin['session_etudiant'] , time() + 1*24*3600, '/', null, false, true);
                            setcookie('date_ajout_connecter', $donneesLogin['date_ajout_etudiant'] , time() + 1*24*3600, '/', null, false, true);
                            setcookie('id_etab_connecter', $donneesLogin['id_etablissement'] , time() + 1*24*3600, '/', null, false, true);
                }
                $requeteLoginSession->closeCursor();
            }

            header('location: ../../cote-etudiant/view/accueilEtudiant.php');
        }
        elseif ($identifiant == 'professeur')
        {
            $controlProfesseur = FALSE;
            $controlProfesseurMail = FALSE;
            // ========== Vérification à partir de l'adresse email ==========
                $requeteLoginSession = $bdd->query('SELECT * FROM professeur
                                                    WHERE email_professeur = \'' . htmlspecialchars($_POST['mail']) . '\'');

                if ($donneesLogin = $requeteLoginSession->fetch())
                {
                    if ($donneesLogin['email_professeur'] == $_POST['mail'])
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
                          setcookie('date_ajout_connecter', $donneesLogin['date_ajout_professeur'] , time() + 1*24*3600, '/', null, false, true);
                      }
                      $requeteLoginSession->closeCursor();
                      $controlProfesseurMail = TRUE;
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
            if (($controlProfesseur == TRUE) && ($controlProfesseurMail == FALSE))
            {
                $requeteLoginSession = $bdd->query('SELECT * FROM professeur, identifiant_professeur
                                                    WHERE identifiant_professeur.nom_identifiant_professeur = \'' . htmlspecialchars($_POST['mail']) . '\'');

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
                    setcookie('date_ajout_connecter', $donneesLogin['date_ajout_professeur'] , time() + 1*24*3600, '/', null, false, true);
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
