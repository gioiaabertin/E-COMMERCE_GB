<?php
session_start();
include_once 'conn.php';
include_once 'DatabaseClassSingleton.php';
 $msg="";

$stmt = $conn->prepare("UPDATE carrelli SET pagato = 1 WHERE idCar = ?");
$stmt->bind_param("i", $_COOKIE['car']);

// execute statement
$stmt->execute();

if ($stmt->affected_rows > 0){
    $msg .= 'ok_pagato';


    $query = "INSERT INTO ordini(idCar) VALUES (?)";
    $params = ["i", &$_COOKIE['car']];
   
    $result = DatabaseClassSingleton::getInstance()->Insert($query, $params);

if($result>0){
     $msg .= 'ok_pagato';
     include 'creacarrello.php';
}
       
        
}
    
else if ($results == 0)
    $msg .= 'nopeee,paga';


header('location:carrello.php?msg=' . $msg);
?>