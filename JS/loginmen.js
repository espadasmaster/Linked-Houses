document.getElementById('login-btn').addEventListener('click', function () {
    const usuario = document.getElementById('usuario').value;
    const contraseña = document.getElementById('contraseña').value;
    const errorMessage = document.getElementById('error-message');

    // Enviar datos al servidor con fetch
    fetch('login.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ usuario, Contraseña: contraseña })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = 'venta.php'; // Redirigir al usuario
        } else {
            errorMessage.textContent = data.error; // Mostrar mensaje de error
            errorMessage.style.display = 'block';
        }
    })
    .catch(error => {
        errorMessage.textContent = "Hubo un error inesperado. Por favor, intenta de nuevo.";
        errorMessage.style.display = 'block';
        console.error('Error:', error);
    });
});