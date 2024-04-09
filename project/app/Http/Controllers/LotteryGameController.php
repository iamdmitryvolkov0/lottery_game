<?php

namespace App\Http\Controllers;

use App\Actions\LotteryGameActions\CreateLotteryGameMatchAction;
use App\Actions\LotteryGameActions\CreateLotteryGameMatchUsersAction;
use App\Actions\LotteryGameActions\FinishLotteryGameMatchAction;
use App\Actions\LotteryGameActions\GetAllLotteryGamesAction;
use App\Actions\LotteryGameActions\GetLotteryGameMatchByGameIdAction;
use App\Models\LotteryGame;
use App\Models\LotteryGameMatch;
use App\Models\LotteryGameMatchUser;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LotteryGameController extends Controller
{
    public function getAllGames(GetAllLotteryGamesAction $action): Collection
    {
        return $action->execute();
    }

    public function createMatch(CreateLotteryGameMatchAction $action, Request $request): LotteryGameMatch|JsonResponse
    {
        return $action->execute($request->query());
    }

    public function finishMatch(int $id, FinishLotteryGameMatchAction $action, Request $request): string|LotteryGame
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
