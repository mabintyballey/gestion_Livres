<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LivreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $livres = Livre::paginate(9);
        return view('livres.index', compact('livres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('livres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'prenom_auteur' => 'required|string|max:255',
            'nom_auteur' => 'required|string|max:255',
            'email' => 'required|email|unique:livres,email',
            'telephone' => 'required|string|max:20',
            'titre' => 'required|string|max:255',
            'categorie' => 'required',
            'description' => 'required|string|max:255',
            'date_creation' => 'required|date',
            'photo' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        // Upload de la photo
        $path = $request->file('photo')->store('livres', 'public');

        Livre::create([
            'prenom_auteur' => $request->prenom_auteur,
            'nom_auteur' => $request->nom_auteur,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'titre' => $request->titre,
            'categorie' => $request->categorie,
            'description' => $request->description,
            'date_creation' => $request->date_creation,
            'photo' => $path,
        ]);

        return redirect()->route('livres.index')->with('success', 'Livre ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Livre $livre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Livre $livre)
    {
        return view('livres.edit', compact('livre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Livre $livre)
    {
        $request->validate([
            'prenom_auteur' => 'required|string|max:255',
            'nom_auteur' => 'required|string|max:255',
            'email' => 'required|email|unique:livres,email,' . $livre->id,
            'telephone' => 'required|string|max:20',
            'titre' => 'required|string|max:255',
            'categorie' => 'required',
            'description' => 'required',
            'date_creation' => 'required|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            Storage::disk('public')->delete($livre->photo);
            $data['photo'] = $request->file('photo')->store('livres', 'public');
        }

        $livre->update($data);

        return redirect()->route('livres.index')->with('success', 'Livre modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Livre $livre)
    {
        Storage::disk('public')->delete($livre->photo);
        $livre->delete();

        return redirect()->route('livres.index')->with('success', 'Livre supprimé avec succès.');
    }
//     public function destroy($id)
// {
//     // 1. Trouver le livre
//     $livre = Livre::findOrFail($id);

//     // 2. Supprimer l'image du serveur si nécessaire
//     if($livre->photo && file_exists(public_path('storage/' . $livre->photo))) {
//         unlink(public_path('storage/' . $livre->photo));
//     }

//     // 3. Supprimer le livre de la base de données
//     $livre->delete();

//     // 4. Rediriger avec un message de succès
//     return redirect()->route('livres.index')->with('success', 'Livre supprimé avec succès.');
// }

    
}
