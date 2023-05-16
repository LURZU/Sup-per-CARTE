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
        Schema::create('user_status_card', function (Blueprint $table) {
            $table->foreignId('user_id')->reference('id')->on('users');
            $table->foreignId('status_card_id')->reference('id')->on('status_card');
            $table->foreignId('card_id')->reference('id')->on('card');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_status_card');
    }
};
