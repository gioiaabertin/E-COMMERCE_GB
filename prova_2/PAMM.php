<?php
include_once "header.php";
include_once 'DatabaseClassSingleton.php';


/*
if (isset($_GET["msg"]) && $_GET["msg"] == "login errato")
    echo "<script>alert('login errato!!');</script>";
else if (isset($_GET["msg"]))
    //echo '<p class="benvenuto">Benvenuto!</p>';
    echo "<p class='benvenuto' >BENVENUTO " . $_GET["msg"] . "!</p><br>";*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="formato.css">
</head>

<body>
    <form action="AmmAggP.php" method="post"> <input type="submit" value="aggiungi nuovo prodotto"> </form>
    <table>
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>DESCRIZIONE</th>
            <th>QUANT MANC</th>
            <th>CATEG</th>
            <th>PREZZO</th>
            <th>TAGLIE</th>
            <th>X</th>
        </tr>
        <?php 
        $results = DatabaseClassSingleton::getInstance()->Select("SELECT * FROM prodotti join categorie on idC=idCateg  ");

        // if (isset($_GET["generi"]) && $_GET["generi"] != "1") {
        //   $sql .= "WHERE Genere = '" . $_GET["generi"] . "'";
        //}
        
       

        if ($results > 0) {
           foreach ($results as $row) {
                echo "<tr><th> <a href='profilo.php?id=" . $row["id"] . "'>" . $row["id"] . "</a>" . "</th><th>" . $row["nome"] . 
                "</th><th>" . $row["descr"] . "</th><th>" . $row["quantitaManc"] . "</th><th>" . $row["nomeC"] . "</th><th>" 
                . $row["prezzo"] . "</th><th>" . $row["taglie"] . "</th><th><a href='AmmCancP.php?id=".$row['id']."'> X</a> </th></tr>"; 

            }
        }

        ?>

</body>

</html>