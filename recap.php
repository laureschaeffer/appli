<?php
    session_start(); //pour récupérer les données utilisateurs
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="style.css" rel="stylesheet"/>
    <title>Récapitulatif des produits</title>
</head>
<body>

    <nav>
        <a href="http://localhost/laure_schaeffer/appli/index.php">Index</a>
        <a href="http://localhost/laure_schaeffer/appli/recap.php">Recap</a>
    </nav>
    <h1>Récapitulatif des produits</h1>
    <?php
    if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
        echo "<p> Aucun produit en session... </p>";
    } 
    else {
        echo "<section id='container'>",
            "<table>",
                "<thead>",
                    "<tr>",
                        "<th>#</th>",
                        "<th>Nom</th>",
                        "<th>Prix</th>",
                        "<th>Quantité</th>",
                        "<th>Total</th>",
                        "<th>Supprimer catégorie</th>",
                    "</tr>",
                "</thead>",
            "<tbody>";
        $totalGeneral = 0 ;
        $totalQtt = 0;

        foreach($_SESSION['products'] as $index => $product){ // boucle pour afficher tout le panier, number_format pour un meilleur affichage des prix
            echo "<tr>",
                    "<td>".$index."</td>",
                    "<td>".$product['name']."</td>",
                    "<td>".number_format($product['price'], 2, ",", "&nbssp;")."&nbsp;€ </td>",
                    "<td>", //retirer ou ajouter une quantité
                        "<a href='traitement.php?action=removeOne&id=$index'><i class='fa-solid fa-minus'></i></a>",
                            $product['qtt'],
                        "<a href='traitement.php?action=add&id=$index'><i class='fa-solid fa-plus'></a></i>",
                    "</td>",
                    "<td>".number_format($product['total'], 2, ",", "&nbssp;")."&nbsp;€ </td>",
                    "<td><a href='traitement.php?action=delete&id=$index'><i class='fa-solid fa-xmark'></i></a></td>",

                "</tr>";
            $totalGeneral+= $product['total'];
            $totalQtt+= $product['qtt'];
        } 

        echo "<tr>",
                "<td colspan=4> Total général : </td>",
                "<td> <strong>".number_format($totalGeneral, 2, ",", "&nbssp;")."&nbsp;€ </strong> </td>",
            "<tr>",
            "<tr>",
                "<td colspan=4> Supprimer le panier : </td>",
                "<td><a href='traitement.php?action=deleteEverything'><i class='fa-solid fa-trash'></i></a></td>",
            "</tr>",
        "</tbody>",
        "</table>",


        // card montrant le total d'articles, en commun avec l'index
        "<div id='card'>",
            "<p>Nombre total d'articles : ".$totalQtt." </p>",
        "</div>",
        "</session>";

    }
    ?>
</body>
</html>