<?php
    //Connexion à une base de données
    require 'connexBdd.php';

    $req = $db->prepare('UPDATE Etablissement SET nom_etablissement=:nom,adresse_etablissement=:addr,contact_etablissement=:contact,slogan_etablissement=:slogan,email_etablissement=:mail,date_ajout_eleve=NOW() WHERE id_etablissement=:id');

    $req->execute(array(
        'id' => $_POST['id'],
        'nom' => htmlspecialchars($_POST['name']),
        'addr' => htmlspecialchars($_POST['addr']),
        'contact' => htmlspecialchars($_POST['contact']),
        'slogan' => htmlspecialchars($_POST['slogan']),
        'mail' => htmlspecialchars($_POST['mail'])
    )) or exit(print_r($req->errorInfo()));

    header('location: admin.php?modified=true');


?>