<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="shortcut icon" type="image/x-icon" href="logo.png">
    <link rel="stylesheet" href="estilo/menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"> 
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

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>Compania</h4>
                    <ul>
                        <li><a href="">Linked Houses</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Ayuda</h4>
                    <ul>
                        <li><a href="">Soporte</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Tienda Online</h4>
                    <ul>
                        <li><a href="">Juego</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Seguinos</h4>
                    <div class="social-links">
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a href=""><i class="fab fa-twitter"></i></a>
                        <a href="https://www.instagram.com/linked.housesoficial/"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="grupo-2">
                    <small>&copy; 2024 <b>Linked Houses</b> - Todos los Derechos Reservados.</small>
                </div>
            </div>
        </div>
   </footer>

</body>
</html>


