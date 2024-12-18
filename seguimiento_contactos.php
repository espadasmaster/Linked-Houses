<?php
include "conex/cn.php"; // Archivo de conexión a la base de datos
session_start();

if (!isset($_SESSION['correoUsuario'])) {
    $_SESSION['mensaje_error'] = "Necesitas estar logueado para acceder a esta página.";
    header("Location: login.html");
    exit();
}

$usuario = $_SESSION['correoUsuario']; // Correo del usuario autenticado
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seguimiento de Contactos</title>
    <link rel="shortcut icon" type="image/x-icon" href="logo.png">
    <link rel="stylesheet" href="estilo/ventas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script defer src="JS/eliminarContacto.js"></script>
</head>
<body>
    <div class="navbar">
        <a href="Index.php"><img src="logo_boceto.PNG" alt="Logo"></a>
        <div class="buttons">
            <span>Bienvenido, <?php echo htmlspecialchars($usuario); ?></span>
            <button onclick="location.href='logout.php'">Cerrar Sesión</button>
        </div>
    </div>

    <div class="container-tabla">
        <h1>Historial de Contactos</h1>
        <?php
        // Consulta para obtener los contactos del usuario
        $sql = "SELECT c.FechaContacto, c.EmailDueno, p.Localidad, p.Tipo, c.PublicacionId 
                FROM contactos c 
                INNER JOIN publicaciones p ON c.PublicacionId = p.idPublicacion 
                WHERE c.Usuario = ?";
        $stmt = $conexdb->prepare($sql);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Fecha de Contacto</th><th>Email del Dueño</th><th>Localidad</th><th>Tipo de Propiedad</th><th>Eliminar</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['FechaContacto']) . "</td>
                        <td>" . htmlspecialchars($row['EmailDueno']) . "</td>
                        <td>" . htmlspecialchars($row['Localidad']) . "</td>
                        <td>" . htmlspecialchars($row['Tipo']) . "</td>
                        <td>
                            <button class='delete-btn' data-id='" . htmlspecialchars($row['PublicacionId']) . "'>Eliminar</button>
                        </td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p class='texto-tabla'>No tienes contactos registrados.</p>";
        }

        $stmt->close();
        $conexdb->close();
        ?>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
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
                    <h4>Numero de contacto</h4>
                    <ul>
                        <li><a>+54 11 2624-8040</a></li>
                    </ul>
                </div>
                <div class="footer-cor">
                    <h4>Contactanos por nuestras redes</h4>
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
