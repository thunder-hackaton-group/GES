<?php
    $db = new PDO('mysql:host=localhost;dbname=meister','root','securepassword');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
?>