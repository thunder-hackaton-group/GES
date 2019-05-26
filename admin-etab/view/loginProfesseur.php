<form method="post" action="../model/connexionProfesseur.php">
    <p>
        <label for="nom_identifiant_professeur">Identifiant : </label>
        <input type="text" name="nom_identifiant_professeur" placeholder="Ex : esti003" id="nom_identifiant_professeur" required />
    </p>

    <p>
        <label for="mdp_identifiant_professeur">Mot de passe : </label>
        <input type="password" name="mdp_identifiant_professeur" id="mdp_identifiant_professeur" required />
    </p>

    <input type="submit" value="Valider" />
</form>