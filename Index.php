<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="shortcut icon" type="image/x-icon" href="logo.png">
    <link rel="stylesheet" href="estilo/menu.css"> 
</head>
<body>
    <?php
    session_start();
    $usuarioLogueado = isset($_SESSION['usuario']); 
    $nombreUsuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : ''; // Recupera el nombre del usuario si está disponible
    if (isset($_SESSION['mensaje_error'])) {
      echo "<script>alert('" . $_SESSION['mensaje_error'] . "');</script>";
      unset($_SESSION['mensaje_error']); // Eliminar el mensaje para que no se repita
    }
    ?>

    <div class="navbar">
        <img src="logo_boceto.PNG" alt="Logo">
        
        <div class="buttons">
            <?php if ($usuarioLogueado): ?>
                <span>Bienvenido, <?php echo htmlspecialchars($nombreUsuario); ?></span>
                <button onclick="location.href='logout.php'">Cerrar Sesión</button>
            <?php else: ?>
                <button onclick="location.href='login.html'">Iniciar Sesión</button>
                <button onclick="location.href='registrarse.html'">Registrarse</button>
            <?php endif; ?>
        </div>
    </div>

    <section class="hero">
        <div class="overlay">
            <h1>Nuevos Predios</h1>
            <br>
            <br>
            <button class="explorar-btn" onclick="location.href='venta.php'">Explora</button>
        </div>
    </section>
</body>
</html>


