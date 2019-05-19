<?php

    session_start();
    
    require 'connexBdd.php';

    $sel = $db->prepare('SELECT COUNT(*) as len FROM personne');
    $sel->execute() or exit(print_r($sel->errorInfo()));

    if (empty($_SESSION['exp'])) {
        while($ep = $sel->fetch()){
            $_SESSION['exp'] = mt_rand(1,$ep['len']);
        }
    }
    
    //Récupère le nom de la personne connecté
    $slc = $db->prepare('SELECT * FROM personne WHERE id_pers=' . $_SESSION['exp']);
    $slc->execute() or exit(print_r($slc->errorInfo()));

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Materialize juste pour mon design -->
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
    <title>Messages</title>
</head>
<body>
    
    <div class="container">
        <p>
        <?php
        //Affiche le nom de la personne connecté (Choisi au hazard puisqu'il n'y a pas encore de connexion)
            while ($a = $slc->fetch()) {
                echo $a['nom_pers'];
            }
        ?>
        </p>
        <p><a href="deconnex.php" class="orange-text darken-text-3">Se deconnecter</a></p>
        <p><a href="new.php">Nouveau message</a></p>
    </div>
    <div>
        
    </div>
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script src="js/materialize.js"></script>
</body>
</html>