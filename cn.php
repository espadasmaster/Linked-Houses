<?php
$servername = "localhost"; // Nombre del servidor
$username = "root"; // Usuario de la base de datos (cambiar si es diferente)
$password = ""; // Contraseña de la base de datos (cambiar si es necesaria)
$dbname = "linkedhouses"; // Nombre de la base de datos

// Crear conexión
$conexdb = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conexdb->connect_error) {
    die("Conexión fallida: " . $conexdb->connect_error);
}
?>