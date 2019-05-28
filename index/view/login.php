<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>GES : Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
	<?php
		require('../controller/verificationLogin.php');
	?>
	<div class='ctnt-prp'>
		<div class="ctnt-1">
			<header>
				<img src='../../imgs/logo.png' class='logo' title='GES Logo'/>
				<h1>Se connecter</h1>
			</header>
			
			<div class='form'>
				<form method="post" class='frm-ctnt' action="../model/analyseLogin.php">
					<label for='mail'>E-mail ou Identifiant</label><br>
					<input type="text" name="mail" id="mail" class="frm" title="Votre adresse E-mail ou Identifiant pour vous connecter" required="required"/><br>
					<label for='password'>Mot de passe</label><br>
					<input type="password" name="password" id="password" class="frm" title="Entrez votre mot de passe" required="required"/><br>
					
					<input type="submit" name="valider" id="valider" value="Valider"/>
				</form>
			</div>
		</div>
		<div class="ctnt-2">
			<div class='signin'>
				<p class='great'>GES</p>
				<p class='link'>Gestion d'Etablissement Scolaire</p>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="../controller/js/login.js">
		
	</script>
</body>
</html>