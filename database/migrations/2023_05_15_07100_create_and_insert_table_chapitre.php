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
        Schema::create('chapitre', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->integer('numero_chapitre');
        });

        DB::table('chapitre')->insert([
            [
                'id' => 1,
                'label' => 'Thermochimie',
                'numero_chapitre' => 1
            ],
            [
                'id' => 2,
                'label' => 'Acides bases',
                'numero_chapitre' => 2

            ],
            [
                'id' => 3,
                'label' => 'Chimie Générale',
                'numero_chapitre' => 3
            ],
            [
                'id' => 4,
                'label' => 'Chimie Organique',
                'numero_chapitre' => 4
            ],
            [
                'id' => 5,
                'label' => 'Protides',
                'numero_chapitre' => 5
            ],
            [
                'id' => 6,
                'label' => 'Glucides',
                'numero_chapitre' => 6
            ],

        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('chapitre')->delete();
        Schema::dropIfExists('chapitre');
    }
};
