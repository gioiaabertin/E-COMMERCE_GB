<?php
include_once 'header.php';
include_once 'Cproduct.php';

$tot = 0;
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col" style="color: red;">DIM </th>
            <th scope="col">Quant</th>
            <th scope="col">AGG</th>
            <th scope="col">CANC</th>
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
                echo ' <th>' . $row['idProdotto'] . '</th><th>' . $row['nome'] . '</th><th><a style="color: red;" href="menoquant.php?id=' . $row['idUnione'] . '">
                -</th><th>' . $row['quant'] . '</th><th><a href="piuquant.php?id=' . $row['idUnione'] . '">+</th><th><a href=
                "cancP.php?id=' . $row['idUnione'] . '">X</th><th>' . $row['idProdotto'] * $row['quant'] . '</th>';
                echo '</tr>';

                $tot .= $row['idProdotto'] * $row['quant'];
            }
            echo '<tr><th></th><th></th><th></th><th></th><th></th><th scope="col">Totale:</th><th>' . $tot . '</tr>';
            ?>
    </tbody>
</table>
<?php if ($_SESSION['idU'] != 0 || !isset($_SESSION['idU'])) {
        echo '<form action="pagato.php"+ method="post">
    <input type="button" value="pagare" id="BottPaga" name="BottPaga"></form>';
        $_SESSION['carrello_guest'] = null;
    } else {
        $_SESSION['carrello_guest'] = $_COOKIE['car'];
        echo "<h1 'style = 'text-align: center';>Devi fare l'accesso, clicca qui  <a href='accedi.php'.php>qui</a> </h1>";
    }
        }


        include_once 'footer.php';
        ?>