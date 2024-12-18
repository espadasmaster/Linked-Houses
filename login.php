<?php
include_once 'conex/cn.php';
session_start();

header("Content-Type: application/json");

// Leer los datos enviados por el cliente
$input = json_decode(file_get_contents('php://input'), true);

$usuario = $input['usuario'] ?? '';
$contraseña = $input['Contraseña'] ?? '';

// Validar que ambos campos estén completos
if (empty($usuario) || empty($contraseña)) {
    echo json_encode(['success' => false, 'error' => 'Por favor, completa todos los campos.']);
    exit();
}

// Evitar inyecciones SQL
$usuario = $conexdb->real_escape_string($usuario);
$contraseña = $conexdb->real_escape_string($contraseña);

// Consultar la base de datos
$sql = "SELECT * FROM usuario WHERE Usuario = '$usuario'";
$result = $conexdb->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Verificar la contraseña
    if (password_verify($contraseña, $row['Contra'])) {
        // Autenticación exitosa: Iniciar sesión y guardar datos del usuario
        $_SESSION['usuario'] = $usuario;
        $_SESSION['nombreUsuario'] = $row['Nombre'];
        $_SESSION['correoUsuario'] = $row['Mail'];

        // Devolver respuesta exitosa
        echo json_encode(['success' => true, 'message' => 'Inicio de sesión exitoso.']);
    } else {
        // Contraseña incorrecta
        echo json_encode(['success' => false, 'error' => 'Contraseña incorrecta.']);
    }
} else {
    // Usuario no encontrado
    echo json_encode(['success' => false, 'error' => 'Usuario no encontrado.']);
}

$conexdb->close();
?>

