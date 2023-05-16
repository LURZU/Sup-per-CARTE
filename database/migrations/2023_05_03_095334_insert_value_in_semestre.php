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
        DB::table('card_semestre')->insert([
            [
                'label' => 'Semestre 1',
            ],
            [
                'label' => 'Semestre 2',
            ],

        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('card_semestre')->delete();
    }
};
