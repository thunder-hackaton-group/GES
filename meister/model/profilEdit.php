<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

    session_start();

    require 'connex.php';

    if (isset($_GET['niveau'])) {

        $update = $db->prepare('UPDATE profil SET nom_profil=:nom,prenom_profil=:prenom,naissance_profil=:naiss,mail_profil=:mail,class_profil=:class,country_profil=:country,city_profil=:city,niveau_profil=:niveau WHERE id_profil=:id');


        if (htmlspecialchars($_GET['class']) != 'Etudiant') {
            unset($_SESSION['level']);
        }
        else {
            $_SESSION['level'] = htmlspecialchars($_GET['niveau']);
        }

        $update->bindParam(':nom',$_GET['nom']);
        $update->bindParam(':prenom',$_GET['prenom']);
        $update->bindParam(':naiss',$_GET['date']);
        $update->bindParam(':class',$_GET['class']);
        $update->bindParam(':country',$_GET['pays']);
        $update->bindParam(':city',$_GET['city']);

        if (isset($_SESSION['level'])) {
            $update->bindParam(':niveau',$_GET['niveau']);
        } else {
            $update->bindParam(':niveau',$null);
            $null = NULL;
        }
        
        

        $update->bindParam(':mail',$_GET['mail']);
        $update->bindParam(':id',$_SESSION['id']);

        

        $update->execute() or exit(print_r($update->errorInfo()));

        $_SESSION['nom'] = htmlspecialchars($_GET['nom']);
        $_SESSION['prenom'] = htmlspecialchars($_GET['prenom']);
        $_SESSION['naiss'] = htmlspecialchars($_GET['date']);
        $_SESSION['mail'] = htmlspecialchars($_GET['mail']);
        $_SESSION['class'] = htmlspecialchars($_GET['class']);
        $_SESSION['pays'] = htmlspecialchars($_GET['pays']);
        $_SESSION['ville'] = htmlspecialchars($_GET['city']);

        header('location: ../view/index.php?modif=success');
    } 
    elseif (isset($_POST['Ancienpassword'])) {
        $ancien = htmlspecialchars($_POST['Ancienpassword']);
        $vr = $db->prepare('SELECT * FROM profil WHERE id_profil=:idsess');
        $vr->bindParam(':idsess', $_SESSION['id']);
        $vr->execute() or exit(print_r($vr->errorInfo()));

        while ($d = $vr->fetch()) {
            
            if (md5($ancien) == $d['password_profil']) {
                $Cnouveaupassword = htmlspecialchars($_POST['Cnouveaupassword']);
                $nouveaupassword = htmlspecialchars($_POST['nouveaupassword']);

                if ($Cnouveaupassword == $nouveaupassword) {
                    $update = $db->prepare('UPDATE profil SET password_profil=:pass WHERE id_profil=:id');
                    $update->bindParam(':id',$_SESSION['id']);
                    $update->bindParam(':pass', md5($nouveaupassword));

                    $update->execute() or exit(print_r($update->errorInfo()));
                    header('location: ../view/index.php?pass=success');

                } else {
                    header('location: ../view/index.php?confpass=wrong');
                }
                
            } else {
                header('location: ../view/index.php?falsepass=true');
            }
        }
    }
    else{

        $update = $db->prepare('UPDATE profil SET nom_profil=:nom,prenom_profil=:prenom,naissance_profil=:naiss,mail_profil=:mail,class_profil=:class,country_profil=:country,city_profil=:city WHERE id_profil=:id');

        $update->bindParam(':nom',$_GET['nom']);
        $update->bindParam(':prenom',$_GET['prenom']);
        $update->bindParam(':naiss',$_GET['date']);
        $update->bindParam(':class',$_GET['class']);
        $update->bindParam(':country',$_GET['pays']);
        $update->bindParam(':city',$_GET['city']);

        $update->bindParam(':mail',$_GET['mail']);
        $update->bindParam(':id',$_SESSION['id']);

        $update->execute() or exit(print_r($update->errorInfo()));

        $_SESSION['nom'] = htmlspecialchars($_GET['nom']);
        $_SESSION['prenom'] = htmlspecialchars($_GET['prenom']);
        $_SESSION['naiss'] = htmlspecialchars($_GET['date']);
        $_SESSION['mail'] = htmlspecialchars($_GET['mail']);
        $_SESSION['class'] = htmlspecialchars($_GET['class']);
        $_SESSION['pays'] = htmlspecialchars($_GET['pays']);
        $_SESSION['ville'] = htmlspecialchars($_GET['city']);

        if ($_SESSION['class'] == 'Etudiant') {
            header('location: ../view/EtudChoice.php');
        }
        else {
            header('location: ../view/index.php?modif=success');
        }
        
    }
?>