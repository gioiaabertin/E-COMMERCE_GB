<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php
include_once 'conn.php';
if(isset($_POST['id']) && isset($_POST['checked'])) {
  $id = $_POST['id'];
  $checked = $_POST['checked'];}

$stmt = $conn->prepare("UPDATE prodotti SET inEvid = ? WHERE id = ?");
$stmt->bind_param("bi", $checked, $id);

// execute statement
$stmt->execute();

if ($stmt->affected_rows > 0)
    $msg = 'ok';
else if ($results == 0)
    $msg = 'nope';

header('location:carrello.php?msg=' . $msg);
?>