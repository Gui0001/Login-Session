<?php 

// On récupère le fichier de connexion à la bdd 
require __DIR__ . '/db.php';

// On écrit notre requete SQL
$sql = "SELECT * FROM `customers` WHERE email = ?";

// Initialisation du statement
$stmt = $mysqli->stmt_init();

// Préparation du statement
$stmt->prepare($sql); 

// On lie les paramètres à la requete
$stmt->bind_param("s", $_POST['email']);

// On éxecute le statement
$stmt->execute();

// Si nous n'avons pas d'erreurs alors on veut récupérer les informations dans un 
// tableau associatif et lui conférer le nom $user
if($stmt->execute()) {
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
} else {
    die($mysqli->error . " " . $mysqli->errorno);
};

// Enfin, si $user existe on vérifie le mot de passe rentré vs le hash de la bdd
// récuperé dans $user
if ($user) {
    if (password_verify($_POST['password'], $user['password_hash'])) {
        // Code here ...
        header('location:index.php');
        exit();
    } else {
        die('Mot de passe incorrect');
    }
}
