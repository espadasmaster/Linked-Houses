<?php
include "conex/cn.php";
session_start(); // Iniciar sesión para obtener los datos del usuario logueado

// Verificar si el formulario fue enviado
if (isset($_POST['submit'])) {
    // Verificar si el usuario está logueado
    if (!isset($_SESSION['correoUsuario'])) { // Cambiar para verificar la existencia del correo
        echo "Debes iniciar sesión para realizar esta acción.";
        header("Location: login.html");
        exit();
    }

    // Obtener el correo del usuario logueado
    $email_usuario = $_SESSION['correoUsuario']; // Usar la variable de sesión específica para el correo

    // Obtener los valores del formulario
    $localidad = $_POST['localidad'];
    $tipo = $_POST['propi'];
    $dni_dueno = $_POST['dni_dueño'];
    $cant_ambientes = $_POST['cant_ambientes'];
    $fecha = $_POST['fecha'];
    $met_pago = $_POST['tipopago'];
    $condiciones = $_POST['condiciones'];

    // Subir la imagen
    $imagen = $_FILES['imagen'];
    $nombre_imagen = $imagen['name'];
    $tmp_imagen = $imagen['tmp_name'];
    $ruta_imagen = 'uploads/' . $nombre_imagen;

    // Validar que la imagen se haya subido correctamente
    if (move_uploaded_file($tmp_imagen, $ruta_imagen)) {
        // Insertar la información en la base de datos
        $sql = "INSERT INTO publicaciones (Localidad, Tipo, `Dni-dueño`, `Cant-ambientes`, Fecha, `Met-pago`, Condiciones, Imagen, MailUsuario)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conexdb->prepare($sql);
        $stmt->bind_param(
            "sssssssss",
            $localidad,
            $tipo,
            $dni_dueno,
            $cant_ambientes,
            $fecha,
            $met_pago,
            $condiciones,
            $ruta_imagen,
            $email_usuario
        );

        if ($stmt->execute()) {
            echo "Publicación guardada con éxito";
            header("Location: venta.php");
        } else {
            echo "Error al guardar la publicación: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error al cargar la imagen";
    }

    // Cerrar la conexión
    $conexdb->close();
}
?>

