<?php
include_once 'conex/cn.php'; // Incluir el archivo de conexión

// Consulta SQL para obtener los datos
$sql = "SELECT * FROM tu_tabla";
$resultado = $conn->query($sql);

// Muestra los datos
if ($resultado->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
            </tr>";
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>
                <td>" . $fila["id"] . "</td>
                <td>" . $fila["nombre"] . "</td>
                <td>" . $fila["descripcion"] . "</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron datos.";
}

// Cierra la conexión
$conn->close();
?>
