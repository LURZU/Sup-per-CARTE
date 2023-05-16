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
        DB::table('matiere_user')->insert([
            [
                'user_id' => 3,
                'matiere_id' => 1,
            ],
            [
                'user_id' => 3,
                'matiere_id' => 2,
            ],

        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('matiere_user')->delete();
    }
};
