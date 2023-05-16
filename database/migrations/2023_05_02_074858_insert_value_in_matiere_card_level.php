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
        DB::table('card_level')->insert([
            [
                'label' => 'Avancé',
            ],
            [
                'label' => 'Basique',
            ],

        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('card_level')->delete();
    }
};
