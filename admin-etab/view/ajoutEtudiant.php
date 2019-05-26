<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/ajoutEtudiant.css">
        <link rel="stylesheet" href="../../uikit/css/uikit.css" />
        <link rel="stylesheet" href="../../uikit/css/uikit.min.css" />
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>GES : Ajout Etudiant</title>
    </head>
    
    <body>
        <a href="accueilEtablissement">Revenir à l'accueil</a>

        <h2>Formulaire pour étudiant</h2>

        <div class="uk-flex uk-flex-left uk-flex-stretch my-container">
            <div class="uk-card uk-card-default uk-card-body uk-flex-none">
                <form method="post" action="../model/analyseEtudiant.php">
                    <?php
                        // =============== Récupération des erreurs de redondance ===============
                        include("../controller/erreurRedondance.php");
                    ?>
                    
                    <fieldset class="uk-fieldset">
                        <legend class="uk-legend">Nom</legend>
                            <div class="uk-margin">
                                <input class="uk-input uk-form-width-large" type="text" name="nom_etudiant" placeholder="Ex : RAZAKAMAHERY" id="nom_etudiant" required />
                            </div>
                    </fieldset>
                                
                    <fieldset class="uk-fieldset">
                        <legend class="uk-legend">Prénom(s)</legend>
                            <div class="uk-margin">
                                <input class="uk-input uk-form-width-large" type="text" name="prenom_etudiant" placeholder="Ex : Christian" id="prenom_etudiant" required />
                            </div>
                    </fieldset>
                                
                    <fieldset class="uk-fieldset">
                        <legend class="uk-legend">Adresse email</legend>
                            <div class="uk-margin">
                                <input class="uk-input uk-form-width-large" type="email" name="email_etudiant" placeholder="Ex : etudiant@email.com" id="email_etudiant" />
                            </div>
                    </fieldset>

                    <fieldset class="uk-fieldset">
                        <legend class="uk-legend">Ville</legend>
                            <div class="uk-margin">
                                <select class="uk-select" name="ville_etudiant" id="ville_etudiant">
                                    <option value="Antananarivo">Antananarivo</option>
                                    <option value="Toamasina">Toamasina</option>
                                    <option value="Mahajanga">Mahajanga</option>
                                    <option value="Antsiranana">Antsiranana</option>
                                    <option value="Toliara">Toliara</option>
                                    <option value="Fianarantsoa">Fianarantsoa</option>
                                </select>
                            </div>   
                    </fieldset>

                    <fieldset class="uk-fieldset">
                        <legend class="uk-legend">Adresse</legend>
                            <div class="uk-margin">
                                <input class="uk-input uk-form-width-large" type="text" name="adresse_etudiant" placeholder="Ex : Lot IVB 17 Andravoahangy" id="adresse_etudiant" required />
                            </div>
                    </fieldset>

                    <fieldset class="uk-fieldset">
                        <legend class="uk-legend">Contact </legend>
                            <div class="uk-margin">
                                <input class="uk-input uk-form-width-large"  type="tel" name="contact_etudiant" placeholder="Ex : 0342906058" id="contact_etudiant" minlength="10" maxlength="10" required />
                            </div>
                    </fieldset>

                    <fieldset class="uk-fieldset">
                        <legend class="uk-legend">Genre</legend>
                            <div class="uk-margin">
                                <select class="uk-select" name="sexe_etudiant" id="sexe_etudiant">
                                    <option value="Masculin">Masculin</option>
                                    <option value="Féminin">Féminin</option>
                                </select>
                            </div>
                    </fieldset>

                    <fieldset class="uk-fieldset">
                        <legend class="uk-legend">Date de naissance </legend>
                            <div class="uk-margin">
                                <input class="uk-input uk-form-width-large" type="date" name="naissance_etudiant" id="naissance_etudiant" required />
                            </div>
                    </fieldset>

                    <fieldset class="uk-fieldset">
                        <legend class="uk-legend">Catégorie</legend>
                            <div class="uk-margin">
                                <select class="uk-select" name="categorie_etudiant" id="categorie_etudiant">
                                    <option value="Primaire">Primaire</option>
                                    <option value="Collège">Collège</option>
                                    <option value="Lycée">Lycée</option>
                                </select>
                            </div>
                    </fieldset>

                    <fieldset class="uk-fieldset">
                        <legend class="uk-legend">Classe</legend>
                            <div class="uk-margin">
                                <select class="uk-select" name="classe_etudiant" id="classe_etudiant">
                                    <option class="primaire" value="12ème">12ème</option>
                                    <option class="primaire" value="11ème">11ème</option>
                                    <option class="primaire" value="10ème">10ème</option>
                                    <option class="primaire" value="9ème">9ème</option>
                                    <option class="primaire" value="8ème">8ème</option>
                                    <option class="primaire" value="7ème">7ème</option>
                                    <option class="college" hidden="hidden" value="6ème">6ème</option>
                                    <option class="college" hidden="hidden" value="5ème">5ème</option>
                                    <option class="college" hidden="hidden" value="4ème">4ème</option>
                                    <option class="college" hidden="hidden" value="3ème">3ème</option>
                                    <option class="lycee" hidden="hidden" value="2nd">2nd</option>
                                    <option class="lycee" hidden="hidden" value="1ere L">1ère L</option>
                                    <option class="lycee" hidden="hidden" value="1ere L">1ère S</option>
                                    <option class="lycee" hidden="hidden" value="Terminale A">Terminale A</option>
                                    <option class="lycee" hidden="hidden" value="Terminale C">Terminale C</option>
                                    <option class="lycee" hidden="hidden" value="Terminale D">Terminale D</option>
                                </select>
                            </div>
                    </fieldset>

                    <fieldset class="uk-fieldset">
                        <legend class="uk-legend">Numéro de classe </legend>
                            <div class="uk-margin">
                                <input class="uk-input uk-form-width-large" type="number" name="numero_etudiant" placeholder="Ex : 50" id="numero_etudiant" min="1" max="500" required />
                            </div>
                    </fieldset>

                    <fieldset class="uk-fieldset">
                        <legend class="uk-legend">Année scolaire</legend>
                            <div class="uk-margin">
                                <select class="uk-select" name="session_etudiant" id="session_etudiant">
                                    <option value="2016-2017">2016-2017</option>
                                    <option value="2017-2018">2017-2018</option>
                                    <option value="2018-2019">2018-2019</option>
                                    <option value="2019-2020">2019-2020</option>
                                    <option value="2020-2021">2020-2021</option>
                                    <option value="2021-2022">2021-2022</option>
                                    <option value="2022-2023">2022-2023</option>
                                    <option value="2023-2024">2023-2024</option>
                                    <option value="2024-2025">2024-2025</option>
                                    <option value="2025-2026">2025-2026</option>
                                    <option value="2026-2027">2026-2027</option>
                                    <option value="2027-2028">2027-2028</option>
                                    <option value="2028-2029">2028-2029</option>
                                    <option value="2029-2030">2029-2030</option>
                                </select>
                            </div>
                    </fieldset>
                
                    <input class="bouton" type="submit" value="Valider" />
                </form>
            </div>
        </div>
           
        <script src="../../uikit/js/uikit.min.js"></script>
        <script src="../../uikit/js/uikit-icons.min.js"></script>
        <script src="../controller/js/ajoutEtudiant.js"></script>
    </body>
</html>