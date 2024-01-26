<?php
// fonctions affichés à template.php
function showMessage(){ 
    if(!isset($_SESSION["messages"]) || empty($_SESSION["messages"])) {

    } else{
        echo $_SESSION["messages"][0];
        unset($_SESSION["messages"][0]);
    } 
}

function showBasket(){
    if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
    // s'il n'y a rien, la page affiche seulement le formulaire ; sans cette condition la page affiche une erreur
} else {

    $totalQtt=0;

    foreach($_SESSION['products'] as $product){
        $totalQtt+=$product['qtt'];
    }
    echo "<div id='card'>",
            "<p>Nombre total d'articles : ".$totalQtt." </p>",
        "</div>";
    }

}
?>

