<?php
// Configuración de la conexión a la base de datos
$servidor = "localhost";
$usuario = "root";
$password = "";
$base_datos = "linkedhouses";

// Crear conexión
$conn = new mysqli($servidor, $usuario, $password, $base_datos);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener datos
$sql = "SELECT Localidad, Tipo, `Dni-dueño`, `Cant-ambientes`, Fecha, `Met-pago`, Condiciones, Imagen FROM publicaciones";
$resultado = $conn->query($sql);

// Mostrar datos en pantalla
if ($resultado->num_rows > 0) {
    echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
    echo "<tr>
            <th>Localidad</th>
            <th>Tipo</th>
            <th>DNI Dueño</th>
            <th>Ambientes</th>
            <th>Fecha</th>
            <th>Método de Pago</th>
            <th>Condiciones</th>
            <th>Imagen</th>
        </tr>";

    // Recorrer los resultados y mostrarlos
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($fila['Localidad']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['Tipo']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['Dni-dueño']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['Cant-ambientes']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['Fecha']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['Met-pago']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['Condiciones']) . "</td>";

        // Mostrar la imagen como elemento HTML
        echo "<td><img src='" . htmlspecialchars($fila['Imagen']) . "' alt='Imagen' style='width:100px; height:auto;'></td>";

        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No se encontraron datos.";
}

// Cerrar conexión
$conn->close();
?>
