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
        Schema::create('card', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('matiere_id')->reference('id')->on('matiere');
            $table->string('question', 1000);
            $table->string('response', 1000);
            $table->boolean('public');
            $table->integer('card_chapitre_id');
            $table->foreignId('card_level_id')->references('id')->on('card_level');
            $table->foreignId('card_semestre_id')->references('id')->on('card_semestre');
            $table->string('created_by');
            $table->string('validated_by')->nullable();
            $table->foreignId('user_id')->reference('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card');
    }
};
