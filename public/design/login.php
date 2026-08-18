<section id="login">
    <h1>S'identifier</h1>
    <form method="post" action="index.php" id="login-form">
        <input type="text" placeholder="Votre adresse email" id="email" name="email"><br>
        <input type="password" placeholder="Mot de passe" id="password" name="password"><br>
        <input type="submit" value="S'identifier" id="submit"><br>
        <?php
            if (isset($_GET['error']) && $_GET['error'] == 1){
                    echo '<br>Erreur : '.htmlspecialchars($_GET['message']).' <br>'; 
                }
        ?>
        <input type="checkbox" id="remember" name="remember">
        <label id="remember_label" for="remember">Se souvenir de moi</label>
    </form>
    <p id="to_signin">Premiers pas sur Netflix ? </p>
    <a href="signin.php"> Inscrivez-vous</a>
</section>