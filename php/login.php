
<?php 
session_start();

include_once 'conex/cn.php';

elegir($conexdb);

function elegir($conexdb){
    if(isset($_POST['login'])){
        sesionar($conexdb);
    }
    // if(isset($_POST['agre'])){
    //     agregar($cdb);
    // }
    
}

function sesionar($conexdb){
    $usuario = $_POST['usuario'];
    $contra = $_POST['contra'];

    

   $consulta = "SELECT Usuario FROM usuario WHERE Usuario='$usuario' AND Contra= '$contra'";

    $consultaCompleta= mysqli_query($conexdb, $consulta);

    $conuser= $conexdb->query($consulta);

    $user = $conuser ? $conuser->fetch_assoc()['Usuario'] : null;

    if(mysqli_num_rows($consultaCompleta) > 0) {
        $_SESSION['Usuario'] = $user;
        header ("location: menu.html");
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
    