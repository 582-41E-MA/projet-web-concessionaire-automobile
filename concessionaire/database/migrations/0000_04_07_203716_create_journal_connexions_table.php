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
        Schema::create('journal_connexions', function (Blueprint $table) {
            $table->id();
            $table->date('jc_date');
            $table->string('jc_adresse_ip');
            $table->unsignedBigInteger('jc_user_id')->nullable();
            $table->foreign('jc_user_id')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('journal_connexions');
    }
};
