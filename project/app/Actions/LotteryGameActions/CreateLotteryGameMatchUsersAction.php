<?php

namespace App\Actions\LotteryGameActions;

use App\Models\LotteryGameMatchUser;

class CreateLotteryGameMatchUsersAction
{
    public function execute(array $data): LotteryGameMatchUser
    {
        return LotteryGameMatchUser::create([
            'user_id' => $data['user_id'],
            'lottery_game_match_id' => $data['lottery_game_match_id'],
        ]);
    }
}
