<?php

namespace App\Actions\LotteryGameActions;

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
        return LotteryGameMatchUser::create([
            'user_id' => $data['user_id'],
            'lottery_game_match_id' => $data['lottery_game_match_id'],
        ]);
    }
}
