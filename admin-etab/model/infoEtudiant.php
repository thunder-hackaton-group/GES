<?php
        $requeteEtudiant = $bdd->prepare('INSERT INTO etudiant (nom_etudiant, prenom_etudiant, email_etudiant, ville_etudiant,  adresse_etudiant, contact_etudiant, sexe_etudiant, naissance_etudiant, categorie_etudiant, classe_etudiant, numero_etudiant, session_etudiant, date_ajout_etudiant, id_etablissement)
                                          VALUES (:nom_etudiant, :prenom_etudiant, :email_etudiant, :ville_etudiant, :adresse_etudiant, :contact_etudiant, :sexe_etudiant, :naissance_etudiant, :categorie_etudiant, :classe_etudiant, :numero_etudiant, :session_etudiant, NOW(), :id_etablissement)');
        $requeteEtudiant->execute(array(
            'nom_etudiant' => $_SESSION['nom_etudiant'],
            'prenom_etudiant' => $_SESSION['prenom_etudiant'],
            'email_etudiant' => $_SESSION['email_etudiant'],
            'ville_etudiant' => $_SESSION['ville_etudiant'],
            'adresse_etudiant' => $_SESSION['adresse_etudiant'],
            'contact_etudiant' => $_SESSION['contact_etudiant'],
            'sexe_etudiant' => $_SESSION['sexe_etudiant'],
            'naissance_etudiant' => $_SESSION['naissance_etudiant'],
            'categorie_etudiant' => $_SESSION['categorie_etudiant'],
            'classe_etudiant' => $_SESSION['classe_etudiant'],
            'numero_etudiant' => $_SESSION['numero_etudiant'],
            'session_etudiant' => $_SESSION['session_etudiant'],
            'id_etablissement' => $_COOKIE['id_connecter'],
        ));
        $requeteEtudiant->closeCursor();
?>
