<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    use HasFactory;
    protected $fillable = [
        'prenom_auteur',
        'nom_auteur',
        'email',
        'telephone',
        'titre',
        'categorie',
        'description',
        'date_creation',
        'photo'
    ];
}
