<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>GES : Ajout Professeur</title>
        <link rel="stylesheet" href="../../uikit/css/uikit.css" />
        <link rel="stylesheet" href="../../uikit/css/uikit.min.css" />
    </head>

    <body>
            <a href="accueilEtablissement">Revenir à l'accueil</a>
            <h2>Formulaire pour professeur</h2>

            <form method="post" action="../model/analyseProfesseur.php">
                <?php
                    // =============== Récupération des erreurs de redondance ===============
                    include("../controller/erreurRedondance.php");
                ?>
                
                <p>
                    <label for="nom_professeur">Nom : </label>
                    <input type="text" name="nom_professeur" placeholder="Ex : RAZAKAMAHERY" id="nom_professeur" required />
                </p>

                <p>
                    <label for="prenom_professeur">Prénom : </label>
                    <input type="text" name="prenom_professeur" placeholder="Ex : Christian" id="prenom_professeur" required />
                </p>

                <p>
                    <label for="email_professeur">Adresse email : </label>
                    <input type="email" name="email_professeur" placeholder="Ex : professeur@email.com" id="email_professeur" required />
                </p>

                <p>
                    <label for="ville_professeur">Ville : </label>
                    <select name="ville_professeur" id="ville_professeur">
                        <option value="Antananarivo">Antananarivo</option>
                        <option value="Toamasina">Toamasina</option>
                        <option value="Mahajanga">Mahajanga</option>
                        <option value="Antsiranana">Antsiranana</option>
                        <option value="Toliara">Toliara</option>
                        <option value="Fianarantsoa">Fianarantsoa</option>
                    </select>
                </p>

                <p>
                    <label for="adresse_professeur">Adresse : </label>
                    <input type="text" name="adresse_professeur" placeholder="Ex : Lot IVB 17 Andravoahangy" id="adresse_professeur" required />
                </p>

                <p>
                    <label for="contact_professeur">Contact : </label>
                    <input type="tel" name="contact_professeur" placeholder="Ex : 0342906058" id="contact_professeur" minlength="10" maxlength="10" required />
                </p>

                <p>
                    <label for="sexe_professeur">Sexe : </label>
                    <select name="sexe_professeur" id="sexe_professeur">
                        <option value="Masculin">Masculin</option>
                        <option value="Féminin">Féminin</option>
                    </select>
                </p>

                <p>
                    <label for="naissance_professeur">Date de naissance : </label>
                    <input type="date" name="naissance_professeur" id="naissance_professeur" required />
                </p>

                <p>
                    <label for="session_professeur">Année scolaire : </label>
                    <select name="session_professeur" id="session_professeur">
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
                </p>

                <input type="submit" value="Valider" />
            </form>
    </body>
</html>