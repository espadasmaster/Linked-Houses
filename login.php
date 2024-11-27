
<?php 
include_once 'conex/cn.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
    $contra = mysqli_real_escape_string($conn, $_POST['contra']);

    
    $sql = "SELECT * FROM usuario WHERE Usuario = '$usuario'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();

        
        if (password_verify($contra, $fila['Contra'])) {
            
            session_start();
            $_SESSION['Usuario'] = $usuario;
            header("Location: venta.php"); 
            exit();
        } else {
            echo "<script>alert('Contraseña incorrecta'); window.location.href='Index.html';</script>";
        }
    } else {
        echo "<script>alert('El usuario no existe'); window.location.href='Index.html';</script>";
    }
}

$conn->close();
?>