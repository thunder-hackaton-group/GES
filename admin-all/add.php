<?php
    //Connexion à une base de données
    require 'connexBdd.php';

    $req = $db->prepare('SELECT * FROM Etablissement');
    $req->execute() or exit(print_r($req->errorInfo()));

    while($dt = $req->fetch()){
        if($dt['id_etablissement'] == htmlspecialchars($_POST['id'])){
            header('location: admin.php?alre=true');
            die();
        }
    }

    //Insertion des données dans la BDD
    $ins = $db->prepare('INSERT INTO Etablissement(id_etablissement,nom_etablissement,adresse_etablissement,contact_etablissement,slogan_etablissement,date_ajout_etablissement,email_etablissement) VALUES(:id,:nom,:addr,:contact,:slogan,NOW(),:mail)');
    $ins->bindParam(':id',$id, PDO::PARAM_STR);
    $ins->bindParam(':nom',$nom, PDO::PARAM_STR);
    $ins->bindParam(':addr',$addr, PDO::PARAM_STR);
    $ins->bindParam(':contact',$contact, PDO::PARAM_STR);
    $ins->bindParam(':slogan',$slogan, PDO::PARAM_STR);
    $ins->bindParam(':mail',$mail, PDO::PARAM_STR);

    // Récupération des entrées
    $id= htmlspecialchars($_POST['id']);
    $nom = htmlspecialchars($_POST['name']);
    $addr = htmlspecialchars($_POST['addr']);
    $contact =htmlspecialchars($_POST['contact']);
    $slogan = htmlspecialchars($_POST['slogan']);
    $mail = htmlspecialchars($_POST['mail']);

    $ins->execute();

    header('location: admin.php?done=true');
?>
