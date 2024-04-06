<?php

namespace Database\Seeders;

use App\Models\LotteryGame;
use Illuminate\Database\Seeder;

class LotteryGameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LotteryGame::factory()->count(5)->create();
    }
}
