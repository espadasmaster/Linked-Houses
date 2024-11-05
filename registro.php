
<?php 

include(".../conex/cn.php");


if (isset($_POST['registrarse'])) {

$usuario = $_POST['usuario'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$dni = $_POST['dni'];
$mail = $_POST['mail'];
$clave = $_POST['clave'];



//sentencia sql
$insertar = "INSERT INTO usuario (Usuario, Nombre, Apellido, DNI, Mail, Clave) VALUES('$usuario','$nombre', '$apellido', '$dni', '$mail', '$clave')";


// Ejecutamos la sentencia y comprobamos si ha ido bien
if($conexion->query($insertar)) {
    echo "<p>Registro insertado con éxito</p>";
  } else {
    echo "<p>Hubo un error al ejecutar la sentencia de inserción: {$conexion->error}</p>";
  }
// Cerrar conexión
mysqli_close($conexion);
}
?>


