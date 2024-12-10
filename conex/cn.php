<?php
$conexdb = mysqli_connect('localhost', 'root', '', 'linkedhouses');

// Verificar la conexión
if (!$conexdb) {
    die("Conexión fallida: " . mysqli_connect_error());
} else {
    echo "Conexión exitosa.";
}
?>

