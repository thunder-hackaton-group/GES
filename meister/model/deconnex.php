<?php
require 'connex.php';

    session_start();
        $upd = $db->prepare('UPDATE profil SET sess_profil=0 WHERE id_profil=:id');
        $upd->bindParam(':id', $_SESSION['id']);
        $upd->execute() or exit(print_r($upd->errorInfo()));

        $upd2 = $db->prepare('UPDATE connexion SET time_connexion=:timed WHERE id_profil=:id');
        $upd2->bindParam(':id', $_SESSION['id']);
        $upd2->bindParam(':timed', $timed);

        $sel = $db->prepare('SELECT time_connexion as timed from connexion WHERE id_profil=:id');
        $sel->bindParam(':id',$_SESSION['id']);
        $sel->execute() or exit(print_r($sel->errorInfo()));

        while ($s = $sel->fetch()) {
            $latestTime = $s['timed'];
        }

        $times = time() - $_SESSION['time'];
        $timed = $latestTime + $times;
        $upd2->execute() or exit(print_r($upd2->errorInfo()));
    session_destroy();
    header('location: ../');
?>