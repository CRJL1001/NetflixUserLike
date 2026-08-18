<?php

    if (isset($_COOKIE['auth']) && !isset($_SESSION['connect'])){

        //connexion bdd
        require_once('connexion.php');
        //variable

        $secret = htmlspecialchars($_COOKIE['auth']); 

        //secret existe ?

        $request = $bdd->prepare('SELECT * FROM user WHERE secret = ? LIMIT 1'); 
        $request->execute([$secret]); 

        $user = $request->fetch(); 

        if (!$user){
            die('Erreur de restauration de la sessio;'); 
        }else{
            $_SESSION['connect'] = 1;
            $_SESSION['email'] = $user['email'];
            $_SESSION['id'] = $user['id'];
            $_SESSION['creation_date'] = $user['creation_date']; 
        }
    }
?>