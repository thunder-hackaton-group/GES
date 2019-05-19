<?php

    session_start();
    
    require 'connexBdd.php';

    //Fait une recherche selon l'entrée
    if (isset($_GET['search'])) {
        $slc = $db->prepare('SELECT * FROM personne WHERE (nom_pers like "%'.$_GET['search'].'%" AND id_pers <> ' . $_SESSION['exp'] . ') ');
        $slc->execute() or exit(print_r($slc->errorInfo()));
    }
    else{
        //Sinon affiche tout
        $slc = $db->prepare('SELECT * FROM personne WHERE id_pers <> ' . $_SESSION['exp']);
        $slc->execute() or exit(print_r($slc->errorInfo()));
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
    <title>Nouveau message</title>
</head>
<body>
    <div class="left">
        <a href="chat.php" class='purple-text'><i class="material-icons">home</i></a>
    </div>
    <div class="container">
        <form action='new.php' method='GET' class="input-field">
            <label for="search">Rechercher</label>
            <input type="search" name='search' id='search'/>
            <input type="submit" value='Rechercher' class='btn pulse purple darken-3 white-text'>
        </form>
        <?php
            while ($d = $slc->fetch()) {
                ?>
            
                <p>
                <!-- Nom du destinataire -->
                    <a href="msg.php?dest=<?php echo $d['id_pers']. '">' . $d['nom_pers']; ?></a>
                </p>

        <?php
            }
        ?>
    </div>
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script src="js/materialize.js"></script>
</body>
</html>