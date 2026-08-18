<?php
    session_start(); 

    require_once('option.php');
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
    <img id="logo" src="assets/logoN.png" alt="logo netflix">
    <section id="login">
        <h1>Bienvenue !</h1>

        <form method="post" action="logout.php" id="login-form">
            <input type="submit" value="Se déconnecter" id="submit"><br>
        </form>
        <?php
            echo 'Bienvenue : '.$_SESSION['email'].' !'; 
        ?>
        <p id="to_signin">Qu'allez-vous regarder ?</p>
    </section>
    <?php
    require_once("footer.php");
    ?>


</body>

</html>