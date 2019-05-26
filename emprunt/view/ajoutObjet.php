<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>GES : Ajout d'objet</title>
        <link rel="stylesheet" href="../../uikit/css/uikit.css" />
        <link rel="stylesheet" href="../../uikit/css/uikit.min.css" />
    </head>

    <body>
        <h2>Ajouter un objet</h2>

        <div class="uk-flex uk-flex-left uk-flex-stretch my-container">
            <div class="uk-card uk-card-default uk-card-body uk-flex-none">
                <form method="post" action="../model/analyseEmprunt.php">
                    <fieldset class="uk-fieldset">
                        <legend class="uk-legend">Nom de l'Article</legend>
                            <div class="uk-margin">
                                <input class="uk-input uk-form-width-large" type="text" name="nom_objet" placeholder="Ex : Vidéo Projecteur" id="nom_objet" required />
                            </div>
                    </fieldset>

                    <fieldset class="uk-fieldset">
                        <legend class="uk-legend">Nombre</legend>
                            <div class="uk-margin">
                                <input class="uk-input uk-form-width-large" type="number" name="nombre_objet" placeholder="Ex : 5" id="nombre_objet" min="1" max="500" required />
                            </div>
                    </fieldset>

                    <fieldset class="uk-fieldset">
                        <legend class="uk-legend">Détails</legend>
                            <div class="uk-margin">
                                <input class="uk-input uk-form-width-large" type="text" name="detail_objet" placeholder="Ex : Nécessaire pour regarder une vidéo de loin" id="detail_objet" maxlength="1000" required />
                            </div>
                    </fieldset>

                    <!--<fieldset class="uk-fieldset">
                        <legend class="uk-legend">Etat</legend>
                            <div class="uk-margin">
                                <input class="uk-input uk-form-width-large" type="number" name="etat_objet" placeholder="Ex : Echelle de 1 à 10" id="etat_objet" min="1" max="10" maxlength="2" required />
                            </div>
                    </fieldset>-->

                    <fieldset class="uk-fieldset">
                        <legend class="uk-legend">Etat</legend>
                            <div class="uk-margin">
                                <input class="uk-range" type="range" name="etat_objet" id="etat_objet" value="1" min="1" max="10" step="1">
                            </div>
                    </fieldset>
                
                    <input class="bouton" type="submit" value="Valider" />
                </form>
            </div>
        </div>

        <script src="../../uikit/js/uikit.min.js"></script>
        <script src="../../uikit/js/uikit-icons.min.js"></script>
    </body>
</html>