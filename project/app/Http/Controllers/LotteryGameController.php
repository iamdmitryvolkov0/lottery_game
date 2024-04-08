<?php

namespace App\Http\Controllers;

use App\Actions\LotteryGameActions\CreateLotteryGameAction;
use App\Actions\LotteryGameActions\CreateLotteryGameMatchUsersAction;
use App\Actions\LotteryGameActions\FinishLotteryGameAction;
use App\Actions\LotteryGameActions\GetAllLotteryGamesAction;
use App\Actions\LotteryGameActions\GetLotteryGameMatchByGameIdAction;
use App\Models\LotteryGame;
use App\Models\LotteryGameMatchUser;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class LotteryGameController extends Controller
{
    public function getAllGames(GetAllLotteryGamesAction $action): Collection
    {
        return $action->execute();
    }

    public function createMatch(CreateLotteryGameAction $action, Request $request): LotteryGame
    {
        return $action->execute($request->query());
    }

    public function finishMatch(int $id, FinishLotteryGameAction $action, Request $request): string|LotteryGame
    {
        return $action->execute($id, $request->query());
    }

    public function createMatchUser(CreateLotteryGameMatchUsersAction $action, Request $request): LotteryGameMatchUser
    {
        return $action->execute($request->query());
    }

    public function getMatchesByGameId(int $game_id, GetLotteryGameMatchByGameIdAction $action): Collection|array
    {
        return $action->execute($game_id);
    }
}
