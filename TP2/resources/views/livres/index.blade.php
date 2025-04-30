@extends('base')

@section('titre', "Liste des livres")

@section('contenu')
<div class="bg-body-tertiary p-5 pb-0 rounded">
            <div class="container d-flex justify-content-center align-items-end">
                <h1 class="d-inline-block">L4 UBO | </h1> 
                <h6 class="d-inline-block text-decoration-underline">Gestion Bibliothèque</h6>
            </div>

            <p class="lead mt-5">
                Bienvenue dans notre système de gestion de bibliothèque. 
                Ici, vous pouvez enregistrer, modifier et suivre tous vos livres facilement. 
                Chaque ouvrage dispose de ses propres informations : auteur, titre, catégorie, description et date de création. 
                Notre objectif est de simplifier l'organisation de vos collections et de rendre vos livres accessibles en un clic.
                Ajoutez dès maintenant vos livres pour mieux gérer votre bibliothèque !
            </p>


      <div class="mt-5 row gap-5">
           @forelse ($livres as $livre)
              <div class="card mx-auto p-0" style="width: 18rem;">
                    <img src="{{ asset('storage/' . $livre->photo) }}" class="card-img-top" style="width: 100%; height: 230px;" alt="...">

                <div class="card-body">
                      <h4 class="card-title"><strong>Auteur:</strong>{{ $livre->prenom_auteur }} {{ $livre->nom_auteur }}</h4>
                      <h6 class="card-title"><strong>Titre:</strong> {{ $livre->titre }} {{ $livre->id }}</6>
                      <h6 class="card-title"><strong>Date creation:</strong>{{ $livre->date_creation }}</h6>
                      <h6 class="card-title"><strong>Categorie:</strong>  <span class="badge text-bg-success">{{ $livre->categorie }}</span></h6>
                      <p class="card-text"><strong>Description: </strong> {{ $livre->description }}</p>
                      <div>
                        <!-- Bouton pour modifier -->
                         <a href="{{ route('livres.edit', $livre->id) }}" class="btn btn-secondary">Modifier</a>
                         <!-- Bouton supprimer -->
                        <a href="#" class="btn btn-danger" onclick="confirmerSuppression('{{ $livre->id }}')">Supprimer</a>
                        
                        <!-- Formulaire caché pour suppression -->
                        <form id="form-supprimer-{{ $livre->id }}" action="{{ route('livres.destroy', $livre->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                       </div>
                 </div>
             </div>
             @empty
              <div class="text-center w-100">
                 <h4>Aucun livre n'est disponible pour le moment.</h4>
             </div>
            @endforelse
           
        </div> 
        <div class="mt-4 d-flex justify-content-start">
        {{ $livres->links('vendor.pagination.custom') }}
       </div>

</div>
@endsection