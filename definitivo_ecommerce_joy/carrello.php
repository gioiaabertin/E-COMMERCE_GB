<?php
include_once 'DatabaseClassSingleton.php';
if (isset($_COOKIE['carG'])) {
    if ($_COOKIE['carG'] != "") {

        $query = "SELECT * FROM carrellocarica WHERE idCarello = ? "; //prendo prodotti in carrello guest precedente
        $params = ["i", &$_COOKIE['carG']];
        $results = DatabaseClassSingleton::getInstance()->Select($query, $params);

        if ($results > 0) {
            foreach ($results as $row) //per ogi prodotto
            {
                $query = "INSERT INTO carrellocarica(idProdotto, idCarello, quant) VALUES (?,?,?)"; //lo inserisco nel nuovo carrello
                $params = ["iii", &$row['idProdotto'], &$_COOKIE['car'], &$row['quant']];
                $results = DatabaseClassSingleton::getInstance()->Insert($query, $params);




            }

        }
        setcookie("carG", "", time() + (86400 * 30), "/");
    }
}
include_once 'header.php';
include_once 'Cproduct.php';

$tot = 0;
?>
<!DOCTYPE html>
<html>

<head>
    <title>Titolo della pagina</title>
    <link rel="stylesheet" type="text/css" href="button.css">
</head>

<body>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">DIM </th>
                <th scope="col">Quant</th>
                <th scope="col">AGG</th>
                <th scope="col" style="color: red;">CANC</th>
                <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody>

            <?php


            echo "<h1 style='text-align: center;''>il mio carrello è il numero: " . $_COOKIE['car'] . '</h1><br>';
            $sql = 'SELECT * FROM carrelli join carrellocarica on idCar=idCarello join prodotti on idProdotto=id WHERE idCar=?';
            $params = ["i", &$_COOKIE['car']];
            $result = DatabaseClassSingleton::getInstance()->Select($sql, $params);
            if (count($result) > 0) {
                foreach ($result as $row) {
                    echo '<tr>';
                    echo '<th>' . $row['idProdotto'] . '</th>';
                    echo '<th>' . $row['nome'] . '</th>';
                    echo '<th><a href="menoquant.php?id=' . $row['idUnione'] . '" class="buttonM">-</a></th>';
                    echo '<th>' . $row['quant'] . '</th>';
                    echo '<th><a href="piuquant.php?id=' . $row['idUnione'] . '" class="buttonA">+</a></th>';
                    echo '<th><a href="cancP.php?id=' . $row['idUnione'] . '" class="buttonC">X</a></th>';
                    echo '<th>' . ($row['idProdotto'] * $row['quant']) . '</th>';
                    echo '</tr>';


                    $tot += $row['idProdotto'] * $row['quant'];
                }
                echo '<tr><th></th><th></th><th></th><th></th><th></th><th scope="col">Totale:</th><th>' . $tot . '</tr>';
                ?>
        </tbody>
    </table>
    <a href="svuotacarrello.php">svuotacarrello</a>
    <?php if ($_SESSION['idU'] != 0 || !isset($_SESSION['idU'])) {
            echo '<form action="pagato.php" method="post">
    <input type="submit" value="Pagare" id="BottPaga" name="BottPaga"></form>';
            $_SESSION['carrello_guest'] = null;
        } else {
            $_SESSION['carrello_guest'] = $_COOKIE['car'];
            echo "<h1 'style = 'text-align: center';>Devi fare l'accesso, clicca qui  <a href='accedi.php'.php>qui</a> </h1>";
        }
            }


            include_once 'footer.php';
            ?>
</body>

</html>