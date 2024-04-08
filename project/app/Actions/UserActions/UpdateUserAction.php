<?php

namespace App\Actions\UserActions;

use App\Models\User;

class UpdateUserAction
{
    public function execute(int $id, array $data): User
    {
        $user = User::findOrFail($id);

        $user->update([
            'first_name' => $data['first_name'] ?? $user->first_name,
            'last_name' => $data['last_name'] ?? $user->last_name,
            'email' => $data['email'] ?? $user->email,
        ]);

        return $user;
    }
}
