<?php

    ini_set('display_errors',1);
    error_reporting(E_ALL);

    session_start();

    require 'connex.php';

    $addP = $db->prepare('INSERT INTO event(nom_event,date_event,time_event,place_event,desc_event,id_profil,date_share) VALUES (:nom,:date,:time,:place,:desc,:id,:shared)');
    $addP->bindParam(':nom',$_POST['Eventname']);
    $addP->bindParam(':date',$_POST['Eventdate']);
    $addP->bindParam(':time',$_POST['Eventtime']);
    $addP->bindParam(':place',$_POST['Eventplace']);
    $addP->bindParam(':desc',$_POST['Eventdesc']);
    $addP->bindParam(':id',$_SESSION['id']);
    $addP->bindParam(':shared',$daty);

    $now = new DateTime();
    $daty = $now->format('Y-m-d H:i:s');

    $addP->execute() or exit(print_r($addP->errorInfo()));

    header('location: ../view/index.php?shared=true');
?>