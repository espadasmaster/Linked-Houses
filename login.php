<?php 
include_once 'conex/cn.php';

// Obtener datos del formulario
$usuario = $_POST['usuario'];
$contraseña = $_POST['Contraseña'];

// Evitar inyecciones SQL
$usuario = $conexdb->real_escape_string($usuario);
$contraseña = $conexdb->real_escape_string($contraseña);

// Consultar base de datos
$sql = "SELECT * FROM usuario WHERE Usuario = '$usuario'";
$result = $conexdb->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Verificamos la contraseña
    if (password_verify($contraseña, $row['Contra'])) {
        // Si todo es correcto, iniciamos la sesión
        session_start();
        $_SESSION['usuario'] = $usuario; // Guardamos el nombre de usuario o ID
        $_SESSION['nombre'] = $row['Nombre']; // Guardamos el nombre del usuario
        
        header("Location: venta.php"); // Cambia a la página principal o de usuario
        exit();
    } else {
        // Contraseña incorrecta
        echo "<script>alert('Contraseña incorrecta'); window.location.href='login.html';</script>";
    }
} else {
    // Usuario no encontrado
    echo "<script>alert('Usuario no encontrado'); window.location.href='login.html';</script>";
}

$conexdb->close();
?>
