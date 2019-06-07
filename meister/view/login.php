<?php
    session_start();

    if (!empty($_SESSION['id'])) {
        header('location: ./');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link type="text/css" rel="stylesheet" href="frame/css/uikit.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="styles/login.css"  media="screen,projection"/>
    <title>Meister || Se connecter</title>
</head>
<body>

    <?php
        if(isset($_GET['error'])){
    ?>
    <div id="my_id" uk-modal>
        <div class="uk-modal-dialog uk-modal-body">
            <h2 class="uk-modal-title" style='color:white !important'><span uk-icon="icon: warning;ratio:1.2"></span>   Erreur</h2>
            <p style='color:white !important'>Adresse E-mail ou mot de passe fausse</p>
            <p class="uk-text-right">
                <button class="uk-button" type="button" style='color:red !important'>Continuer</button>
            </p>
        </div>
    </div>

    <?php } ?>

    <center>
    <div class="uk-card uk-card-default uk-width-1-2@m uk-animation-slide-top">
        <div class="uk-card-header">
            <div class="uk-grid-small uk-flex-middle" uk-grid>
                <div class="uk-width-expand">
                    <a href="../">
                        <h3 class="uk-card-title uk-margin-remove-bottom tete"><span uk-icon="icon: pagekit; ratio: 5" class="meisterLogo"></span><span class="text-tete">GES</span></h3>
                    </a>
                </div>
            </div>
        </div>
        <div class="uk-card-body">
            <form class="uk-form" action='../model/connexion.php' method='post' enctype="multipart/form-data">
                <fieldset class="uk-fieldset">

                    <div class="content">
                        <div class="uk-margin">
                            <input class="uk-input" name="mail" type="text" placeholder="E-Mail" required="required" autofocus>
                        </div>

                        <div class="uk-margin">
                        
                            <input class="uk-input" name="password" type="password" placeholder="Mot de passe" required="required">
                        </div>
                    </div>

                    

                    <div class="uk-card-footer">
                        <input type='submit' class='valider' name='submit' value="Se connecter">
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
    </center>
    <script type="text/javascript" src="frame/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="frame/js/uikit.js"></script>

    <script type="text/javascript" src="frame/js/uikit-icons.js"></script>

    <script src="../controler/login.js"></script>

    <script>
    </script>
</body>
</html>