<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link type="text/css" rel="stylesheet" href="view/frame/css/uikit.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="view/styles/index.css"  media="screen,projection"/>
    <title>GES || Meister</title>
</head>
<body>

    <?php
        if (isset($_GET['suppr'])) {
    ?>
    <div id="success" uk-modal>
        <div class="uk-modal-dialog uk-modal-body" style='background-color:rgb(49, 184, 49) !important'>
            <h2 class="uk-modal-title" style='color:white !important'><span uk-icon="icon: warning;ratio:1.5"></span>   Notification</h2>
            <p style='color:white !important'>
                Suppression du compte avec succées!
            </p>
            <p class="uk-text-right">
                <button class="uk-button" type="button" style='color:rgb(49, 184, 49) !important'>OK</button>
            </p>
        </div>
    </div>
        <?php } ?>
    <div class="uk-overflow-hidden back">
        <img src="view/styles/bodyBg/flaptP.jpg" id='back' alt="Background image" class="uk-animation-reverse uk-transform-origin-top-right" uk-scrollspy="cls: uk-animation-kenburns; repeat: true">
    </div>

    <div class="uk-container"uk-scrollspy="cls: uk-animation-fade; target: .cards; delay: 1000; repeat: true">

        <div class="uk-card uk-card-body logo">
            <span uk-icon="icon: pagekit; ratio: 5" class="meisterLogo">
        </div>

        <a href="view/logup.php" class="bBlur cards" uk-scrollspy-class="">
        <div class="uk-card uk-card-body behind">
            <h5 class="uk-card-title"><span class="creer"><span uk-icon="icon: user; ratio: 1"></span>    Créer un compte</span></h5>
        </div>
        </a>

        <a href="view/login.php" class="fBlur cards" uk-scrollspy-class="">
        <div class="uk-card uk-card-body front">
            <h5 class="uk-card-title"><span class="connex"><span uk-icon="icon:  sign-in; ratio: 1.5"></span>  Se connecter</span></h5>
        </div>
        </a>
    </div>


    <script type="text/javascript" src="view/frame/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="view/frame/js/uikit.js"></script>

    <script type="text/javascript" src="view/frame/js/uikit-icons.js"></script>

    <script src="controler/index.js"></script>

    <script>
        if (UIkit.modal($('#success')) != undefined) {
            $(document).ready(function() {
                UIkit.modal($('#success')).show();
                $('.uk-button').click(function() {
                    UIkit.modal($('#success')).hide();
                });
            });
        }
    </script>
</body>
</html>