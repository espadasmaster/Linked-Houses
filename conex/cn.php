<?php
$conexdb = mysqli_connect('localhost', 'root', '', 'linkedhouses', 3307);

// Verificar la conexión
if (!$conexdb) {
    die("Conexión fallida: " . mysqli_connect_error());
} else {
    echo "Conexión exitosa.";
}
?>

