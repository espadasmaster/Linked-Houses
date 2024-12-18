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
    <link rel="stylesheet" href="estilo/ventas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<body>
    <div class="navbar">
        <a href="Index.php"><img src="logo_boceto.PNG" alt="Logo"></a>
        <div class="buttons">
            <span>Bienvenido, <?php echo htmlspecialchars($usuario); ?></span>
            <button onclick="location.href='logout.php'">Cerrar Sesión</button>
        </div>
    </div>

    <div class="container">
        <h1>Historial de Contactos</h1>
        <?php
        // Consulta para obtener los contactos del usuario
        $sql = "SELECT c.FechaContacto, c.EmailDueno, p.Localidad, p.Tipo 
                FROM contactos c 
                INNER JOIN publicaciones p ON c.PublicacionId = p.idPublicacion 
                WHERE c.Usuario = ?";
        $stmt = $conexdb->prepare($sql);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Fecha de Contacto</th><th>Email del Dueño</th><th>Localidad</th><th>Tipo de Propiedad</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['FechaContacto']) . "</td>
                        <td>" . htmlspecialchars($row['EmailDueno']) . "</td>
                        <td>" . htmlspecialchars($row['Localidad']) . "</td>
                        <td>" . htmlspecialchars($row['Tipo']) . "</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No tienes contactos registrados.</p>";
        }

        $stmt->close();
        $conexdb->close();
        ?>
    </div>
</body>
</html>
