<?php

namespace App\Actions\UserActions;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class GetAllUsersAction
{
    public function execute(): Collection
    {
        return User::all();
    }
}
