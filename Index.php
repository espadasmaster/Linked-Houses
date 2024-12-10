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
            <h1>Explora nuevos predios</h1>
            <br>
            <br>
            <button class="explorar-btn" onclick="location.href='venta.php'">Explora</button>
        </div>
    </section>

    <section class="hero">
        <div class="overlay">
            <h2>La página web es una plataforma digital dedicada a la publicación, compra, venta y alquiler de inmuebles. Está diseñada para facilitar la búsqueda de propiedades para los usuarios, ofreciendo un catálogo diverso que incluye casas, departamentos, terrenos y más. Los propietarios y agentes inmobiliarios pueden crear anuncios con detalles completos sobre las propiedades, incluyendo fotografías, descripción, ubicación, precio y características específicas como el número de habitaciones o el tipo de pago. Los usuarios interesados pueden filtrar los resultados según sus preferencias, como el tipo de inmueble, el rango de precio o la ubicación. Además, la página permite una interacción directa entre compradores y vendedores a través de un sistema de mensajes o contacto directo. Su objetivo es proporcionar una experiencia sencilla y eficiente para todas las personas que buscan adquirir, vender o alquilar propiedades, garantizando transparencia y accesibilidad.</h2>
        </div>
    </section>
    <br>
    <br>
    <br>
    <br>
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


