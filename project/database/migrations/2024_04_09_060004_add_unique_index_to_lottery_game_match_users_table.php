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
        Schema::table('lottery_game_match_users', function (Blueprint $table) {
            $table->unique(['lottery_game_match_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lottery_game_match_users', function (Blueprint $table) {
            $table->dropUnique(['lottery_game_match_id', 'user_id']);
        });
    }
};
