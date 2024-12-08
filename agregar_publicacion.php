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
                    <option value="casa">Casa</option>
                    <option value="departamento">Departamento</option>
                    <option value="terreno">Terreno</option>
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
                    <option value="efectivo">Efectivo</option>
                    <option value="transferencia">Transferencia</option>
                    <option value="tarjeta_credito">Tarjeta de Credito</option>
                    <option value="tarjeta_debito">Tarjeta de Debito</option>           
                </select>
        
                <label for="condiciones">Condiciones *</label>
                <textarea id="condiciones" name="condiciones" required></textarea>
        
                <label for="imagen">Imagen de la propiedad *</label>
                <input type="file" id="imagen" name="imagen" accept="image/*" required>
        
                <button type="submit" name="submit">Enviar Publicación</button>
            </form>
        </div>
    </main>
</body>
</html>
