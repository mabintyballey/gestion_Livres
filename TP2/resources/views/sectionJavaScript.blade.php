       <!-- Script Bootstrap -->
    <script src="{{ asset('assets/bootstrap.bundle.min.js') }}"></script>
    <!-- lien script sweetalert et le fichier qui contient la fonction de message success -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/alertes.js') }}"></script>
<script>
    // scripte pour la confirmation pour la suppression
     function confirmerSuppression(id) {
        Swal.fire({
            title: 'Êtes-vous sûr ?',
            text: "Cette action est irréversible !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Oui, supprimer',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('form-supprimer-' + id).submit();
            }
        });
    }
</script>
