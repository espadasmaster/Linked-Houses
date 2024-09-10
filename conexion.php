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

include_once 'cn.php';

elegir($conexdb);

function elegir($conexdb){
    if(isset($_POST['sesion'])){
        sesionar($conexdb);
    }
    // if(isset($_POST['agre'])){
    //     agregar($cdb);
    // }
}

function sesionar($conexdb){
    $email = $_POST['ema'];
    $pass = $_POST['pass'];

   $consulta = "SELECT nick FROM usuarios WHERE email='$email' AND contra= '$pass'";

    $consultaCompleta= mysqli_query($conexdb, $consulta);

    $coname= $conexdb->query($consulta);

    $name = $coname ? $coname->fetch_assoc()['nick'] : null;

    if(mysqli_num_rows($consultaCompleta) > 0) {
        $_SESSION['apodo'] = $name;
        header ("location: inicio.php");
        exit();
    }else{
        echo '
            <script>
            alert("Usuario no encontrado, introduzca datos verificados");
            window.location = "index.html";
            </script>';
            exit();
    }
   
}
mysqli_close($conexdb);
?>
    
</body>
</html>