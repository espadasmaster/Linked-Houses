<?php
function conexion() {
    $mysqli_conexion = new mysqli("localhost", "root", "", "linkedhouses");
    if ($mysqli_conexion->connect_errno) {
      echo "Error de conexión con la base de datos: " . $mysqli_conexion->connect_errno;
      exit;
    }
    return $mysqli_conexion;
  }

?>

