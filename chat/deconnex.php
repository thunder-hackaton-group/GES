<?php

//Deconnexion

session_start();
session_destroy();

header('location: chat.php');

?>