<?php
    require 'connex.php';

    $bool = FALSE;

    if (isset($_POST['password'])) {
        $mdp = htmlspecialchars($_POST['password']);
        $mail = htmlspecialchars($_POST['mail']);
        
        $sel = $db->prepare('SELECT * FROM profil');
        $sel->execute() or exit(print_r($sel->errorInfo()));

        while ($dt = $sel->fetch()) {
            if (md5($mdp) == $dt['password_profil'] && $mail == $dt['mail_profil']) {
                session_start();

                $bool = TRUE;

                $_SESSION['id'] = $dt['id_profil'];
                $_SESSION['nom'] = $dt['nom_profil'];
                $_SESSION['prenom'] = $dt['prenom_profil'];
                $_SESSION['naiss'] = $dt['naissance_profil'];
                $_SESSION['mail'] = $dt['mail_profil'];
                $_SESSION['sexe'] =$dt['sexe_profil'];
                $_SESSION['class'] = $dt['class_profil'];
                $_SESSION['pays'] = $dt['country_profil'];
                $_SESSION['ville'] =$dt['city_profil'];

                if (empty($dt['photo_profil']) || $dt['photo_profil'] == 'false') {
                    $_SESSION['photo'] = 'default.png';
                }
                else {
                    $_SESSION['photo'] =$dt['photo_profil'];
                }
                
                $_SESSION['time'] = time();


                if (!empty($dt['niveau_profil'])) {
                    $_SESSION['level'] =$dt['niveau_profil'];
                }

                $upd = $db->prepare('UPDATE profil SET sess_profil=1 WHERE id_profil=:id');
                $upd->bindParam(':id', $_SESSION['id']);
                $upd->execute() or exit(print_r($upd->errorInfo()));
            }
        }

        if ($bool) {
            header('location: ../view/');
        }
        else {
            header('location: ../view/login.php?error');
        }
    }
?>