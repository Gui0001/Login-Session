<?php 

require 'templates/header.php'; 

?>


<h1>Inscrivez-vous !</h1>

<form action="signup-process.php" method="post">
    <label for="name">Votre nom</label>
    <input type="text" name="name" placeholder="votre nom">
    <label for="email">Votre adresse mail</label>
    <input type="email" name="email" placeholder="votre email">
    <label for="pass">Votre mot de passe</label>
    <input type="password" name="password">
    <label for="pass">Confirmer le mot de passe</label>
    <input type="password" name="password_check">

    <button class="btn submit">Envoyer</button>
</form>


<?php require 'templates/footer.php' ?>