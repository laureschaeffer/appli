<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet"/>
    <title>Ajout produit</title>
</head>
<body>
    <nav>
        <a href="http://localhost/laure_schaeffer/appli/index.php">Index</a>
        <a href="http://localhost/laure_schaeffer/appli/recap.php">Recap</a>
    </nav>
    <h1>Ajouter un produit</h1>
    <section id="container">
        <form action="traitement.php" method="post"> 
        <!-- action pour la cible du formulaire, method http pour transmettre au serveur -->
            <p>
                <label>
                    Nom du produit : 
                    <input type="text" name="name">
                </label>
            </p>
            <p>
                <label>
                    Prix du produit : 
                    <input type="number" step="any" name="price">
                </label>
            </p>
            <p>
                <label>
                    Quantité désirée : 
                    <input type="number" name="qtt" value="1">
                </label>
            </p>
            <p>
                <input type="submit" name="submit" value="Ajouter le produit">
            </p>
        </form>

<?php

$totalQtt=0;

foreach($_SESSION['products'] as $index => $product){
    $totalQtt+=$product['qtt'];
    
}
    echo "<div id='card'>",
            "<p>Nombre total d'articles : ".$totalQtt." </p>",
        "</div>";

?>

    </section>

</body>
</html>