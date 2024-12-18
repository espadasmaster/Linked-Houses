document.addEventListener("DOMContentLoaded", () => {
    const deleteButtons = document.querySelectorAll(".delete-btn");

    deleteButtons.forEach(button => {
        button.addEventListener("click", () => {
            const publicacionId = button.getAttribute("data-id");

            // Confirmar eliminación
            if (!confirm("¿Estás seguro de eliminar este contacto?")) {
                return;
            }

            // Realizar la solicitud de eliminación
            fetch("eliminar_contacto.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ publicacionId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("Contacto eliminado con éxito.");
                    location.reload(); // Recargar la página para reflejar cambios
                } else {
                    alert("Error al eliminar el contacto: " + data.error);
                }
            })
            .catch(error => {
                console.error("Error:", error);
                alert("Ocurrió un error inesperado.");
            });
        });
    });
});
