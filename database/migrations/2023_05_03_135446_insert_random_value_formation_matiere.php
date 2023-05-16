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
        DB::table('formation_matiere')->insert([
            [
                'matiere_id' => 1,
                'formation_id' => 1,
            ],
            [
                'matiere_id' => 1,
                'formation_id' => 2,
            ],
            [
                'matiere_id' => 2,
                'formation_id' => 2,
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('formation_matiere')->delete();
    }
};
