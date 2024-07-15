<?php

// On récupère le fichier de connexion à la bdd 
require __DIR__ . '/db.php';
// require 'templates/header.php';


// On vérifie les différents champs 
if (empty($_POST['name'])) {
    die("Le nom doit etre rempli");
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    die("Le format d'email n'est pas bon");
}

if (strlen($_POST['password']) <= 8) {
    die("Le mot de passe doit faire 8 caractères minimum");
}

if ($_POST['password'] != $_POST['password_check']) {
    die("Les mots de passe sont différents");
}



// On hash le mot de passe avant de l'envoyer en BDD
$hash = password_hash($_POST['password'], PASSWORD_DEFAULT);


// On écrit notre requete SQL pour enregistrer un nouvel utilisateur
$req = "INSERT INTO `customers` (name, email, password_hash) VALUES (?, ?, ?)";

// On initialise le statement qui va nous permettre de préparer une requete SQL
$stmt = $mysqli->stmt_init();

// On prépare la requete
$stmt->prepare($req);

// On lie les paramètres, à savoir le nom, email et le mdp
$stmt->bind_param("sss", 
                  $_POST['name'],
                  $_POST['email'],
                  $hash);


// On éxecute le statement
$stmt->execute();

header('location: login.php');



?>


<?php require 'templates/footer.php' ?>
