<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    $_SESSION['mensaje_error'] = "Necesitas estar logueado para ingresar.";
    header("Location: Index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="logo.png">
    <link rel="stylesheet" href="estilo/ventas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>Agregar Publicación</title>
</head>
<body>
    <header>
        <div class="navbar">
            <a href="Index.php"><img src="logo_boceto.PNG" alt="Logo"></a>
        </div>
    </header>

    <main>
        <div class="form-container" id="modal-form">
            <h2>Registrar Nueva Propiedad</h2>
            <form id="property-form" action="subir.php" method="POST" enctype="multipart/form-data">
                <label for="localidad">Localidad/Provincia *</label>
                <input type="text" id="localidad" name="localidad" required>
        
                <label for="tipo">Tipo de propiedad *</label>
                <select id="propi" name="propi" required>
                    <option value="">Seleccione...</option>
                    <option value="Casa">Casa</option>
                    <option value="Departamento">Departamento</option>
                    <option value="Terreno">Terreno</option>
                </select>
                
                <label for="dni_dueño">DNI del dueño *</label>
                <input type="number" id="dni_dueño" name="dni_dueño" required>
        
                <label for="cant_ambientes">Cantidad de ambientes *</label>
                <input type="number" id="cant_ambientes" name="cant_ambientes" required>
        
                <label for="fecha">Fecha *</label>
                <input type="date" id="fecha" name="fecha" required>
                
                <label for="met_pago">Método de pago *</label>
                <select id="tipopago" name="tipopago" required>
                    <option value="">Seleccione...</option>
                    <option value="Efectivo">Efectivo</option>
                    <option value="Transferencia">Transferencia</option>
                    <option value="Tarjeta_credito">Tarjeta de Credito</option>
                    <option value="Tarjeta_debito">Tarjeta de Debito</option>           
                </select>
        
                <label for="condiciones">Condiciones *</label>
                <textarea id="condiciones" name="condiciones" required></textarea>
        
                <label for="imagen">Imagen de la propiedad *</label>
                <input type="file" id="imagen" name="imagen" accept="image/*" required>
        
                <button type="submit" name="submit">Enviar Publicación</button>
            </form>
        </div>
    </main>

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
