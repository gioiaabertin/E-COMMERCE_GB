<?php
include_once 'conn.php';
$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM carrellocarica WHERE idUnione = ? ");
$stmt->bind_param("i", $id);

// execute statement
$stmt->execute();

if ($stmt->affected_rows > 0)
$msg = 'ok_canc';
else if ($results == 0)
$msg = 'nope_canc';

header('location:carrello.php?msg=' . $msg);
?>