<!-- 

    Login page for Web Administrator

-->
    
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <!-- Page header -->
        <title>Administrator Line</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/index.css">
    </head>

    <body>
        <?php
        // Détruit une session si il en existe
            session_start();
            session_destroy();

        // Connexion à une base de données
            require 'connexBdd.php';

            // Vérification de la base de données
            $verif = $db->prepare('SELECT COUNT(*) as nbL FROM Admin_Site');
            $verif->execute() or exit(print_r($verif->errorInfo()));

            while ($dt = $verif->fetch()){
                if ($dt['nbL'] == 0){
                    //Insertion d'une nouvelle compte d'authentification
                    $insr = $db->prepare('INSERT INTO Admin_Site(auth_maitre,mdp_maitre) VALUES(:auth,:mpdAdm)');
                    $insr->bindParam(':auth', $authAdmin, PDO::PARAM_STR);
                    $insr->bindParam(':mpdAdm', $mdpAdmin, PDO::PARAM_STR);

                    // Ajout d'une ligne
                    $authAdmin = '4568rootges';
                    $mdpAdmin = md5('motdepasseinconnu');
                    $insr->execute() or exit(print_r($insr->errorInfo()));
                }
            }
        ?>

        <!-- Log in -->
        <div class="contenu">
            <header>
                <h1>
                    <span>Log in</span>
                    <hr class="line">
                </h1>
            </header>
            <div class='formulaire'>
                <form method="POST" action="log.php" id='myform'>
                    <label>Username : </label>
                    <input type="text" name="username" title="Nom d'utilisateur" id="username" required="required"/>
                    <label>Password : </label>
                    <input type="password" name="password" title="Mot de passe" id="mdp" required="required"/>
                    <br>
                    <?php
                    //Affiche Erreur s'il y a erreur d'authentification ou faute d'intrusion
                        if(isset($_GET['error'])){
                            echo '<p id="error" style="visibility:visible">Erreur d\'authentification</p>';
                        }
                        else{
                            echo '<p id="error" style="visibility:hidden">Erreur d\'authentification</p>';
                        }
                    
                    ?>
                    <input type="submit" value="Log in" class="valider"/>
                </form>
            </div>
        </div>
    </body>
</html>