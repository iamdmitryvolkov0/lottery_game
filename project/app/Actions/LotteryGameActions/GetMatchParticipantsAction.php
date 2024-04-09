<?php

namespace App\Actions\LotteryGameActions;

use App\Models\LotteryGameMatchUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class GetMatchParticipantsAction
{
    public function execute(int $id): Collection|array
    {
        $match = LotteryGameMatchUser::query()
            ->where('lottery_game_match_id', $id)
            ->get();

        $userIds = $match->pluck('user_id')
            ->all();

        return User::query()
            ->whereIn('id', $userIds)
            ->get();
    }
}
