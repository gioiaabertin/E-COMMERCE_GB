<?php  include 'creacarrello.php';
include_once 'header.php';  
 
  

include_once 'Cproduct.php';
$prodUt = array();

?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">+</th>
            <th scope="col">Quant</th>
            <th scope="col">-</th>
            <th scope="col">X</th>
        </tr>
    </thead>
    <tbody>
        <?php

        echo "<h1 style='text-align: center;''>il mio carrello è il numero: " . $_COOKIE['car'] . '</h1><br>';
        $sql = 'SELECT * FROM carrelli join carrellocarica on idCar=idCarello join prodotti on idProdotto=id WHERE idCar=?';
        $params = ["i", &$_COOKIE['car']];
        $result = DatabaseClassSingleton::getInstance()->Select($sql, $params);
        if (count($result) == 1) {
            foreach ($result as $row) {
                echo '<tr>';
                echo ' <th>' . $row['idProdotto'] . '</th><th>' . $row['nome'] . '</th><th></th><th>' . $row['quant'] . '</th>';
                echo '</tr>';
                $p = new CProduct(
                    $row['id'], $row['nome'], $row['descr'], $row['quantitaManc'],
                    $row['idCateg'], $row['prezzo'], $row['taglie']
                );
            }
            ?>
    </tbody>
</table>
<?php
    $_SESSION['prodUt'] = $prodUt;
        }


        include_once 'footer.php';
        ?>