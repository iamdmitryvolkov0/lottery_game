<?php

namespace App\Actions\LotteryGameActions;

use App\Models\LotteryGame;
use Illuminate\Database\Eloquent\Collection;

class GetAllLotteryGamesAction
{
    public function execute(): Collection
    {
        return LotteryGame::all();
    }
}
