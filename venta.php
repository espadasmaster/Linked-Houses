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

    <?php
    session_start();
    $usuarioLogueado = isset($_SESSION['usuario']); //verificamos si el usuario esta logueadou
    $nombreUsuario = $usuarioLogueado ? $_SESSION['usuario'] : '';
    ?>
    <div class="navbar">
        <a href="Index.php"><img src="logo_boceto.PNG" alt="Logo"></a>
        <div class="buttons">
        <?php if ($usuarioLogueado): //si el usuario esta logueado, aparecera el boton de cerrar sesion?> 
            
            <span>Bienvenido, <?php echo htmlspecialchars($nombreUsuario); ?></span> 
            <button onclick="location.href='logout.php'">Cerrar Sesión</button>
        <?php else: //caso contrario apareceran los botones normales?>

            <button onclick="location.href='login.html'">Iniciar Sesión</button>
            <button onclick="location.href='registrarse.html'">Registrarse</button>
        <?php endif; ?>
        </div>
    </div>
    <div class="container">
        <br>
        <h1 class="subtitulo">Lista de Propiedades</h1>
        <button class="add-publication-btn" onclick="location.href='agregar_publicacion.php'">Agregar Publicación +</button>
        <div id="property-list" class="property-list">
            <?php
            include "conex/cn.php";

            //obtener datos
            $sql = "SELECT Localidad, Tipo, `Dni-dueño`, `Cant-ambientes`, Fecha, `Met-pago`, Condiciones, Imagen FROM publicaciones";
            $resultado = $conexdb->query($sql);

            // Mostrar datos en forma de tarjetas
            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<div class='posteo'>";
                    echo "<img src='" . htmlspecialchars($fila['Imagen']) . "' alt='Imagen'>";
                    echo "<div class='posteo-contenido'>";
                    echo "<h3>" . htmlspecialchars($fila['Tipo']) . " en " . htmlspecialchars($fila['Localidad']) . "</h3>";
                    echo "<p><strong>Ambientes:</strong> " . htmlspecialchars($fila['Cant-ambientes']) . "</p>";
                    echo "<p><strong>Fecha:</strong> " . htmlspecialchars($fila['Fecha']) . "</p>";
                    echo "<p><strong>Método de Pago:</strong> " . htmlspecialchars($fila['Met-pago']) . "</p>";
                    echo "<p class='condiciones'><strong>Condiciones:</strong> " . htmlspecialchars($fila['Condiciones']) . "</p>";
                    
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p>No se encontraron publicaciones.</p>";
            }

            // Cerrar conexión
            $conexdb->close();
            ?>
        </div>
    </div>
</body>
</html>
