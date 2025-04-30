@extends('base')

@section('titre', "Modifier un livre")

@section('contenu')
<div class="bg-body-tertiary p-5 rounded">
    <div class="container d-flex justify-content-center align-items-end">
        <h1 class="d-inline-block">L4 UBO | </h1> 
        <h6 class="d-inline-block text-decoration-underline">Modifier le livre 📖</h6>
    </div>

    <form action="{{ route('livres.update', $livre->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
        @csrf
        @method('PUT')

        <!-- Prénom de l'auteur -->
        <div class="mb-3">
            <label for="prenom_auteur" class="form-label">Prénom</label>
            <input type="text" name="prenom_auteur" id="prenom_auteur" class="form-control @error('prenom_auteur') is-invalid @enderror" value="{{ old('prenom_auteur', $livre->prenom_auteur) }}" required>
            @error('prenom_auteur')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Nom de l'auteur -->
        <div class="mb-3">
            <label for="nom_auteur" class="form-label">Nom</label>
            <input type="text" name="nom_auteur" id="nom_auteur" class="form-control @error('nom_auteur') is-invalid @enderror" value="{{ old('nom_auteur', $livre->nom_auteur) }}" required>
            @error('nom_auteur')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $livre->email) }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Téléphone -->
        <div class="mb-3">
            <label for="telephone" class="form-label">Numéro de téléphone</label>
            <input type="tel" name="telephone" id="telephone" class="form-control @error('telephone') is-invalid @enderror" value="{{ old('telephone', $livre->telephone) }}" required>
            @error('telephone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Titre -->
        <div class="mb-3">
            <label for="titre" class="form-label">Titre du livre 📕</label>
            <input type="text" name="titre" id="titre" class="form-control @error('titre') is-invalid @enderror" value="{{ old('titre', $livre->titre) }}" required>
            @error('titre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Catégorie -->
        <div class="mb-3">
            <label for="categorie" class="form-label">Catégorie</label>
            <select name="categorie" id="categorie" class="form-select @error('categorie') is-invalid @enderror" required>
                <option value="">Choisir une catégorie</option>
                <option value="Roman" {{ old('categorie', $livre->categorie) == 'Roman' ? 'selected' : '' }}>Roman</option>
                <option value="Science" {{ old('categorie', $livre->categorie) == 'Science' ? 'selected' : '' }}>Science</option>
                <option value="Programmation" {{ old('categorie', $livre->categorie) == 'Programmation' ? 'selected' : '' }}>Programmation</option>
                <option value="Geographie" {{ old('categorie', $livre->categorie) == 'Geographie' ? 'selected' : '' }}>Geographie</option>
            </select>
            @error('categorie')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Description du livre</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="4" required>{{ old('description', $livre->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Date de création -->
        <div class="mb-3">
            <label for="date_creation" class="form-label">Date de parution</label>
            <input type="date" name="date_creation" id="date_creation" class="form-control @error('date_creation') is-invalid @enderror" value="{{ old('date_creation', $livre->date_creation) }}" required>
            @error('date_creation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Photo -->
        <div class="mb-3">
            <label for="photo" class="form-label">Photo du livre</label>
            <input type="file" name="photo" id="photo" class="form-control @error('photo') is-invalid @enderror" accept="image/jpeg,image/png,image/jpg">
            @error('photo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            @if($livre->photo)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $livre->photo) }}" alt="Photo actuelle" width="120">
                    <p class="text-muted">Photo actuelle</p>
                </div>
            @endif
        </div>

        <!-- Boutons -->
        <div class="mt-5 d-flex justify-content-start">
            <button type="submit" class="btn btn-success me-3">Mettre à jour</button>
            <a href="{{ route('livres.index') }}" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</div>
@endsection
