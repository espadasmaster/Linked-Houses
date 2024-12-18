document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("form");
    
    const usuario = document.getElementById("usuario");
    const nombre = document.getElementById("nombre");
    const apellido = document.getElementById("apellido");
    const dni = document.getElementById("dni");
    const email = document.getElementById("email");
    const contraseña = document.getElementById("contraseña");

    const errores = {
        usuario: document.getElementById("usuario-error"),
        nombre: document.getElementById("nombre-error"),
        apellido: document.getElementById("apellido-error"),
        dni: document.getElementById("dni-error"),
        email: document.getElementById("email-error"),
        contraseña: document.getElementById("contraseña-error"),
    };
    //trim elimina espacios en blancou
    // Funciones de validaciónnnnn
    function validarUsuario() {
        if (usuario.value.trim() === "") {
            errores.usuario.textContent = "El campo Usuario no puede estar vacío.";
        } else {
            errores.usuario.textContent = "";
        }
    }

    function validarNombre() {
        if (!/^[a-zA-Z\s]+$/.test(nombre.value)) {
            errores.nombre.textContent = "El Nombre solo puede contener letras y espacios.";
        } else {
            errores.nombre.textContent = "";
        }
    }

    function validarApellido() {
        if (!/^[a-zA-Z\s]+$/.test(apellido.value)) {
            errores.apellido.textContent = "El Apellido solo puede contener letras y espacios.";
        } else {
            errores.apellido.textContent = "";
        }
    }

    function validarDNI() {
        if (!/^\d{8}$/.test(dni.value)) {
            errores.dni.textContent = "El DNI debe ser un número de 8 dígitos.";
        } else {
            errores.dni.textContent = "";
        }
    }

    function validarEmail() {
        if (!/^[\w.-]+@(gmail|yahoo|hotmail)\.com$/.test(email.value)) {
            errores.email.textContent = "El correo debe ser de los dominios permitidos: gmail, yahoo o hotmail.";
        } else {
            errores.email.textContent = ""; 
        }
    }

    function validarContraseña() {
        if (contraseña.value.length < 8) {
            errores.contraseña.textContent = "La contraseña debe tener al menos 8 caracteres.";
        } else {
            errores.contraseña.textContent = "";
        }
    }

    // Asignar eventos de validación
    usuario.addEventListener("blur", validarUsuario);
    nombre.addEventListener("blur", validarNombre);
    apellido.addEventListener("blur", validarApellido);
    dni.addEventListener("blur", validarDNI);
    email.addEventListener("blur", validarEmail);
    contraseña.addEventListener("blur", validarContraseña);

    // validamos todos los campos al enviar el formulario
    form.addEventListener("submit", (e) => {
        validarUsuario();
        validarNombre();
        validarApellido();
        validarDNI();
        validarEmail();
        validarContraseña();

        // si hay errorres no se envia
        if (
            errores.usuario.textContent ||
            errores.nombre.textContent ||
            errores.apellido.textContent ||
            errores.dni.textContent ||
            errores.email.textContent ||
            errores.contraseña.textContent
        ) {
            e.preventDefault();
        }
    });
});

