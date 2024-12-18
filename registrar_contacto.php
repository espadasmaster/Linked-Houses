<?php
include "conex/cn.php"; // Archivo de conexión a la base de datos
session_start();

header("Content-Type: application/json");

// Verificar que la solicitud sea POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar que el usuario está autenticado
    if (!isset($_SESSION['correoUsuario'])) { 
        echo json_encode(['success' => false, 'error' => 'Usuario no autenticado.']);
        exit();
    }

    $input = json_decode(file_get_contents('php://input'), true);
    
    if (isset($input['email'], $input['publicacionId'])) {
        $usuario = $_SESSION['correoUsuario']; // Usar el correo del usuario almacenado en la sesión
        $email = $input['email'];
        $publicacionId = $input['publicacionId'];
        $fechaContacto = date('Y-m-d H:i:s');

        $sql = "INSERT INTO contactos (Usuario, EmailDueno, PublicacionId, FechaContacto) VALUES (?, ?, ?, ?)";
        $stmt = $conexdb->prepare($sql);
        $stmt->bind_param("ssss", $usuario, $email, $publicacionId, $fechaContacto);

        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => $stmt->error]);
        }
        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'error' => 'Datos insuficientes.']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Método no permitido.']);
}

$conexdb->close();
?>


