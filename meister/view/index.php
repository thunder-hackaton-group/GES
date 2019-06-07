<?php
    session_start();

    if (empty($_SESSION['id'])) {
        header('location: ../');
    }
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

    <link type="text/css" rel="stylesheet" href="styles/profil.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="styles/left.css"  media="screen,projection"/>
    <title>Meister || Accueil</title>
</head>
<body>
    <?php
        require 'head.php';
        require '../model/connex.php';
    ?>

    <div class="uk-child-width-expand@s uk-margin grides" uk-grid>
        
        <div class="uk-width-1-4">
            <div class="uk-card uk-card-default uk-card-body">
                <?php
                    require 'leftSide.php';
                ?>
            </div>
        </div>

        <div class="uk-overflow-hidden">
            <div class="uk-card uk-card-default">
                <ul id="js-control" class="uk-switcher uk-margin">   
                    <li>Cette page suppose toute une histoire pour se construire.
                    </li>
                    <li class="bsbs">Notifications....? Humm, je me demande quoi y mettre....</li>
                    <li>Les fameuses discussions.... On verra le résultat</li>

                    <li>Documents qui seront trés utile. Semblable aux fameux clouds.</li>
                    <li>Personnelement, je trouve que c'est le plus compliqué.</li>
                    <li class='uk-panel-scrollable' uk-height-viewport="expand: true">
                        <?php
                            require 'profil.php'
                        ?>
                    </li>
                </ul>
            </div>
            
        <div>
    </div>
    <script type="text/javascript" src="frame/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="frame/js/uikit.js"></script>

    <script type="text/javascript" src="frame/js/uikit-icons.js"></script>
    <script type='text/javascript'>
        $(document).ready(function () {
            UIkit.switcher('#js-control').show(5);
            $('#acceuil').click(function (e) { 
                UIkit.switcher('#js-control').show(0);
            });
            $('#notification').click(function (e) { 
                UIkit.switcher('#js-control').show(1);
            });
            $('#message').click(function (e) { 
                UIkit.switcher('#js-control').show(2);
            });
            $('#doc').click(function (e) { 
                UIkit.switcher('#js-control').show(3);
            });
            $('#calendar').click(function (e) { 
                UIkit.switcher('#js-control').show(4);
            });
            $('#profil').click(function (e) {
                e.preventDefault();
                UIkit.switcher('#js-control').show(5);
            });
        });
        
    </script>
    <script type="text/javascript" src="../controler/profil.js"></script>
</body>
</html>