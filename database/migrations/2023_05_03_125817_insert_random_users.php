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
        DB::table('users')->insert([
            [
                'email' => 'support@defacto.ovh',
                'password' => '$2y$10$WvFC5wxabNl2D2Ngwkls3OJpiU97SkLawn28aFzGwaVK96OqnDzr2',
                'name' => 'Admin defacto',
                'first_name' => 'Admin',
                'last_name' => 'defacto',
                'civil_status' => 'Mme',
                'total_connect' => 2,
                'total_card_toshow' => 2,
                'formation_id' => 1,
                'matiere_id' => 1,
            ],
            [
                'email' => 'tom@studiodefacto.com',
                'password' => '$2y$10$WvFC5wxabNl2D2Ngwkls3OJpiU97SkLawn28aFzGwaVK96OqnDzr2',
                'name' => 'Tom',
                'first_name' => 'Tom',
                'last_name' => 'DEFACTO',
                'civil_status' => 'M',
                'total_connect' => 2,
                'total_card_toshow' => 2,
                'formation_id' => 1,
                'matiere_id' => 1,
            ],
            [
                'email' => 'johnDoe@studiodefacto.com',
                'password' => '$2y$10$WvFC5wxabNl2D2Ngwkls3OJpiU97SkLawn28aFzGwaVK96OqnDzr2',
                'name' => 'John Doe',
                'first_name' => 'John',
                'last_name' => 'Doe',
                'civil_status' => 'M',
                'total_connect' => 2,
                'total_card_toshow' => 2,
                'formation_id' => 1,
                'matiere_id' => 1,
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('users')->delete();
    }
};
