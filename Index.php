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
                <button onclick="location.href=''">Carrito</button>
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
            <h2>La página web es una plataforma digital dedicada a la publicación, compra, venta y alquiler de inmuebles. Está diseñada para facilitar la búsqueda de propiedades para los usuarios, ofreciendo un catálogo diverso que incluye casas, departamentos, terrenos y más. Los propietarios y agentes inmobiliarios pueden crear anuncios con detalles completos sobre las propiedades, incluyendo fotografías, descripción, ubicación, precio y características específicas como el número de habitaciones o el tipo de pago. Los usuarios interesados pueden filtrar los resultados según sus preferencias, como el tipo de inmueble, el rango de precio o la ubicación. Garantizando transparencia y accesibilidad.</h2>
        </div>
    </section>
    <div class="viviendastitulo">
    <h1>¿Que tipos de viviendas puedo encontrar?</h1>
    </div>
    <section class="welcome-section">
    <div class="tarjetas-container">
                <div class="Tarjetita casa-tarjeta">
                    <div class="text-content">
                        <h2>Casas</h2>
                        <p class="text">
                            Una casa es una estructura independiente que generalmente se construye en su propio terreno. Puede ser una casa unifamiliar o adosada, y los propietarios tienen control total sobre la propiedad y el terreno circundante.
                        </p>
                    </div>
                    <div class="images-container">
                        <img src="estilo/casapubli.jpg" alt="Sala de estar" class="welcome-img">
                    </div>
                </div>
    
                <div class="Tarjetita departamento-tarjeta">
                    <div class="text-content">
                        <h2>Departamentos</h2>
                        <p class="text">
                            Un departamento, también conocido como piso o apartamento, es una unidad residencial dentro de un edificio que puede contener múltiples unidades habitacionales. Los propietarios de departamentos poseen la unidad específica en la que viven, pero comparten la propiedad del edificio y las áreas comunes con otros residentes.
                        </p>
                    </div>
                    <div class="images-container">
                        <img src="estilo/departamento.jpg" alt="Comedor" class="welcome-img">
                    </div>
                </div>
            </div>
        </section>
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
                <div class="footer-cor">
                    <h4>Cualquier duda o consulta, contactanos por nuestras redes</h4>
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


