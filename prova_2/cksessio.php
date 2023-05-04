<?php 

if(isset($_SESSION["idU"])) {
    $_SESSION["guest"]=1;
    if(isset($_SESSION['car']))
        header("location: carrelloguest.php");
    
}
    else $_SESSION["guest"]=0;

?>