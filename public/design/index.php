<?php
    session_start();   
    
    require_once('option.php'); 

    //redirection si connecté

    if (isset($_SESSION['connect']) && $_SESSION['connect'] == 1){
        header('location: connected.php'); 
        exit(); 
    }

    //Connexion

    if (!empty($_POST['email']) && !empty($_POST['password'])){ //champs remplis ?


        //recup email

        $email = htmlspecialchars($_POST['email']); 
        $password = htmlspecialchars($_POST['password']); 

        //email valide ?
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header('location: index.php?error=1&message=Adresse mail non valide'); 
            exit(); 
        }

        //connexion bdd
        require_once('connexion.php');

        //email existe dans bdd ?

        $request = $bdd->prepare('SELECT * FROM user WHERE email = ? LIMIT 1'); 
        $request->execute([$email]); 
        $user = $request->fetch(); 
        if (!$user){
            header('location: index.php?error=1&message=Email introuvable'); 
            exit(); 
        }

        //vérification mdp
        if (!password_verify($password, $user['password'])){
            header('location: index.php?error=1&message=Mot de passe incorrecte'); 
            exit(); 
        } else {

            if ($user['blocked'] == 1){
                header('location: index.php?error=1&message=Utilisateur bloqué'); 
                exit(); 
            }
            $_SESSION['connect'] = 1; 
            $_SESSION['email'] = $email; 
            $_SESSION['id'] = htmlspecialchars($user['id']); 
            $_SESSION['creation_date'] = htmlspecialchars($user['creation_date']); 

            //remember 
            if (isset($_POST['remember'])){
                setcookie(
                                'auth',
                                '',
                                [
                                    'expires' => time() + 24 * 12 * 3600,
                                    'path' => '/',
                                    'domain' => '',
                                    'secure' => false,
                                    'httponly' => true,
                                    'samesite' => 'Lax'
                                ]
                            );

            }

            //redirection
            header('location: connected.php'); 
            exit(); 
        }         
    }
?>


<html>
<head>
    <meta charset="utf-8">
    <title>NETFLIXLIKE</title>
    <link rel="stylesheet" href="design/defaut.css">
    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>

<body>
    <img id="logo" src="./assets/logoN.png" alt="logo netflix">
    <?php
            require_once("login.php");
            require_once("footer.php");
        ?>

</body>

</html>