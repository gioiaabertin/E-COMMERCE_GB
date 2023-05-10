<?php
include_once 'conn.php';
$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM prodotti WHERE id=? ");
$stmt->bind_param("i", $id);

// execute statement
$stmt->execute();

if ($stmt->affected_rows > 0)
    $msg = 'ok_canc';
else if ($results == 0)
    $msg = 'nope_canc';

header('location:PAMM.php?msg=' . $msg);
?>