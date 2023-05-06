<?php 

if(isset($_SESSION["idU"])) {
    $_SESSION["idU"]=0;
    header("location:'creacarrello.php'");
}

?>