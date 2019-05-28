<?php
    //Connexion à une base de données
    require 'connexBdd.php';

    // Récupération de la ligne d'authentification
    $slct = $db->prepare('SELECT auth_maitre,mdp_maitre FROM Admin_Site');
    $slct->execute() or exit(print_r($slct->errorInfo()));

    while ($data = $slct->fetch()){
        $authMaster = $data['auth_maitre'];
        $mdpMaster = $data['mdp_maitre'];
    }

    // Vérification des données rentrées
    if((htmlspecialchars($_POST['username']) == $authMaster) && (md5(htmlspecialchars($_POST['password'])) == $mdpMaster)){
        session_start();
        $_SESSION['master'] = $authMaster;
        
        header('location: admin.php');
    }
    else{
        header('location: index.php?error=true');
    }

?>