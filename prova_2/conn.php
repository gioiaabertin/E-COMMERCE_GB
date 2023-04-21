<?php
//mysqli object-oriented
$servername = "localhost";
$username = "root";
$password = "";
$database = "e-commercegb";

//create connection
$conn = new mysqli($servername, $username, $password, $database);

//check connection
if ($conn->connect_error) {
    die("connection fallied:" . $conn->connect_error);
}
?>