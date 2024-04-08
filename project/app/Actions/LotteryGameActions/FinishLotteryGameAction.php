<?php

namespace App\Actions\LotteryGameActions;

use App\Models\LotteryGame;

class FinishLotteryGameAction
{
    public function execute(int $id, array $data): LotteryGame|string
    {
        $lotteryGame = LotteryGame::findOrFail($id);

        if ($lotteryGame->is_finished) {
            return json_encode(['message' => 'Game is already finished']);
        }

        $lotteryGame->update($data['is_finished']);

        return $lotteryGame;
    }
}
