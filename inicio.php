<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php 
session_start();

if(!isset($_SESSION['apodo'])){
    echo '
        <script>
            alert("Debes iniciar sesion antes de entrar a esta pagina");
            window.location = "index.html"; 
        </script>';
    session_destroy();
    die();
}

// Verificar si se ha enviado el formulario
if (isset($_POST['cerrar'])) {
    // Llama a la función si el botón ha sido presionado
    cerrar();
}
//maidana estuvo ACA
function cerrar() {
    
    session_destroy();
    header("location:index.html");

}
?>

<h1>Hola! Bienvenido <?php echo $_SESSION['apodo'];?> </h1>

<form action="" method="post">
    <button type="submit" name="cerrar">Cerrar sesion</button>
    <a href="segundo.php">segundo</a>
</form>
</body>
</html>