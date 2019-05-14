<?php
    $connexion = FALSE;

    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=GES;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }

    // ========================= Connexion par identifiant =========================
    $requeteLoginEtudiant = $bdd->query('SELECT nom_identifiant_etudiant, mdp_identifiant_etudiant
                                         FROM identifiant_etudiant');

    while ($donneesLogin = $requeteLoginEtudiant->fetch())
    {
        if (($donneesLogin['nom_identifiant_etudiant'] == $_POST['identifiant']) && ($donneesLogin['mdp_identifiant_etudiant'] == $_POST['mot_de_passe']))
        {
            $connexion = TRUE;
        }
    }

    $requeteLoginProfesseur = $bdd->query('SELECT nom_identifiant_professeur, mdp_identifiant_professeur
                                           FROM identifiant_professeur');

    while ($donneesLogin = $requeteLoginProfesseur->fetch())
    {
        if (($donneesLogin['nom_identifiant_professeur'] == $_POST['identifiant']) && ($donneesLogin['mdp_identifiant_professeur'] == $_POST['mot_de_passe']))
        {
            $connexion = TRUE;
        }
    }

    $requeteLoginEtudiant->closeCursor();
    $requeteLoginProfesseur->closeCursor();
    
    // ========================= Connexion par adresse email =========================
    $requeteLoginEtudiant = $bdd->query('SELECT id_etudiant, email_etudiant FROM etudiant');

    while ($donneesLogin = $requeteLoginEtudiant->fetch())
    {
        if ($donneesLogin['1'] == $_POST['identifiant'])
        {
            $requeteEmailEtudiant = $bdd->query('SELECT id_etudiant, mdp_identifiant_etudiant FROM identifiant_etudiant');
            while ($donneesEmail = $requeteEmailEtudiant->fetch())
            {
                if ($donneesLogin['0'] == $donneesEmail['0'])
                {
                    if ($donneesEmail['1'] == $_POST['mot_de_passe'])
                    {
                        $connexion = TRUE;
                    }
                }
            }
            $requeteEmailEtudiant->closeCursor();
        }
    }

    $requeteLoginProfesseur = $bdd->query('SELECT id_professeur, email_professeur FROM professeur');

    while ($donneesLogin = $requeteLoginProfesseur->fetch())
    {
        if ($donneesLogin['1'] == $_POST['identifiant'])
        {
            $requeteEmailProfesseur = $bdd->query('SELECT id_professeur, mdp_identifiant_professeur FROM identifiant_professeur');
            while ($donneesEmail = $requeteEmailProfesseur->fetch())
            {
                if ($donneesLogin['0'] == $donneesEmail['0'])
                {
                    if ($donneesEmail['1'] == $_POST['mot_de_passe'])
                    {
                        $connexion = TRUE;
                    }
                }
            }
            $requeteEmailProfesseur->closeCursor();
        }
    }

    $requeteLoginEtudiant->closeCursor();
    $requeteLoginProfesseur->closeCursor();

    // ========================= Etat de la connexion =========================
    if ($connexion)
    {
        echo("La connexion est réussie avec succès");
    }
    else
    {
        echo("Veuillez vérifier toutes les informations");
    }
?>