<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>
    <link rel="stylesheet" href="estilo/estilo_1.css">
</head>

<?php 
include "cn.php";
      include "registro.php";
      ?>

<body>
    
    <section class="background">
        <div class="contenedor">
            <div class="formulario">
                <form id="regisform"action="registro.php" method="post">
                    <h2>Registrate ahora!</h2>

                    <div class="input-contenedor">
                        <input type="text" placeholder="DNI" required name="DNI">
                    </div>

                    <div class="input-contenedor">
                        <input type="text" placeholder="Nombre" required name="nombre">
                    </div>

                    <div class="input-contenedor">
                        <input type="text" placeholder="Apellido" required name="apellido">
                    </div>

                    <div class="input-contenedor">
                        <input type="text" placeholder="Usuario" required name="usuario">
                    </div>

                    <div class="input-contenedor">
                        <input type="password" placeholder="Contraseña" required name="contraseña">
                    </div>

                    <div class="input-contenedor">
                        <input type="text" placeholder="Email" required name="email">
                    </div>

                    <button type="submit" name="regis" value="registrarse" class="boton" >Registrarse</button>

                </form>
            </div>
        </div>
    </section>
</body>
</html>
