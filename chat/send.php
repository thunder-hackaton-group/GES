<?php
session_start();

//Envoye le message au destination

    require 'connexBdd.php';

    if (isset($_POST['mess'])) {
        $sms = htmlspecialchars($_POST['mess']);
    } else {
        header('location: msg.php?nosms=true&dest='.$_POST['dest']);
    }

    if(isset($_POST['dest'])){
        $sd = $db->prepare('INSERT INTO msg(contenu_msg,date_msg,id_pers,id_dest) VALUES(:sms,NOW(),:exp,:dest)');
        $sd->bindParam(':sms', $sms);
        $sd->bindParam(':exp', $exp);
        $sd->bindParam(':dest', $dest);

        $exp = $_SESSION['exp'];
        $dest = $_POST['dest'];
        $sd->execute() or exit(print_r($sd->errorInfo()));

        header('location: msg.php?dest='.$_POST['dest']);
    }
    else{
        header('location: msg.php?dest='.$_POST['dest']);
    }
?>