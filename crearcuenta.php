<?php 

include_once 'conex/cn.php'; // Incluir el archivo de conexión

if ($_SERVER["REQUES_METHOD"] = "POST"){
        $DNI = $_POST["DNI"];
        $Nombre = $_POST["Nombre"];
        $Apellido = $_POST["Apellido"];
        $Usuario = $_POST["Usuario"];
        $Contra = $_POST["Contra"]; 
        $Mail = $_POST["Mail"];

        // Validaciones
        if (preg_match("/^[0-9]{8,}$/", $DNI) && //solo numeros
            preg_match("/^[a-zA-Z]+$/", $Nombre) && // Solo letras para nombre
            preg_match("/^[a-zA-Z]+$/", $Apellido) && // Solo letras para apellido
            preg_match("/^[a-zA-Z0-9]+$/", $Usuario) && // Letras y números
            strlen($Contra) >= 8  && // Mínimo 8 caracteres para la contra
            preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $Mail) 
        ) {  


        $sql = "INSERT INTO usuario (DNI, Nombre, Apellido, Usuario, Contra, Mail) 
                VALUES ('$DNI', '$Nombre', '$Apellido', '$Usuario', '$Contra', '$Mail')";


        
        // Ejecutar la consulta y verificar si se realizó correctamente
        if ($conexdb->query($sql) === TRUE) {
            echo "<script>alert('Nuevo registro creado exitosamente.');</script>";
            header("location:menu.html");
        } else {
            echo "Error: " . $sql . "<br>" . $conexdb->error;
        }

    
        // Cerrar la conexión
        $conexdb->close();
    } else {
        echo "Por favor complete todos los campos o verifique que esten bien.";
    }
}
?>                