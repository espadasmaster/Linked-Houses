<?php
// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT * FROM publicaciones";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='posteo'>
                <img src='" . $row['Imagen'] . "' alt='Imagen de la propiedad'>
                <div class='posteo-contenido'>
                    <h3>" . $row['Localidad'] . " - " . $row['Tipo'] . "</h3>
                    <p>" . $row['Condiciones'] . "</p>
                    <button onclick=\"openModal('modal" . $row['id'] . "')\">Ver más</button>
                </div>
            </div>";
    }
} else {
    echo "No hay publicaciones disponibles.";
}
$conn->close();
?>
