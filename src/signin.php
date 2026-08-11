<?php
    //INSCRIPTION
    session_start(); 

    require_once('option.php'); 

    //si connecté

    if (isset($_SESSION['connect']) && $_SESSION['connect'] == 1){
        header('location: connected.php'); 
        exit(); 
    }

    if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_retape'])){

        //récupération des infos
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $password_retape = htmlspecialchars($_POST['password_retape']);

        //vérif mail valide
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header('location: signin.php?error=1&message=Votre adresse Email est invalide.'); 
            exit(); 
        }

        //mdp identique

        if ( $password != $password_retape){
            header('location: signin.php?error=1&message=Mots de passe différents'); 
                exit(); 
        }

        //mdp assez dur 

        function isStrong($password){
            if (strlen($password) < 8)return false; 
            if (!preg_match('/[A-Z]/', $password)) return false; 
            if (!preg_match('/[a-z]/', $password)) return false; 
            if (!preg_match('/[0-9]/', $password)) return false; 
            if (!preg_match('/[\W]/', $password)) return false; // caractères spéciaux
            
            return true; 
        }

        if (!isStrong($password)){
            header('location: signin.php?error=1&message=Mot de passe : 8 caractères, Maj, Min, chiffre et caractère spécial !'); 
            exit(); 
        }

        //connexion bdd
        require_once('connexion.php');
         

        //vérif doublons dans la bdd

        $request = $bdd->prepare('SELECT COUNT(*) as number_email FROM user WHERE email = ?'); 
        $request->execute([$email]); 

        while($result = $request->fetch()){
            if ($result['number_email'] != 0){
                header('location: signin.php?error=1&message=Adresse email déjà utilisée'); 
                exit(); 
            }
        }

        //création id secret 
        $secret = bin2hex(random_bytes(32)); 


        //hashage mdp

        $password_hash = password_hash($password, PASSWORD_DEFAULT); 
        
        //enregistrement dans la bdd

        $request = $bdd->prepare('INSERT INTO  user(email, password, secret) VALUES(?, ?, ?)'); 
        $request->execute([$email, $password_hash, $secret]);
        header('location: signin.php?success=1&message=Compte créé avec succès, veuillez vous connecter'); 
        exit();       
    }   
 

?>

<html>

<head>
    <meta charset="utf-8">
    <title>NETFLIXLIKE</title>
    <link rel="stylesheet" href="../design/defaut.css">
    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>

<body>
    <img id="logo" src="../assets/logoN.png" alt="logo netflix">

    <section id="signin">
        <h1>S'inscrire</h1>
        <form method="post" action="signin.php" id="signin-form">
            <input type="text" placeholder="Votre adresse email" id="email" name="email"><br>
            <input type="password" placeholder="Mot de passe" id="password" name="password"><br>
            <input type="password" placeholder="Retapez votre mot de passe" id="password_retape"
                name="password_retape"><br>
            <input type="submit" value="S'inscrire" id="submit_signin"><br>
        </form>

        <?php
                if (isset($_GET['error']) && htmlspecialchars($_GET['error']) == 1 ){                     
                    echo 'Erreur : '.htmlspecialchars($_GET['message']); 
                 } else if (isset($_GET['success']) && htmlspecialchars($_GET['success']) == 1){
                    echo htmlspecialchars($_GET['message']); 
                 }
            ?>

        <p id="to_login">Déjà sur Netflix? </p>
        <a href="../index.php"> Connectez-vous</a>
    </section>

    <?php
            require_once("footer.php");
        ?>

</body>

</html>