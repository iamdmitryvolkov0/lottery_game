<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class GetAllUsersAction
{
    public function execute(): Collection
    {
        return User::all();
    }
}
