<?php 
include_once 'header.php';

if(isset($_SESSION['car']))
    
$sql='SELECT * FROM carrelli join carrellocarica WHERE id=?';
$params=$_SESSION['car'];
$result = DatabaseClassSingleton::getInstance()->Select($sql,$params);
foreach ($result as $row) {
    echo $row['prodotti'].'<br>';
    $p = new CProduct($row['id'], $row['nome'], $row['descr'],$row['quantitaManc'],$row['idCateg'],$row['prezzo'],$row['taglie']);
                }


include_once 'footer.php';
?>