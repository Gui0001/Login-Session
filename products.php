<?php 

    require 'templates/header.php';
    require 'db.php';
      
?>


<h1>Nos produits</h1>


<?php

$req = 'SELECT * FROM `products` ORDER BY `name` ASC';

$products = $mysqli->query($req);

    foreach ($products as $product) {
        echo $product['name'] . " : " . $product['price'] . "<br>" . "Catégorie : " . $product['category'];
        echo "<br><br>";
    }
?>

<?php require 'templates/footer.php' ?>