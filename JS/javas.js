function mostrar2() {
    document.getElementById('form2').classList.toggle('oculto');
    document.getElementById('form1').classList.toggle('oculto');
}

function procesarCorreo() {
    const usuario = document.getElementById('usuario').value.trim();
    let dominio;

    // Lógica para determinar el dominio
    if (usuario.endsWith("gmail")) {
        dominio = "@gmail.com";
    } else if (usuario.endsWith("hotmail")) {
        dominio = "@hotmail.com";
    } else {
        alert("Por favor, ingresa un usuario válido que termine en 'gmail' o 'hotmail'.");
        return;
    }

    // Construir el correo completo
    const correoCompleto = usuario + dominio;
    document.getElementById('correoCompleto').innerText = correoCompleto;

    // Mostrar el segundo formulario
    mostrar2();
}
