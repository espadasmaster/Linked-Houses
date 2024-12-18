// Función para mostrar los detalles
function showDetails(details) {
    const modalBody = document.getElementById('modal-body');
    const modal = document.getElementById('details-modal');

    // Generar contenido del modal
    modalBody.innerHTML = `
        <h2>${details.Tipo} en ${details.Localidad}</h2>
        <br>
        <img src="${details.Imagen}" alt="Imagen" style="max-width: 100%; height: auto;">
        <p><strong>Ambientes:</strong> ${details['Cant-ambientes']}</p>
        <p><strong>Fecha:</strong> ${details.Fecha}</p>
        <p><strong>Método de Pago:</strong> ${details['Met-pago']}</p>
        <p><strong>Condiciones:</strong> ${details.Condiciones}</p>
        <div class="botones-container">
            <button id="contact-owner-button" class="contactar-boton">Contactar al Dueño</button>
            <button id="close-modal-button" class="cerrar-boton">Cerrar</button>
        </div>
    `;

    // Mostrar el modal
    modal.style.display = 'flex';

    // Botón para cerrar el modal
    const closeButton = modalBody.querySelector('#close-modal-button');
    closeButton.addEventListener('click', closeDetails);

    // Botón para contactar al dueño
    const contactButton = modalBody.querySelector('#contact-owner-button');
    contactButton.addEventListener('click', () => {
        contactarDueno(details.MailUsuario, details.idPublicacion); // Pasar mail y ID de publicación
    });
}

// Función para cerrar el modal
function closeDetails() {
    const modal = document.getElementById('details-modal');
    modal.style.display = 'none';
}

// Función para contactar al dueño
function contactarDueno(mail, publicacionId) {
    // Registrar la interacción en la base de datos
    fetch('registrar_contacto.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ email: mail, publicacionId: publicacionId })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const subject = encodeURIComponent("Interés en tu publicación");
            const body = encodeURIComponent("Hola, estoy interesado en tu propiedad publicada. ¿Podrías darme más detalles?");
            window.location.href = `mailto:${mail}?subject=${subject}&body=${body}`;
        } else {
            alert("Necesita estar logueado para registrar el contacto.");
        }
    })
    .catch(error => {
        console.error("Error al registrar el contacto:", error);
        alert("Hubo un error inesperado.");
    });
}


