<header>
   <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
        <div class="container d-flex justify-content-between">
            <div class="navbar-brand">
                CRUD Project
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <div>
                <a href="{{route('livres.index')}}" class="btn text-white active me-2">Acceuil</a>
                   <!-- Vérifier si on est sur les pages create ou edit -->
                   @if (!in_array(Route::currentRouteName(), ['livres.create', 'livres.edit']))
                        <a class="btn btn-primary active" href="{{ route('livres.create') }}">Ajouter un livre</a>
                @endif
            </div>
        </div>
    </nav>
</header>