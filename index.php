<?php
//------------------------------------------fichier pour afficher le formulaire -----------------------------

 //pour récupérer les données utilisateurs
    session_start();
    ob_start(); //demarre la temporisation de sortie
?>

    <section id="container">
        <form action="traitement.php?action=addProduct" method="post" enctype="multipart/form-data"> 
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
                <label>
                    <textarea name="description" rows="4" cols="50" >Description du produit</textarea>
                </label>
            </p>
            <p>
                <label for="file">
                    <input type="file" name="file"/>
                </label>

            </p>
            <p>
                <input type="submit" name="submit" value="Ajouter le produit">
            </p>
        </form>

<?php

$title = "Ajouter un produit";
$content= ob_get_clean();
require_once "template.php"; 

?>
