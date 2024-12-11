<!DOCTYPE html> 
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="logo.png">
    <link rel="stylesheet" href="estilo/ventas.css">
    <script src="JS/vermas.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>Explorar</title>
</head>
<body>
    <?php
    session_start();
    $usuarioLogueado = isset($_SESSION['usuario']);
    $nombreUsuario = $usuarioLogueado ? $_SESSION['usuario'] : '';
    ?>
    <div class="navbar">
        <a href="Index.php"><img src="logo_boceto.PNG" alt="Logo"></a>
        <div class="buttons">
            <?php if ($usuarioLogueado): ?> 
                <span>Bienvenido, <?php echo htmlspecialchars($nombreUsuario); ?></span> 
                <button onclick="location.href='logout.php'">Cerrar Sesión</button>
            <?php else: ?>
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

            $sql = "SELECT Localidad, Tipo, `Dni-dueño`, `Cant-ambientes`, Fecha, `Met-pago`, Condiciones, Imagen FROM publicaciones";
            $resultado = $conexdb->query($sql);

            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<div class='posteo'>";
                    echo "<img src='" . htmlspecialchars($fila['Imagen']) . "' alt='Imagen'>";
                    echo "<div class='posteo-contenido'>";
                    echo "<h3>" . htmlspecialchars($fila['Tipo']) . " en " . htmlspecialchars($fila['Localidad']) . "</h3>";
                    echo "<p><strong>Ambientes:</strong> " . htmlspecialchars($fila['Cant-ambientes']) . "</p>";
                    echo "<button class='posteo-contenido' onclick='showDetails(".json_encode($fila).")'>Ver más</button>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p>No se encontraron publicaciones.</p>";
            }

            $conexdb->close();
            ?>
        </div>
    </div>

    <!-- Modal para mostrar detalles-->
<div id="details-modal" class="modal">
    <div class="modal-contenido" id="modal-content">
        <div class="modal">
            <span class="close" onclick="closeDetails()">&times;</span>
            <h2>Detalles de la propiedad</h2>
        </div>
        <div id="modal-body"></div>
    </div>
</div>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>Compania</h4>
                    <ul>
                        <li><a href="">Linked Houses</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Ayuda</h4>
                    <ul>
                        <li><a href="">Soporte</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Tienda Online</h4>
                    <ul>
                        <li><a href="">Juego</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Cualquier duda o consulta, contactanos por nuestras redes</h4>
                    <div class="social-links">
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a href=""><i class="fab fa-twitter"></i></a>
                        <a href="https://www.instagram.com/linked.housesoficial/"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="grupo-2">
                    <small>&copy; 2024 <b>Linked Houses</b> - Todos los Derechos Reservados.</small>
                </div>
            </div>
        </div>
   </footer>

</body>
</html>
