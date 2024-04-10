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
        Schema::create('user_reserves', function (Blueprint $table) {
            $table->id();
            $table->date('date_reserver');
            $table->unsignedBigInteger('ur_user_id');
            $table->foreign('ur_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('ur_voiture_id');
            $table->foreign('ur_voiture_id')->references('id')->on('voitures')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_reserves');
    }
};
