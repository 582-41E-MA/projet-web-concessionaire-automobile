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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->date('date_commande');
            $table->unsignedBigInteger('commande_user_id');
            $table->foreign('commande_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('mode_paiement_id');
            $table->foreign('mode_paiement_id')->references('id')->on('mode_paiements')->onDelete('cascade');
            $table->unsignedBigInteger('expedition_id');
            $table->foreign('expedition_id')->references('id')->on('expeditions')->onDelete('cascade');
            $table->unsignedBigInteger('statut_id');
            $table->foreign('statut_id')->references('id')->on('statut_commandes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
