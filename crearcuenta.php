<?php 

include_once 'conex/cn.php'; // Incluir el archivo de conexión

if ($_SERVER["REQUES_METHOD"] = "POST"){
        $DNI = $_POST["DNI"];
        $Nombre = $_POST["Nombre"];
        $Apellido = $_POST["Apellido"];
        $Usuario = $_POST["Usuario"];
        $Contra = $_POST["Contra"]; 
        $Mail = $_POST["Mail"];

        $sql = "INSERT INTO usuario (DNI, Nombre, Apellido, Usuario, Contra, Mail) 
                VALUES ('$DNI', '$Nombre', '$Apellido', '$Usuario', '$Contra', '$Mail')";

        // Ejecutar la consulta y verificar si se realizó correctamente
        if ($conexdb->query($sql) === TRUE) {
            echo "Nuevo registro creado exitosamente.";
            
        } else {
            echo "Error: " . $sql . "<br>" . $conexdb->error;
        }

        // Cerrar la conexión
        $conexdb->close();
    } else {
        echo "Por favor complete todos los campos.";
    }

?>