<?php
    session_start(); //initialiser
    session_unset(); //Désactiver
    session_destroy(); //Détruire

    setcookie(
        'auth',
        '',
        [
            'expires' => time() - 3600,
            'path' => '/',
            'domain' => '',
            'secure' => false,
            'httponly' => true,
            'samesite' => 'Lax'
        ]
    );

    header('location: index.php'); 
    exit(); 
?>