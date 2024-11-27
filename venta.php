<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="logo.png">
    <link rel="stylesheet" href="estilo/ventas.css">
    <title>Explorar</title>
    
</head>
<body>
    <div class="navbar">
        <a href="Index.html"><img src="logo_boceto.PNG" alt="Logo"></a>
        <div class="buttons">
            <button onclick="location.href='login.html'">Iniciar Sesión</button>
            <button onclick="location.href='registrarse.html'">Registrarse</button>
        </div>
    </div>
    <div class="container">
        <h1 class="subtitulo">Lista de Propiedades</h1>
        <div id="property-list" class="property-list">
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

            // Mostrar datos en forma de tarjetas
            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<div class='tarjeta'>";
                    echo "<img src='" . htmlspecialchars($fila['Imagen']) . "' alt='Imagen'>";
                    echo "<div class='contenido'>";
                    echo "<h3>" . htmlspecialchars($fila['Tipo']) . " en " . htmlspecialchars($fila['Localidad']) . "</h3>";
                    echo "<p><strong>Dueño (DNI):</strong> " . htmlspecialchars($fila['Dni-dueño']) . "</p>";
                    echo "<p><strong>Ambientes:</strong> " . htmlspecialchars($fila['Cant-ambientes']) . "</p>";
                    echo "<p><strong>Fecha:</strong> " . htmlspecialchars($fila['Fecha']) . "</p>";
                    echo "<p><strong>Método de Pago:</strong> " . htmlspecialchars($fila['Met-pago']) . "</p>";
                    echo "<p class='condiciones'><strong>Condiciones:</strong> " . htmlspecialchars($fila['Condiciones']) . "</p>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p>No se encontraron datos.</p>";
            }

            // Cerrar conexión
            $conn->close();
            ?>
        </div>
        <button class="add-publication-btn" onclick="location.href='agregar_publicacion.html'">Agregar Publicación +</button>
    </div>
</body>
</html>
