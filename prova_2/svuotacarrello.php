<?php
include_once 'conn.php';
echo $_COOKIE['car'];
$stmt = $conn->prepare("DELETE FROM carrellocarica WHERE idCarello = ? ");
$stmt->bind_param("i", $_COOKIE['car']);

// execute statement
$stmt->execute();

if ($stmt->affected_rows > 0)
    $msg = 'svuotato carrello';
else if ($results == 0)
    $msg = 'ancora pienoo';

header('location:carrello.php?msg=' . $msg);
?>