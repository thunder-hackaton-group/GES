<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

    session_start();

    require 'connex.php';

    $delCon = $db->prepare('DELETE FROM connexion WHERE id_profil=:idConnex');
    $delCon->bindParam(':idConnex', $_SESSION['id']);

    $delProfil = $db->prepare('DELETE FROM profil WHERE id_profil=:idProfil');
    $delProfil->bindParam(':idProfil', $_SESSION['id']);

    if ($_SESSION['photo'] != 'default.png') {
        unlink('../view/photo/'.$_SESSION['photo']);
    }

    $delCon->execute() or exit(print_r($delCon->errorInfo()));
    $delProfil->execute() or exit(print_r($delProfil->errorInfo()));

    session_destroy();
    header('location: ../index.php?suppr=success')
?>