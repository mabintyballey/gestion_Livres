@extends('base')

@section('titre', "Ajout d'un livre")

@section('contenu')
<div class="bg-body-tertiary p-5 rounded">
    <div class="container d-flex justify-content-center align-items-end">
        <h1 class="d-inline-block">L4 UBO | </h1> 
        <h6 class="d-inline-block text-decoration-underline">Ajouter un livre 📖📕📚</h6>
    </div>

    <form action="{{ route('livres.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
        @csrf

        <!-- Prénom de l'auteur -->
        <div class="mb-3">
            <label for="prenom_auteur" class="form-label">Prénom</label>
            <input type="text" name="prenom_auteur" id="prenom_auteur" class="form-control @error('prenom_auteur') is-invalid @enderror" value="{{ old('prenom_auteur') }}" required>
            @error('prenom_auteur')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Nom de l'auteur -->
        <div class="mb-3">
            <label for="nom_auteur" class="form-label">Nom</label>
            <input type="text" name="nom_auteur" id="nom_auteur" class="form-control @error('nom_auteur') is-invalid @enderror" value="{{ old('nom_auteur') }}" required>
            @error('nom_auteur')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Téléphone -->
        <div class="mb-3">
            <label for="telephone" class="form-label">Numéro de téléphone</label>
            <input type="tel" name="telephone" id="telephone" class="form-control @error('telephone') is-invalid @enderror" value="{{ old('telephone') }}" required>
            @error('telephone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Titre -->
        <div class="mb-3">
            <label for="titre" class="form-label">Titre du livre 📕</label>
            <input type="text" name="titre" id="titre" class="form-control @error('titre') is-invalid @enderror" value="{{ old('titre') }}" required>
            @error('titre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Catégorie -->
        <div class="mb-3">
            <label for="categorie" class="form-label">Catégorie</label>
            <select name="categorie" id="categorie" class="form-select @error('categorie') is-invalid @enderror" required>
                <option value="">Choisir une catégorie</option>
                <option value="Roman" {{ old('categorie') == 'Roman' ? 'selected' : '' }}>Roman</option>
                <option value="Science" {{ old('categorie') == 'Science' ? 'selected' : '' }}>Science</option>
                <option value="Histoire" {{ old('categorie') == 'Histoire' ? 'selected' : '' }}>Histoire</option>
                <option value="Programmation" {{ old('categorie') == 'Programmation' ? 'selected' : '' }}>Programmation</option>
                <option value="Geographie" {{ old('categorie') == 'Geographie' ? 'selected' : '' }}>Geographie</option>
            </select>
            @error('categorie')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Description du livre</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="4" required>{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Date de création -->
        <div class="mb-3">
            <label for="date_creation" class="form-label">Date de parution</label>
            <input type="date" name="date_creation" id="date_creation" class="form-control @error('date_creation') is-invalid @enderror" value="{{ old('date_creation') }}" required>
            @error('date_creation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Photo -->
        <div class="mb-3">
            <label for="photo" class="form-label">Photo du livre</label>
            <input type="file" name="photo" id="photo" class="form-control @error('photo') is-invalid @enderror" accept="image/jpeg,image/png,image/jpg" required>
            @error('photo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Boutons -->
        <div class="mt-5 d-flex justify-content-start">
            <button type="submit" class="btn btn-primary me-3">Enregistrer</button>
            <a href="{{ route('livres.index') }}" class="btn btn-danger">Annuler</a>
        </div>
    </form>
</div>
@endsection
