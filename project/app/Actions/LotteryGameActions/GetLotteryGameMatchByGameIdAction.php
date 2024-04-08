<?php

namespace App\Actions\LotteryGameActions;

use App\Models\LotteryGameMatch;
use Illuminate\Database\Eloquent\Collection;

class GetLotteryGameMatchByGameIdAction
{
    public function execute(int $game_id): Collection|array
    {
        return LotteryGameMatch::query()
            ->where('game_id', $game_id)
            ->get();
    }
}
