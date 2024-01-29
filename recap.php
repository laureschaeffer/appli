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
                        // "<th>#</th>",
                        "<th>Nom</th>",
                        "<th>Prix</th>",
                        "<th>Quantité</th>",
                        "<th>Total</th>",
                        "<th>Descriptif</th>",
                        "<th>Image</th>",
                        "<th>Supprimer catégorie</th>",
                    "</tr>",
                "</thead>",
            "<tbody>";
        $totalGeneral = 0 ;
        $totalQtt = 0;

        foreach($_SESSION['products'] as $index => $product){ // boucle pour afficher tout le panier, number_format pour un meilleur affichage des prix
            echo "<tr>",
                    // "<td>".$index."</td>",
                    "<td>".$product['name']."</td>",
                    "<td>".number_format($product['price'], 2, ",", "&nbssp;")."&nbsp;€ </td>",
                    "<td>", //retirer ou ajouter une quantité
                        "<a href='traitement.php?action=removeOne&id=$index'><i class='fa-solid fa-minus'></i></a>",
                            $product['qtt'],
                        "<a href='traitement.php?action=add&id=$index'><i class='fa-solid fa-plus'></a></i>",
                    "</td>",
                    "<td>".number_format($product['total'], 2, ",", "&nbssp;")."&nbsp;€ </td>",
                    "<td>".$product['description']."<td>",
                      // <!-- Modal -->
                    // Bouton pour ouvrir le modal
                    "<button type='button' class='btn btn-secondary' data-toggle='modal' data-target='#myModal'>",
                    "Afficher l'image du produit",
                    "</button>",
                    //contenu du modal
                    "<div class='modal' id='myModal'>",
                        "<div class='modal-dialog'>",
                            "<div class='modal-content'>",
                            // tete du modal
                                "<div class='modal-header'>",
                                    "<h4 class='modal-title'>Image du produit</h4>",
                                    "<button type='button' class='close' data-dismiss='modal'>&times;</button>",
                                "</div>",
                                "<div class='modal-body>",
                                    "<img src='./upload/".$_SESSION['nameFile'][$index]."' alt ='photo du produit' height='200px' width='200px'>",
                                "</div>",
                                "<div class='modal-footer'>",
                                    "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Fermer</button>",
                                "</div>",
                            "</div>",
                        "</div>",
                    "</div>",
                    "<a href='traitement.php?action=delete&id=$index'><i class='fa-solid fa-xmark'></i></a>",
                "</tr>";
                $totalGeneral+= $product['total'];


        }
            echo "<tr>",
                        "<td colspan=4> Total général : </td>",
                        "<td> <strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€ </strong> </td>",
                    "</tr>",
                    "<tr>",
                        "<td colspan=4> Supprimer le panier : </td>",
                        "<td><a href='traitement.php?action=deleteEverything'><i class='fa-solid fa-trash'></i></a></td>",
                    "</tr>",
                    "</tbody>",
                "</table>",
            "</section>";
    }


    $title = "Récap des produits";
    $content= ob_get_clean();
    require_once "template.php"; 
    ?>
