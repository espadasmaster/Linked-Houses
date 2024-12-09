<?php 
include_once 'conex/cn.php'; // Incluir el archivo de conexión

// Obtener datos del formulario
$usuario = trim($_POST['Usuario']);
$nombre = trim($_POST['Nombre']);
$apellido = trim($_POST['Apellido']);
$dni = trim($_POST['DNI']);
$email = trim($_POST['Email']);
$contraseña = trim($_POST['Contraseña']);

// Validar que los campos no estén vacíos
if (empty($usuario) || empty($nombre) || empty($apellido) || empty($dni) || empty($email) || empty($contraseña)) {
    echo "<script>alert('Todos los campos son obligatorios.'); window.location.href='registrarse.html';</script>";
    exit();
}

// Validar formato del correo electrónico
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>alert('Por favor, ingrese un correo electrónico válido.'); window.location.href='registrarse.html';</script>";
    exit();
}

// Validar que el DNI sea un número
if (!is_numeric($dni) || strlen($dni) != 8) {
    echo "<script>alert('El DNI debe ser un número de 8 dígitos.'); window.location.href='registrarse.html';</script>";
    exit();
}

// Validar longitud de la contraseña
if (strlen($contraseña) < 8) {
    echo "<script>alert('La contraseña debe tener al menos 8 caracteres.'); window.location.href='registrarse.html';</script>";
    exit();
}

// Validar que Nombre y Apellido no contengan números o caracteres especiales
if (!preg_match("/^[a-zA-Z\s]+$/", $nombre)) {
    echo "<script>alert('El Nombre solo puede contener letras y espacios.'); window.location.href='registrarse.html';</script>";
    exit();
}

if (!preg_match("/^[a-zA-Z\s]+$/", $apellido)) {
    echo "<script>alert('El Apellido solo puede contener letras y espacios.'); window.location.href='registrarse.html';</script>";
    exit();
}

// Evitar inyecciones SQL
$usuario = $conexdb->real_escape_string($usuario);
$nombre = $conexdb->real_escape_string($nombre);
$apellido = $conexdb->real_escape_string($apellido);
$dni = $conexdb->real_escape_string($dni);
$email = $conexdb->real_escape_string($email);
$contraseña = $conexdb->real_escape_string($contraseña);

// Hashear la contraseña
$contraseñaHash = password_hash($contraseña, PASSWORD_BCRYPT);

// Verificar si el usuario o correo ya existen
$sql = "SELECT * FROM usuario WHERE Usuario = ? OR Mail = ?";
$stmt = $conexdb->prepare($sql);
$stmt->bind_param("ss", $usuario, $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Usuario o email ya existen
    echo "<script>alert('El usuario o el correo ya están registrados.'); window.location.href='registrarse.html';</script>";
} else {
    // Insertar datos en la base de datos
    $sql = "INSERT INTO usuario (Usuario, Nombre, apellido, DNI, Mail, Contra) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conexdb->prepare($sql);
    $stmt->bind_param("ssssss", $usuario, $nombre, $apellido, $dni, $email, $contraseñaHash);

    if ($stmt->execute()) {
        echo "<script>alert('Registro exitoso.'); window.location.href='login.html';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
}

// Cerrar conexión
$stmt->close();
$conexdb->close();
?>