<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
    require 'connex.php';

    $ins = $db->prepare('INSERT INTO profil(nom_profil,prenom_profil,naissance_profil,mail_profil,sess_profil,sexe_profil,class_profil,country_profil,city_profil,password_profil,photo_profil) VALUES(:nom,:prenom,:naissance,:mail,:sess,:sexe,:class,:country,:city,:pass,:photo)');

    if (htmlspecialchars($_POST['password']) == htmlspecialchars($_POST['Cpassword'])) {
        $ins->bindParam(':nom',$name);
        $ins->bindParam(':prenom',$surname);
        $ins->bindParam(':naissance',$_POST['naiss']);
        $ins->bindParam(':mail',$mail);
        $ins->bindParam(':sess',$active);
        $ins->bindParam(':sexe',$sexe);
        $ins->bindParam(':class',$class);
        $ins->bindParam(':country',$pays);
        $ins->bindParam(':city',$city);
        $ins->bindParam(':pass',$password);
        $ins->bindParam(':photo',$photo);        

        $name = htmlspecialchars($_POST['nom']);
        $surname = htmlspecialchars($_POST['surname']);
        $mail = htmlspecialchars($_POST['mail']);
        $sexe = htmlspecialchars($_POST['sexe']);
        $class = htmlspecialchars($_POST['class']);
        $pays = htmlspecialchars($_POST['pays']);
        $city = htmlspecialchars($_POST['city']);
        $password = md5(htmlspecialchars($_POST['password']));

        $active = 1;

        $ins->execute() or exit(print_r($ins->errorInfo()));

        session_start();

        $_SESSION['nom'] = htmlspecialchars($_POST['nom']);
        $_SESSION['prenom'] = htmlspecialchars($_POST['surname']);
        $_SESSION['naiss'] = htmlspecialchars($_POST['naiss']);
        $_SESSION['mail'] = htmlspecialchars($_POST['mail']);
        $_SESSION['sexe'] =htmlspecialchars($_POST['sexe']);
        $_SESSION['class'] = htmlspecialchars($_POST['class']);
        $_SESSION['pays'] = htmlspecialchars($_POST['pays']);
        $_SESSION['ville'] = htmlspecialchars($_POST['city']);

        $sel = $db->prepare('SELECT * FROM profil WHERE mail_profil =:mailes');
        $sel->bindParam(':mailes', htmlspecialchars($_POST['mail']));
        $sel->execute() or exit(print_r($sel->errorInfo()));

        while ($a = $sel->fetch()) {
            $_SESSION['id'] = $a['id_profil'];
        }

        if($_FILES['photo']['error']!=4) {
            $errors= array();
            $file_name = $_FILES['photo']['name'];
            $file_size =$_FILES['photo']['size'];
            $file_tmp =$_FILES['photo']['tmp_name'];
            $file_type=$_FILES['photo']['type'];
            $tmp = explode('.', $_FILES['photo']['name']);
            $file_ext = strtolower(end($tmp));
            
            $image= array("jpeg","jpg","png","gif","tif","svg");

            if ($_FILES['photo']['error']==0) {
                if (in_array($file_ext,$image)) {
                    move_uploaded_file($file_tmp,"../view/photo/". $_SESSION['id'].'.'.$file_ext);
                    $chemin=$_SESSION['id'].'.'.$file_ext;
                    $_SESSION['photo'] = $chemin;
                }else {
                    $_SESSION['photo'] = false;
                }
                
            }

            $upd = $db->prepare('UPDATE profil SET photo_profil=:chemin WHERE id_profil=:id');
            $upd->bindParam(':id', $_SESSION['id']);
            $upd->bindParam(':chemin', $chemin);

            if ($_SESSION['photo'] == false) {
                $chemin = 'false';
                $_SESSION['photo'] = 'default.png';
            }
            
            $upd->execute() or exit(print_r($upd->errorInfo()));
        } else {
            $_SESSION['photo'] = 'default.png';
        }

        

        $con = $db->prepare('INSERT INTO connexion VALUES (:idP,:beginP,0)');
        $con->bindParam(':idP', $idP);
        $con->bindParam(':beginP', $bgP);
        
        $idP = $_SESSION['id'];
        $bgP = date('Y-m-d');

        $con->execute() or exit(print_r($con->errorInfo()));

        $_SESSION['time'] = time();
        if ($_SESSION['class'] == 'Etudiant') {
            header('location: ../view/EtudChoice.php');
        }
        else {
            header('location: ../view/');
        }
    }
    else {
        header('location: ../view/logup.php?error');
    }
?>