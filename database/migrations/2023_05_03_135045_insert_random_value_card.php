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
        DB::table('card')->insert([
            [
                'matiere_id' => 1,
                'question' => 'Quelle est la capitale de la France ?',
                'response' => 'Paris',
                'public' => true,
                'card_chapitre_id' => 1,
                'card_level_id' => 1,
                'card_semestre_id' => 1,
                'created_by' => 'John Doe',
                'validated_by' => 'John Doe',
                'user_id' => 3
            ],
            [
                'matiere_id' => 2,
                'question' => 'Quelles sont les outils test Lorem ipseum ?',
                'response' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Nulla euismod, nisl vitae aliquam ultricies, nunc nisl ultricies nunc, vitae aliquam nisl nisl vitae nisl. Donec euismod, nisl vitae aliquam ultricies, nunc nisl ultricies nunc, vitae aliquam nisl nisl vitae nisl.',
                'public' => true,
                'card_chapitre_id' => 2,
                'card_level_id' => 2,
                'card_semestre_id' => 1,
                'create_by' => 'Student',
                'validated_by' => 'John Doe',
                'user_id' => 2
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('card')->delete();
    }
};
