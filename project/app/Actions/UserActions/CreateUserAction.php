<?php

namespace App\Actions\UserActions;

use App\Models\User;

class CreateUserAction
{
    public function execute(array $data): User
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
        ]);
    }
}
