<?php
include "conex/cn.php"; // Archivo de conexión a la base de datos
session_start();

header("Content-Type: application/json");

// Verificar que el usuario está autenticado
if (!isset($_SESSION['correoUsuario'])) {
    echo json_encode(['success' => false, 'error' => 'Usuario no autenticado.']);
    exit();
}

// Leer los datos enviados
$input = json_decode(file_get_contents("php://input"), true);
$publicacionId = $input['publicacionId'] ?? '';

if (empty($publicacionId)) {
    echo json_encode(['success' => false, 'error' => 'ID de publicación no proporcionado.']);
    exit();
}

$usuario = $_SESSION['correoUsuario'];

// Eliminar el contacto de la base de datos
$sql = "DELETE FROM contactos WHERE PublicacionId = ? AND Usuario = ?";
$stmt = $conexdb->prepare($sql);
$stmt->bind_param("ss", $publicacionId, $usuario);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => $stmt->error]);
}

$stmt->close();
$conexdb->close();
?>
