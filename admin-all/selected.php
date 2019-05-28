<?php
    session_start();

    if(empty($_SESSION['master'])){
        header('location: index.php?error=true');
    }

    function isajax() {
        return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && (strtolower(getenv('HTTP_X_REQUESTED_WITH')) === 'xmlhttprequest'));
    }

    require 'connexBdd.php';

    $req = $db->prepare('SELECT * FROM Etablissement');
    $req->execute() or exit(print_r($req->errorInfo()));
    $i = 0;

    while($data = $req->fetch()){
        
        $dt[$i]['id'] = $data['id_etablissement'];
        $dt[$i]['nom'] = $data['nom_etablissement'];
        $dt[$i]['addr'] = $data['adresse_etablissement'];
        $dt[$i]['contact'] = $data['contact_etablissement'];
        $dt[$i]['slogan'] = $data['slogan_etablissement'];
        $dt[$i]['mail'] = $data['email_etablissement'];
        $i++;
    }

    echo json_encode($dt);
    header('Content-Type: application/json');
?>