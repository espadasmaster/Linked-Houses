// Función para mostrar los detalles
function showDetails(details) {
    const modalBody = document.getElementById('modal-body');
    const modal = document.getElementById('details-modal');

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
    modal.style.display = 'flex';

    // Agregar funcionalidad al botón de cerrar
    const closeButton = modalBody.querySelector('#close-modal-button');
    closeButton.addEventListener('click', closeDetails);

    // Agregar funcionalidad al botón de contactar
    const contactButton = modalBody.querySelector('#contact-owner-button');
    contactButton.addEventListener('click', () => {
        contactarDueno(details.Mail);
    });
}


// Función para cerrar el modal
function closeDetails() {
    const modal = document.getElementById('details-modal');
    modal.style.display = 'none';
}

// Función para contactar al dueño
function contactarDueno(mail) {
    const subject = encodeURIComponent("Interés en tu publicación");
    const body = encodeURIComponent("Hola, estoy interesado en tu propiedad publicada. ¿Podrías darme más detalles?");
    window.location.href = `mailto:${mail}?subject=${subject}&body=${body}`;
}
