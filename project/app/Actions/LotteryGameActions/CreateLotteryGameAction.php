<?php

namespace App\Actions\LotteryGameActions;

use App\Models\LotteryGame;

class CreateLotteryGameAction
{
    public function execute(array $data)
    {
        return LotteryGame::create([
            'name' => $data['name'],
            'gamer_count' => $data['gamer_count'],
            'reward_points' => $data['reward_points'],
        ]);
    }
}
