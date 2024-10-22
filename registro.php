<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 

$conexdb = new mysqli("localhost","root","","linked-houses");


// Crear cuenta
if(isset($_POST["regis"])){
    // Validar que todos los campos no estén vacíos
    if(!empty($_POST["DNI"]) && !empty($_POST["nombre"]) && !empty($_POST["apellido"]) 
    && !empty($_POST["usuario"]) && !empty($_POST["contraseña"]) && !empty($_POST["email"])){ 
        // Asignamos el valor
        $DNI = $_POST["DNI"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $usuario = $_POST["usuario"];
        $contraseña = $_POST["contraseña"]; 
        $email = $_POST["email"];
        
        // Aquí se debe realizar la validación y sanitización de los datos

        // Inserción en la base de datos
        $insertar = "INSERT INTO usuario (DNI, Nombre, Apellido, Usuario, Contraseña, Mail) VALUES ('$DNI', '$nombre', '$apellido', '$usuario','$contraseña', '$email')";

        // Ejecutar la consulta
        if (mysqli_query($conexdb, $insertar)) {
            echo "Registro exitoso.";
        } else {
            echo "Error: " . $insertar . "<br>" . mysqli_error($conexdb);
        }
    } else {
        echo "Por favor complete todos los campos.";
    }
}

// Cerrar conexión
mysqli_close($conexdb);

?>

</body>
</html>