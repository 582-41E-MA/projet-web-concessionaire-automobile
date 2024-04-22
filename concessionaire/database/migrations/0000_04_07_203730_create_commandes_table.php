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
            $table->unsignedBigInteger('commande_user_id')->nullable();
            $table->foreign('commande_user_id')->references('id')->on('users')->onDelete('set null');
            $table->unsignedBigInteger('mode_paiement_id')->nullable();
            $table->foreign('mode_paiement_id')->references('id')->on('mode_paiements')->onDelete('set null');
            $table->unsignedBigInteger('expedition_id')->nullable();
            $table->foreign('expedition_id')->references('id')->on('expeditions')->onDelete('set null');
            $table->unsignedBigInteger('statut_id')->nullable();
            $table->foreign('statut_id')->references('id')->on('statut_commandes')->onDelete('set null');
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
