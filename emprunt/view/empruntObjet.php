<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>GES : Emprunt d'objet</title>
        <link rel="stylesheet" href="../../uikit/css/uikit.css" />
        <link rel="stylesheet" href="../../uikit/css/uikit.min.css" />
    </head>

    <body>
        <h2>Emprunter un objet</h2>

        <div class="uk-flex uk-flex-left uk-flex-stretch my-container">
            <div class="uk-card uk-card-default uk-card-body uk-flex-none">
                <form method="post" action="../model/analyseEmprunt.php">
                    <fieldset class="uk-fieldset">
                        <legend class="uk-legend">Article</legend>
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
                
                    <input class="bouton" type="submit" value="Valider" />
                </form>
            </div>
        </div>

        <script src="../../uikit/js/uikit.min.js"></script>
        <script src="../../uikit/js/uikit-icons.min.js"></script>
    </body>
</html>