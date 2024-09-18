<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 

include_once 'cn.php';

//crear cuenta
if(!empty($_POST["Registrar"])){
    if(!empty($_POST["DNI"]) or !empty($_POST["Nombre"]) or !empty($_POST["Apellido"]) 
    or !empty($_POST["Usuario"]) or !empty($_POST["Contraseña"]) or !empty($_POST["Mail"])){ 
        //Asignamos el valor
        $DNI=$_POST["DNI"];
        $Nombre=$_POST["Nombre"];
        $Apellido=$_POST["Apellido"];
        $Usuario=$_POST["Usuario"];
        $Contraseña=$_POST["Contraseña"]; 
        $Mail=$_POST["Mail"];
    }
}

?>

</body>
</html>