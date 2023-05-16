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
        Schema::create('chapitre_matiere', function (Blueprint $table) {
            $table->foreignId('matiere_id')->reference('id')->on('matiere');
        $table->foreignId('chapitre_id')->reference('id')->on('chapitre');
        });

        DB::table('chapitre_matiere')->insert([ 
            [
                'matiere_id' => 1,
                'chapitre_id' => 1,
            ],
            [
                'matiere_id' => 1,
                'chapitre_id' => 2,
            ],
            [
                'matiere_id' => 1,
                'chapitre_id' => 3,
            ],
            [
                'matiere_id' => 2,
                'chapitre_id' => 4,
            ],
            [
                'matiere_id' => 2,
                'chapitre_id' => 5,
            ],
            [
                'matiere_id' => 6,
                'chapitre_id' => 5,
            ],

        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('chapitre_matiere')->delete();
        Schema::dropIfExists('chapitre_matiere');
    }
};