<?php
    require 'connexBdd.php';

    function isajax() {
        return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && (strtolower(getenv('HTTP_X_REQUESTED_WITH')) === 'xmlhttprequest'));
    }

    $crt = htmlspecialchars($_POST['Cpassword']);
    
    $req = $db->prepare('SELECT * FROM Admin_Site');
    $reu = $db->prepare('UPDATE Admin_Site SET mdp_maitre=:nmdp');
    $reu->bindParam(':nmdp',$nmdp);
    $req->execute() or exit(print_r($req->errorInfo()));
    $dt = [];

    while($data = $req->fetch()){
        if($data['mdp_maitre'] === md5($crt)){
            $nmdp = md5(htmlspecialchars($_POST['Npassword']));
            $reu->execute() or exit(print_r($reu->errorInfo()));
            $dt = ['True'];
            echo json_encode($dt);
            header('Content-Type: application/json');
        }
        else{
            $dt = ['False'];
            echo json_encode($dt);
            header('Content-Type: application/json');
        }
    }
?>