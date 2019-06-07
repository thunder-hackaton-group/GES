<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link type="text/css" rel="stylesheet" href="frame/css/uikit.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="styles/accueil.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="styles/header.css"  media="screen,projection"/>

    <link type="text/css" rel="stylesheet" href="styles/cardsEtud.css"  media="screen,projection"/>
    <title>Meister || Niveau d'études</title>
</head>
<body>

    <div class="nav uk-background-cover uk-light uk-flex-top back-top uk-overflow-hidden" uk-parallax="bgy: -200">
        <div class="logo uk-width-1-1 uk-text-center">
            <span uk-icon="icon: pagekit; ratio: 5" class="meisterLogo"></span>
        </div>
        <div class="uk-width-1-1 uk-text-center">
            <h2>Choisissez votre niveau d'étude</h2>
        </div>
        <div class="pos">
            <div class=" uk-child-width-1-3@m uk-grid-large uk-grid-match grids" uk-grid>
                <div>
                    <div class="uk-card uk-card-body">
                        <h3 class="uk-card-title"><span uk-icon="icon: bookmark; ratio: 1.5"></span>Collégien</h3>
                        <p>Etudiant du premier cycle en enseignement secondaire.</p>
                        <a class="uk-button uk-button-default" href="../model/addlevel.php?level=Collégien">Valider</a>
                    </div>
                </div>
                <div>
                    <div class="uk-card uk-card-body">
                        <h3 class="uk-card-title"><span uk-icon="icon: bookmark; ratio: 1.5"></span>Lycéen</h3>
                        <p>Etudiant du second cycle en enseignement secondaire.</p>
                        <a class="uk-button uk-button-default" href="../model/addlevel.php?level=Lycéen">Valider</a>
                    </div>
                </div>
                <div>
                    <div class="uk-card uk-card-body">
                        <h3 class="uk-card-title"><span uk-icon="icon: bookmark; ratio: 1.5"></span>Universitaire</h3>
                        <p>Etudiant à l'enseignement supérieur.</p>
                        <a class="uk-button uk-button-default" href="../model/addlevel.php?level=Universitaire">Valider</a>
                    </div>
                </div>
            </div>

        </div>

        
            
    </div>
   

    <script type="text/javascript" src="frame/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="frame/js/uikit.js"></script>

    <script type="text/javascript" src="frame/js/uikit-icons.js"></script>
</body>
</html>