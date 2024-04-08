<?php

namespace App\Actions\UserActions;

use App\Models\User;

class DeleteUserAction
{
    public function execute(int $id): void
    {
        $user = User::findOrFail($id);
        $user->delete();
    }
}
