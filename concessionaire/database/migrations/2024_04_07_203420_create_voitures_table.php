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
        Schema::create('voitures', function (Blueprint $table) {
            $table->id();
            $table->year('annee');
            $table->text('description_en');
            $table->text('description_fr');
            $table->date('date_arrivee')->default('');
            $table->double('prix_base', 8, 2);
            $table->double('taux_augmenter', 3, 2);
            $table->double('prix_paye', 8, 2);
            $table->unsignedBigInteger('modele_id');
            $table->foreign('modele_id')->references('id')->on('modeles')->onDelete('cascade');
            $table->unsignedBigInteger('carrosserie_id');
            $table->foreign('carrosserie_id')->references('id')->on('carrosseries')->onDelete('cascade');
            $table->unsignedBigInteger('employe_id');
            $table->foreign('employe_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('pays_id');
            $table->foreign('pays_id')->references('id')->on('pays')->onDelete('cascade');
            $table->unsignedBigInteger('commande_id');
            $table->foreign('commande_id')->references('id')->on('commandes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voitures');
    }
};
