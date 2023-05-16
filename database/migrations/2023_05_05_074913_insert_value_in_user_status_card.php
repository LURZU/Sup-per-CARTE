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
        DB::table('user_status_card')->insert([
            [
                'user_id' => 2,
                'status_card_id' => 1,
                'card_id' => 1,
            ],
            [
                'user_id' => 2,
                'status_card_id' => 3,
                'card_id' => 2,
            ],

        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('user_status_card')->delete();
    }
};
