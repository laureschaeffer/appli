<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    "</tr>",
                "</thead>",
            "<tbody>";
        $totalGeneral = 0 ;
        $totalQtt = 0;
        foreach($_SESSION['products'] as $index => $product){
            echo "<tr>",
                    "<td>".$index."</td>",
                    "<td>".$product['name']."</td>",
                    "<td>".number_format($product['price'], 2, ",", "&nbssp;")."&nbsp;€ </td>",
                    "<td>".$product['qtt']."</td>",
                    "<td>".number_format($product['total'], 2, ",", "&nbssp;")."&nbsp;€ </td>",
                "</tr>";
            $totalGeneral+= $product['total'];
            $totalQtt+= $product['qtt'];
        }
        echo "<tr>",
                "<td colspan=4> Total général : </td>",
                "<td> <strong>".number_format($totalGeneral, 2, ",", "&nbssp;")."&nbsp;€ </strong> </td>",
            "<tr>",
        "</tbody>",
        "</table>",
        "<div id='card'>",
            "<p>Nombre total d'articles : ".$totalQtt." </p>",
        "</div>",
        "</session>";
    }
    
    ?>
</body>
</html>