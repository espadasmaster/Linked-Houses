<?php
include_once 'conex/cn.php'; // Incluir el archivo de conexión

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener los datos
$sql = "SELECT * FROM publicaciones";
$resultado = $conn->query($sql);

// Verifica si hay resultados
if ($resultado->num_rows > 0) {
    // Crea un enlace para abrir los resultados en otra pestaña
    echo '<a href="venta.html" target="_blank">Ver datos en otra pestaña</a>';
} else {
    echo "No se encontraron datos.";
}

// Cierra la conexión
$conn->close();
?>
