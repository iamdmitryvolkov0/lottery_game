<?php

namespace App\Actions\LotteryGameActions;

use App\Models\LotteryGame;
use App\Models\LotteryGameMatch;
use App\Models\LotteryGameMatchUser;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class CreateLotteryGameMatchUsersAction
{
    public function execute(array $data): JsonResponse|LotteryGameMatchUser
    {
        $validator = Validator::make($data, [
            'user_id' => ['required', 'integer'],
            'lottery_game_match_id' => ['required', 'integer'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        /** @var LotteryGameMatch $lotteryGameMatch */
        $lotteryGameMatch = LotteryGameMatch::findOrFail($data['lottery_game_match_id']);

        /** @var LotteryGame $lotteryGame */
        $lotteryGame = LotteryGame::query()
            ->where("id", $lotteryGameMatch->game_id)
            ->first();

        $gamerLimit = $lotteryGame->gamer_count;

        //получаем коллекцию всех игроков в матче
        $gamersCount = LotteryGameMatchUser::query()
            ->where('lottery_game_match_id', $lotteryGameMatch->id)
            ->count();

        //если все уже записаны - выдаем ошибку
        if ($gamersCount >= $gamerLimit) {
            return response()->json(['error' => 'Player limit reached']);
        }

        //иначе, записываем игрока на матч
        return LotteryGameMatchUser::create([
            'user_id' => $data['user_id'],
            'lottery_game_match_id' => $data['lottery_game_match_id'],
        ]);
    }
}
