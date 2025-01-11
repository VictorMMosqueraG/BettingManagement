document.getElementById('userForm').addEventListener('submit', function(event) {
    var userId = document.getElementById('user_id').value;

    if (userId) {
        // Cambiar la acción del formulario para enviar el id del usuario seleccionado
        this.action = this.action.replace('id_placeholder', userId);
    } else {
        event.preventDefault();
        alert("Por favor, selecciona un usuario.");
    }
});
