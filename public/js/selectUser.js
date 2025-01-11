// public/js/selectUser.js

document.getElementById('userForm').addEventListener('submit', function(event) {
    var userId = document.getElementById('user_id').value;

    if (userId) {
        this.action = "/bets/" + userId;
    } else {
        event.preventDefault();
        alert("Por favor, selecciona un usuario.");
    }
});
