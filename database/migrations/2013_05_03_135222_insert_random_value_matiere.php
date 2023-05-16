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
        DB::table('matiere')->insert([
            [
                'label' => 'Biologie',
                'number_chapitre' => 6,
            ],
            [
                'label' => 'Biochimie',
                'number_chapitre' => 4,
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('matiere')->delete();
    }
};
