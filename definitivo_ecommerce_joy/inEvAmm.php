<?php
include_once 'conn.php';
if (isset($_GET['id']) && isset($_GET['stato'])) {
  $id = $_GET['id'];
  $stato = $_GET['stato'];

  if ($stato == 0)
    $stato = 1;
  else
    $stato = 0;

  $stmt = $conn->prepare("UPDATE prodotti SET inEvid = ? WHERE id = ?");
  $stmt->bind_param("ii", $stato, $id);

  // execute statement
  $stmt->execute();

  if ($stmt->affected_rows > 0)
    $msg = 'ok';
  else
    $msg = 'nope' . $stato;

  header('location:PAMM.php?msg=' . $msg);
  exit;
}
?>