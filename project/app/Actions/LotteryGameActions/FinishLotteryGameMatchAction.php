<?php

namespace App\Actions\LotteryGameActions;

use App\Models\LotteryGame;
use App\Models\LotteryGameMatch;
use App\Models\User;

class FinishLotteryGameMatchAction
{
    public function execute(int $id, array $data): LotteryGameMatch|string
    {
        $lotteryGameMatch = LotteryGameMatch::findOrFail($id);

        if ($lotteryGameMatch->is_finished) {
            return json_encode(['message' => 'Game is already finished']);
        }

        //получаем участников
        $action = new GetMatchParticipantsAction();
        $participants = $action->execute($id);

        $participantsIds = $participants->pluck('id')->all();

        //получаем ключ массива id с победителем
        $winnerId = array_rand($participantsIds);

        /** @var User $winner */
        $winner = User::findOrFail($participants[$winnerId]);

        /** @var LotteryGame $game */
        $game = LotteryGame::findOrFail($lotteryGameMatch->game_id);

        //начисляем очки победителю
        $winner->points += $game->reward_points;
        $winner->save();

        //завершаем матч
        $lotteryGameMatch->update($data['is_finished']);

        return $lotteryGameMatch;
    }
}
