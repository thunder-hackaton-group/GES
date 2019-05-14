<h2>Formulaire pour étudiant</h2>

<form method="post" action="analyseEtudiant.php">
    <p>
        <label for="nom_etudiant">Nom : </label>
        <input type="text" name="nom_etudiant" placeholder="Ex : RAZAKAMAHERY" id="nom_etudiant" required />
    </p>

    <p>
        <label for="prenom_etudiant">Prénom : </label>
        <input type="text" name="prenom_etudiant" placeholder="Ex : Christian" id="prenom_etudiant" required />
    </p>

    <p>
        <label for="email_etudiant">Adresse email : </label>
        <input type="email" name="email_etudiant" placeholder="Ex : etudiant@email.com" id="email_etudiant" />
    </p>

    <p>
        <label for="ville_etudiant">Ville : </label>
        <select name="ville_etudiant" id="ville_etudiant">
            <option value="Antananarivo">Antananarivo</option>
            <option value="Toamasina">Toamasina</option>
            <option value="Mahajanga">Mahajanga</option>
            <option value="Antsiranana">Antsiranana</option>
            <option value="Toliara">Toliara</option>
            <option value="Fianarantsoa">Fianarantsoa</option>
        </select>
    </p>

    <p>
        <label for="adresse_etudiant">Adresse : </label>
        <input type="text" name="adresse_etudiant" placeholder="Ex : Lot IVB 17 Andravoahangy" id="adresse_etudiant" required />
    </p>

    <p>
        <label for="contact_etudiant">Contact : </label>
        <input type="tel" name="contact_etudiant" placeholder="Ex : 0342906058" id="contact_etudiant" minlength="10" maxlength="10" required />
    </p>

    <p>
        <label for="sexe_etudiant">Sexe : </label>
        <select name="sexe_etudiant" id="sexe_etudiant">
            <option value="Masculin">Masculin</option>
            <option value="Féminin">Féminin</option>
        </select>
    </p>

    <p>
        <label for="naissance_etudiant">Date de naissance : </label>
        <input type="date" name="naissance_etudiant" id="naissance_etudiant" required />
    </p>

    <p>
        <label for="categorie_etudiant">Catégorie : </label>
        <select name="categorie_etudiant" id="categorie_etudiant">
            <option value="Primaire">Primaire</option>
            <option value="Collège">Collège</option>
            <option value="Lycée">Lycée</option>
        </select>
    </p>

    <p>
        <label for="classe_etudiant">Classe : </label>
        <select name="classe_etudiant" id="classe_etudiant">
            <option value="12ème">12ème</option>
            <option value="11ème">11ème</option>
            <option value="10ème">10ème</option>
            <option value="9ème">9ème</option>
            <option value="8ème">8ème</option>
            <option value="7ème">7ème</option>
            <option value="6ème">6ème</option>
            <option value="5ème">5ème</option>
            <option value="4ème">4ème</option>
            <option value="3ème">3ème</option>
            <option value="2nd">2nd</option>
            <option value="1ere L">1ère L</option>
            <option value="1ere L">1ère S</option>
            <option value="Terminale A">Terminale A</option>
            <option value="Terminale C">Terminale C</option>
            <option value="Terminale D">Terminale D</option>
        </select>
    </p>

    <p>
        <label for="numero_etudiant">Numéro de classe : </label>
        <input type="number" name="numero_etudiant" placeholder="Ex : 50" id="numero_etudiant" min="1" max="500" required />
    </p>

    <p>
        <label for="session_etudiant">Année scolaire : </label>
        <select name="session_etudiant" id="session_etudiant">
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