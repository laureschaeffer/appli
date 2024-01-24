<?php
    session_start();

    // https://www.php.net/manual/fr/intro.session.php
    
    if(isset($_POST['submit'])){
        $name=  filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS); //nouveau filtre
        $price= filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $qtt= filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);


        if($name && $price && $qtt){

            $product = [
                "name"=> $name,
                "price" => $price,
                "qtt" => $qtt,
                "total" => $price*$qtt
            ];
    
            $_SESSION['products'][]= $product; //session contient les données stockées dans la session utilisateur côté serveur

        }
        echo "<script>alert('Ajout effectué')</script>";

    }
    header("Location:index.php"); //a mettre en tout dernier
