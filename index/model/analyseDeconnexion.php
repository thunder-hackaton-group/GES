<?php
    setcookie('id_connecter', null, -1, '/');
    setcookie('nom_connecter', null, -1, '/');
    setcookie('prenom_connecter', null, -1, '/');
    setcookie('email_connecter', null, -1, '/');
    setcookie('ville_connecter', null, -1, '/');
    setcookie('adresse_connecter', null, -1, '/');
    setcookie('contact_connecter', null, -1, '/');
    setcookie('sexe_connecter', null, -1, '/');
    setcookie('naissance_connecter', null, -1, '/');
    setcookie('categorie_connecter', null, -1, '/');
    setcookie('classe_connecter', null, -1, '/');
    setcookie('numero_connecter', null, -1, '/');
    setcookie('session_connecter', null, -1, '/');
    setcookie('slogan_connecter', null, -1, '/');
    setcookie('date_ajout_connecter', null, -1, '/');
    setcookie('id_etab_connecter', null, -1, '/');

    header('location: ../../admin-etab/view/accueilEtablissement.php');
    header('location: ../../index.php');
?>