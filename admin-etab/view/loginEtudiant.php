<form method="post" action="../model/connexionEtudiant.php">
    <p>
        <label for="nom_identifiant_etudiant">Identifiant : </label>
        <input type="text" name="nom_identifiant_etudiant" placeholder="Ex : esti003" id="nom_identifiant_etudiant" required />
    </p>

    <p>
        <label for="mdp_identifiant_etudiant">Mot de passe : </label>
        <input type="password" name="mdp_identifiant_etudiant" id="mdp_identifiant_etudiant" required />
    </p>

    <input type="submit" value="Valider" />
</form>