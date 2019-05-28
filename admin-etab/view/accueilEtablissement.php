<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>GES : Accueil - Etablissement</title>
        <link rel="stylesheet" href="../../uikit/css/uikit.css" />
        <link rel="stylesheet" href="../../uikit/css/uikit.min.css" />
    </head>

    <body>
        <div class="uk-width-1-2@s">
            <ul class="uk-nav-primary uk-nav-parent-icon" uk-nav>
                <li class="uk-parent">
                    <a href="#">Etudiant</a>
                    <ul class="uk-nav-sub">
                        <li><a href="ajoutEtudiant.php">Ajouter un étudiant</a></li>
                        <li><a href="#">Modifier un étudiant</a></li>
                    </ul>
                </li>
                <li class="uk-parent">
                    <a href="#">Professeur</a>
                    <ul class="uk-nav-sub">
                        <li><a href="ajoutProfesseur.php">Ajouter un professeur</a></li>
                        <li><a href="#">Modifier un professeur</a></li>
                    </ul>
                </li>
                <li class="uk-parent">
                    <a href="#">Objet</a>
                    <ul class="uk-nav-sub">
                        <li><a href="../../emprunt/view/ajoutObjet.php">Ajouter un objet</a></li>
                        <li><a href="#">Modifier un objet</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <br/>
        
        <?php
            echo ('A propos de l\'établissement : ');  ?> <br/> <?php
            echo ('id : ' . $_COOKIE['id_connecter']); ?> <br/> <?php
            echo ('nom : ' . $_COOKIE['nom_connecter']); ?> <br/> <?php
            echo ('adresse : ' . $_COOKIE['adresse_connecter']); ?> <br/> <?php
        ?>

        <a href="../../index/model/analyseDeconnexion.php">Se déconnecter</a>

        <script src="../../uikit/js/uikit.min.js"></script>
        <script src="../../uikit/js/uikit-icons.min.js"></script>
    </body>
</html>