<?php

    session_start();
    
    require 'connexBdd.php';

    //Récupère tous les messages entre la personne connécté et le destinataire
    if(!empty($_GET['dest'])){
        $slc = $db->prepare('SELECT * FROM msg m WHERE ((m.id_dest=' . $_GET['dest'] . ' AND m.id_pers='. $_SESSION['exp']. ') OR (m.id_pers=' . $_GET['dest'] . ' AND m.id_dest='. $_SESSION['exp']. ')) ORDER BY m.date_msg LIMIT 16');
        $slc->execute() or exit(print_r($slc->errorInfo()));
    }

    $nm = $db->prepare('SELECT * FROM personne');
    $nm->execute() or exit(print_r($nm->errorInfo()));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
    <title>
        <?php
            while ($a = $nm->fetch()) {
                if ($a['id_pers'] == $_GET['dest']) {
                    echo $a['nom_pers'];
                }
            }
        ?>
    </title>
</head>
<body>
    <div class="left">
        <a href="chat.php" class='purple-text'>
            <i class="material-icons">home</i>
        </a>
    </div>
    <div class="container">
        <?php
            while ($a = $slc->fetch()) {
        ?>
            <p>
            <?php
            //Affiche les messages
            $nm->execute() or exit(print_r($nm->errorInfo())); 
                while ($c = $nm->fetch()) {
                    if ($c['id_pers'] == $a['id_pers']) {
                        echo $c['nom_pers'];
                    }
                }
                echo ' : ' . $a['contenu_msg'];
            ?>
            </p>
        <?php
            }
        ?>
    </div>
    <div class="container">
        <form action="send.php" method="post" class="input-field">
            <input type="hidden" name="dest" value="<?php echo $_GET['dest']; ?>">
            <input type="text" name="mess" id="mess" required='required'>
            <label for="mess">Message</label>
            <input type="submit" value="Envoyer" class='btn pulse purple darken-3 white-text'>
        </form>
    </div>  
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script src="js/materialize.js"></script>
</body>
</html>