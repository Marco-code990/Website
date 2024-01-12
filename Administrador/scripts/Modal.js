function cambiarEstado(id) {
    // Obtener el modal y el contenido del modal
    var modal = document.getElementById("myModal");
    var modalContent = document.getElementById("modalContent");

    // Crear un elemento select y agregar las opciones disponibles
    var select = document.createElement("select");
    select.innerHTML = '<option value="disponible">Disponible</option><option value="no disponible">No Disponible</option>';

    // Mostrar el modal
    modal.style.display = "block";

    // Función para manejar el cambio de estado
    function confirmarCambio() {
        var nuevoEstado = select.value;

        // Realizar una solicitud AJAX para actualizar el estado en el servidor
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Actualizar la información en la página
                var labElement = document.getElementById("lab-" + id);
                labElement.querySelector(".estado").innerText = nuevoEstado;

                // Cerrar el modal después de actualizar
                cerrarModal();
            }
        };
        xhttp.open("GET", "lab_manager.php?action=actualizar_estado&id=" + id + "&estado=" + nuevoEstado, true);
        xhttp.send();
    }

    // Agregar el select al contenido del modal
    modalContent.innerHTML = "Seleccione el nuevo estado:";
    modalContent.appendChild(select);

    // Agregar un botón de confirmación al contenido del modal
    var confirmButton = document.createElement("button");
    confirmButton.className = "Edit-button";
    confirmButton.innerHTML = "Confirmar";
    confirmButton.onclick = confirmarCambio;
    modalContent.appendChild(confirmButton);

    // Función para cerrar el modal
    function cerrarModal() {
        modal.style.display = "none";
    }

    // Asignar el evento de cierre al botón "Cerrar" y al fondo del modal
    var closeButton = document.createElement("span");
    closeButton.innerHTML = "&times;";
    closeButton.className = "close";
    closeButton.onclick = cerrarModal;
    modalContent.appendChild(closeButton);
    modal.onclick = function(event) {
        if (event.target === modal) {
            cerrarModal();
        }
    };
}