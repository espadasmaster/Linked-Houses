// Función para mostrar los detalles
function showDetails(details) {
    const modalBody = document.getElementById('modal-body');
    const modal = document.getElementById('details-modal');

    modalBody.innerHTML = `
        <h2>${details.Tipo} en ${details.Localidad}</h2>
        <img src="${details.Imagen}" alt="Imagen" style="max-width: 100%; height: auto;">
        <p><strong>Ambientes:</strong> ${details['Cant-ambientes']}</p>
        <p><strong>Fecha:</strong> ${details.Fecha}</p>
        <p><strong>Método de Pago:</strong> ${details['Met-pago']}</p>
        <p><strong>Condiciones:</strong> ${details.Condiciones}</p>
        <button id="close-modal-button" style="margin-top: 10px; padding: 5px 10px; background-color: red; color: white; border: none; border-radius: 5px; cursor: pointer;">Cerrar</button>
    `;
    modal.style.display = 'flex';

    const closeButton = modalBody.querySelector('#close-modal-button');
    closeButton.addEventListener('click', closeDetails);

    modal.style.display = 'block';
}

// Función para cerrar el modal
function closeDetails() {
    const modal = document.getElementById('details-modal');
    modal.style.display = 'none';
}
