<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "linkedhouses";


$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si el formulario fue enviado
if (isset($_POST['submit'])) {
    // Obtener los valores del formulario
    $localidad = $_POST['localidad'];
    $tipo = $_POST['tipo'];
    $dni_dueno = $_POST['dni_dueño'];
    $cant_ambientes = $_POST['cant_ambientes'];
    $fecha = $_POST['fecha'];
    $met_pago = $_POST['met-pago'];
    $condiciones = $_POST['condiciones'];

    // Subir la imagen
    $imagen = $_FILES['imagen'];
    $nombre_imagen = $imagen['name'];
    $tmp_imagen = $imagen['tmp_name'];
    $ruta_imagen = 'uploads/' . $nombre_imagen;

    // Validar que la imagen se haya subido correctamente
    if (move_uploaded_file($tmp_imagen, $ruta_imagen)) {
        // Insertar la información en la base de datos
        $sql = "INSERT INTO publicaciones (Localidad, Tipo, `Dni-dueño`, `Cant-ambientes`, Fecha, `Met-pago`, Condiciones, Imagen)
                VALUES ('$localidad', '$tipo', '$dni_dueno', '$cant_ambientes', '$fecha', '$met_pago', '$condiciones', '$ruta_imagen')";

        if ($conn->query($sql) === TRUE) {
            echo "Publicación guardada con éxito";
            header("Location:venta.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error al cargar la imagen";
    }

    // Cerrar la conexión
    $conn->close();
}
?>
