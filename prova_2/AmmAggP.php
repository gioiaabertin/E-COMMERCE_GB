<?php include_once 'header.php';

include_once 'DatabaseClassSingleton.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/f.css">
    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
</head>

<body>
    <div>
        <form action="ckInsAmm.php" method="post">
            <h1>AGGIUNGO NUOVO PRODOTTO AL CATALOGO:</h1>
            <br>
            <p>Nome: </p>
            <input type="text" name="this_nome">
            <p>Descrizione: </p>
            <input type="text" name="this_desc">
            <p>Quantità mancante: </p>
            <input type="text" name="this_quantM">
            <p>Categoria: </p>
            <select name="this_cat">
                <option disabled selected>Categorie</option>
                <?php
                                    $result = DatabaseClassSingleton::getInstance()->Select('SELECT * FROM categorie');
                                    foreach ($result as $row) {
                                        echo ' <option value="' . $row["idC"] . '">' . $row["nomeC"] . '</option>';
                                    }
                                    ?>

            </select>
            <p>Prezzo: </p>
            <input type="text" name="this_prezzo">
            <p>Foto: </p>
            <input type='file' name='file'>
            <br>
            <p>Taglie: </p>
            <input type=" text" name="this_taglie">
            <br>
            <p>Sesso: </p>
            <select name="this_sex">
                <option value="UNISEX" selected>UNISEX</option>
                <option value="M">M</option>
                <option value="F">F</option>

            </select>
            <input type="submit" value="AGGIUNGI!">
        </form>
    </div>
    <div><?php include 'footer.php' ?> </div>
</body>

</html>