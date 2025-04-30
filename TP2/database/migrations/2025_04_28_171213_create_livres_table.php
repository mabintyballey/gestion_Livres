<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('livres', function (Blueprint $table) {
            $table->id();
            $table->string('prenom_auteur');
            $table->string('nom_auteur');
            $table->string('email')->unique();
            $table->string('telephone');
            $table->string('titre');
            $table->string('categorie');
            $table->text('description');
            $table->date('date_creation');
            $table->string('photo'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livres');
    }
};
