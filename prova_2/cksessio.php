<?php 

if(isset($_SESSION["idU"])) {
    $_SESSION["idU"]=0;
    if(isset($_SESSION['car']))
        header("location: trovacarrello.php?id=0");
}
?>