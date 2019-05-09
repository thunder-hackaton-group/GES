<?php
    //Connexion à une base de données
    require 'connexBdd.php';

    if (!empty($_GET['valeur'])){
        $req = $db->prepare('DELETE FROM Etablissement WHERE id_etablissement='. htmlspecialchars($_GET['valeur']));
        $req->execute() or exit(print_r($req->errorInfo()));
        header('location: admin.php?deleted=true');
    }
    else{
        header('location: admin.php');
    }

?>