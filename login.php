<?php 

require 'templates/header.php'; 

?>

<h1>Connectez-vous !</h1>

<form action="login-process.php" method="post">
    <label for="email">Votre adresse mail</label>
    <input type="email" name="email" placeholder="votre email">
    <label for="pass">Votre mot de passe</label>
    <input type="password" name="password">

    <button class="btn submit">Envoyer</button>
</form>

<?php 

require 'templates/footer.php'; 

?>