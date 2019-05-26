<?php
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
?>