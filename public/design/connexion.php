<?php

    $host = getenv('BD_HOST') ?: 'db'; 
    $db   = getenv('DB_NAME') ?: 'mon_projet_db';
    $user = getenv('DB_USER') ?: 'root';
    $pass = getenv('DB_PASSWORD') ?: 'root';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset"; 

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
        PDO::ATTR_EMULATE_PREPARES => false
    ]; 

    try{
            $bdd = new PDO($dsn, $user, $pass, $options); 
        }catch (\PDOException $e){
            die("Erreur de connexion : ".$e->getMessage()); 
        }

?>