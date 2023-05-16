<?php
session_start();
include 'DatabaseClassSingleton.php';

    $uploadDir = __DIR__ . '\imm';

    foreach ($_FILES as $file) {
        if (UPLOAD_ERR_OK === $file['error']) {
            $fileName = basename($file['name']);
            move_uploaded_file($file['tmp_name'], $uploadDir . DIRECTORY_SEPARATOR . $fileName);
        }
    }
    $path = str_replace('.jpg', "", basename($file['name']));
    $descr = $_POST["this_desc"];
    $stmt = $conn->prepare("INSERT INTO foto(foto,testo,idP) VALUES (?,?,?)");
    $stmt->bind_param("ssi", $path, $descr, $id);

    if ($stmt->execute() === TRUE)
        header("location: index.php");
    else {
        $msg = "inserimento foto NON avvenuto!"; //sistemato la logica (la tua era ridondante nelle chiamate)
        header("location: index.php" . ($msg == "" ? "" : "?msg=$msg"));
    }

?>