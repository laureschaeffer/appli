<?php
    session_start();

    // https://www.php.net/manual/fr/intro.session.php
    
    if(isset($_POST['submit'])){
        
        $name=  filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS); //nouveau filtre
        $price= filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $qtt= filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);

        // Filtres pour la sécurité

        if($name && $price && $qtt){

            $product = [
                "name"=> $name,
                "price" => $price,
                "qtt" => $qtt,
                "total" => $price*$qtt
            ];
            // si on veut éviter les doublons cette fonction existe: $product = array_unique($product);
            $_SESSION['products'][]= $product; //session contient les données stockées dans la session utilisateur côté serveur
            echo "<script>alert('Ajout effectué')</script>";
            
        }

        

    }
    header("Location:index.php"); //a mettre en dernier, renvoie à l'index une fois le formulaire envoyé, correct ou non

// -------------------fonctions pour modifier le panier, en lien avec les <a href> dans recap, sur les icones ------------

    if (isset($_GET['action'])){ //si l'utilisateur fait une action
        
        switch ($_GET['action']){
            case 'removeOne': //action pour retirer une quantité 
                if ($_SESSION['products'][$_GET['id']]['qtt'] > 1){
                    // Vérifier qu'il y ait déjà au moins un article
                    $_SESSION['products'][$_GET['id']]['qtt'] -= 1;
                    //ensuite mettre à jour le total
                    $_SESSION['products'][$_GET['id']]['total'] = $_SESSION['products'][$_GET['id']]['qtt'] * $_SESSION['products'][$_GET['id']]['price'] ;

                    $message="Quantité retirée";
                    echo "<script>alert('".$message."')</script>";
                }
                break;

            case 'add' : //action pour ajouter une quantité
                $_SESSION['products'][$_GET['id']]['qtt'] += 1;
                //ensuite mettre à jour le total
                $_SESSION['products'][$_GET['id']]['total'] = $_SESSION['products'][$_GET['id']]['qtt'] * $_SESSION['products'][$_GET['id']]['price'] ;

                $message="Quantité ajoutée";
                echo "<script>alert('".$message."')</script>";
                break;

// function unset() supprime une variable dans un tableau

            case 'delete': //action pour supprimer une catégorie entière de produit
                unset($_SESSION['products'][$_GET['id']]);

                $message="Produit supprimé";
                echo "<script>alert('".$message."')</script>";
                break;

            case 'deleteEverything' : // action pour supprimer tout son panier
                unset($_SESSION['products']);
                $message="Panier vidé";
                echo "<script>alert('".$message."')</script>";
                break;

            default : 
                break;
        }
        header("Location:recap.php"); // Une fois l'action finie à travers la page traitement, retour à recap

    }

