<?php
    session_start(); //initialiser
    session_unset(); //Désactiver
    session_destroy(); //Détruire

    setcookie('auth', '', time() - 1, '/', null, false, true); 

    header('location: ../index.php'); 
    exit(); 
?>