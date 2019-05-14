<h2>Formulaire pour étudiant</h2>

<form method="post" action="analyseLogin.php">
    <p>
        <label for="identifiant">Email ou identifiant : </label>
        <input type="text" name="identifiant" placeholder="Ex : cgrace5" id="identifiant" required />
    </p>

    <p>
        <label for="mot_de_passe">Mot de passe : </label>
        <input type="password" name="mot_de_passe" id="mot_de_passe" required />
    </p>

    <input type="submit" value="Se Connecter" />
</form>