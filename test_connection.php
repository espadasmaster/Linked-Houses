<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "linked-houses";

$conexdb = new mysqli($servername, $username, $password, $dbname);

if ($conexdb->connect_error) {
    die("Conexión fallida: " . $conexdb->connect_error);
} else {
    echo "Conexión exitosa";
}

$conexdb->close();
?>
