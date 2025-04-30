// public/js/alertes.js

function showSuccessAlert(message) {
    Swal.fire({
        icon: 'success',
        title: 'Succès',
        text: message,
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK'
    });
}

// Exécute l'alerte si un message est présent
document.addEventListener('DOMContentLoaded', function () {
    const successMessage = document.querySelector('meta[name="success-message"]');
    if (successMessage && successMessage.content) {
        showSuccessAlert(successMessage.content);
    }
});
