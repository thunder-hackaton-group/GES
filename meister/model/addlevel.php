<?php
    require 'connex.php';

    session_start();

    $upd = $db->prepare('UPDATE profil SET niveau_profil=:niveau WHERE id_profil=:id');
    $upd->bindParam(':id', $_SESSION['id']);
    $upd->bindParam(':niveau', $_GET['level']);
    $upd->execute() or exit(print_r($upd->errorInfo()));

    $_SESSION['level'] = htmlspecialchars($_GET['level']);

    header('location: ../view/');
?>