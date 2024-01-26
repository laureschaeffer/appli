<!-- ------------------------------------------  Fichier de temporisation de sortie ----------------------------- -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="style.css" rel="stylesheet"/>
    <title>
        <?= $title ?>
    </title>
</head>
<body>
    <nav>
        <a href="index.php">Index</a>
        <a href="recap.php">Recap</a>
    </nav>
    <h1>
        <?=$title ?>
    </h1>

<?php

    require_once "fonctions.php";
    showBasket(); 
    showMessage();   

?>

<div id="wrapper">
    <?= $content //ici le contenu propre a chaque page ?>
</div>

</body>
</html>

