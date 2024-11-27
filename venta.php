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
        <br>
        <h1 class="subtitulo">Lista de Propiedades</h1>
        <div class="posteos-container">
            <?php
            include_once 'conex/cn.php'; // Incluir el archivo de conexión

            // Consulta para obtener las publicaciones
            $sql = "SELECT Localidad, Imagen, Condiciones, Fecha, Tipo FROM publicaciones";
            $result = $conn->query($sql);

            // Verificar si hay publicaciones
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Renderizar cada publicación como un div
                    echo '
                    <div class="posteo">
                        <img src="' . htmlspecialchars($row["Imagen"]) . '" alt="' . htmlspecialchars($row["Fecha"]) . '">
                        <div class="posteo-contenido">
                            <h3>' . htmlspecialchars($row["Tipo"]) . '</h3>
                            <br>
                            <p>' . htmlspecialchars($row["Condiciones"]) . '</p>
                            <br>
                            <button onclick="openModal(\'modal' . $row["Localidad"] . '\')">Ver más</button>
                        </div>
                    </div>

                    <div id="modal' . $row["Localidad"] . '" class="modal">
                        <div class="modal-contenido">
                            <img src="' . htmlspecialchars($row["Imagen"]) . '" alt="' . htmlspecialchars($row["Fecha"]) . '">
                            <div class="modal-texto">
                                <h2>' . htmlspecialchars($row["Tipo"]) . '</h2>
                                <br>
                                <p>' . htmlspecialchars($row["Condiciones"]) . '</p>
                                <br>
                                <button class="cerrar-boton" onclick="closeModal(\'modal' . $row["Localidad"] . '\')">Cerrar</button>
                            </div>
                        </div>
                    </div>
                    ';
                }
            } else {
                echo '<p>No hay publicaciones disponibles.</p>';
            }

            // Cerrar la conexión
            $conn->close();
            ?>
        </div>
        <button class="add-publication-btn" onclick="location.href='agregar_publicacion.html'">Agregar Publicación +</button>
        <br><br><br>
    </div>

    <script>
        function openModal(modalId) {
            document.getElementById(modalId).style.display = 'flex';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }
    </script>
</body>
</html>