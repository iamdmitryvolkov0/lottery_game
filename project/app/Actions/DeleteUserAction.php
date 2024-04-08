<?php

namespace App\Actions;

use App\Models\User;

class DeleteUserAction
{
    public function execute(int $id): void
    {
        $user = User::findOrFail($id);
        $user->delete();
    }
}
