<?php
session_start();
//------------------------------------------fichier pour afficher le récapitulatif de commande-----------------------------

 //pour récupérer les données utilisateurs
    ob_start();
?>

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
                        "<th>Descriptif</th>",
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
                    // "<td>".$product."<td>", chercher description
                    "<td><a href='traitement.php?action=delete&id=$index'><i class='fa-solid fa-xmark'></i></a></td>",

                "</tr>";
            $totalGeneral+= $product['total'];
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
        "</session>";

    }


    var_dump($_FILES);
    $title = "Récap des produits";
    $content= ob_get_clean();
    require_once "template.php"; 

    ?>
