<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>GES : Accueil - Etudiant</title>
        <link rel="stylesheet" href="../../uikit/css/uikit.css" />
        <link rel="stylesheet" href="../../uikit/css/uikit.min.css" />
    </head>

    <body>
        <h3>Bienvenu cher étudiant</h3>

        <br/>
        
        <?php
            echo ('A propos de l\'étudiant : ');  ?> <br/> <?php
            echo ('id : ' . $_COOKIE['id_connecter']); ?> <br/> <?php
            echo ('nom : ' . $_COOKIE['nom_connecter']); ?> <br/> <?php
            echo ('adresse : ' . $_COOKIE['adresse_connecter']); ?> <br/> <?php
        ?>

        <a href="../../index/model/analyseDeconnexion.php">Se déconnecter</a>

        <script src="../../uikit/js/uikit.min.js"></script>
        <script src="../../uikit/js/uikit-icons.min.js"></script>
    </body>
</html>