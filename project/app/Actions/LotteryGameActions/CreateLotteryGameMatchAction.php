<?php

namespace App\Actions\LotteryGameActions;

use App\Models\LotteryGameMatch;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class CreateLotteryGameMatchAction
{
    public function execute(array $data): JsonResponse|LotteryGameMatch
    {
        $validator = Validator::make($data, [
            'game_id' => ['required', 'integer'],
            'start_date' => ['required', 'date'],
            'start_time' => ['required', 'integer'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (Carbon::parse($data['start_date']) < Carbon::now()) {
            return response()->json(["message" => "Start date must be after today"], 422);
        }

        return LotteryGameMatch::create([
            'game_id' => $data['game_id'],
            'start_date' => $data['start_date'],
            'start_time' => $data['start_time'],
        ]);
    }
}
