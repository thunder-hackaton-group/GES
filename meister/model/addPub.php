<?php

    ini_set('display_errors',1);
    error_reporting(E_ALL);

    session_start();

    require 'connex.php';

    if ($_POST['descPub'] != '') {
        $addP = $db->prepare('INSERT INTO pub(desc_pub,date_pub,id_profil,like_pub) VALUES (:descr,:dateP,:profil,0)');
        $addP->bindParam(':descr',$_POST['descPub']);
        $addP->bindParam(':dateP',$daty);
        $addP->bindParam(':profil',$_SESSION['id']);

        $now = new DateTime();
        $daty = $now->format('Y-m-d H:i:s');

        $addP->execute() or exit(print_r($addP->errorInfo()));

        if($_FILES['filePub']['error']!=4) {
            $file_name = $_FILES['filePub']['name'];
            $file_size =$_FILES['filePub']['size'];
            $file_tmp =$_FILES['filePub']['tmp_name'];
            $file_type=$_FILES['filePub']['type'];
            $tmp = explode('.', $_FILES['filePub']['name']);
            $file_ext = strtolower(end($tmp));

            $sel = $db->prepare('SELECT id_pub FROM pub WHERE date_pub=:dateNow');
            $sel->bindParam(':dateNow', $daty);
            $sel->execute() or exit(print_r($sel->errorInfo()));

            while ($a = $sel->fetch()) {
                $id_pub = $a['id_pub'];
            }

            if ($_FILES['filePub']['error']==0) {
                move_uploaded_file($file_tmp,"../view/pubFile/p". $id_pub.'.'.$file_ext);
                $chemin= 'p' .$id_pub.'.'.$file_ext;
            }

            $image= array("jpeg","jpg","png","gif","tif","svg");
            $music = array('wav','ogg','mp3','aac');
            $video = array('avi','mov', 'mp4','3gp', 'wmv','mkv','mp4a','m4v','mpg','mpeg','tsa','asf','flv','xvid');

            if (in_array($file_ext,$image)) {
                $type = 'Image';
            }
            else if (in_array($file_ext,$music)) {
                $type = 'Musique';
            }
            else if (in_array($file_ext,$video)) {
                $type = 'Video';
            }
            else {
                $type = 'Autre';
            }

            $up = $db->prepare('UPDATE pub SET fichier_pub=:chemin,type_fichier=:typed WHERE id_pub=:ipPub');
            $up->bindParam(':chemin',$chemin);
            $up->bindParam(':ipPub',$id_pub);
            $up->bindParam(':typed',$type);

            $up->execute() or exit(print_r($up->errorInfo()));


        }

        header('location: ../view/index.php?shared=true');
    } else {
        header('location: ../view/index.php?noDescPub=true');
    }
?>