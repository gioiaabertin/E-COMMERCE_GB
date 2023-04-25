<?php 

if(isset($_SESSION["utID"]))
    $_SESSION["guest"]=1;
    else $_SESSION["guest"]=0;

?>