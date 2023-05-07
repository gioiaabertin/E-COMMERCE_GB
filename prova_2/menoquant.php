<?php
include_once 'conn.php';
$id = $_GET['id'];

$stmt = $conn->prepare("UPDATE carrellocarica SET quant = quant - 1 WHERE idUnione = ?");
$stmt->bind_param("i", $id);

// execute statement
$stmt->execute();

if ($stmt->affected_rows > 0)
    $msg = 'ok';
else if ($results == 0)
    $msg = 'nope';

header('location:carrello.php?msg=' . $msg);
?>